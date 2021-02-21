@extends('layouts.menu')

@section('title', 'Editar')

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
                {!! Form::model($unidad_medida, ['route' => ['unidad_medidas.update', $unidad_medida->id], 'method' => 'PUT']) !!}

                @include('inventario/unidad_medidas.partials.form')

                {!! Form::close() !!}
            </div>
        </div>

    </div>        
</div>

@endsection