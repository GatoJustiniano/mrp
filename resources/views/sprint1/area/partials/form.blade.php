<div class="form-group">
	{{ Form::label('codigo', 'Código:') }}
	{{ Form::text('codigo', null, ['class' => 'form-control', 'id' => 'codigo']) }}
</div>
<div class="form-group">
	{{ Form::label('nombre', 'Nombre de Area:') }}
	{{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
</div>
<div class="form-group">
	{{ Form::label('estado', 'Estado:') }}
	{{ Form::select('estado', ['1'=>'Activo','0'=>'Inactivo'], ['multiple class' => 'form-control']) }}
</div>
<div class="form-group">
    {{Form::label('departamento_id','Seleccionar departamento: ')}}
    <select name="departamento_id" id="departamento_id">Seleccionar departamento
        @foreach($departamentos as $departamento)
            <option value="{{ $departamento->id }}" >
                {{$departamento->nombre}}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>