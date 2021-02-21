@extends('layouts.menu')

@section('title', $sub_categoria->nombre .' | MRP')

@section('body-class', 'landing-page')

@section('styles')
    <style>

    </style>
@endsection

@section('contenido-central')
<div class="tarjeta">
    <div class="card col-md-6">
        <div class="card-title btn btn-primary">
            Sub Categoria
        </div>
        <div class="card-body">
            <span class="detalle">
                <h6 class="item">Nombre:</h6>
                <p class="item">{{ $sub_categoria->nombre }}</p>
            </span>
            <span class="detalle">
                <h6 class="item">Categoria:</h6>
                <p class="item">{{ $sub_categoria->categoria->nombre }}</p>
            </span>
        </div>
        <div class=" text-muted">
            Código: {{ $sub_categoria->id }}
        </div>
    </div>
</div>
@endsection