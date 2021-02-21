@extends('layouts.settings')

@section('title', 'Editar rol')

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
            width: auto;

            margin-top: 0px !important;
        }
        ul {
            text-align: left !important;
            padding-left:4% !important;
        }
    </style>
@endsection

@section('contenido-central')
<div class="main ">
    <div class="container">

        <div class="section">

            <div class="tarjeta">
            <div class="card card-nav-tabs text-center">
            {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'PUT']) !!}

                @include('roles.partials.form')

                {!! Form::close() !!}
            </div>
            </div>

        </div>

    </div>
        
</div>

@endsection
