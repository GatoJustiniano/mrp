@extends('layouts.menu')

@section('title', 'Clientes | MRP')

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
            <h2 class="title text-center">Clientes
                @can('clientes.create')
                    <a href="{{ route('clientes.create') }}" 
                    class="btn btn-sm btn-success pull-right">
                        Crear Nuevo Cliente
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
                                <th>Municipio</th>
                                <th>Estado</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->codigo }}</td>
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->direccion}}</td>
                                <td>{{ $cliente->telefono }}</td>
                                <td>{{ $cliente->municipio}}</td>
                                <td>
                                    @if($cliente->estado == 1)
                                        <u>Activo</u>
                                    @else
                                        <u>Inactivo</u>
                                    @endif
                                </td>

                                @can('clientes.show')
                                <td width="10px">
                                    <a href="{{ route('clientes.show', $cliente->id) }}" 
                                    class="btn btn-sm btn-info">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                @can('clientes.edit')
                                <td width="10px">
                                    <a href="{{ route('clientes.edit', $cliente->id) }}" 
                                    class="btn btn-sm btn-warning">
                                        editar
                                    </a>
                                </td>
                                @endcan
                                @can('clientes.destroy')
                                <td width="10px">
                                    @if($cliente->estado === 1 )

                                        {!! Form::open(['route' => ['clientes.destroy', $cliente->id, 200], 
                                        'method' => 'DELETE']) !!}
                                            <button class="btn btn-sm btn-danger">
                                                Dar de baja
                                            </button>
                                        {!! Form::close() !!}
                                    @else 
                                        {!! Form::open(['route' => ['clientes.destroy', $cliente->id, 400], 
                                        'method' => 'DELETE']) !!}
                                            <button class="btn btn-sm btn-outline-success">
                                                Dar de alta
                                            </button>
                                        {!! Form::close() !!}
                                    @endif
                                </td>
                                @endcan
                                @can('clientes.destroy')
                                <td width="10px">
                                    {!! Form::open(['route' => ['clientes.destroy', $cliente->id, 600], 
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
                        {{ $clientes->links() }}
                    </div>
                    
                </div>

        </div>

    </div>
        
</div>

@endsection
