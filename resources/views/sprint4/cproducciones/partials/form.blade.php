<div class="form-group">
	{{ Form::label('codigo', 'Codigo:') }}
	{{ Form::text('codigo', null, ['class' => 'form-control', 'codigo' => 'codigo']) }}
</div>
<div class="form-group">
	{{ Form::label('capacidad', 'Capacidad:') }}
	{{ Form::text('capacidad', null, ['class' => 'form-control', 'capacidad' => 'capacidad']) }}
</div>

<div class="form-group">
	{{ Form::label('costoadicional', 'Costoadicional:') }}
	{{ Form::textarea('costoadicional', null, ['class' => 'form-control','rows' => '1']) }}
</div>
<div class="form-group">
	{{ Form::label('costohora', 'Costohora:') }}
	{{ Form::textarea('costohora', null, ['class' => 'form-control','rows' => '2']) }}
</div>
<div class="form-group">
	{{ Form::label('descripcion', 'Descripción:') }}
	{{ Form::textarea('descripcion', null, ['class' => 'form-control','rows' => '3']) }}
</div>






<div class="form-group">
	{{ Form::label('estado', 'Estado:') }}
	{{ Form::select('estado', ['1'=>'Activo','2'=>'Remodelacion','0'=>'Inactivo'], ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ Form::label('nombre', 'Nombre:') }}
	{{ Form::textarea('nombre', null, ['class' => 'form-control','rows' => '4']) }}
</div>


<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>