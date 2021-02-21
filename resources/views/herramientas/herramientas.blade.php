@extends('layouts.menu')

@section('title', 'Herramientas | MRP')

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
          <a class="" href="{{ route('roles.index') }}">
              <div class="icon icon-primary">
                  <i class="material-icons">fact_check</i>
              </div>
              <h4 class="info-title">Roles y permisos</h4>
          </a>
      </div>
  </div>

  <div class="col-md-3">
      <div class="info">
          <a class="" href="{{ route('bitacora') }}">
              <div class="icon icon-success">
                  <i class="material-icons">list_alt</i>
              </div>
              <h4 class="info-title">Bitácora </h4>
          </a>
      </div>
  </div>

  <div class="col-md-3">
      <div class="info">
          <a href="#">
              <div class="icon icon-danger">
                  <i class="material-icons">manage_search</i>
              </div>
              <h4 class="info-title">Reportes </h4>
          </a>
      </div>
  </div>

  <div class="col-md-3">
      <div class="info">
          <a href="#">
              <div class="icon icon-info">
                  <i class="material-icons">backup</i>
              </div>
              <h4 class="info-title">Backup</h4>
          </a>
      </div>
  </div>
  

</div>
@endsection