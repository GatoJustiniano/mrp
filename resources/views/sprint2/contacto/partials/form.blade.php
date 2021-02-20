<div class="row">
	<div class="form-group col">
		{{ Form::label('nombre', 'Nombre:') }}
		{{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
	</div>
	<div class="form-group col">
		{{ Form::label('cargo', 'Cargo:') }}
		{{ Form::text('cargo', null, ['class' => 'form-control', 'id' => 'cargo', 'placeholder'=>'Ingresar la descripción del contacto, ejemplo Mercader de productos lacteos, Productor de x, etc.']) }}
	</div>
</div>

<div class="row">
	<div class="form-group col">
		{{ Form::label('telefono', 'Teléfono:') }}
		{{ Form::tel('telefono', null, ['class' => 'form-control', 'id' => 'telefono','maxlength'=>'8','minlength'=>'8']) }}
	</div>
	<div class="form-group col">
		{{ Form::label('celular', 'Celular:') }}
		{{ Form::tel('celular', null, ['class' => 'form-control', 'id' => 'celular','maxlength'=>'8','minlength'=>'8']) }}
	</div>
</div>

<div class="row">
	<div class="form-group col">
		{{ Form::label('correo', 'Correo Electrónico:') }}
		{{ Form::email('correo', null, ['class' => 'form-control ', 'id' => 'correo']) }}
	</div>
	<div class="form-group col">
		{{ Form::label('nota', 'Nota:') }}
		{{ Form::textarea('nota', null, ['class' => 'form-control', 'rows' => '1', 'id' => 'nota','placeholder'=>'Colocar detalles como: las entregas de tienen una repuesta de 3 días hábiles, otros.']) }}
	</div>
</div>
<div class="form-group">
    {{Form::label('id_proveedor','Seleccionar Proveedor: ')}}
    <select name="id_proveedor" id="id_proveedor">Seleccionar Proveedor
        @foreach($proveedores as $proveedor)
            <option value="{{ $proveedor->id }}" 
				
			>
                {{$proveedor->nombre}}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
	{{ Form::label('estado', 'Estado:') }}
	{{ Form::select('estado', ['1'=>'Activo','0'=>'Inactivo'], ['multiple class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>