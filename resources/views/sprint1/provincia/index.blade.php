@extends('layouts.menu')

@section('title', 'Provincia | MRP')

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
    	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    		<h3>Lista de Provincias <a href="provincia/create"><button class="btn btn-success">Nuevo</button></a></h3>
    		@include('sprint1.provincia.search')
    	</div>
    </div>

    <div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    		<div class="table-responsive">
    			<table class="table table-striped table-bordered table-condensed table-hover">
    				<thead>
    					<th>#</th>
    					<th>Codigo</th>
    					<th>Nombre</th>
                        <th>Estado</th>
    					<th>Opciones</th>
    				</thead>
    				@foreach ($provincias as $pro)
                    <tr>
                        <td></td>
                        <td>{{ $pro->codigo }}</td>
                        <td>{{ $pro->nombre }}</td>
                        <td>{{ $pro->estadoss }}</td>
                        <td>
                            <a href="{{ URL::action('ProvinciaController@edit',$pro->id) }}"><button class="btn btn-info">Editar</button></a>
                            <a href="" data-target="#modal-delete-{{ $pro->id }}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('sprint1.provincia.modal')
                    @endforeach
    			</table>
    		</div>
    		{{ $provincias->render() }}
    	</div>
    </div>
@endsection