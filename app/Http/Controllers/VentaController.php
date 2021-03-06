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

class VentaController extends Controller
{
    public function byAlmacen($id)
    {   
        return Almacen::where('sucursal', $id)->get();
    }

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
        ->where('ventas.eliminado',0)
        ->paginate(5);

        return view('sprint3/venta.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nroventa      = Carbon::now();
        $nroventa      = $nroventa->format('YmdHi');

        $date = Carbon::now();
        $limite = $date->format('Y-m-d');
        $date = $date->format('d-m-Y');

        $empleados = DB::table('empleados')
        ->join('cargos', 'cargos.id', '=', 'id_cargo')
        ->select('empleados.*')
        ->orderBy('empleados.nombre','asc')
        ->where('cargos.nombre','Promotor')->get();

        $clientes       = Cliente::orderBy('nombre', 'asc')->get();
        $Sucursal       = Sucursal::orderBy('descripcion', 'asc')->get();
        $articulos      = Articulo::all();
        $sucursales     = Sucursal::all();

        return view('sprint3/venta.create', compact('nroventa', 'empleados' ,'clientes', 'date', 'limite' , 'articulos','sucursales'));
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
            $venta     = Venta::create([
                "numero" => $input["numero"],
                "fecha_entrega" => $input["fecha_entrega"],
                "id_cliente" => $input["id_cliente"],
                "id_empleado" => $input["id_empleado"],
                "id_cliente" => $input["id_cliente"],
                "id_almacen" => $input["id_almacen"],
                "estado" => $input["estado"],
                "monto_total" => $this->calcular_precio($input["insumo_id"], $input["cantidades"]),
            ]);
            $salida = Salida::create([
                "numero" => $input["numero"],
                "id_cliente" => $input["id_cliente"],
                "estado" => $input["estado"],
            ]);

            foreach($input["insumo_id"] as $key => $value){
                SalidaDetalle::create([
                    "id_articulo"=>$value,
                    "id_venta"=>$venta->id,
                    "id_salida"=>$salida->id,
                    "cantidad" => $input["cantidades"][$key]
                ]);
                /*
                $ins = Articulo::find($value);
                $ins->update(["cantidad_minima"=> $ins->cantidad_minima - $input["cantidades"][$key]]);
                */
            }
            
            DB::commit();
            $mensaje    = $venta;
            Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Venta creada, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );

            return redirect()->route('ventas.show', $venta->id)
            ->with('info', 'Venta guardada con éxito');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('ventas.index')->with('info', $e->getMessage());
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
        $venta         = Venta::find($id);
        $empleado      = Empleado::find($venta->id_empleado);
        
        $cliente        = Cliente::find($venta->id_cliente);
        $almacen        = Almacen::find($venta->id_almacen);

        $articulos = DB::table('salida_detalles')
        ->join('ventas', 'ventas.id', '=', 'id_venta')
        ->join('articulos', 'articulos.id', '=', 'salida_detalles.id_articulo')
        ->join('unidad_medidas', 'unidad_medidas.id', '=', 'articulos.unidad_medida_id')
        ->select('salida_detalles.*',
                 'articulos.nombre as articulo',
                 'articulos.precio_venta as precio',
                 'unidad_medidas.abreviatura as abreviatura'
                )
        ->orderBy('articulos.nombre')
        ->where('salida_detalles.id_venta','=',$id)
        ->paginate(5);

        $periodo = $venta->created_at;
        $periodo = $periodo->diffInDays($venta->fecha_entrega);

        $dias = Carbon::now();
        $dias = $dias->diffInDays($venta->fecha_entrega);
        return view('sprint3/venta.show', compact('venta','empleado','cliente', 'almacen' ,'articulos','dias','periodo'));
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

        $venta = DB::table('ventas')
        ->join('empleados', 'empleados.id', '=', 'id_empleado')
        ->join('cliente', 'cliente.id', '=', 'id_cliente')
        ->where('ventas.id','=',$id)
        ->select('ventas.*',
                 'empleados.nombre as empleado',
                 'cliente.nombre as cliente'
                )->first();

        $clientes       = Cliente::orderBy('nombre', 'asc')->get();
        $empleados      = Empleado::orderBy('nombre', 'asc')->get();

        $mensaje    = $venta;
        Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Venta editada, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );
        return view('sprint3/venta.edit', compact('venta','clientes','empleados'));
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
        $venta = Venta::find($id);
        $venta->fecha_entrega = $request->input('fecha_entrega');

        $venta->id_cliente = $request->input('id_cliente');
        $venta->id_empleado = $request->input('id_empleado');
        $venta->id_almacen = $request->input('id_almacen');

        $venta->monto_total = $request->input('monto_total');
        $venta->id_almacen = $request->input('id_almacen');
        $venta->estado = $request->input('estado');
    
        $venta->save();

        return redirect()->route('ventas.edit', $venta->id)
            ->with('info', 'Venta guardada con éxito');
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

        $venta = Venta::find($id);

        $mensaje = Venta::find($id);
        $darBaja    ="200"; 
        $darAlta    ="400";
        $eliminado  ="600";
        if($tipo === $darBaja){
            //si es 200 de da de baja
            $venta->estado = false;
            Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Venta dado de baja, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );
            
            $venta->save();

            return back()->with('info', 'Dado de baja correctamente');
        }
        if($tipo === $darAlta){
            //si es 400 dar Alta
            $venta->estado = true;
            Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Venta dado de alta, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );
            $venta->save();

            return back()->with('info', 'Dado de alta correctamente');
        }
        if($tipo === $eliminado){
            //si es 400 de cambia el eliminado
            $venta->eliminado = true;

            //Cambia el estado eliminado de las areas dependientes de este venta
            //DB::table('areas')->where('departamento_id',$venta->id)->update(['eliminado'=>true]);

            Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Venta eliminado, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );
            $venta->save();

            return back()->with('info', 'Eliminado correctamente');
        }
        
    }
}
