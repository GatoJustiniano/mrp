<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra;
use App\IngresoDetalle;

use App\Proveedor;
use App\Empleado;
use App\Sucursal;
use App\Almacen;
use App\Articulo;
use App\Ingreso;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;

class IngresoController extends Controller
{
    public function index()
    {
        $ingresos = DB::table('compras')
        ->join('empleados', 'empleados.id', '=', 'id_empleado')
        ->join('proveedors', 'proveedors.id', '=', 'id_proveedor')
        ->join('almacens', 'almacens.id', '=', 'id_almacen')
        ->select('compras.*',
                 'empleados.nombre as empleado',
                 'proveedors.nombre as proveedor',
                 'almacens.codigo as almacen'
                )
        ->orderBy('compras.estado','desc')
        ->orderBy('numero','asc')
        ->where('compras.eliminado',0)
        ->paginate(5);

        return view('sprint3/ingreso.index', compact('ingresos'));
    }

    public function exportPDF()
    {
        return 'datos;';
    }
}
