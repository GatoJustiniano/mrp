@extends('layouts.menu')

@section('title', 'Municipio | MRP')

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
    		<h3>Lista de Municipios <a href="municipio/create"><button class="btn btn-success">Nuevo</button></a></h3>
    		@include('sprint1.municipio.search')
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
                        <th>Provincia</th>
    					<th>Opciones</th>
    				</thead>
    				@foreach ($municipios as $mun)
                    <tr>
                        <td></td>
                        <td>{{ $mun->codigo }}</td>
                        <td>{{ $mun->nombre }}</td>
                        <td>{{ $mun->provinciass }}</td>
                        <td>
                            <a href="{{ URL::action('MunicipioController@edit',$mun->id) }}"><button class="btn btn-info">Editar</button></a>
                            <a href="" data-target="#modal-delete-{{ $mun->id }}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('sprint1.municipio.modal')
                    @endforeach
    			</table>
    		</div>
    		{{ $municipios->render() }}
    	</div>
    </div>
@endsection