@extends('layouts.menu')

@section('title', 'Proveedores | MRP')

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
            <h2 class="title text-center">Proveedores
                @can('proveedores.create')
                    <a href="{{ route('proveedores.create') }}" 
                    class="btn btn-sm btn-success pull-right">
                        Crear Nuevo Proveedor
                    </a>
                @endcan
            </h2>


            <div class="card" >
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Código</th>
                                <th>Nombre </th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Municipio</th>
                                <th>Estado</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proveedores as $proveedor)
                            <tr>
                                <td>{{ $proveedor->id }}</td>
                                <td>{{ $proveedor->codigo }}</td>
                                <td>{{ $proveedor->nombre }}</td>
                                <td>{{ $proveedor->direccion}}</td>
                                <td>{{ $proveedor->telefono }}</td>
                                <td>{{ $proveedor->correo}}</td>
                                <td>{{ $proveedor->municipio}}</td>
                                <td>
                                    @if($proveedor->estado == 1)
                                        <u>Activo</u>
                                    @else
                                        <u>Inactivo</u>
                                    @endif
                                </td>

                                @can('proveedores.show')
                                <td width="10px">
                                    <a href="{{ route('proveedores.show', $proveedor->id) }}" 
                                    class="btn btn-sm btn-info">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                @can('proveedores.edit')
                                <td width="10px">
                                    <a href="{{ route('proveedores.edit', $proveedor->id) }}" 
                                    class="btn btn-sm btn-warning">
                                        editar
                                    </a>
                                </td>
                                @endcan
                                @can('proveedores.destroy')
                                <td width="10px">
                                    @if($proveedor->estado === 1 )

                                        {!! Form::open(['route' => ['proveedores.destroy', $proveedor->id, 200], 
                                        'method' => 'DELETE']) !!}
                                            <button class="btn btn-sm btn-danger">
                                                Dar de baja
                                            </button>
                                        {!! Form::close() !!}
                                    @else 
                                        {!! Form::open(['route' => ['proveedores.destroy', $proveedor->id, 400], 
                                        'method' => 'DELETE']) !!}
                                            <button class="btn btn-sm btn-outline-success">
                                                Dar de alta
                                            </button>
                                        {!! Form::close() !!}
                                    @endif
                                </td>
                                @endcan
                                @can('proveedores.destroy')
                                <td width="10px">
                                    {!! Form::open(['route' => ['proveedores.destroy', $proveedor->id, 600], 
                                    'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-outline-danger">
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
                        {{ $proveedores->links() }}
                    </div>
                    
                </div>

        </div>

    </div>
        
</div>

@endsection
