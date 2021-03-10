<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use App\SalidaDetalle;

use App\Cliente;
use App\Empleado;
use App\Sucursal;
use App\Almacen;
use App\Articulo;
use App\Salida;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;

class SalidaController extends Controller
{
    public function index()
    {
        $ventas = DB::table('ventas')
        ->join('empleados', 'empleados.id', '=', 'id_empleado')
        ->join('clientes', 'clientes.id', '=', 'id_cliente')
        ->join('almacens', 'almacens.id', '=', 'id_almacen')
        ->select('ventas.*',
                 'empleados.nombre as empleado',
                 'clientes.nombre as cliente',
                 'almacens.codigo as almacen'
                )
        ->orderBy('ventas.estado','desc')
        ->orderBy('numero','asc')
        ->where('ventas.eliminado',0)->get();

        return view('sprint3/salida.index', compact('ventas'));
    }
}
