<div class="row">
	<div class="form-group col-md-4">
		{{ Form::label('codigo', 'Código:') }}
		{{ Form::text('codigo', null, ['class' => 'form-control', 'id' => 'codigo']) }}
	</div>
	<div class="form-group col-md-8">
		{{ Form::label('nombre', 'Nombre Completo:') }}
		{{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
	</div>
</div>

<div class="row">
	<div class="form-group col-md-6">
		{{ Form::label('direccion', 'Dirección:') }}
		{{ Form::text('direccion', null, ['class' => 'form-control', 'id' => 'direccion']) }}
	</div>
	<div class="form-group col-md-6">
		{{ Form::label('correo', 'Correo Electrónico:') }}
		{{ Form::email('correo', null, ['class' => 'form-control ', 'id' => 'correo']) }}
	</div>
</div>

<div class="row">
	<div class="form-group col-md-6">
		{{ Form::label('telefono', 'Teléfono:') }}
		{{ Form::tel('telefono', null, ['class' => 'form-control', 'id' => 'telefono','maxlength'=>'8','minlength'=>'8']) }}
	</div>
	<div class="form-group col-md-6">
		{{ Form::label('imagen', 'Foto:') }}
		{{ Form::text('imagen', null, ['class' => 'form-control', 'id' => 'imagen']) }}
	</div>
</div>

<div class="row">
	<div class="form-group col-md-4">
		{{Form::label('id_estado','Seleccionar Estado: ')}}
		<select name="id_estado" id="id_estado">Seleccionar Estado
			<option value="">Seleccione un estado</option>
			@foreach($estados as $estado)
				<option value="{{ $estado->id }}"
					@if( $estado->id === $proveedor->id_estado)
						selected
					@endif	
				>
					{{$estado->nombre}}
				</option>
			@endforeach
		</select>
	</div>

	<div class="form-group col-md-4">
		{{Form::label('id_provincia','Seleccionar Provincia: ')}}
		<select name="id_provincia" id="id_provincia">Seleccionar Provincia
				<option value="{{ $proveedor->id_provincia }}">{{ $proveedor->provincia }}</option>
		</select>
	</div>

	<div class="form-group col-md-4">
		{{Form::label('id_municipio','Seleccionar Municipio: ')}}
		<select name="id_municipio" id="id_municipio">Seleccionar Municipio
			@foreach($municipios as $municipio)
					<option value="{{ $municipio->id }}"
						@if( $municipio->id === $proveedor->id_municipio)
							selected
						@endif	
					>
						{{$municipio->nombre}}
					</option>
			@endforeach
		</select>
	</div>
</div>


<div class="form-group">
	{{ Form::label('estado', 'Estado:') }}
	{{ Form::select('estado', ['1'=>'Activo','0'=>'Inactivo'], ['multiple class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>


@section('scripts')

	<script src="/js/proveedor/edit.js"></script>

@endsection 