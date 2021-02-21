<div class="form-group">
	{{ Form::label('nombre', 'Nombre de la unidad de medida:') }}
	{{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
</div>
<div class="form-group">
    {{ Form::label('abreviatura', 'Abreviatura de la unidad de medida:') }}
    {{ Form::text('abreviatura', null, ['class' => 'form-control', 'id' => 'abreviatura']) }}
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-success']) }}
</div>