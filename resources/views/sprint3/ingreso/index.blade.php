@extends('layouts.layouts.menu')

@section('title', 'Vista Ingresos | MRP')

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
        <h2 class="title text-center">Ingresos
        </h2>
        <hr>
        <table id="example" class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Nro.</th>
                    <th>Proveedor </th>
                    <th>Vendedor</th>
                    <th>Almacén</th>
                    <th>Fecha Entrega</th>
                    <th>Estado</th>
                    <th>Opción</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($ingresos as $ingreso)
                <tr>
                    <td>
                        <a href="{{ route('ingresos.show', $ingreso->id) }}" 
                        class="btn btn-sm btn-info">
                            {{ $ingreso->numero }}
                        </a>
                    </td>
                    <td>{{ $ingreso->proveedor }}</td>
                    <td>{{ $ingreso->empleado}}</td>
                    <td>{{ $ingreso->almacen }}</td>
                    <td>{{ $ingreso->fecha_entrega}}</td>
                    <td>
                        @if($ingreso->estado == 1)
                            <u>Activo</u>
                        @else
                            <u>Inactivo</u>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('ingresos.show', $ingreso->id) }}" 
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
                    <th>Proveedor</th>
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
            "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros de Ingresos.",
            "infoEmpty":      "Mostrando 0 a 0 de 0 entradas",
            "infoFiltered":   "(filtrado de _MAX_ entradas totales)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostrar registros de _MENU_ Ingresos:",
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