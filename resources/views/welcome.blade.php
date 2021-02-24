@extends('layouts.app')

@section('title', 'Bienvenido a Sistema ' . config('app.name'))

@section('body-class', 'landing-page')

@section('styles')
    <style>
        h1.title {
            font-size: 3rem;
        }
        div.section.section-contacts {
            background-color: #efefef;
            border: 1px solid transparent;
            border-radius: 18%;
        }
        ul.pagination {
            justify-content: center;
        }
    </style>
@endsection

@section('content')
<div class="page-header header-filter" style="background-image: url('{{ asset('/img/fondo_welcome.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="title">Bienvenido a Sistema {{ config('app.name') }}.</h1>
                <h4>Permite realizar el control y la coordinación de los materiales.</h4>
                <br />
                <a href="#ingresar" class="btn btn-danger btn-raised btn-lg">
                    <i class="fa fa-address-card"></i> Deseas probar nuestro sistema?
                </a>
            </div>
        </div>
    </div>
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center ">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="title">¿Por qué confiar en Sistema {{ config('app.name') }}?</h2>
                    <h5 class="description">Se estudiará el plan de requerimiento de materiales (MRP), determinando la cantidad de cada material que se requerirá para la fabricación de los productos, con el fin de generar las órdenes de compra de los materiales faltantes para que estén disponibles en el momento necesario, evitar retrasos en el proceso de producción, y garantizar las existencias de producto, en el momento justo que el cliente los demande.</h5>
                </div>
            </div>

            <div class="features">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-primary">
                                <i class="material-icons">chat</i>
                            </div>
                            <h4 class="info-title">Atendemos tus dudas</h4>
                            <p>Ante cualquier consulta que tengas, hablanos vía chat o correo electrónico. Estamos atentos a tus preguntas.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">verified_user</i>
                            </div>
                            <h4 class="info-title">Pago seguro</h4>
                            <p>Todo pedido que realices será confirmado a través de una llamada y mensaje de confirmación vía mail.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="material-icons">fingerprint</i>
                            </div>
                            <h4 class="info-title">Información privada</h4>
                            <p>Los pedidos que realices sólo los conocerás tú a través de tu panel de usuario. Nadie más tiene acceso a esta información.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="section section-contacts" id="ingresar">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="text-center title">¿Quieres probar nuestro sistema MRP?</h2>
                    <h4 class="text-center description">Regístrate ingresando tus datos básicos, y podrás consultar una demo para observar las funcionalidades de un sistema MRP.</h4>
                    <form class="contact-form" method="get" action="{{ url('/register') }}">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nombre</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Tu correo electrónico</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleMessage" class="bmd-label-floating">Tu mensaje</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-4 ml-auto mr-auto text-center">
                        <button class="btn btn-primary btn-raised">
                            Iniciar registro
                        </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
    </div>
    
</div>

@include('includes.footer')
@endsection
