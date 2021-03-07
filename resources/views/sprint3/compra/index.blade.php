@extends('layouts.menu')

@section('title', 'Compras | MRP')

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
            <h2 class="title text-center">Compras
                @can('compras.create')
                    <a href="{{ route('compras.create') }}" 
                    class="btn btn-sm btn-success pull-right">
                        Crear Nueva Compra
                    </a>
                @endcan
            </h2>


            <div class="card" >
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="8px">ID</th>
                                <th>Nro.</th>
                                <th>Proveedor </th>
                                <th>Vendedor</th>
                                <th>Almacén</th>
                                <th>Fecha Entrega</th>
                                <th>Estado</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($compras as $compra)
                            <tr>
                                <td>{{ $compra->id }}</td>
                                <td>{{ $compra->numero }}</td>
                                <td>{{ $compra->proveedor }}</td>
                                <td>{{ $compra->empleado}}</td>
                                <td>{{ $compra->almacen }}</td>
                                <td>{{ $compra->fecha_entrega}}</td>
                                <td>
                                    @if($compra->estado == 1)
                                        <u>Activo</u>
                                    @else
                                        <u>Inactivo</u>
                                    @endif
                                </td>

                                @can('compras.show')
                                <td width="10px">
                                    <a href="{{ route('compras.show', $compra->id) }}" 
                                    class="btn btn-sm btn-info">
                                        ver
                                    </a>
                                </td>
                                @endcan
                                @can('compras.destroy')
                                <td width="10px">
                                    @if($compra->estado === 1 )

                                        {!! Form::open(['route' => ['compras.destroy', $compra->id, 200], 
                                        'method' => 'DELETE']) !!}
                                            <button class="btn btn-sm btn-danger">
                                                Dar de baja
                                            </button>
                                        {!! Form::close() !!}
                                    @else 
                                        {!! Form::open(['route' => ['compras.destroy', $compra->id, 400], 
                                        'method' => 'DELETE']) !!}
                                            <button class="btn btn-sm btn-outline-success">
                                                Dar de alta
                                            </button>
                                        {!! Form::close() !!}
                                    @endif
                                </td>
                                @endcan
                                @can('compras.destroy')
                                <td width="10px">
                                    {!! Form::open(['route' => ['compras.destroy', $compra->id, 600], 
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
                        {{ $compras->links() }}
                    </div>
                    
                </div>

        </div>

    </div>
        
</div>

@endsection
