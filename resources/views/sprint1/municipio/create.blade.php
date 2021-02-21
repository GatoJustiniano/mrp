@extends ('layouts.menu')

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
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<h3>Nuevo Municipio</h3>
    		@if (count($errors)>0)
    		<div class="alert alert-danger">
    			<ul>
    			@foreach ($errors->all() as $error)
    				<li>{{ $error }}</li>
    			@endforeach
    			</ul>
    		</div>
    		@endif
        </div>    
    </div>
            {!! Form::open(array('url'=>'sprint1/municipio','method'=>'POST','autocomplete'=>'off')) !!}
            {{ Form::token() }}



     <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="codigo">Codigo</label>
                <input type="text" name="codigo" required value="{{ old('codigo') }}" class="form-control" placeholder="Codigo...">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" required value="{{ old('nombre') }}" class="form-control" placeholder="Nombre...">
            </div>        
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Provincia</label>
                <select name="id_provincia" class="form-control">
                    @foreach($provincias as $pro)
                        <option value="{{ $pro->id }}">{{ $pro->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>
    </div>
            {!! Form::close() !!}
@endsection