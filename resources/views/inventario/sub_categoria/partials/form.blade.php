<div class="form-group">
	{{ Form::label('nombre', 'Nombre de Sub Categoria:') }}
	{{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
</div>
<div class="form-group">
    {{Form::label('categoria_id','Seleccionar categoria: ')}}
    <select class="selectpicker" data-style="select-with-transition" data-size="7" name="categoria_id" id="categoria_id">Seleccionar categoria
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}" >
                {{$categoria->nombre}}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-success']) }}
</div>