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
                {!! Form::model($operacione, ['route' => ['operaciones.update', $operacione->id], 'method' => 'PUT']) !!}

                @include('sprint4.operaciones.partials.form')

                {!! Form::close() !!}
            </div>
        </div>

    </div>        
</div>

@endsection