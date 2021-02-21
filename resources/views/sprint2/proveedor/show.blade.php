@extends('layouts.menu')

@section('title', 'Proveedor ' . $proveedor->nombre .' | MRP')

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
            Proveedor
        </div>
        <div class="card">
            <span class="detalle">
                <h6 class="item col-md-4">Código:</h6>
                <p class="item col-md-8">{{ $proveedor->codigo }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Foto:</h6>
                <p class="item col-md-8">{{ $proveedor->imagen }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Nombre:</h6>
                <p class="item col-md-8">{{ $proveedor->nombre }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Dirección:</h6>
                <p class="item col-md-8">{{ $proveedor->direccion }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Correo Electrónico:</h6>
                <p class="item col-md-8">{{ $proveedor->correo }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Teléfono :</h6>
                <p class="item col-md-8">{{ $proveedor->telefono }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Estado:</h6>
                <p class="item col-md-8">{{ $estado->nombre }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Provincia:</h6>
                <p class="item col-md-8">{{ $provincia->nombre }}</p>
            </span>
            <span class="detalle">
                <h6 class="item col-md-4">Municipio:</h6>
                <p class="item col-md-8">{{ $municipio->nombre }}</p>
            </span>
        </div>
        <div class="card">
            <img src="{{'/img/faces/marc.jpg'}}" class="card-img-top" alt="imagen de proveedor">
            <div class="card-body">
                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal">
                    Contactos
                </button>
            </div>
            <div class="card-footer">
                <small class="text-muted">
                    @if($proveedor->estado == 1)
                        <span class="badge badge-pill badge-success">Activo </span> 
                        <span>desde {{$proveedor->created_at}}</span>
                    @else
                        <span class="badge badge-pill badge-warning">Inactivo </span> 
                        <span>desde {{$proveedor->updated_at}}</span>
                    @endif     
                </small>    
            </div>
        </div>
        <div class=" text-muted">
            Código: {{ $proveedor->id }} 
        </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Contactos de {{$proveedor->nombre}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <hr>
            @foreach($contactos as $contacto)
            <h5>{{$contacto->nombre}} 
                <a href="{{ route('contactos.show', $contacto->id) }}" class="badge badge-warning">
                    Ver más
                </a>
            </h5>
            <p>{{$contacto->cargo}}.
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="right" title="{{ $contacto->nota }}.">
                    Nota
                </button>
            </p>
            
            <hr>
            @endforeach
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
        <a href="{{ route('contactos.create') }}" class="btn btn-success btn-sm" 
            role="button" aria-disabled="true">
            Crear nuevo contacto
        </a>
      </div>
    </div>
  </div>
</div>

@endsection