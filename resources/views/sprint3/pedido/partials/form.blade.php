<div class="card-head">
    <h4 class="text-center">1. Pedido</h4>
</div>
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
			<select name="cliente_codigo" id="cliente_codigo" class="form-control">Código
			</select>
		</fieldset>
	</div>

	<div class="form-group col-md-2">
		<fieldset disabled>
			{{Form::label('cliente_identificacion','Identificación: ')}}
			<select name="cliente_identificacion" id="cliente_identificacion" class="form-control">Identificación
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
			<select name="empleado_codigo" id="empleado_codigo" class="form-control ">Código
					<option value=""></option>
			</select>
		</fieldset>
	</div>


	<div class="form-group col-md-3">
		{{ Form::label('observaciones', 'Obs:') }}
		{{ Form::text('observaciones', null, ['class' => 'form-control', 'id' => 'observaciones']) }}
	</div>
</div>
<div class="form-row">
	<div class="form-group col-md-3">
		<label for="">Precio</label>
		<input id="precio_total" type="text" class="form-control" name="precio" readonly>
	</div>
</div>
<hr>
<div class="form-row">
            <div class="card">
                <div class="card-head">
                    <h4 class="text-center">2. Artículos</h4>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <select name="articulos" id="articulos" class="custom-select" onchange="colocar_precio()">
                                <option value="">Seleccione</option>
                                @foreach($articulos as $value)
                                <option precio="{{ $value->precio_venta }}" value="{{ $value->id }}">{{ $value->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <div class="form-group">
                            <label for="">Cantidad</label>
                            <input type="number" id="cantidad" class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <div class="form-group">
                            <label for="">Precio</label>
                            <input id="precio" type="text" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <button onclick="agregar_insumo()" type="button"
                            class="btn btn-sm btn-success pull-right">Agregar</button>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Sub Total</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="tblInsumos">

                    </tbody>
                </table>
            </div>
        </div>

<div class="form-group">
	{{ Form::label('estado', 'Estado:') }}
	{{ Form::select('estado', ['1'=>'Activo','0'=>'Inactivo'], ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>


@section("scripts")
<script src="/js/pedido/edit.js"></script>

<script>
    function colocar_precio() {
        let precio = $("#articulos option:selected").attr("precio");
        $("#precio").val(precio);
    }

    function agregar_insumo() {
        let insumo_id = $("#articulos option:selected").val();
        let insumo_text = $("#articulos option:selected").text();
        let cantidad = $("#cantidad").val();
        let precio = $("#precio").val();

        if (cantidad > 0 && precio > 0) {

            $("#tblInsumos").append(`
                    <tr id="tr-${insumo_id}">
                        <td>
                            <input type="hidden" name="insumo_id[]" value="${insumo_id}" />
                            <input type="hidden" name="cantidades[]" value="${cantidad}" />
                            ${insumo_text}    
                        </td>
                        <td>${cantidad}</td>
                        <td>${precio}</td>
                        <td>${parseInt(cantidad) * parseInt(precio)}</td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="eliminar_insumo(${insumo_id}, ${parseInt(cantidad) * parseInt(precio)})">X</button>    
                        </td>
                    </tr>
                `);
            let precio_total = $("#precio_total").val() || 0;
            $("#precio_total").val(parseInt(precio_total) + parseInt(cantidad) * parseInt(precio));
        } else {
            alert("Se debe ingresar una cantidad o precio valido");
        }
    }


    function eliminar_insumo(id, subtotal) {
        $("#tr-" + id).remove();
        let precio_total = $("#precio_total").val() || 0;
        $("#precio_total").val(parseInt(precio_total) - subtotal);
    }

</script>
@endsection