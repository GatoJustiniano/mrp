@extends('layouts.menu')

@section('title', 'Unidad medida '. $unidad_medida->nombre .' | MRP')

@section('body-class', 'landing-page')

@section('styles')
    <style>
    </style>
@endsection

@section('contenido-central')
<div class="tarjeta">
    <div class="card col-md-7">
        <div class="card-title btn btn-primary">
            Unidad de Medida
        </div>
        <div class="card-body">
            <span class="detalle">
                <h6 class="item col-md-4">Nombre:</h6>
                <p class="item col-md-8">{{ $unidad_medida->nombre }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Abreviatura:</h6>
                <p class="item col-md-8">{{ $unidad_medida->abreviatura }}</p>
            </span>
        </div>
        <span class=" text-muted">
            Código: {{ $unidad_medida->id }}
        </span>
    </div>
</div>
@endsection