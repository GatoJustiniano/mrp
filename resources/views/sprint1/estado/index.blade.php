@extends('layouts.menu')

@section('title', 'Estado | MRP')

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
    		<h3>Lista de Estados <a href="estado/create"><button class="btn btn-success">Nuevo</button></a></h3>
    		@include('sprint1.estado.search')
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
    					<th>Opciones</th>
    				</thead>
    				@foreach ($estados as $est)
    				<tr>
                        <td></td>
    					<td>{{ $est->codigo }}</td>
    					<td>{{ $est->nombre }}</td>
    					<td>
    						<a href="{{ URL::action('EstadoController@edit',$est->id) }}"><button class="btn btn-info">Editar</button></a>
    						<a href="" data-target="#modal-delete-{{ $est->id }}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
    					</td>
    				</tr>
    				@include('sprint1.estado.modal')
    				@endforeach
    			</table>
    		</div>
    		{{ $estados->render() }}
    	</div>
    </div>
@endsection