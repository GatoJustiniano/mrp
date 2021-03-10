@extends('layouts.menu')

@section('title', 'Crear')

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
                {!! Form::open(['route' => ['listamaterials.store']]) !!}

                @include('sprint4.listamaterials.partials.form')

                {!! Form::close() !!}
            </div>
        </div>

    </div>
        
</div>

@endsection