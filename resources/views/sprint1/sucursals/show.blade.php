@extends('layouts.menu')

@section('title', 'sucursale '. $sucursal->name .' | MRP')

@section('body-class', 'landing-page')

@section('styles')
    <style>
    </style>
@endsection

@section('contenido-central')
<div class="tarjeta">
    <div class="card col-md-7">
        <div class="card-title btn btn-primary">
        Sucursal
        </div>
        <div class="card-body">
            <span class="detalle">
                <h6 class="item col-md-4">Codigo:</h6>
                <p class="item col-md-8">{{ $sucursal->codigo }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Descripción:</h6>
                <p class="item col-md-8">{{ $sucursal->descripcion }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Direccion: </h6>
                <p class="item col-md-8">{{ $sucursal->direccion }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Estado: </h6>
                <p class="item col-md-8">{{ $sucursal->estado }} </p>
            </span>
        </div>
        <span class=" text-muted">
            Id: {{ $sucursal->id }} 
        </span>
    </div>
</div>
@endsection