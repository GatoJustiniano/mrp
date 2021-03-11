  
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
	{{ Form::submit('Agregar Componente', ['class' => 'btn btn-sm btn-primary']) }}
</div>