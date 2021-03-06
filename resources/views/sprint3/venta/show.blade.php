@extends('layouts.menu')

@section('title', 'Pedido ' . $venta->numero .' | MRP')

@section('body-class', 'landing-page')

@section('styles')
    <style>

        html body.landing-page div.wrapper div#main div#container div.card-group div.card div.card-footer small.text-muted {
            padding-top: 1rem !important;
        }

        .derecha {
            text-align:right !important;

        }
        .izquierda {
            text-align:left !important;
            padding-left: 4rem !important;
        }
    </style>
@endsection

@section('contenido-central')
<div class="card">


<div class="card-group">
        <div class="card-title btn btn-info">
            Venta
        </div>
        <div class="card">
            <span class="detalle">
                <h6 class="item col-md">Número Pedido:</h6>
                <p class="item col-md">{{ $venta->numero }}</p>
            </span>
            
            <span class="detalle">
                <h6 class="item col-md">Identificación cliente:</h6>
                <p class="item col-md">{{ $cliente->identificacion }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md">Código cliente:</h6>
                <p class="item col-md">{{ $cliente->codigo }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md">Nombre del cliente:</h6>
                <p class="item col-md">{{ $cliente->nombre }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md">Fecha de Entrega:</h6>
                <p class="item col-md">{{ $venta->fecha_entrega }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md">Tiempo:</h6>
                <p class="item col-md">{{ $periodo}} días</p>
            </span>
        </div>
        <div class="card">
            <span class="detalle">
                <h6 class="item col-md">Fecha Pedido:</h6>
                <p class="item col-md">{{ $venta->created_at->format('d-m-Y') }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md">Hora Pedido:</h6>
                <p class="item col-md">{{ $venta->created_at->format('H:i:s') }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md">Código promotor:</h6>
                <p class="item col-md">{{ $empleado->codigo }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md">Nombre promotor:</h6>
                <p class="item col-md">{{ $empleado->nombre }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md">Días restantes:</h6>
                <p class="item col-md">{{ $dias}} días</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md">{{ $almacen->codigo}}:</h6>
                <p class="item col-md"> {{$almacen->descripcion}} </p>
            </span>
            <span class="detalle">
                <h6 class="item col-md">Monto total:</h6>
                <p class="item col-md">{{ $venta->monto_total}} BS.</p>
            </span>



            <div class="card-footer">
                <small class="text-muted">
                    @if($venta->estado == 1)
                        <span class="badge badge-pill badge-success">Activo </span> 
                        <span>desde {{$venta->created_at}}</span>
                    @else
                        <span class="badge badge-pill badge-warning">Inactivo </span> 
                        <span>desde {{$venta->updated_at}}</span>
                    @endif     
                </small>    
            </div>
        </div>

</div>
<div class="card" style="margin-top: 0px;">
    <div class="card-title btn btn-info" style="margin-top: 0px;">
        Detalle
    </div>
    <table class="table table-hover table-sm ">
        <caption>Lista de item</caption>
        <thead class="thead-light derecha">
            <tr>
                <th class="izquierda">Nombre </th>
                <th>Cantidad</th>
                <th>Precio Bs.</th>
                <th style="padding-right: 2rem !important;">Subtotal Bs.</th>
            </tr>
        </thead>
        <tbody class='derecha'>
            @foreach($articulos as $articulo)
            <tr>
                <td class="izquierda">{{ $articulo->articulo }}</td>
                <td>{{ $articulo->cantidad }} {{$articulo->abreviatura }}</td>
                <td>{{ $articulo->precio}}</td>
                <td style="padding-right: 2rem !important;">{{ $articulo->cantidad  * $articulo->precio}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>
@endsection