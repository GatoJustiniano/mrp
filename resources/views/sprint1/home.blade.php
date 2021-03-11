@extends('layouts.menu')

@section('title', 'Sprint 1 | MRP')

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
          <a class="" href="{{route('departamentos.index')}}">
              <div class="icon icon-primary">
                  <i class="material-icons">apartment</i>
              </div>
              <h4 class="info-title">Departamento</h4>
          </a>
      </div>
  </div>

  <div class="col-md-3">
      <div class="info">
          <a class="" href="{{route('areas.index')}}">
              <div class="icon icon-success">
                  <i class="material-icons">local_library</i>
              </div>
              <h4 class="info-title">Área </h4>
          </a>
      </div>
  </div>

  <div class="col-md-3">
      <div class="info">
          <a href="{{ route('sucursals.index') }}">
              <div class="icon icon-danger">
                  <i class="material-icons">satellite</i>
              </div>
              <h4 class="info-title">Sucursal</h4>
          </a>
      </div>
  </div>
  
  <div class="col-md-3">
      <div class="info">
          <a href="{{route('cargos.index') }}">
              <div class="icon icon-warning">
                  <i class="material-icons">assignment_late</i>
              </div>
              <h4 class="info-title">Cargo</h4>
          </a>
      </div>
  </div>

  <div class="col-md-3">
      <div class="info">
          <a href="{{ route('estado.index') }}">
              <div class="icon icon-info">
                  <i class="material-icons">foundation</i>
              </div>
              <h4 class="info-title">Estado</h4>
          </a>
      </div>
  </div>
  <div class="col-md-3">
      <div class="info">
          <a href="{{ route('provincia.index') }}">
              <div class="icon icon-warning">
                  <i class="material-icons">house</i>
              </div>
              <h4 class="info-title">Provincias</h4>
          </a>
      </div>
  </div>
  <div class="col-md-3">
      <div class="info">
          <a href="{{ route('municipio.index') }}">
              <div class="icon icon-secondary">
                  <i class="material-icons">house_siding</i>
              </div>
              <h4 class="info-title">Munipios</h4>
          </a>
      </div>
  </div>
</div>
@endsection