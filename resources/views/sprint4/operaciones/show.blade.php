@extends('layouts.menu')

@section('title', 'operacionel '. $operacione->name .' | MRP')

@section('body-class', 'landing-page')

@section('styles')
    <style>
    </style>
@endsection

@section('contenido-central')
<div class="tarjeta">
    <div class="card col-md-7">
        <div class="card-title btn btn-primary">
        Operaciones
        </div>
        <div class="card-body">
        
         
            <span class="detalle">
                <h6 class="item col-md-4">Codigo:</h6>
                <p class="item col-md-8">{{ $operacione->codigo }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Nombre: </h6>
                <p class="item col-md-8">{{ $operacione->nombre }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Centroproduccion:</h6>
                <p class="item col-md-8">{{ $operacione->cproduccione }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Duracion:</h6>
                <p class="item col-md-8">{{ $operacione->duracion }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Costo Duracion:</h6>
                <p class="item col-md-8">{{ $operacione->costoduracion }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Descripción:</h6>
                <p class="item col-md-8">{{ $operacione->descripcion }}</p>
            </span>
        
         
          
        </div>
        <span class=" text-muted">
            Id: {{ $operacione->id }} 
        </span>
    </div>
</div>
@endsection