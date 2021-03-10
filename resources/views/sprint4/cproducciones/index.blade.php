@extends('layouts.menu')

@section('title', 'Cproducciones')

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
            <h2 class="title text-center">Centro Produccion
                @can('cproducciones.create')
                    <a href="{{ route('cproducciones.create') }}" 
                    class="btn btn-sm btn-success pull-right">
                        Crear Nuevo 
                    </a>
                @endcan
            </h2>


            <div class="card" >
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Capacidad</th>
                                <th>Codigo</th>
                                <th>Costoadicional</th>
                                <th>Costohora</th>
                                <th>Descripción</th>
                           
                                <th>Estado</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cproducciones as $cproduccione)
                            <tr>
                                <td>{{ $cproduccione->id }}</td>
                                <td>{{ $cproduccione->capacidad }}</td>
                                <td>{{ $cproduccione->codigo }}</td>
                                <td>{{ $cproduccione->costoadicional }}</td>
                                <td>{{ $cproduccione->costohora }}</td>
                                <td>{{ $cproduccione->descripcion }}</td>
                                
                                <td>{{ $cproduccione->estado }}</td>
                                <td>{{ $cproduccione->nombre }}</td>
                                @can('cproducciones.show')
                                <td width="10px">
                                    <a href="{{ route('cproducciones.show', $cproduccione->id) }}" 
                                    class="btn btn-sm btn-info">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                @can('cproducciones.edit')
                                <td width="10px">
                                    <a href="{{ route('cproducciones.edit', $cproduccione->id) }}" 
                                    class="btn btn-sm btn-warning">
                                        editar
                                    </a>
                                </td>
                                @endcan
                                @can('cproducciones.destroy')
                                <td width="10px">
                                    {!! Form::open(['route' => ['cproducciones.destroy', $cproduccione->id], 
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
                        {{ $cproducciones->links() }}
                    </div>
                    
                </div>

        </div>

    </div>
        
</div>
@endsection
