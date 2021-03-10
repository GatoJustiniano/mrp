@extends('layouts.app')

@section('title', 'MRP')

@section('body-class', 'landing-page')

@section('estilo')
  <style>
    .navbar.navbar-transparent {        
      background: radial-gradient(circle, rgba(247,150,192,1) 0%, rgba(118,174,241,1) 100%);
    }
    #main {
      padding-top: 8%;
      display:    flex;
      flex-flow:  row;
    }
    #main > #container {
      margin: 4px;
      padding: 5px;
      border: 1px solid #cccc33;
      border-radius: 7pt;
      background: #f9f9f9;
      -webkit-flex: 3 1 60%;
              flex: 3 1 60%;
      -webkit-order: 2;
              order: 2;
    }   
    #main > nav {
      margin: 4px;
      padding: 5px;
      border: 1px solid #8888bb;
      border-radius: 7pt;
      background: #e5e5e5;
      -webkit-flex: 1 6 20%;
              flex: 1 6 20%;
      -webkit-order: 1;
              order: 1;
    }   
    #main > aside {
      margin: 4px;
      padding: 5px;
      border: 1px solid #8888bb;
      border-radius: 7pt;
      background: #e5e5e5;
      -webkit-flex: 1 6 20%;
              flex: 1 6 20%;
      -webkit-order: 3;
              order: 3;
    }
    .nav-pills {
        padding-left: 30px;
        color: #000;
    }
    /* Al reducir la pantalla, que los item estén en Columna */
    @media all and (max-width: 640px) {        
      #main {
        -webkit-flex-flow: column;
              flex-flow: column;

        margin-top: 16%;
      }

      #main > #container, #main > nav, #main > aside {
        /* Todos los item se ponen en cero 0 */
        -webkit-order: 0;
              order: 0;
      }    
      #container {
        display: initial;
      }
    
    }

    /* VISTA SHOW estilo perteneciente al contenido central que se repiten en casi todas las vistas show */
    .card-body {
      display: flex;
      flex-direction: column !important;
      padding: .7375rem 1.075rem !important;
      border: 0.2px solid #ca9999;
    }
    .detalle {
      margin: 4px;
      padding: 0px;
      border: 1px solid #cccc33;
      border-radius: 7pt;
      background: #f9f9f9;
      display: inline-flex;
      align-items: baseline;
      justify-content: space-between;      
    }
    .item {
      margin:           0px;
      padding-top:      0px;
      padding-bottom:   0px; 
      padding-right:    4px;
      padding-left:     4px;
      text-align: left;
    }
    /* VISTA EDIT & CREATE estilos que pertencen */
    .tarjeta {
      display:flex;
    }
    .card-crud {
      padding-top: 5px;
      padding-left: 8px;
      padding-right: 8px;
      padding-bottom: 5px;
      width: 50%;
    }

  </style>
@endsection


@section('content')
    <div id='main'>
      <div id='container'>
       @yield('contenido-central')
     </div>

      <nav id="navbar">
        <header class="">Sistema MRP</header>
        <ul class="nav flex-column">
          <li>
            <a class="nav-link" href="{{ route('sprint1') }}">Sprint 1</a>
            <ul class="nav flex-column">
                <li><a class="nav-pills" href="{{ route('departamentos.index') }}">Departamento </a></li>
                <li><a class="nav-pills" href="{{ route('areas.index') }}">Área </a></li>
                <li><a class="nav-pills" href="{{ route('sucursals.index') }}">Sucursal </a></li>
                <li><a class="nav-pills" href="{{ route('almacens.index') }}">Almacén </a></li>
                <li><a class="nav-pills" href="{{ route('municipio.index') }}">Municipio </a></li>
                <li><a class="nav-pills" href="{{ route('provincia.index') }}">Provincia </a></li>
                <li><a class="nav-pills" href="{{ route('estado.index') }}">Estado </a></li>
                <li><a class="nav-pills" href="{{ route('cargos.index') }}">Cargo </a></li>
                <li><a class="nav-pills" href="{{ route('empleados.index') }}">Empleado </a></li>
            </ul>
          </li> 
            <li>
                <a class="nav-link" href="{{ route('sprint2') }}">Sprint 2</a>
                <ul class="nav flex-column">
                <li><a class="nav-pills" href="{{ route('categorias.index') }}">Categoría </a></li>
                <li><a class="nav-pills" href="{{ route('sub_categorias.index') }}">Sub Categoría </a></li>
                <li><a class="nav-pills" href="{{ route('unidad_medidas.index') }}">Unidad de Medida </a></li>
                <li><a class="nav-pills" href="{{ route('articulos.index') }}">Artículo </a></li>
                <li><a class="nav-pills" href="{{ route('contactos.index') }}">Contacto </a></li>
                <li><a class="nav-pills" href="{{ route('proveedores.index') }}">Proveedor </a></li>
                </ul>
            </li>
            <li>
              <a class="nav-link" href="{{ route('inventario') }}">Sprint 3</a>
                <ul class="nav flex-column">
                    <li><a class="nav-pills" href="{{ route('clientes.index') }}">Cliente </a></li>
                    <li><a class="nav-pills" href="{{ route('pedidos.index') }}">Pedido </a></li>
                    <li><a class="nav-pills" href="{{ route('ventas.index') }}">Venta </a></li>
                    <li><a class="nav-pills" href="{{ route('compras.index') }}">Compra </a></li>
                    <li><a class="nav-pills" href="#">View Mov de inventario </a></li>
                    <li><a class="nav-pills" href="#">View Ingresos </a></li>
                    <li><a class="nav-pills" href="#">View Salidas </a></li>
                    <li><a class="nav-pills" href="#">View Inventario </a></li>
                </ul>
            </li>
            <li>
              <a class="nav-link" href="{{ route('sprint4') }}">Sprint 4</a>
                <ul class="nav flex-column">
                <li><a class="nav-pills" href="{{ route('cproducciones.index') }}">Centro de Produccion </a></li>
                <li><a class="nav-pills" href="{{ route('operaciones.index') }}">Operacione </a></li>
             
                </ul>
            </li>
            <li>
              <a class="nav-link" href="#Producción">Producción</a>
              <ul class="nav flex-column">
                <li><a class="nav-pills" href="#">BoM </a></li>
                <li><a class="nav-pills" href="#">MPS </a></li>
                <li><a class="nav-pills" href="#">MRP </a></li>
                </ul>
            </li> 
            <li>
              <a class="nav-link" href="{{ route('settings') }}">Herramientas</a>
            </li>
        </ul>
      </nav>

      <aside id="aside">Publicidad</aside>
   </div>

  
@endsection