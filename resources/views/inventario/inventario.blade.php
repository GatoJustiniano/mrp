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
          <a class="" href="{{ route('clientes.index') }}">
              <div class="icon icon-success">
                  <i class="material-icons">local_library</i>
              </div>
              <h4 class="info-title">Clientes </h4>
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
            <a href="{{ route('pedidos.index') }}">
                <div class="icon icon-danger">
                    <i class="material-icons">assignment</i>
                </div>
                <h4 class="info-title">Pedido </h4>
            </a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info">
            <a href="{{ route('ventas.index') }}">
                <div class="icon icon-secondary">
                    <i class="material-icons">assignment</i>
                </div>
                <h4 class="info-title">Venta</h4>
            </a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info">
            <a href="{{ route('compras.index') }}">
                <div class="icon icon-success">
                    <i class="material-icons">assignment</i>
                </div>
                <h4 class="info-title">Compra</h4>
            </a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info">
            <a href="{{ route('salidas.index') }}">
                <div class="icon icon-warning">
                    <i class="material-icons">assignment</i>
                </div>
                <h4 class="info-title">View Salidas</h4>
            </a>
        </div>
    </div>
  

</div>
@endsection