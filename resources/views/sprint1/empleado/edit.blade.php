@extends('layouts.menu')

@section('title', 'Editar | MRP')

@section('body-class', 'landing-page')

@section('styles')
    <style>

        .tarjeta {
            justify-content: center !important;
        }

    </style>
@endsection

@section('contenido-central')
<div class="main ">
    <div class="container">

        <div class="tarjeta">
            <div class="card card-crud card-nav-tabs text-center">
                {!! Form::model($empleado, ['route' => ['empleados.update', $empleado->id], 'method' => 'PUT']) !!}
            
                    @include('sprint1.empleado.partials.form')

                {!! Form::close() !!}
            </div>
        </div>

    </div>
        
</div>
@endsection