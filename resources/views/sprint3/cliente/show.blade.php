@extends('layouts.menu')

@section('title', 'Cliente ' . $cliente->nombre .' | MRP')

@section('body-class', 'landing-page')

@section('styles')
    <style>

        html body.landing-page div.wrapper div#main div#container div.card-group div.card div.card-footer small.text-muted {
            padding-top: 1rem !important;
        }
        
    </style>
@endsection

@section('contenido-central')
<div class="card-group">
        <div class="card-title btn btn-info">
            Cliente
        </div>
        <div class="card">
            <span class="detalle">
                <h6 class="item col-md-4">Código:</h6>
                <p class="item col-md-8">{{ $cliente->codigo }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Nombre:</h6>
                <p class="item col-md-8">{{ $cliente->nombre }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Teléfono :</h6>
                <p class="item col-md-8">{{ $cliente->telefono }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Celular :</h6>
                <p class="item col-md-8">{{ $cliente->celular }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Correo Electrónico:</h6>
                <p class="item col-md-8">{{ $cliente->correo }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Dirección:</h6>
                <p class="item col-md-8">{{ $cliente->direccion }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Estado:</h6>
                <p class="item col-md-8">{{ $estado->nombre }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Provincia:</h6>
                <p class="item col-md-8">{{ $provincia->nombre }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Municipio:</h6>
                <p class="item col-md-8">{{ $municipio->nombre }}</p>
            </span>
        </div>
        <div class="card">
            <img src="{{'/img/faces/marc.jpg'}}" class="card-img-top" alt="imagen de cliente">
            <div class="card-body">
                <span class="detalle">
                    <h6 class="item col-md-6">Identificación:</h6>
                    <p class="item col-md-6">{{ $cliente->identificacion }}</p>
                </span>
            </div>
            <div class="card-footer">
                <small class="text-muted">
                    @if($cliente->estado == 1)
                        <span class="badge badge-pill badge-success">Activo </span> 
                        <span>desde {{$cliente->created_at}}</span>
                    @else
                        <span class="badge badge-pill badge-warning">Inactivo </span> 
                        <span>desde {{$cliente->updated_at}}</span>
                    @endif     
                </small>    
            </div>
        </div>
        <div class=" text-muted">
            Código: {{ $cliente->id }} 
        </div>
</div>

@endsection