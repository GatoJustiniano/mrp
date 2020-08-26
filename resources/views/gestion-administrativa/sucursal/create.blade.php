@extends('layouts.menu')

@section('title', 'Gestionar Sucursal')

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

@section('content')
<div class="main ">
    <div class="container">

        <div class="section">
            <br>
            <br>

            <div class="tarjeta">
            <div class="card card-nav-tabs text-center">
                {!! Form::open(['route' => ['products.store']]) !!}

                @include('gestion-administrativa.sucursal.partials.form')

                {!! Form::close() !!}
            </div>
            </div>

        </div>

    </div>
        
</div>

@include('includes.footer')
@endsection