@extends('layouts.app')

@section('body-class', 'product-page')

@section('styles')
    <style>
        .page-header{
            min-height: 15vh !important;
            background-position: center !important;
        }


        .main {
            margin-top: 0px !important;
            padding-top: 0vh !important;
        }

        .features {
            text-align: center !important;
            padding-top: 0px !important;
        }

        .title {
            margin-top: 0px !important;
        }

        .icon-primary:hover {
            color: rgba(251,75,2,1);
            background: transparent;
            box-shadow:none;
        }
        .icon-primary:before,.icon-primary:after{
            content:'';
            position:absolute;
            top:0;
            right:0;
            height:2px;
            width:0;
            background: rgba(251,75,2,1);
            box-shadow:
            -1px -1px 5px 0px #fff,
            7px 7px 20px 0px #0003,
            4px 4px 5px 0px #0002;
            transition:400ms ease all;
        }
        .icon-primary:after{
            right:inherit;
            top:inherit;
            left:0;
            bottom:0;
        }
        .icon-primary:hover:before,.icon-primary:hover:after{
            width:100%;
            transition:800ms ease all;
        }

        .icon-success:hover {
            color: #f0094a;
            background: transparent;
            box-shadow:none;
        }
        .icon-success:before,.icon-success:after{
            content:'';
            position:absolute;
            top:0;
            right:0;
            height:2px;
            width:0;
            background: #f0094a;
            box-shadow:
            -1px -1px 5px 0px #fff,
            7px 7px 20px 0px #0003,
            4px 4px 5px 0px #0002;
            transition:400ms ease all;
        }
        .icon-success:after{
            right:inherit;
            top:inherit;
            left:0;
            bottom:0;
        }
        .icon-success:hover:before,.icon-success:hover:after{
            width:100%;
            transition:800ms ease all;
        }

        .icon-danger:hover {
            color: #c797eb;
            background: transparent;
            box-shadow:none;
        }
        .icon-danger:before,.icon-danger:after{
            content:'';
            position:absolute;
            top:0;
            right:0;
            height:2px;
            width:0;
            background: #c797eb;
            box-shadow:
            -1px -1px 5px 0px #fff,
            7px 7px 20px 0px #0003,
            4px 4px 5px 0px #0002;
            transition:400ms ease all;
        }
        .icon-danger:after{
            right:inherit;
            top:inherit;
            left:0;
            bottom:0;
        }
        .icon-danger:hover:before,.icon-danger:hover:after{
            width:100%;
            transition:800ms ease all;
        }

        .icon-warning:hover {
            color: rgb(251,33,117);
            background: transparent;
            box-shadow:none;
        }
        .icon-warning:before,.icon-warning:after{
            content:'';
            position:absolute;
            top:0;
            right:0;
            height:2px;
            width:0;
            background: rgb(251,33,117);
            box-shadow:
            -1px -1px 5px 0px #fff,
            7px 7px 20px 0px #0003,
            4px 4px 5px 0px #0002;
            transition:400ms ease all;
        }
        .icon-warning:after{
            right:inherit;
            top:inherit;
            left:0;
            bottom:0;
        }
        .icon-warning:hover:before,.icon-warning:hover:after{
            width:100%;
            transition:800ms ease all;
        }

        .icon-info:hover {
            color: #c79981;
            background: transparent;
            box-shadow:none;
        }
        .icon-info:before,.icon-info:after{
            content:'';
            position:absolute;
            top:0;
            right:0;
            height:2px;
            width:0;
            background: #c79981;
            box-shadow:
            -1px -1px 5px 0px #fff,
            7px 7px 20px 0px #0003,
            4px 4px 5px 0px #0002;
            transition:400ms ease all;
        }
        .icon-info:after{
            right:inherit;
            top:inherit;
            left:0;
            bottom:0;
        }
        .icon-info:hover:before,.icon-info:hover:after{
            width:100%;
            transition:800ms ease all;
        }

        .icon-rose:hover {
            color: #89d8d3;
            background: transparent;
            box-shadow:none;
        }
        .icon-rose:before,.icon-rose:after{
            content:'';
            position:absolute;
            top:0;
            right:0;
            height:2px;
            width:0;
            background: #89d8d3;
            box-shadow:
            -1px -1px 5px 0px #fff,
            7px 7px 20px 0px #0003,
            4px 4px 5px 0px #0002;
            transition:400ms ease all;
        }
        .icon-rose:after{
            right:inherit;
            top:inherit;
            left:0;
            bottom:0;
        }
        .icon-rose:hover:before,.icon-rose:hover:after{
            width:100%;
            transition:800ms ease all;
        }

        .info {
            padding-top: 50px; 
        }
        
    </style>
@endsection

@section('content')
<div class="page-header header-filter" style="background-image: url('{{ asset('img/fondo_header.png') }}');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Panel de Control</h2>

            @if (session('notification'))
                <div class="alert alert-success">
                    {{ session('notification') }}
                </div>
            @endif
        
            <hr>
            <div class="features">
                <div class="row">
                    
                    
                    <div class="col-md-4">
                        <div class="info">
                            <a class="" href="{{ route('sprint1') }}">
                                <div class="icon icon-primary">
                                    <i class="material-icons">admin_panel_settings</i>
                                </div>
                                <h4 class="info-title">Gestión Administrativa</h4>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="info">
                            <a href="{{ route('nomina') }}">
                                <div class="icon icon-danger">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <h4 class="info-title">Nómina</h4>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="info">
                            <a class="" href="#">
                                <div class="icon icon-success">
                                    <i class="material-icons">attach_money</i>
                                </div>
                                <h4 class="info-title">Contabilidad</h4>
                            </a>
                        </div>
                    </div>                    
                    
                    <div class="col-md-4">
                        <div class="info">
                            <a href="{{ route('inventario') }}">
                                <div class="icon icon-warning">
                                    <i class="material-icons">assignment_late</i>
                                </div>
                                <h4 class="info-title">Inventarios</h4>
                                <p>Saldo inicial de inventarios</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="info">
                            <a href="">
                                <div class="icon icon-info">
                                    <i class="material-icons">shopping_bag</i>
                                </div>
                                <h4 class="info-title">Compras</h4>
                                <p>Envío de órdenes de compra</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="info">
                            <a href="{{ route('settings') }}">
                                <div class="icon icon-rose">
                                    <i class="material-icons">settings_applications</i>
                                </div>
                                <h4 class="info-title">Herramientas</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>    
        </div>

    </div>
</div>

@include('includes.footer')
@endsection
