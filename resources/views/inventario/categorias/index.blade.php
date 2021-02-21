@extends('layouts.menu')

@section('title', 'Categorias')

@section('body-class', 'landing-page')

@section('styles')
    <style>
        h1.title {
            font-size: 3rem;
        }
        ul.pagination {
            justify-content: center;
        }

    </style>
@endsection

@section('contenido-central')
<div class="main ">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Categorias
                @can('departamentos.create')
                    <a href="{{ route('categorias.create') }}"
                    class="btn btn-sm btn-success pull-right">
                        Crear Nueva Categoria
                    </a>
                @endcan
            </h2>


            <div class="card" >
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categorias as $categoria)
                            <tr>
                                <td>{{ $categoria->id }}</td>
                                <td>{{ $categoria->nombre }}</td>
                                @can('categorias.show')
                                <td width="10px">
                                    <a href="{{ route('categorias.show', $categoria->id) }}"
                                    class="btn btn-sm btn-info">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                @can('categorias.edit')
                                <td width="10px">
                                    <a href="{{ route('categorias.edit', $categoria->id) }}"
                                    class="btn btn-sm btn-warning">
                                        editar
                                    </a>
                                </td>
                                @endcan
                                @can('departamentos.destroy')
                                <td width="10px">
                                    {!! Form::open(['route' => ['categorias.destroy', $categoria->id],
                                    'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                                @endcan
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $categorias->links() }}
                    </div>
                    
                </div>

        </div>

    </div>
        
</div>
@endsection
