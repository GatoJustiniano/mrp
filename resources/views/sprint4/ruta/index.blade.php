@extends('layouts.menu')

@section('title', 'Rutas | MRP')

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
            <h2 class="title text-center">Rutas
                @can('rutas.create')
                    <a href="{{ route('rutas.create') }}"
                    class="btn btn-sm btn-success pull-right">
                        Crear Nueva Ruta
                    </a>
                @endcan
            </h2>


            <div class="card" >
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="8px">ID</th>
                                <th>Codigo.</th>
                                <th>Nombre </th>
                                <th>Articulo</th>
                                <th>Duracion total</th>
                                <th>Costo Total</th>
                                <th>Estado</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rutas as $ruta)
                            <tr>
                                <td>{{ $ruta->id }}</td>
                                <td>{{ $ruta->codigo }}</td>
                                <td>{{ $ruta->nombre }}</td>
                                <td>{{ $ruta->articulo}}</td>
                                <td>{{ $ruta->costo_total }}</td>
                                <td>{{ $ruta->duracion_total}}</td>
                                <td>
                                    @if($ruta->estado == 1)
                                        <u>Activo</u>
                                    @else
                                        <u>Inactivo</u>
                                    @endif
                                </td>

                                @can('rutas.show')
                                <td width="10px">
                                    <a href="{{ route('rutas.show', $ruta->id) }}"
                                    class="btn btn-sm btn-info">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                @can('pedidos.destroy')
                                <td width="10px">
                                    @if($ruta->estado === 1 )

                                        {!! Form::open(['route' => ['rutas.destroy', $ruta->id, 200],
                                        'method' => 'DELETE']) !!}
                                            <button class="btn btn-sm btn-danger">
                                                Dar de baja
                                            </button>
                                        {!! Form::close() !!}
                                    @else 
                                        {!! Form::open(['route' => ['rutas.destroy', $ruta->id, 400],
                                        'method' => 'DELETE']) !!}
                                            <button class="btn btn-sm btn-outline-success">
                                                Dar de alta
                                            </button>
                                        {!! Form::close() !!}
                                    @endif
                                </td>
                                @endcan
                                @can('pedidos.destroy')
                                <td width="10px">
                                    {!! Form::open(['route' => ['rutas.destroy', $ruta->id, 600],
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
                        {{ $rutas->links() }}
                    </div>
                    
                </div>

        </div>

    </div>
        
</div>

@endsection
