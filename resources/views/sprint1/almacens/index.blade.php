@extends('layouts.menu')

@section('title', 'Almacenes')

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
            <h2 class="title text-center">Almacenes
                @can('almacens.create')
                    <a href="{{ route('almacens.create') }}" 
                    class="btn btn-sm btn-success pull-right">
                        Crear Nuevo Almacen
                    </a>
                @endcan
            </h2>


            <div class="card" >
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Codigo</th>
                                <th>Descripción</th>
                                <th>sucursal</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($almacens as $almacen)
                            <tr>
                                <td>{{ $almacen->id }}</td>
                                <td>{{ $almacen->codigo }}</td>
                                <td>{{ $almacen->descripcion }}</td>
                                <td>{{ $almacen->sucursal }}</td>
                                @can('almacens.show')
                                <td width="10px">
                                    <a href="{{ route('almacens.show', $almacen->id) }}" 
                                    class="btn btn-sm btn-info">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                @can('almacens.edit')
                                <td width="10px">
                                    <a href="{{ route('almacens.edit', $almacen->id) }}" 
                                    class="btn btn-sm btn-warning">
                                        editar
                                    </a>
                                </td>
                                @endcan
                                @can('almacens.destroy')
                                <td width="10px">
                                    {!! Form::open(['route' => ['almacens.destroy', $almacen->id], 
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
                        {{ $almacens->links() }}
                    </div>
                    
                </div>

        </div>

    </div>
        
</div>
@endsection
