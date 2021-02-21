@extends('layouts.menu')

@section('title', 'Sucursales')

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
            <h2 class="title text-center">Sucursales
                @can('sucursals.create')
                    <a href="{{ route('sucursals.create') }}" 
                    class="btn btn-sm btn-success pull-right">
                        Crear Nueva Sucursal
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
                                <th>Direccion</th>
                                <th>Estado</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sucursals as $sucursal)
                            <tr>
                                <td>{{ $sucursal->id }}</td>
                                <td>{{ $sucursal->codigo }}</td>
                                <td>{{ $sucursal->descripcion }}</td>
                                <td>{{ $sucursal->direccion }}</td>
                                <td>{{ $sucursal->estado }}</td>
                                @can('sucursals.show')
                                <td width="10px">
                                    <a href="{{ route('sucursals.show', $sucursal->id) }}" 
                                    class="btn btn-sm btn-info">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                @can('sucursals.edit')
                                <td width="10px">
                                    <a href="{{ route('sucursals.edit', $sucursal->id) }}" 
                                    class="btn btn-sm btn-warning">
                                        editar
                                    </a>
                                </td>
                                @endcan
                                @can('sucursals.destroy')
                                <td width="10px">
                                    {!! Form::open(['route' => ['sucursals.destroy', $sucursal->id], 
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
                        {{ $sucursals->links() }}
                    </div>
                    
                </div>

        </div>

    </div>
        
</div>
@endsection
