@extends('layouts.menu')

@section('title', 'Pedidos | MRP')

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
            <h2 class="title text-center">Pedidos
                @can('pedidos.create')
                    <a href="{{ route('pedidos.create') }}" 
                    class="btn btn-sm btn-success pull-right">
                        Crear Nuevo Pedido
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
                                <th>Promotor</th>
                                <th>Fecha Entrega</th>
                                <th>Obs</th>
                                <th>Estado</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->numero }}</td>
                                <td>{{ $pedido->cliente }}</td>
                                <td>{{ $pedido->empleado}}</td>
                                <td>{{ $pedido->fecha_entrega }}</td>
                                <td>{{ $pedido->observaciones}}</td>
                                <td>
                                    @if($pedido->estado == 1)
                                        <u>Activo</u>
                                    @else
                                        <u>Inactivo</u>
                                    @endif
                                </td>

                                @can('pedidos.show')
                                <td width="10px">
                                    <a href="{{ route('pedidos.show', $pedido->id) }}" 
                                    class="btn btn-sm btn-info">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                @can('pedidos.edit')
                                <td width="10px">
                                    <a href="{{ route('pedidos.edit', $pedido->id) }}" 
                                    class="btn btn-sm btn-warning">
                                        editar
                                    </a>
                                </td>
                                @endcan
                                @can('pedidos.destroy')
                                <td width="10px">
                                    @if($pedido->estado === 1 )

                                        {!! Form::open(['route' => ['pedidos.destroy', $pedido->id, 200], 
                                        'method' => 'DELETE']) !!}
                                            <button class="btn btn-sm btn-danger">
                                                Dar de baja
                                            </button>
                                        {!! Form::close() !!}
                                    @else 
                                        {!! Form::open(['route' => ['pedidos.destroy', $pedido->id, 400], 
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
                                    {!! Form::open(['route' => ['pedidos.destroy', $pedido->id, 600], 
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
                        {{ $pedidos->links() }}
                    </div>
                    
                </div>

        </div>

    </div>
        
</div>

@endsection
