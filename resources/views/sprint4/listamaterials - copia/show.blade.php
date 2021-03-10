@extends('layouts.menu')

@section('title', 'listamateriall '. $listamaterial->name .' | MRP')

@section('body-class', 'landing-page')

@section('styles')
    <style>
    </style>
@endsection

@section('contenido-central')
<div class="tarjeta">
    <div class="card col-md-7">
        <div class="card-title btn btn-primary">
        Listamaterials
        </div>
        <div class="card-body">
        
         
            <span class="detalle">
                <h6 class="item col-md-4">Componente:</h6>
                <p class="item col-md-8">{{ $listamaterial->componente }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Cantidad: </h6>
                <p class="item col-md-8">{{ $listamaterial->cantidad }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Unidadmedida:</h6>
                <p class="item col-md-8">{{ $listamaterial->unidadmedida }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">costounitario:</h6>
                <p class="item col-md-8">{{ $listamaterial->costounitario }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Subtotal:</h6>
                <p class="item col-md-8">{{ $listamaterial->subtotal }}</p>
            </span>
         
        
         
          
        </div>
        <span class=" text-muted">
            Id: {{ $listamaterial->id }} 
        </span>
    </div>
</div>
@endsection