@extends('layouts.menu')

@section('title', 'Gestión Sub Categoria | MRP')

@section('body-class', 'landing-page')

@section('styles')
    <style>
        h1.title {
            font-size: 3rem;
        }
        ul.pagination {
            justify-content: center;
        }
        .section {
          padding: 5px !important; 
      }

    </style>
@endsection

@section('contenido-central')
<div class="main ">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Sub Categoria
                @can('areas.create')
                    <a href="{{ route('sub_categorias.create') }}"
                    class="btn btn-sm btn-success pull-right">
                        Crear Nueva Sub Categoria
                    </a>
                @endcan
            </h2>


            <div class="card" >
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre Sub Categoria</th>
                                <th>Categoria</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sub_categorias as $sub_categoria)
                            <tr>
                                <td>{{ $sub_categoria->id }}</td>
                                <td>{{ $sub_categoria->nombre }}</td>
                                <td>
                                {{ $sub_categoria->categoria->nombre}}
                                </td>
                                @can('sub_categorias.show')
                                <td width="10px">
                                    <a href="{{ route('sub_categorias.show', $sub_categoria->id) }}"
                                    class="btn btn-sm btn-info">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                @can('sub_categorias.edit')
                                <td width="10px">
                                    <a href="{{ route('sub_categorias.edit', $sub_categoria->id) }}"
                                    class="btn btn-sm btn-warning">
                                        editar
                                    </a>
                                </td>
                                @endcan
                                @can('sub_categorias.destroy')
                                <td width="10px">
                                    {!! Form::open(['route' => ['sub_categorias.destroy', $sub_categoria->id],
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
                        {{ $sub_categorias->links() }}
                    </div>
                    
                </div>

        </div>

    </div>
        
</div>

@endsection
