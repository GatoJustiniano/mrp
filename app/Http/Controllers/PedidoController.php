<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\PedidoDetalle;

use App\Cliente;
use App\Empleado;
use App\Articulo;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;

class PedidoController extends Controller
{
    public function byCliente($id)
    {   
        return Cliente::where('id', $id)->get();
    }
    public function byEmpleado($id)
    {   
        return Empleado::where('id', $id)->get();
    }

    public function index()
    {
        $pedidos = DB::table('pedidos')
        ->join('empleados', 'empleados.id', '=', 'id_empleado')
        ->join('clientes', 'clientes.id', '=', 'id_cliente')
        ->select('pedidos.*',
                 'empleados.nombre as empleado',
                 'clientes.nombre as cliente'
                )
        ->orderBy('pedidos.estado','desc')
        ->orderBy('numero','asc')
        ->where('pedidos.eliminado',0)
        ->paginate(5);

        return view('sprint3/pedido.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nropedido      = Carbon::now();
        $nropedido      = $nropedido->format('YmdHi');

        $date = Carbon::now();
        $limite = $date->format('Y-m-d');
        $date = $date->format('d-m-Y');

        $empleados = DB::table('empleados')
        ->join('cargos', 'cargos.id', '=', 'id_cargo')
        ->select('empleados.*')
        ->orderBy('empleados.nombre','asc')
        ->where('cargos.nombre','Promotor')->get();

        $clientes       = Cliente::orderBy('nombre', 'asc')->get();
        $articulos      = Articulo::all();

        return view('sprint3/pedido.create', compact('nropedido', 'empleados' ,'clientes', 'date', 'limite' , 'articulos'));
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
            $pedido     = Pedido::create([
                "numero" => $input["numero"],
                "fecha_entrega" => $input["fecha_entrega"],
                "id_cliente" => $input["id_cliente"],
                "id_empleado" => $input["id_empleado"],
                "id_cliente" => $input["id_cliente"],
                "observaciones" => $input["observaciones"],
                "estado" => $input["estado"],
                "monto_total" => $this->calcular_precio($input["insumo_id"], $input["cantidades"]),
            ]);

            foreach($input["insumo_id"] as $key => $value){
                PedidoDetalle::create([
                    "id_articulo"=>$value,
                    "id_pedido"=>$pedido->id,
                    "cantidad" => $input["cantidades"][$key]
                ]);

                $ins = Articulo::find($value);
                $ins->update(["cantidad_minima"=> $ins->cantidad_minima - $input["cantidades"][$key]]);
            }
            
            DB::commit();
            $mensaje    = $pedido;
            Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Pedido creado, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );

            return redirect()->route('pedidos.show', $pedido->id)
            ->with('info', 'Pedido guardado con éxito');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('pedidos.index')->with('info', $e->getMessage());
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
        $pedido         = Pedido::find($id);
        $empleado      = Empleado::find($pedido->id_empleado);
        
        $cliente        = Cliente::find($pedido->id_cliente);

        $articulos = DB::table('pedido_detalles')
        ->join('pedidos', 'pedidos.id', '=', 'id_pedido')
        ->join('articulos', 'articulos.id', '=', 'pedido_detalles.id_articulo')
        ->join('unidad_medidas', 'unidad_medidas.id', '=', 'articulos.unidad_medida_id')
        ->select('pedido_detalles.*',
                 'articulos.nombre as articulo',
                 'articulos.precio_venta as precio',
                 'unidad_medidas.abreviatura as abreviatura'
                )
        ->orderBy('articulos.nombre')
        ->where('pedido_detalles.id_pedido','=',$id)
        ->paginate(5);

        $periodo = $pedido->created_at;
        $periodo = $periodo->diffInDays($pedido->fecha_entrega);

        $dias = Carbon::now();
        $dias = $dias->diffInDays($pedido->fecha_entrega);
        return view('sprint3/pedido.show', compact('pedido','empleado','cliente','articulos','dias','periodo'));
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

        $pedido = DB::table('pedidos')
        ->join('empleados', 'empleados.id', '=', 'id_empleado')
        ->join('cliente', 'cliente.id', '=', 'id_cliente')
        ->where('pedidos.id','=',$id)
        ->select('pedidos.*',
                 'empleados.nombre as empleado',
                 'cliente.nombre as cliente'
                )->first();

        $clientes       = Cliente::orderBy('nombre', 'asc')->get();
        $empleados      = Empleado::orderBy('nombre', 'asc')->get();

        $mensaje    = $pedido;
        Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Pedido editado, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );
        return view('sprint3/pedido.edit', compact('pedido','clientes','empleados'));
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
        $pedido = Pedido::find($id);
        $pedido->fecha_entrega = $request->input('fecha_entrega');

        $pedido->id_cliente = $request->input('id_cliente');
        $pedido->id_empleado = $request->input('id_empleado');

        $pedido->monto_total = $request->input('monto_total');
        $pedido->observaciones = $request->input('observaciones');
        $pedido->estado = $request->input('estado');
    
        $pedido->save();

        return redirect()->route('pedidos.edit', $pedido->id)
            ->with('info', 'Pedido guardado con éxito');
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

        $pedido = Pedido::find($id);

        $mensaje = Pedido::find($id);
        $darBaja    ="200"; 
        $darAlta    ="400";
        $eliminado  ="600";
        if($tipo === $darBaja){
            //si es 200 de da de baja
            $pedido->estado = false;
            Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Pedido dado de baja, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );
            
            $pedido->save();

            return back()->with('info', 'Dado de baja correctamente');
        }
        if($tipo === $darAlta){
            //si es 400 dar Alta
            $pedido->estado = true;
            Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Pedido dado de alta, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );
            $pedido->save();

            return back()->with('info', 'Dado de alta correctamente');
        }
        if($tipo === $eliminado){
            //si es 400 de cambia el eliminado
            $pedido->eliminado = true;

            //Cambia el estado eliminado de las areas dependientes de este pedido
            //DB::table('areas')->where('departamento_id',$pedido->id)->update(['eliminado'=>true]);

            Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Pedido eliminado, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );
            $pedido->save();

            return back()->with('info', 'Eliminado correctamente');
        }
        
    }
}
