@extends('layouts.menu')

@section('title', 'cproduccionel '. $cproduccione->name .' | MRP')

@section('body-class', 'landing-page')

@section('styles')
    <style>
    </style>
@endsection

@section('contenido-central')
<div class="tarjeta">
    <div class="card col-md-7">
        <div class="card-title btn btn-primary">
        Cproducciones
        </div>
        <div class="card-body">
        
            <span class="detalle">
                <h6 class="item col-md-4">Capacidad:</h6>
                <p class="item col-md-8">{{ $cproduccione->capacidad }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Codigo:</h6>
                <p class="item col-md-8">{{ $cproduccione->codigo }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Costo Adicional:</h6>
                <p class="item col-md-8">{{ $cproduccione->costoadicional }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Costo Hora:</h6>
                <p class="item col-md-8">{{ $cproduccione->costohora }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Descripción:</h6>
                <p class="item col-md-8">{{ $cproduccione->descripcion }}</p>
            </span>
        
            <span class="detalle">
                <h6 class="item col-md-4">Estado: </h6>
                <p class="item col-md-8">{{ $cproduccione->estado }} </p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Nombre: </h6>
                <p class="item col-md-8">{{ $cproduccione->nombre }}</p>
            </span>
        </div>
        <span class=" text-muted">
            Id: {{ $cproduccione->id }} 
        </span>
    </div>
</div>
@endsection