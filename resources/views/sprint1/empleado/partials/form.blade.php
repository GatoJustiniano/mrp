<div class="row">
	<div class="form-group col">
		{{ Form::label('codigo', 'Código:') }}
		{{ Form::text('codigo', null, ['class' => 'form-control', 'id' => 'codigo']) }}
	</div>
	<div class="form-group col">
		{{ Form::label('cedula', 'Cédula:') }}
		{{ Form::text('cedula', null, ['class' => 'form-control', 'id' => 'cedula']) }}
	</div>
</div>

<div class="row">
	<div class="form-group col">
		{{ Form::label('nombre', 'Nombre:') }}
		{{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
	</div>
	<div class="form-group col">
		{{ Form::label('direccion', 'Dirección:') }}
		{{ Form::text('direccion', null, ['class' => 'form-control', 'id' => 'direccion']) }}
	</div>
</div>

<div class="row">
	<div class="form-group col">
		{{ Form::label('email', 'Correo Electrónico:') }}
		{{ Form::email('email', null, ['class' => 'form-control ', 'id' => 'email']) }}
	</div>
	<div class="form-group col">
		{{ Form::label('fecha_nac', 'Fecha de Nacimiento:') }}
		{{ Form::text('fecha_nac', null, ['class' => 'form-control', 'id' => 'fecha_nac']) }}
	</div>
</div>

<div class="row">
	<div class="form-group col">
		{{ Form::label('telefono', 'Teléfono:') }}
		{{ Form::tel('telefono', null, ['class' => 'form-control', 'id' => 'telefono']) }}
	</div>
	<div class="form-group col">
		{{ Form::label('foto', 'Foto:') }}
		{{ Form::text('foto', null, ['class' => 'form-control', 'id' => 'foto']) }}
	</div>
</div>

<div class="row">
	<div class="form-group col">
		{{Form::label('id_sucursal','Seleccionar sucursal: ')}}
		<select name="id_sucursal" id="id_sucursal">Seleccionar sucursal
			<option value="">Seleccionar sucursal</option>
			@foreach($sucursales as $sucursal)
				<option value="{{ $sucursal->id }}" 
					@if( $sucursal->id === $empleado->id_sucursal)
						selected
					@endif
				>
					{{$sucursal->descripcion}}
				</option>
			@endforeach
		</select>
	</div>

	<div class="form-group col">
		{{Form::label('id_departamento','Seleccionar departamento: ')}}
		<select name="id_departamento" id="id_departamento">Seleccionar departamento
			<option value="">Seleccionar departamento</option>
			@foreach($departamentos as $departamento)
				<option value="{{ $departamento->id }}" 
					@if( $departamento->id === $empleado->id_departamento)
						selected
					@endif
				>
					{{$departamento->nombre}}
				</option>
			@endforeach
		</select>
	</div>


	<div class="form-group col">
		{{Form::label('id_cargo','Seleccionar cargo: ')}}
		<select name="id_cargo" id="id_cargo">Seleccionar cargo
			<option value="">Seleccionar cargo</option>
			@foreach($cargos as $cargo)
				<option value="{{ $cargo->id }}" 
					@if( $cargo->id === $empleado->id_cargo)
						selected
					@endif
				>
					{{$cargo->nombre}}
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
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-success']) }}
</div>