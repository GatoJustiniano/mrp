<div class="form-group">
	{{ Form::label('nombre', 'Nombre del departamento:') }}
	{{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
</div>
<div class="form-group">
	{{ Form::label('codigo', 'Codigo:') }}
	{{ Form::text('codigo', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('estado', 'Estado:') }}
	{{ Form::select('estado', ['1'=>'Activo','0'=>'Inactivo'], ['multiple class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>