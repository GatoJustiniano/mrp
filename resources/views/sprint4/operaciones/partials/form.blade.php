<div class="form-group">
	{{ Form::label('codigo', 'Codigo:') }}
	{{ Form::text('codigo', null, ['class' => 'form-control', 'codigo' => 'codigo']) }}
</div>

<div class="form-group">
	{{ Form::label('nombre', 'Nombre:') }}
	{{ Form::textarea('nombre', null, ['class' => 'form-control','nombre' => 'nombre']) }}
</div>
<div class="form-group">
    {{Form::label('cproduccione','Seleccionar Centro Produccion: ')}}
    <select name="cproduccione" id="cproduccione">Seleccionar cproduccione
        @foreach($cproducciones as $cproduccione)
            <option value="{{ $cproduccione->id }}"
				
				>
				{{$cproduccione->nombre}}
			</option>
        @endforeach
    </select>
</div>

<div class="form-group">
	{{ Form::label('duracion', 'Duracion:') }}
	{{ Form::textarea('duracion', null, ['class' => 'form-control','rows' => '1']) }}
</div>
<div class="form-group">
	{{ Form::label('costoduracion', 'Costo Duracion:') }}
	{{ Form::textarea('costoduracion', null, ['class' => 'form-control','rows' => '2']) }}
</div>
<div class="form-group">
	{{ Form::label('descripcion', 'Descripción:') }}
	{{ Form::textarea('descripcion', null, ['class' => 'form-control','rows' => '3']) }}
</div>











<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>