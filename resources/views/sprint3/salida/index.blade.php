@extends('layouts.layouts.menu')

@section('title', 'Vista Salidas | MRP')

@section('body-class', 'landing-page')

@section('styles')
    <style>
        h1.title {
            font-size: 3rem;
        }
        ul.pagination {
            justify-content: center;
        }

    </style>
@endsection

@section('contenido-central')
<div class="main ">
    <div class="container">
        <h2 class="title text-center">Salidas
        </h2>
        <hr>
        <table id="example" class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Nro.</th>
                    <th>Cliente </th>
                    <th>Vendedor</th>
                    <th>Almacén</th>
                    <th>Fecha Entrega</th>
                    <th>Estado</th>
                    <th>Opción</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($ventas as $venta)
                <tr>
                    <td>
                        <a href="{{ route('ventas.show', $venta->id) }}" 
                        class="btn btn-sm btn-info">
                            {{ $venta->numero }}
                        </a>
                    </td>
                    <td>{{ $venta->cliente }}</td>
                    <td>{{ $venta->empleado}}</td>
                    <td>{{ $venta->almacen }}</td>
                    <td>{{ $venta->fecha_entrega}}</td>
                    <td>
                        @if($venta->estado == 1)
                            <u>Activo</u>
                        @else
                            <u>Inactivo</u>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('ventas.show', $venta->id) }}" 
                        class="btn btn-sm btn-info">
                            Ver
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Nro.</th>
                    <th>Cliente</th>
                    <th>Vendedor</th>
                    <th>Almacén</th>
                    <th>Fecha Entrega</th>
                    <th>Estado</th>
                    <th>Opción</th>
                </tr>
            </tfoot>
        </table>
        <hr>
    </div>
        
</div>

@endsection
@section("scripts")
<script>


$(document).ready(function() {
    $('#example').DataTable( {
        "language": {
            "decimal":        "",
            "emptyTable":     "No hay datos disponibles en la tabla ",
            "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros de Salidas.",
            "infoEmpty":      "Mostrando 0 a 0 de 0 entradas",
            "infoFiltered":   "(filtrado de _MAX_ entradas totales)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostrar registros de _MENU_ Salidas:",
            "loadingRecords": "Cargando... ",
            "processing":     "Procesando...",
            "search":         "Buscar:",
            "zeroRecords":    "No se encontraron registros coincidentes",
            "paginate": {
                "first":      "Primera",
                "last":       "Última",
                "next":       "Siguiente",
                "previous":   "Anterior"
            },
            "aria": {
                "sortAscending":  ": activar para ordenar la columna ascendente ",
                "sortDescending": ": activar para ordenar la columna descendente "
            }
        }
    } );
} );

</script>
@endsection