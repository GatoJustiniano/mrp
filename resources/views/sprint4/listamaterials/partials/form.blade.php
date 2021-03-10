  
 <br>
 <div class="form-group">
    {{Form::label('componente','Seleccionar componente : ')}}
    <select name="componente" id="componente">Seleccionar componente 
        @foreach($componentes as $componente)
            <option value="{{ $componente->id }}"
				
				>
				{{$componente->nombre}}
			</option>
        @endforeach
    </select>
</div>
<div class="form-group">
	{{ Form::label('cantidad', 'Cantidad:') }}
	{{ Form::textarea('cantidad', null, ['class' => 'form-control','rows' => '1']) }}
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
	{{ Form::textarea('subtotal', null, ['class' => 'form-control','rows' => '4']) }}
</div>











<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>