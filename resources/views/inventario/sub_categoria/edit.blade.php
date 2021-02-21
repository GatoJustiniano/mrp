@extends('layouts.menu')

@section('title', 'Editar | MRP')

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
                {!! Form::model($sub_categoria, ['route' => ['sub_categorias.update', $sub_categoria->id], 'method' => 'PUT']) !!}
            
                    @include('inventario/sub_categoria.partials.form')

                {!! Form::close() !!}
            </div>
        </div>

    </div>
        
</div>
@endsection