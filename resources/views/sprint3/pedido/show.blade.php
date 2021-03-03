@extends('layouts.menu')

@section('title', 'Pedido ' . $pedido->numero .' | MRP')

@section('body-class', 'landing-page')

@section('styles')
    <style>

        html body.landing-page div.wrapper div#main div#container div.card-group div.card div.card-footer small.text-muted {
            padding-top: 1rem !important;
        }
        
    </style>
@endsection

@section('contenido-central')
<div class="card-group">
        <div class="card-title btn btn-info">
            Pedido
        </div>
        <div class="card">
            <span class="detalle">
                <h6 class="item col-md-4">Número:</h6>
                <p class="item col-md-8">{{ $pedido->numero }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Fecha de Entrega:</h6>
                <p class="item col-md-8">{{ $pedido->fecha_entrega }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Cliente solicitante:</h6>
                <p class="item col-md-8">{{ $cliente->nombre }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Promotor encargado:</h6>
                <p class="item col-md-8">{{ $empleado->nombre }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Monto Total:</h6>
                <p class="item col-md-8">{{ $pedido->monto_total }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Observaciones:</h6>
                <p class="item col-md-8">{{ $pedido->observaciones }}</p>
            </span>
        </div>
        <div class="card">
            <div class="card-footer">
                <small class="text-muted">
                    @if($pedido->estado == 1)
                        <span class="badge badge-pill badge-success">Activo </span> 
                        <span>desde {{$pedido->created_at}}</span>
                    @else
                        <span class="badge badge-pill badge-warning">Inactivo </span> 
                        <span>desde {{$pedido->updated_at}}</span>
                    @endif     
                </small>    
            </div>
        </div>
        <div class=" text-muted">
            Código: {{ $pedido->id }} 
        </div>
</div>

@endsection