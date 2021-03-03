<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;

use App\Cliente;
use App\Empleado;

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
        ->orderBy('numero')
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
        $pedido         = Pedido::first();

        $date = Carbon::now();
        $date = $date->format('d-m-Y');

        $empleados      = Empleado::orderBy('nombre', 'asc')->get();
        $clientes       = Cliente::orderBy('nombre', 'asc')->get();

        return view('sprint3/pedido.create', compact('pedido', 'empleados' ,'clientes', 'date'));
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

        $pedido     = Pedido::create($request->all());
        $mensaje    = $pedido;
        Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Pedido creado, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );

        return redirect()->route('pedidos.show', $pedido->id)
            ->with('info', 'Pedido guardado con éxito');
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
        return view('sprint3/pedido.show', compact('pedido','empleado','cliente'));
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
        $pedido->numero = $request->input('numero');
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
