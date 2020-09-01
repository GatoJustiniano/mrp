@extends('layouts.menu')

@section('title', 'Editar Cargo')

@section('body-class', 'landing-page')

@section('styles')
    <style>

        .tarjeta {
            display:flex;
            justify-content: center !important;
        }
        .card {
            padding-top: 5px;
            padding-left: 8px;
            padding-right: 8px;
            padding-bottom: 5px;
            width: 50%;
        }
    </style>
@endsection

@section('contenido-central')
<div class="main ">
    <div class="container">

        <div class="tarjeta">
            <div class="card card-nav-tabs text-center">
            {!! Form::model($cargo, ['route' => ['cargos.update', $cargo->id_cargo], 'method' => 'PUT']) !!}
        
                @include('gestion-administrativa.cargo.partials.form')

            {!! Form::close() !!}
            </div>
        </div>

    </div>
        
</div>
@endsection