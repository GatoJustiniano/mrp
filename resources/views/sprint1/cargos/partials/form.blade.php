<div class="form-group">
	{{ Form::label('codigo', 'Codigo:') }}
	{{ Form::text('codigo', null, ['class' => 'form-control', 'codigo' => 'codigo']) }}
</div>
<div class="form-group">
	{{ Form::label('nombre', 'Nombre:') }}
	{{ Form::text('nombre', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('descripcion', 'Descripción:') }}
	{{ Form::text('descripcion', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('estado', 'Estado:') }}
	{{ Form::select('estado', ['1'=>'Activo','0'=>'Inactivo'], ['multiple class' => 'form-control']) }}
</div>



<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>