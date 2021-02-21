@extends('layouts.menu')

@section('title', 'Empleado ' . $empleado->nombre .' | MRP')

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
            Empleado
        </div>
        <div class="card">
            <span class="detalle">
                <h6 class="item col-md-4">Código:</h6>
                <p class="item col-md-8">{{ $empleado->codigo }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Cedula:</h6>
                <p class="item col-md-8">{{ $empleado->cedula }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Nombre Completo:</h6>
                <p class="item col-md-8">{{ $empleado->nombre }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Dirección:</h6>
                <p class="item col-md-8">{{ $empleado->direccion }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Correo Electrónico:</h6>
                <p class="item col-md-8">{{ $empleado->email }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Teléfono :</h6>
                <p class="item col-md-8">{{ $empleado->telefono }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Departamento:</h6>
                <p class="item col-md-8">{{ $departamento->nombre }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Sucursal:</h6>
                <p class="item col-md-8">{{ $sucursal->descripcion }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Cargo:</h6>
                <p class="item col-md-8">{{ $cargo->nombre }}</p>
            </span>
        </div>
        <div class="card">
            <img src="{{'/img/faces/marc.jpg'}}" class="card-img-top" alt="imagen de empleado">
            <div class="card-body">

                    <p><strong>Fecha de nacimiento: </strong>{{ $empleado->fecha_nac }}</p>
                    
                    <p><strong>Edad: </strong> {{ $edad  }} años</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">
                    @if($empleado->estado == 1)
                        <span class="badge badge-pill badge-success">Activo </span> 
                        <span>desde {{$empleado->created_at}}</span>
                    @else
                        <span class="badge badge-pill badge-warning">Inactivo </span> 
                        <span>desde {{$empleado->updated_at}}</span>
                    @endif     
                </small>    
            </div>
        </div>
        <div class=" text-muted">
            Código: {{ $empleado->id }} 
        </div>
</div>
@endsection