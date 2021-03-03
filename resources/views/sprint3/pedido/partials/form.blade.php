<div class="row">
	<div class="form-group col-md-3">
		{{ Form::label('numero', 'Número:') }}
		{{ Form::text('numero', null, ['class' => 'form-control', 'id' => 'numero']) }}
	</div>
	<div class="form-group col-md-2">
		{{ Form::label('fecha', 'Fecha:') }}
		<fieldset disabled>

		{{ Form::text('fecha', null, ['class' => 'form-control disabled', 'id' => 'fecha', 'placeholder'=>$date]) }}
		</fieldset>
	</div>
	<div class="form-group col-md-3">
		{{ Form::label('fecha_entrega', 'Fecha de Entrega:') }}
		{{ Form::date('fecha_entrega', null, ['class' => 'form-control', 'id' => 'fecha_entrega']) }}
	</div>
</div>

<div class="form-row">
	<div class="form-group col-md-4">
		{{Form::label('id_cliente','Seleccionar Cliente: ')}}
		<select name="id_cliente" id="id_cliente" class="custom-select">Seleccionar Cliente
			<option value="">Seleccione un cliente</option>
			@foreach($clientes as $cliente)
				<option value="{{ $cliente->id }}">
					{{$cliente->nombre}}
				</option>
			@endforeach
		</select>
	</div>

	<div class="form-group col-md-2">
		<fieldset disabled>
			{{Form::label('cliente_codigo','Código: ')}}
			<select name="cliente_codigo" id="cliente_codigo" class="custom-select">Código
			</select>
		</fieldset>
	</div>

	<div class="form-group col-md-2">
		<fieldset disabled>
			{{Form::label('cliente_identificacion','Identificación: ')}}
			<select name="cliente_identificacion" id="cliente_identificacion" class="custom-select">Identificación
			</select>
		</fieldset>
	</div>

</div>


<div class="form-row">
	<div class="form-group col-md-4">
		{{Form::label('id_empleado','Promotor: ')}}
		<select name="id_empleado" id="id_empleado" class="custom-select">Seleccionar Promotor
			<option value="">Seleccione un promotor</option>
			@foreach($empleados as $empleado)
				<option value="{{ $empleado->id }}">
					{{$empleado->nombre}}
				</option>
			@endforeach
		</select>
	</div>

	<div class="form-group col-md-2">
		<fieldset disabled>
			{{Form::label('empleado_codigo','Código: ')}}
			<select name="empleado_codigo" id="empleado_codigo" class="custom-select ">Código
					<option value=""></option>
			</select>
		</fieldset>
	</div>

	<div class="form-group col-md-3">
		{{ Form::label('monto_total', 'Monto:') }}
		{{ Form::number('monto_total', null, ['class' => 'form-control', 'id' => 'monto_total']) }}
	</div>

	<div class="form-group col-md-3">
		{{ Form::label('observaciones', 'Obs:') }}
		{{ Form::text('observaciones', null, ['class' => 'form-control', 'id' => 'observaciones']) }}
	</div>
</div>


<div class="form-group">
	{{ Form::label('estado', 'Estado:') }}
	{{ Form::select('estado', ['1'=>'Activo','0'=>'Inactivo'], ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>


@section('scripts')

	<script src="/js/pedido/edit.js"></script>

@endsection 