<div class="card-head">
    <h4 class="text-center">1. Ruta</h4>
</div>
<div class="row">
	<div class="form-group col-md-3">
        <label for="codigo">Codigo:</label>
        <input type="text" class="form-control" name="codigo" id="codigo" >
	</div>
    <div class="form-group col-md-2">

            {{Form::label('nombre','Nombre: ')}}
            <input type="text" class="form-control" name="nombre" id="nombre" >


    </div>
</div>

<div class="form-row">
	<div class="form-group col-md-4">
		{{Form::label('id_articulo','Seleccionar Producto: ')}}
		<select name="id_articulo" id="id_articulo" class="custom-select">Seleccionar Producto
			<option value="">Seleccione un Producto</option>
			@foreach($articulos as $articulo)
				<option value="{{ $articulo->id }}">
					{{$articulo->nombre}}
				</option>
			@endforeach
		</select>
	</div>



</div>

<hr>
<div class="form-row">
            <div class="card">
                <div class="card-head">
                    <h4 class="text-center">2. Operaciones</h4>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <select name="operaciones" id="operaciones" class="custom-select" onchange="colocar_precio_y_duracion()">
                                <option value="">Seleccione</option>
                                @foreach($operaciones as $value)
                                <option precio="{{ $value->costoduracion }}" duracion="{{ $value->duracion }}" produccion="{{ $value->cproduccion }}" value="{{ $value->id }}">{{ $value->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <div class="form-group">
                            <label for="">Duracion Min.</label>
                            <input type="number" id="duracion" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <div class="form-group">
                            <label for="">Costo Bs.</label>
                            <input id="precio" type="number" class="form-control" readonly>
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
                            <th>Operacion</th>
                            <th>Centro Produccion</th>
                            <th>Duracion</th>
                            <th>Costo Duracion</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="tblInsumos">

                    </tbody>
                </table>
            </div>
        </div>

<div class="row">
    <div class="form-group col">
        {{ Form::label('estado', 'Estado:') }}
        {{ Form::select('estado', ['1'=>'Activo','0'=>'Inactivo'], ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-md-3">
        <label for="">Duracion Total.</label>
        <input id="duracion_total" type="text" class="form-control"  readonly>
    </div>
    <div class="form-group col-md-3">
		<label for="">Precio Bs.</label>
		<input id="precio_total" type="text" class="form-control" name="precio" readonly>
	</div>
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>


@section("scripts")
<script src="/js/ruta/edit.js"></script>

<script>
    function colocar_precio_y_duracion() {
        let precio = $("#operaciones option:selected").attr("precio");
        $("#precio").val(precio);
        let duracion = $("#operaciones option:selected").attr("duracion");
        $("#duracion").val(duracion);
    }

    function agregar_insumo() {
        let insumo_id = $("#operaciones option:selected").val();
        let insumo_text = $("#operaciones option:selected").text();
        let duracion = $("#duracion").val();
        let precio = $("#precio").val();
        let produccion = $("#operaciones option:selected").attr("produccion");

        if ( precio > 0) {

            $("#tblInsumos").append(`
                    <tr id="tr-${insumo_id}">
                        <td>
                            <input type="hidden" name="insumo_id[]" value="${insumo_id}" />
                            <input type="hidden" name="duracion[]" value="${duracion}" />
                            <input type="hidden" name="precio[]" value="${precio}" />
                            ${insumo_text}    
                        </td>
                        <td>${produccion}</td>
                        <td>${duracion}</td>
                        <td>${precio}</td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="eliminar_insumo(${insumo_id}, ${precio},${duracion})">X</button>
                        </td>
                    </tr>
                `);
            let precio_total = $("#precio_total").val() || 0;
            let duracion_total = $("#duracion_total").val() || 0;
            $("#precio_total").val(parseInt(precio_total) + parseInt(precio));
            $("#duracion_total").val(parseInt(duracion_total) + parseInt(duracion));
        } else {
            alert("Se debe ingresar una cantidad o precio valido");
        }
    }


    function eliminar_insumo(id, subtotal, duracion) {
        $("#tr-" + id).remove();
        let precio_total = $("#precio_total").val() || 0;
        let duracion_total = $("#duracion_total").val() || 0;
        $("#precio_total").val(parseInt(precio_total) - subtotal);
        $("#duracion_total").val(parseInt(duracion_total) - duracion);
    }

</script>
@endsection