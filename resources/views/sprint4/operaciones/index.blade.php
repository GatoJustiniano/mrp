@extends('layouts.menu')

@section('title', 'Operaciones')

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
            <h2 class="title text-center">Operaciones
                @can('operaciones.create')
                    <a href="{{ route('operaciones.create') }}" 
                    class="btn btn-sm btn-success pull-right">
                        Crear Nueva Operacion
                    </a>
                @endcan
            </h2>


            <div class="card" >
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Centroproduccion</th>
                                <th>Duracion</th>
                                <th>Costoduracion</th>
                                <th>Descripción</th>
                           
                              
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($operaciones as $operacione)
                            <tr>
                                <td>{{ $operacione->id }}</td>
                                <td>{{ $operacione->codigo }}</td>
                                <td>{{ $operacione->nombre }}</td>
                                <td>{{ $operacione->centroproduccion}}</td>
                                <td>{{ $operacione->duracion }}</td>
                                <td>{{ $operacione->costoduracion }}</td>
                                <td>{{ $operacione->descripcion }}</td>
                                
                                @can('operaciones.show')
                                <td width="10px">
                                    <a href="{{ route('operaciones.show', $operacione->id) }}" 
                                    class="btn btn-sm btn-info">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                @can('operaciones.edit')
                                <td width="10px">
                                    <a href="{{ route('operaciones.edit', $operacione->id) }}" 
                                    class="btn btn-sm btn-warning">
                                        editar
                                    </a>
                                </td>
                                @endcan
                                @can('operaciones.destroy')
                                <td width="10px">
                                    {!! Form::open(['route' => ['operaciones.destroy', $operacione->id], 
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
                        {{ $operaciones->links() }}
                    </div>
                    
                </div>

        </div>

    </div>
        
</div>
@endsection
