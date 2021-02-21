<div class="form-group">
	{{ Form::label('codigo', 'Codigo:') }}
	{{ Form::text('codigo', null, ['class' => 'form-control', 'codigo' => 'codigo']) }}
</div>
<div class="form-group">
	{{ Form::label('descripcion', 'Descripción:') }}
	{{ Form::textarea('descripcion', null, ['class' => 'form-control','rows' => '1']) }}
</div>

<div class="form-group">
    {{Form::label('sucursal','Seleccionar sucursal: ')}}
    <select name="sucursal" id="sucursal">Seleccionar sucursal
        @foreach($sucursals as $sucursal)
            <option value="{{ $sucursal->id }}"
				
				>
				{{$sucursal->descripcion}}
			</option>
        @endforeach
    </select>
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>