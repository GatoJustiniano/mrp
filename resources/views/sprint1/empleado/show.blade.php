@extends('layouts.menu')

@section('title', $empleado->nombre .' | MRP')

@section('body-class', 'landing-page')

@section('styles')
    <style>

    </style>
@endsection

@section('contenido-central')
<div class="tarjeta">
    <div class="card col-md-6">
        <div class="card-title btn btn-primary">
            Empleado
        </div>
        <div class="card-body">
            <span class="detalle">
                <h6 class="item col-md-4">Código:</h6>
                <p class="item col-md-8">{{ $empleado->codigo }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Cédula:</h6>
                <p class="item col-md-8">{{ $empleado->cedula }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Nombre:</h6>
                <p class="item col-md-8">{{ $empleado->nombre }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Dirección:</h6>
                <p class="item col-md-8">{{ $empleado->direccion }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Correo :</h6>
                <p class="item col-md-8">{{ $empleado->email }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Fecha Nacimiento:</h6>
                <p class="item col-md-8">{{ $empleado->fecha_nac }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Edad:</h6>
                <p class="item col-md-8"> {{ $edad  }} años</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Teléfono:</h6>
                <p class="item col-md-8">{{ $empleado->telefono }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Foto:</h6>
                <p class="item col-md-8">{{ $empleado->foto }}</p>
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
            <span class="detalle">
                <h6 class="item col-md-4">Estado: </h6>
                <p class="item col-md-8">
                    @if($empleado->estado == 1)
                        Activo
                    @else
                        Inactivo
                    @endif
                </p>
                
            </span>
        </div>
        <div class=" text-muted">
            Código: {{ $empleado->id }} 
        </div>
    </div>
</div>
@endsection