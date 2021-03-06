@extends('layouts.menu')

@section('title', 'Ventas | MRP')

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
            <h2 class="title text-center">Ventas
                @can('ventas.create')
                    <a href="{{ route('ventas.create') }}" 
                    class="btn btn-sm btn-success pull-right">
                        Crear Nueva Venta
                    </a>
                @endcan
            </h2>


            <div class="card" >
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="8px">ID</th>
                                <th>Nro.</th>
                                <th>Cliente </th>
                                <th>Vendedor</th>
                                <th>Almacén</th>
                                <th>Fecha Entrega</th>
                                <th>Estado</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ventas as $venta)
                            <tr>
                                <td>{{ $venta->id }}</td>
                                <td>{{ $venta->numero }}</td>
                                <td>{{ $venta->cliente }}</td>
                                <td>{{ $venta->empleado}}</td>
                                <td>{{ $venta->almacen }}</td>
                                <td>{{ $venta->fecha_entrega}}</td>
                                <td>
                                    @if($venta->estado == 1)
                                        <u>Activo</u>
                                    @else
                                        <u>Inactivo</u>
                                    @endif
                                </td>

                                @can('ventas.show')
                                <td width="10px">
                                    <a href="{{ route('ventas.show', $venta->id) }}" 
                                    class="btn btn-sm btn-info">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                @can('ventas.destroy')
                                <td width="10px">
                                    @if($venta->estado === 1 )

                                        {!! Form::open(['route' => ['ventas.destroy', $venta->id, 200], 
                                        'method' => 'DELETE']) !!}
                                            <button class="btn btn-sm btn-danger">
                                                Dar de baja
                                            </button>
                                        {!! Form::close() !!}
                                    @else 
                                        {!! Form::open(['route' => ['ventas.destroy', $venta->id, 400], 
                                        'method' => 'DELETE']) !!}
                                            <button class="btn btn-sm btn-outline-success">
                                                Dar de alta
                                            </button>
                                        {!! Form::close() !!}
                                    @endif
                                </td>
                                @endcan
                                @can('ventas.destroy')
                                <td width="10px">
                                    {!! Form::open(['route' => ['ventas.destroy', $venta->id, 600], 
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
                        {{ $ventas->links() }}
                    </div>
                    
                </div>

        </div>

    </div>
        
</div>

@endsection
