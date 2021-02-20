@extends('layouts.menu')

@section('title', 'Crear | MRP')

@section('body-class', 'landing-page')

@section('styles')
    <style>

        .tarjeta {
            width: 100%;
        }
        #imagen{
            display: none;
        }

        .newbtn{
            cursor: pointer;
        }
        #blah{
            max-width:100px;
            height:100px;
            margin-top:20px;
        }
    </style>
@endsection


@section('contenido-central')
<div class="main ">
    <div class="container">

        <div class="tarjeta">
            <div class="card card-crud text-center" style="width: 100%">
                {!! Form::open(['route' => ['articulos.store'], 'enctype' => 'multipart/form-data']) !!}

                @include('inventario.articulo.partials.form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
        
</div>
@endsection