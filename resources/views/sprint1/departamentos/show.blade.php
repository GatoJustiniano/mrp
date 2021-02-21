@extends('layouts.menu')

@section('title', $departamento->name .' | MRP')

@section('body-class', 'landing-page')

@section('styles')
    <style>
    </style>
@endsection

@section('contenido-central')
<div class="tarjeta">
    <div class="card col-md-7">
        <div class="card-title btn btn-primary">
            Departamento
        </div>
        <div class="card-body">
            <span class="detalle">
                <h6 class="item col-md-4">Nombre:</h6>
                <p class="item col-md-8">{{ $departamento->nombre }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Codigo:</h6>
                <p class="item col-md-8">{{ $departamento->codigo }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Estado: </h6>
                <p class="item col-md-8">
                @if($departamento->estado == 1)
                    Activo
                @else
                    Inactivo
                @endif
                </p>
                
            </span>
        </div>
        <span class=" text-muted">
            Código: {{ $departamento->id }} 
        </span>
    </div>
</div>
@endsection