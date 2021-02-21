@extends('layouts.menu')

@section('title', 'Sprint 2 | MRP')

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
          <a class="" href="{{route('proveedores.index')}}">
              <div class="icon icon-primary">
                  <i class="material-icons">apartment</i>
              </div>
              <h4 class="info-title">Proveedores </h4>
          </a>
      </div>
  </div>

  <div class="col-md-3">
      <div class="info">
          <a class="" href="{{route('contactos.index')}}">
              <div class="icon icon-success">
                  <i class="material-icons">local_library</i>
              </div>
              <h4 class="info-title">Contacto </h4>
          </a>
      </div>
  </div>

  <div class="col-md-3">
      <div class="info">
          <a href="#">
              <div class="icon icon-danger">
                  <i class="material-icons">satellite</i>
              </div>
              <h4 class="info-title">Artículo</h4>
          </a>
      </div>
  </div>
  
  <div class="col-md-3">
      <div class="info">
          <a href="#">
              <div class="icon icon-warning">
                  <i class="material-icons">assignment_late</i>
              </div>
              <h4 class="info-title">Categoría</h4>
          </a>
      </div>
  </div>

  <div class="col-md-3">
      <div class="info">
          <a href="#">
              <div class="icon icon-info">
                  <i class="material-icons">person</i>
              </div>
              <h4 class="info-title">Sub categoría</h4>
          </a>
      </div>
  </div>
</div>
@endsection