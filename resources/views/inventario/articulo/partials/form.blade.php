<div class="container">
    <div class="row">
        <div>
            <label class=newbtn>
                <img id="blah" src="http://placehold.it/120x120" >
                <input id="imagen" name="imagen" class='pis' onchange="readURL(this);" type="file" >
            </label>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            {{ Form::label('codigo', 'Codigo del Articulo:') }}
            {{ Form::text('codigo', null, ['class' => 'form-control', 'id' => 'codigo', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('nombre', 'Nombre del Articulo:') }}
            {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre', 'required']) }}
        </div>
        <div class="form-check">
            <div class="checkbox-label">
                <h5>Tipo</h5>
            </div>
            <label class="form-check-label">
                <input class="form-check-input" type="radio" name="tipo" id="tipo" value="1">
                Materia Prima
                <span class="circle">
                    <span class="check"></span>
                  </span>
            </label>
            <label class="form-check-label">
                <input class="form-check-input" type="radio" name="tipo" id="tipo" value="2">
                Articulo
                <span class="circle">
                    <span class="check"></span>
                  </span>
            </label>
            <label class="form-check-label">
                <input class="form-check-input" type="radio" name="tipo" id="tipo" value="3">
                Ambos
                <span class="circle">
                    <span class="check"></span>
                  </span>
            </label>
        </div>
        <br>

        <div class="form-group">
            {{ Form::label('precio_compra', 'Precio compra del Articulo:') }}
            {{ Form::number('precio_compra', null, ['class' => 'form-control', 'id' => 'precio_compra', 'min' => '0', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('precio_venta', 'Precio venta del Articulo:' ) }}
            {{ Form::number('precio_venta', null, ['class' => 'form-control', 'id' => 'precio_venta', 'min' => '0', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad_minima', 'Cantidad minima del Articulo:') }}
            {{ Form::number('cantidad_minima', null, ['class' => 'form-control', 'id' => 'cantidad_minima', 'min' => '1', 'required']) }}
        </div>
        <div class="card">
            <div class="card-title">
                <h6>Stock</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            {{Form::label('unidad medida')}}
                            <select class="selectpicker" data-style="select-with-transition" data-size="7" title="Seleccionar unidad de medida"  name="unidad_medida_id" id="unidad_medida_id">Seleccionar unidad de medida
                                @foreach($unidad_medidas as $unidad_medida)
                                    <option value="{{ $unidad_medida->id }}" >
                                        {{$unidad_medida->nombre}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">

        <div class="form-group">
            {{Form::label('sub categoria')}}
            <select class="selectpicker" data-style="select-with-transition" data-size="7" title="Seleccionar Sub Categoria" name="sub_categoria_id" id="sub_categoria_id">Seleccionar sub categoria
                @foreach($sub_categorias as $sub_categoria)
                    <option value="{{ $sub_categoria->id }}" >
                        {{$sub_categoria->nombre}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{Form::label('proveedor')}}
            <select class="selectpicker" data-style="select-with-transition" data-size="7" title="Seleccionar proveedor" name="proveedor_id" id="proveedor_id">Seleccionar proveedor
                @foreach($proveedors as $proveedor)
                    <option value="{{ $proveedor->id }}" >
                        {{$proveedor->nombre}}
                    </option>
                @endforeach
                <option value="1">Borrar</option>
            </select>
        </div>
        <div class="form-group">
            {{Form::label('estado')}}
            <select class="selectpicker" data-style="select-with-transition" data-size="7" title="Seleccionar estado" name="estado" id="estado">Seleccionar estado
                <option value="1">Baja</option>
                <option value="2">Activo</option>
            </select>
        </div>
    </div>
</div>

<div class="form-group">
<h2 class="title text-center">
                @can('listamaterials.create')
                    <a href="{{ route('listamaterials.create') }}" 
                    class="btn btn-sm btn-success pull-right">
                       lista de materiales
                    </a>
                @endcan
            </h2>
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-success float-right']) }}
</div>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    $('.newbtn').bind("click" , function () {
        $('#imagen').click();
    });
</script>
