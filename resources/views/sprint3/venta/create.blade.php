@extends('layouts.menu')

@section('title', 'Crear Nueva Venta | MRP')

@section('body-class', 'landing-page')

@section('styles')
    <style>

        .tarjeta {
            justify-content: center !important;
        }
        .card-crud {
            width:100% !important;
        }
        .bmd-label-static {
            padding-left: 1rem;
        }




    </style>
@endsection

@section('contenido-central')
<div class="main ">
    <div class="container">

        <div class="tarjeta">
            <div class="card card-crud card-nav-tabs text-center">
                {!! Form::open(['route' => ['ventas.store']]) !!}
                <input type="hidden" name="numero" id="numero" value="{{$nroventa}}" >               

                @include('sprint3.venta.partials.form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
        
</div>
@endsection