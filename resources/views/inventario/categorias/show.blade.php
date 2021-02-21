@extends('layouts.menu')

@section('title', 'Categoria '. $categoria->nombre .' | MRP')

@section('body-class', 'landing-page')

@section('styles')
    <style>
    </style>
@endsection

@section('contenido-central')
<div class="tarjeta">
    <div class="card col-md-7">
        <div class="card-title btn btn-primary">
            Categoria
        </div>
        <div class="card-body">
            <span class="detalle">
                <h6 class="item col-md-4">Nombre:</h6>
                <p class="item col-md-8">{{ $categoria->nombre }}</p>
            </span>
        </div>
        <span class=" text-muted">
            Código: {{ $categoria->id }}
        </span>
    </div>
</div>
@endsection