@extends('layouts.menu')

@section('title', 'Contacto ' . $contacto->nombre .' | MRP')

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
            Contacto
        </div>
        <div class="card">
            <span class="detalle">
                <h6 class="item col-md-4">Nombre:</h6>
                <p class="item col-md-8">{{ $contacto->nombre }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Cargo:</h6>
                <p class="item col-md-8">{{ $contacto->cargo }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Correo Electrónico:</h6>
                <p class="item col-md-8">{{ $contacto->correo }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Teléfono :</h6>
                <p class="item col-md-8">{{ $contacto->telefono }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Celular :</h6>
                <p class="item col-md-8">{{ $contacto->celular }}</p>
            </span>
        </div>
        <div class="card">
            <div class="card-body">
                <h6>Datos:</h6>
                <p class="card-text">Proveedor al que pertenece: 
                    <a class="" href="{{ route('proveedores.show', $proveedor->id) }}">
                        {{$proveedor->nombre}}
                    </a>
                </p>
            </div>
            <div class="card-body">
                <p class="card-text"><u>NOTA</u> del contacto: </p>
                <p class="card-text">{{ $contacto->nota }}.</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">
                    @if($contacto->estado == 1)
                        <span class="badge badge-pill badge-success">Activo </span> 
                        <span>desde {{$contacto->created_at}}</span>
                    @else
                        <span class="badge badge-pill badge-warning">Inactivo </span> 
                        <span>desde {{$contacto->updated_at}}</span>
                    @endif     
                </small>    
            </div>
        </div>
        <div class=" text-muted">
            Código: {{ $contacto->id }} 
        </div>
</div>
@endsection