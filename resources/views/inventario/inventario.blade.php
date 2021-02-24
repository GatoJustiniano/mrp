@extends('layouts.menu')

@section('title', 'Gestión Inventario | MRP')

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
          <a class="" href="{{ route('proveedores.index') }}">
              <div class="icon icon-primary">
                  <i class="material-icons">apartment</i>
              </div>
              <h4 class="info-title">Proveedor</h4>
          </a>
      </div>
  </div>

  <div class="col-md-3">
      <div class="info">
          <a class="" href="#">
              <div class="icon icon-success">
                  <i class="material-icons">local_library</i>
              </div>
              <h4 class="info-title">Materia Prima </h4>
          </a>
      </div>
  </div>

  <div class="col-md-3">
      <div class="info">
          <a href="{{ route('articulos.index') }}">
              <div class="icon icon-danger">
                  <i class="material-icons">satellite</i>
              </div>
              <h4 class="info-title">Artículo</h4>
          </a>
      </div>
  </div>

  <div class="col-md-3">
      <div class="info">
          <a href="{{ route('almacens.index') }}">
              <div class="icon icon-info">
                  <i class="material-icons">account_balance</i>
              </div>
              <h4 class="info-title">Almacén</h4>
          </a>
      </div>
  </div>

  <div class="col-md-3">
      <div class="info">
          <a href="#">
              <div class="icon icon-warning">
                  <i class="material-icons">assignment</i>
              </div>
              <h4 class="info-title">Mov Inventario</h4>
          </a>
      </div>
  </div>
  

</div>
@endsection