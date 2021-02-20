@extends('layouts.menu')

@section('title', $articulo->nombre .' | MRP')

@section('body-class', 'landing-page')

@section('styles')
    <style>

    </style>
@endsection

@section('contenido-central')
<div class="tarjeta" style="width: 50%">
    <div class="card">
        <div class="card-title btn btn-primary">
            Articulo
        </div>
        <div class="card-body">
            <img class="img-fluid" src="{{ asset('/imagenes/'.$articulo->imagen) }}" />
            <span >
                <span class="detalle" style="width: 98%">
                    <h6 class="item">Codigo:</h6>
                    <p class="item">{{ $articulo->codigo }}</p>
                    <h6 class="item">Sub Categoria:</h6>
                    <p class="item">{{ $articulo->sub_categoria->nombre }}</p>
                </span>
            </span>
            <span class="detalle">
                <h6 class="item">Nombre:</h6>
                <p class="item">{{ $articulo->nombre }}</p>
            </span>
            <span class="detalle">
                <h6 class="item">Tipo:</h6>
                <p class="item">{{ $articulo->tipo }}</p>
                <h6 class="item">Proveedor:</h6>
                <p class="item">{{ $articulo->proveedor->nombre }}</p>
            </span>
            <span class="detalle">
                <h6 class="item">Precio Compra:</h6>
                <p class="item">{{ $articulo->precio_compra }}</p>
            </span>
            <span class="detalle">
                <h6 class="item">Precio Venta:</h6>
                <p class="item">{{ $articulo->precio_venta }}</p>
            </span>
            <span class="detalle">
                <h6 class="item">Cantidad Minima:</h6>
                <p class="item">{{ $articulo->cantidad_minima }}</p>
            </span>
            <div class="card-head">
                Stock
            </div>
            <div class="card-body">
                <span class="detalle">
                <h6 class="item">Unidad de Medida:</h6>
                <p class="item">{{ $articulo->unidad_medida->nombre}}</p>
            </span>
            </div>
        </div>
    </div>
</div>
@endsection