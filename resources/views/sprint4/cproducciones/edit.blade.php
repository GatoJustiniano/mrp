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
                {!! Form::model($cproduccione, ['route' => ['cproducciones.update', $cproduccione->id], 'method' => 'PUT']) !!}

                @include('sprint4.cproducciones.partials.form')

                {!! Form::close() !!}
            </div>
        </div>

    </div>        
</div>

@endsection