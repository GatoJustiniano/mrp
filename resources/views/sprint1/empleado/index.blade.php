@extends('layouts.menu')

@section('title', 'Empleados | MRP')

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
            <h2 class="title text-center">Empleados
                @can('empleados.create')
                    <a href="{{ route('empleados.create') }}" 
                    class="btn btn-sm btn-success pull-right">
                        Crear Nuevo Empleado
                    </a>
                @endcan
            </h2>


            <div class="card" >
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Código</th>
                                <th>Cédula</th>
                                <th>Nombre </th>
                                <th>Dirección</th>
                                <th>Departamento</th>
                                <th>Sucursal</th>
                                <th>Cargo</th>
                                <th>Estado</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($empleados as $empleado)
                            <tr>
                                <td>{{ $empleado->id }}</td>
                                <td>{{ $empleado->codigo }}</td>
                                <td>{{ $empleado->cedula }}</td>
                                <td>{{ $empleado->nombre }}</td>
                                <td>{{ $empleado->direccion}}</td>
                                <td>{{ $empleado->departamento}}</td>
                                <td>{{ $empleado->sucursal}}</td>
                                <td>{{ $empleado->cargo}}</td>
                                <td>
                                    @if($empleado->estado == 1)
                                        Activo
                                    @else
                                        Inactivo
                                    @endif
                                </td>

                                @can('empleados.show')
                                <td width="10px">
                                    <a href="{{ route('empleados.show', $empleado->id) }}" 
                                    class="btn btn-sm btn-info">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                @can('empleados.edit')
                                <td width="10px">
                                    <a href="{{ route('empleados.edit', $empleado->id) }}" 
                                    class="btn btn-sm btn-warning">
                                        editar
                                    </a>
                                </td>
                                @endcan
                                @can('empleados.destroy')
                                <td width="10px">
                                    {!! Form::open(['route' => ['empleados.destroy', $empleado->id], 
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
                        {{ $empleados->links() }}
                    </div>
                    
                </div>

        </div>

    </div>
        
</div>

@endsection
