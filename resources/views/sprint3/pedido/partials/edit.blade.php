<div class="row">
	<div class="form-group col-md-3">
		{{ Form::label('numero', 'Número:') }}
		{{ Form::text('numero', null, ['class' => 'form-control', 'id' => 'numero']) }}
	</div>
	<div class="form-group col-md-6">
		{{ Form::label('fecha', 'Fecha:') }}
		{{ Form::text('fecha', null, ['class' => 'form-control', 'id' => 'fecha']) }}
	</div>
	<div class="form-group col-md-3">
		{{ Form::label('fecha_entrega', 'Fecha de Entrega:') }}
		{{ Form::text('fecha_entrega', null, ['class' => 'form-control', 'id' => 'fecha_entrega']) }}
	</div>
</div>

<div class="form-row">
	<div class="form-group col-md-4">
		{{Form::label('id_cliente','Seleccionar Cliente: ')}}
		<select name="id_cliente" id="id_cliente" class="custom-select">Seleccionar Cliente
			<option value="">Seleccione un cliente</option>
			@foreach($clientes as $cliente)
					<option value="{{ $cliente->id }}"
						@if( $cliente->id === $pedido->id_cliente)
							selected
						@endif	
					>
						{{$cliente->nombre}}
					</option>
			@endforeach
		</select>
	</div>

	<div class="form-group col-md-4">
      <label for="disabledTextInput">Código</label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$cliente->codigo}}">
    </div>

	<div class="form-group col-md-4">
      <label for="disabledTextInput">Identificación</label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$cliente->identificacion}}">
    </div>
</div>


<div class="form-row">
	<div class="form-group col-md-4">
		{{Form::label('id_empleado','Promotor: ')}}
		<select name="id_empleado" id="id_empleado" class="custom-select">Seleccionar Promotor
			<option value="">Seleccione un promotor</option>
			@foreach($empleados as $empleado)
					<option value="{{ $empleado->id }}"
						@if( $empleado->id === $pedido->id_empleado)
							selected
						@endif	
					>
						{{$empleado->nombre}}
					</option>
			@endforeach
		</select>
	</div>

	<div class="form-group col-md-4">
      <label for="disabledTextInput">Código</label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$empleado->codigo}}">
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


@endsection 