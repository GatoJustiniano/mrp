<div class="form-group">
	{{ Form::label('codigo', 'Codigo:') }}
	{{ Form::text('codigo', null, ['class' => 'form-control', 'codigo' => 'codigo']) }}
</div>
<div class="form-group">
	{{ Form::label('descripcion', 'Descripción:') }}
	{{ Form::textarea('descripcion', null, ['class' => 'form-control','rows' => '1']) }}
</div>
<div class="form-group">
	{{ Form::label('direccion', 'Direccion:') }}
	{{ Form::textarea('direccion', null, ['class' => 'form-control','rows' => '2']) }}
</div>



<div class="form-group">
    {{Form::label('estado','Seleccionar Estado: ')}}
    <select name="estado" id="estado">Seleccionar estado
        @foreach($estados as $estado)
            <option value="{{ $estado->id }}"
				
				>
				{{$estado->nombre}}
			</option>
        @endforeach
    </select>
</div>



<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>