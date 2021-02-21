@extends ('layouts.menu')

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
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<h3>Editar Provincia: {{ $provincia->nombre }}</h3>
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

            {!! Form::model($provincia,['method'=>'PATCH','route'=>['provincia.update',$provincia->id]])!!}
            {{ Form::token() }}

    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="codigo">Codigo</label>
                <input type="text" name="codigo" required value="{{ $provincia->codigo }}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" required value="{{ $provincia->nombre }}" class="form-control">
            </div>        
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Estado</label>
                <select name="id_estado" class="form-control">
                    @foreach($estados as $est)
                        @if ($est->id==$provincia->id_estado)
                        <option value="{{ $est->id }}" selected>{{ $est->nombre }}</option>
                        @else
                        <option value="{{ $est->id }}">{{ $est->nombre }}</option>
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