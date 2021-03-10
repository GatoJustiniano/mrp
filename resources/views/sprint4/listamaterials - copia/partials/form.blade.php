<div class="form-group">
	{{ Form::label('componente', 'Componente:') }}
	{{ Form::text('componente', null, ['class' => 'form-control', 'componente' => 'componente']) }}
</div>

<div class="form-group">
	{{ Form::label('cantidad', 'Cantidad:') }}
	{{ Form::textarea('cantidad', null, ['class' => 'form-control','rows' => '1']) }}
</div>
<div class="form-group">
    {{Form::label('estado','Seleccionar Centro Produccion: ')}}
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
	{{ Form::label('unidadmedida', 'Unidadmedida') }}
	{{ Form::textarea('unidadmedida', null, ['class' => 'form-control','rows' => '2']) }}
</div>
<div class="form-group">
	{{ Form::label('costounitario', 'Costo unitario:') }}
	{{ Form::textarea('costounitario', null, ['class' => 'form-control','rows' => '3']) }}
</div>
<div class="form-group">
	{{ Form::label('subtotal', 'Subtotal:') }}
	{{ Form::textarea('subtotal', null, ['class' => 'form-control','rows' => '3']) }}
</div>











<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>