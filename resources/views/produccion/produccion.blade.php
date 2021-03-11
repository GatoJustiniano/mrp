@extends('layouts.menu')

@section('title', 'Producción | MRP')

@section('styles')
    <style>
      .row {
        text-align: center !important;
        padding-left: 20px;
        padding-right: 20px;
      }

      .info {
        padding-top: 40px;
      }
    </style>
@endsection

@section('contenido-central')
<div class="row">
  <div class="col-md-3">
      <div class="info">
          <a class="" href="{{ route('cproducciones.index') }}">
              <div class="icon icon-primary">
                  <i class="material-icons">fact_check</i>
              </div>
              <h4 class="info-title">Centro de Producción</h4>
          </a>
      </div>
  </div>

  <div class="col-md-3">
      <div class="info">
          <a class="" href="{{ route('operaciones.index') }}">
              <div class="icon icon-success">
                  <i class="material-icons">list_alt</i>
              </div>
              <h4 class="info-title">Operación </h4>
          </a>
      </div>
  </div>

  <div class="col-md-3">
      <div class="info">
          <a href="{{ route('rutas.index') }}">
              <div class="icon icon-danger">
                  <i class="material-icons">manage_search</i>
              </div>
              <h4 class="info-title">Ruta </h4>
          </a>
      </div>
  </div>

  <div class="col-md-3">
      <div class="info">
          <a href="{{ route('listamaterials.index') }}">
              <div class="icon icon-info">
                  <i class="material-icons">format_list_numbered</i>
              </div>
              <h4 class="info-title">Lista de Materiales</h4>
          </a>
      </div>
  </div>

  <div class="col-md-3">
      <div class="info">
          <a href="#">
              <div class="icon icon-warning">
                  <i class="material-icons">assessment</i>
              </div>
              <h4 class="info-title">Planificación</h4>
          </a>
      </div>
  </div>

  <div class="col-md-3">
      <div class="info">
          <a href="#">
              <div class="icon icon-info">
                  <i class="material-icons">fact_check</i>
              </div>
              <h4 class="info-title">Planificación diaria</h4>
          </a>
      </div>
  </div>
  

</div>
@endsection