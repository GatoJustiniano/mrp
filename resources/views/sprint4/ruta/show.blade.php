@extends('layouts.menu')

@section('title', 'Ruta ' . $ruta->codigo .' | MRP')

@section('body-class', 'landing-page')

@section('styles')
    <style>

        html body.landing-page div.wrapper div#main div#container div.card-group div.card div.card-footer small.text-muted {
            padding-top: 1rem !important;
        }

        .derecha {
            text-align:right !important;

        }
        .izquierda {
            text-align:left !important;
            padding-left: 4rem !important;
        }
    </style>
@endsection

@section('contenido-central')
<div class="card">


<div class="card-group">
        <div class="card-title btn btn-info">
            Ruta
        </div>
        <div class="card">
            <span class="detalle">
                <h6 class="item col-md">Codigo Ruta:</h6>
                <p class="item col-md">{{ $ruta->codigo }}</p>
            </span>
            
            <span class="detalle">
                <h6 class="item col-md">Nombree:</h6>
                <p class="item col-md">{{ $ruta->nombre }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md">Producto:</h6>
                <p class="item col-md">{{ $articulo->nombre }}</p>
            </span>

        </div>
        <div class="card">

            <span class="detalle">
                <h6 class="item col-md">Costo Total:</h6>
                <p class="item col-md">{{ $ruta->costo_total }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md">Duracion Total:</h6>
                <p class="item col-md">{{  $ruta->duracion_total }}</p>
            </span>



            <div class="card-footer">
                <small class="text-muted">
                    @if($ruta->estado == 1)
                        <span class="badge badge-pill badge-success">Activo </span> 
                        <span>desde {{$ruta->created_at}}</span>
                    @else
                        <span class="badge badge-pill badge-warning">Inactivo </span> 
                        <span>desde {{$ruta->updated_at}}</span>
                    @endif     
                </small>    
            </div>
        </div>

</div>
<div class="card" style="margin-top: 0px;">
    <div class="card-title btn btn-info" style="margin-top: 0px;">
        Detalle
    </div>
    <table class="table table-hover table-sm ">
        <caption>Lista de operaciones</caption>
        <thead class="thead-light derecha">
            <tr>
                <th class="izquierda">Operacion </th>
                <th>Centro Produccion</th>
                <th>Duracion.</th>
                <th>Costo.</th>

            </tr>
        </thead>
        <tbody class='derecha'>
            @foreach($operaciones as $operacion)
            <tr>
                <td class="izquierda">{{ $operacion->operacion }}</td>
                <td>{{ $operacion->cproduccion }} </td>

                <td>{{ $operacion->duracion}}</td>
                <td>{{ $operacion->costoduracion}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>
@endsection