@extends('layouts.menu')

@section('title', 'Editar | MRP')

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
                {!! Form::model($pedido, ['route' => ['pedidos.update', $pedido->id], 'method' => 'PUT']) !!}
            
                    @include('sprint3.pedido.partials.edit')

                {!! Form::close() !!}
            </div>
        </div>

    </div>
        
</div>
@endsection