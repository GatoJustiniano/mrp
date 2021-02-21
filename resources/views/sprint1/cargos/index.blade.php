@extends('layouts.menu')

@section('title', 'Gestión Cargos')

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
            <h2 class="title text-center">Cargos
                @can('cargos.create')
                    <a href="{{ route('cargos.create') }}" 
                    class="btn btn-sm btn-success pull-right">
                        Crear Nuevo Cargo
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
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cargos as $cargo)
                            <tr>
                                <td>{{ $cargo->id }}</td>
                                <td>{{ $cargo->codigo }}</td>
                                <td>{{ $cargo->nombre }}</td>
                                <td>{{ $cargo->descripcion }}</td>
                                <td>
                                    @if($cargo->estado == 1)
                                        Activo
                                    @else
                                        Inactivo
                                    @endif
                                </td>
                                @can('cargos.show')
                                <td width="10px">
                                    <a href="{{ route('cargos.show', $cargo->id) }}" 
                                    class="btn btn-sm btn-info">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                @can('cargos.edit')
                                <td width="10px">
                                    <a href="{{ route('cargos.edit', $cargo->id) }}" 
                                    class="btn btn-sm btn-warning">
                                        editar
                                    </a>
                                </td>
                                @endcan
                                @can('cargos.destroy')
                                <td width="10px">
                                    {!! Form::open(['route' => ['cargos.destroy', $cargo->id], 
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
                        {{ $cargos->links() }}
                    </div>
                    
                </div>

        </div>

    </div>
        
</div>
@endsection
