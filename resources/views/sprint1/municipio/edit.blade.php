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
    		<h3>Editar Municipio: {{ $municipio->nombre }}</h3>
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

            {!! Form::model($municipio,['method'=>'PATCH','route'=>['municipio.update',$municipio->id]])!!}
            {{ Form::token() }}

    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="codigo">Codigo</label>
                <input type="text" name="codigo" required value="{{ $municipio->codigo }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" required value="{{ $municipio->nombre }}" class="form-control">
            </div>        
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Provincia</label>
                <select name="id_provincia" class="form-control">
                    @foreach($provincias as $pro)
                        @if ($pro->id==$municipio->id_provincia)
                        <option value="{{ $pro->id }}" selected>{{ $pro->nombre }}</option>
                        @else
                        <option value="{{ $pro->id }}">{{ $pro->nombre }}</option>
                        @endif
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