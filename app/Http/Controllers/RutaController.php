<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Operacione;
use App\Ruta;
use App\RutaDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RutaController extends Controller
{

    public function index()
    {
        $rutas = DB::table('rutas')
            ->join('articulos', 'articulos.id', '=', 'id_articulo')
            ->select('rutas.*',
                'articulos.nombre as articulo'
            )
            ->orderBy('codigo','asc')
            ->where('rutas.eliminado',0)
            ->paginate(5);

        return view('sprint4/ruta.index', compact('rutas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $operaciones    =DB::table('operaciones')
            ->join('cproducciones', 'cproducciones.id', '=', 'centroproduccion')
            ->select('operaciones.*',
                'cproducciones.nombre as cproduccion'
            )
            ->orderBy('codigo','asc')
            ->where('operaciones.eliminado',0)
            ->paginate(5);
        $articulos      = Articulo::all();

        return view('sprint4/ruta.create', compact( 'operaciones' ,'articulos'));
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
            $ruta     = Ruta::create([
                "codigo" => $input["codigo"],
                "nombre" => $input["nombre"],
                "id_articulo" => $input["id_articulo"],
                "duracion_total" => $this->calcular_duracion($input["insumo_id"]),
                "estado" => $input["estado"],
                "costo_total" => $this->calcular_precio($input["insumo_id"]),
            ]);

            foreach($input["insumo_id"] as $key => $value){
                RutaDetalle::create([
                    "id_operacion"=>$value,
                    "id_ruta"=>$ruta->id
                ]);
            }

            DB::commit();
            $mensaje    = $ruta;
            Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Pedido creado, id: ' .$mensaje->id . ', Codigo: ' . $mensaje->codigo . ' ' );

            return redirect()->route('rutas.show', $ruta->id)
                ->with('info', 'Ruta guardada con éxito');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('rutas.index')->with('info', $e->getMessage());
        }
    }

    public function calcular_precio($articulos)
    {
        $precio = 0;
        foreach ($articulos as $key => $value) {
            $articulo = Articulo::find($value);
            $precio += ($articulo->precio_venta);
        }
        return $precio;
    }
    public function calcular_duracion($operaciones)
    {
        $duracion = 0;
        foreach ($operaciones as $key => $value) {
            $operacione = Operacione::find($value);
            $duracion += ($operacione->duracion);
        }
        return $duracion;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ruta         = Ruta::find($id);
        $articulo      = Articulo::find($ruta->id_articulo);

        $operaciones = DB::table('ruta_detalles')
            ->join('rutas', 'rutas.id', '=', 'id_ruta')
            ->join('operaciones', 'operaciones.id', '=', 'ruta_detalles.id_operacion')
            ->join('cproducciones', 'cproducciones.id', '=', 'operaciones.centroproduccion')
            ->select('ruta_detalles.*',
                'operaciones.nombre as operacion',
                'operaciones.duracion as duracion',
                'operaciones.costoduracion as costoduracion',
                'cproducciones.nombre as cproduccion'
            )
            ->orderBy('operaciones.nombre')
            ->where('ruta_detalles.id_ruta','=',$id)
            ->paginate(5);



        return view('sprint4/ruta.show', compact('ruta','articulo','operaciones'));
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

        $pedido->costo_total = $request->input('monto_total');
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

        $ruta = Ruta::find($id);

        $mensaje = Ruta::find($id);
        $darBaja    ="200";
        $darAlta    ="400";
        $eliminado  ="600";
        if($tipo === $darBaja){
            //si es 200 de da de baja
            $ruta->estado = false;
            Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Pedido dado de baja, id: ' .$mensaje->id . ', codigo: ' . $mensaje->codigo . ' ' );

            $ruta->save();

            return back()->with('info', 'Dado de baja correctamente');
        }
        if($tipo === $darAlta){
            //si es 400 dar Alta
            $ruta->estado = true;
            Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Pedido dado de alta, id: ' .$mensaje->id . ', codigo: ' . $mensaje->codigo . ' ' );
            $ruta->save();

            return back()->with('info', 'Dado de alta correctamente');
        }
        if($tipo === $eliminado){
            //si es 400 de cambia el eliminado
            $ruta->eliminado = true;

            //Cambia el estado eliminado de las areas dependientes de este pedido
            //DB::table('areas')->where('departamento_id',$pedido->id)->update(['eliminado'=>true]);

            Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Pedido eliminado, id: ' .$mensaje->id . ', codigo: ' . $mensaje->codigo . ' ' );
            $ruta->save();

            return back()->with('info', 'Eliminado correctamente');
        }

    }

}
