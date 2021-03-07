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

class CompraController extends Controller
{
    public function byProveedor($id)
    {   
        return Proveedor::where('id', $id)->get();
    }

    public function index()
    {
        $compras = DB::table('compras')
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

        return view('sprint3/compra.index', compact('compras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nrocompra      = Carbon::now();
        $nrocompra      = $nrocompra->format('YmdHi');

        $date = Carbon::now();
        $limite = $date->format('Y-m-d');
        $date = $date->format('d-m-Y');

        $empleados = DB::table('empleados')
        ->join('cargos', 'cargos.id', '=', 'id_cargo')
        ->select('empleados.*')
        ->orderBy('empleados.nombre','asc')
        ->where('cargos.nombre','Promotor')->get();

        $proveedores    = Proveedor::orderBy('nombre', 'asc')->get();
        $Sucursal       = Sucursal::orderBy('descripcion', 'asc')->get();
        $articulos      = Articulo::all();
        $sucursales     = Sucursal::all();

        return view('sprint3/compra.create', compact('nrocompra', 'empleados' ,'proveedores', 'date', 'limite' , 'articulos','sucursales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ip = request()->server();
        $user =auth()->user();


        $input = $request->all();
        try {
            DB::beginTransaction();
            $compra     = Compra::create([
                "numero" => $input["numero"],
                "fecha_entrega" => $input["fecha_entrega"],
                "id_proveedor" => $input["id_proveedor"],
                "id_empleado" => $input["id_empleado"],
                "id_almacen" => $input["id_almacen"],
                "estado" => $input["estado"],
                "monto_total" => $this->calcular_precio($input["insumo_id"], $input["cantidades"]),
            ]);
            $ingreso = Ingreso::create([
                "numero" => $input["numero"],
                "estado" => $input["estado"],
            ]);

            foreach($input["insumo_id"] as $key => $value){
                IngresoDetalle::create([
                    "id_articulo"=>$value,
                    "id_compra"=>$compra->id,
                    "id_ingreso"=>$ingreso->id,
                    "cantidad" => $input["cantidades"][$key]
                ]);
                /*
                $ins = Articulo::find($value);
                $ins->update(["cantidad_minima"=> $ins->cantidad_minima - $input["cantidades"][$key]]);
                */
            }
            
            DB::commit();
            $mensaje    = $compra;
            Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Compra creada, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );

            return redirect()->route('compras.show', $compra->id)
            ->with('info', 'Compra guardada con éxito');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('compras.index')->with('info', $e->getMessage());
        }
    }

    public function calcular_precio($articulos, $cantidades)
    {
        $precio = 0;
        foreach ($articulos as $key => $value) {
            $articulo = Articulo::find($value);
            $precio += ($articulo->precio_venta * $cantidades[$key]);
        }
        return $precio;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compra         = Compra::find($id);
        $empleado      = Empleado::find($compra->id_empleado);
        
        $proveedor        = Proveedor::find($compra->id_proveedor);
        $almacen        = Almacen::find($compra->id_almacen);

        $articulos = DB::table('ingreso_detalles')
        ->join('compras', 'compras.id', '=', 'id_compra')
        ->join('articulos', 'articulos.id', '=', 'ingreso_detalles.id_articulo')
        ->join('unidad_medidas', 'unidad_medidas.id', '=', 'articulos.unidad_medida_id')
        ->select('ingreso_detalles.*',
                 'articulos.nombre as articulo',
                 'articulos.precio_venta as precio',
                 'unidad_medidas.abreviatura as abreviatura'
                )
        ->orderBy('articulos.nombre')
        ->where('ingreso_detalles.id_compra','=',$id)
        ->paginate(5);

        $periodo = $compra->created_at;
        $periodo = $periodo->diffInDays($compra->fecha_entrega);

        $dias = Carbon::now();
        $dias = $dias->diffInDays($compra->fecha_entrega);
        return view('sprint3/compra.show', compact('compra','empleado','proveedor', 'almacen' ,'articulos','dias','periodo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ip = request()->server();
        $user =auth()->user();

        $compra = DB::table('compras')
        ->join('empleados', 'empleados.id', '=', 'id_empleado')
        ->join('proveedors', 'proveedors.id', '=', 'id_proveedor')
        ->where('compras.id','=',$id)
        ->select('compras.*',
                 'empleados.nombre as empleado',
                 'proveedors.nombre as proveedors'
                )->first();

        $proveedores       = Proveedor::orderBy('nombre', 'asc')->get();
        $empleados      = Empleado::orderBy('nombre', 'asc')->get();

        $mensaje    = $compra;
        Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Compra editada, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );
        return view('sprint3/compra.edit', compact('compra','proveedores','empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $compra = Compra::find($id);
        $compra->fecha_entrega = $request->input('fecha_entrega');

        $compra->id_proveedor = $request->input('id_proveedor');
        $compra->id_empleado = $request->input('id_empleado');
        $compra->id_almacen = $request->input('id_almacen');

        $compra->monto_total = $request->input('monto_total');
        $compra->id_almacen = $request->input('id_almacen');
        $compra->estado = $request->input('estado');
    
        $compra->save();

        return redirect()->route('compras.edit', $compra->id)
            ->with('info', 'Compra guardada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$tipo)
    {
        $ip = request()->server();
        $user =auth()->user();

        $compra = Compra::find($id);

        $mensaje = Compra::find($id);
        $darBaja    ="200"; 
        $darAlta    ="400";
        $eliminado  ="600";
        if($tipo === $darBaja){
            //si es 200 de da de baja
            $compra->estado = false;
            Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Compra dado de baja, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );
            
            $compra->save();

            return back()->with('info', 'Dado de baja correctamente');
        }
        if($tipo === $darAlta){
            //si es 400 dar Alta
            $compra->estado = true;
            Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Compra dado de alta, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );
            $compra->save();

            return back()->with('info', 'Dado de alta correctamente');
        }
        if($tipo === $eliminado){
            //si es 400 de cambia el eliminado
            $compra->eliminado = true;

            //Cambia el estado eliminado de las compras dependientes de este compra

            Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Compra eliminado, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );
            $compra->save();

            return back()->with('info', 'Eliminado correctamente');
        }
        
    }
}
