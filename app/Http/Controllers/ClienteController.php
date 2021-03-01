<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

use App\Estado;
use App\Provincia;
use App\Municipio;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = DB::table('clientes')
        ->join('municipio', 'municipio.id', '=', 'id_municipio')
        ->select('clientes.*',
                 'municipio.nombre as municipio'
                )
        ->orderBy('codigo')
        ->where('clientes.eliminado',0)
        ->paginate(5);

        return view('sprint3/cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente      = Cliente::first();
        $estados        = Estado::orderBy('nombre', 'asc')->get();

        $municipios     = Municipio::orderBy('nombre', 'asc')->get();

        return view('sprint3/cliente.create', compact('cliente', 'estados' ,'municipios'));
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

        $cliente = Cliente::create($request->all());
        $mensaje   = $cliente;
        Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Cliente creado, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );

        return redirect()->route('clientes.show', $cliente->id)
            ->with('info', 'Cliente guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente        = Cliente::find($id);
        $municipio      = Municipio::find($cliente->id_municipio);
        
        $provincia      = Provincia::find($municipio->id_provincia);
        $estado         = Estado::find($provincia->id_estado);
        return view('sprint3/cliente.show', compact('cliente','municipio','provincia','estado'));
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

        $cliente = DB::table('clientes')
        ->join('municipio', 'municipio.id', '=', 'id_municipio')
        ->join('provincia', 'provincia.id', '=', 'municipio.id_provincia')
        ->where('clientes.id','=',$id)
        ->select('clientes.*',
                 'municipio.nombre as municipio',
                 'provincia.nombre as provincia',
                 'provincia.id as id_provincia',
                 'provincia.id_estado as id_estado'
                )->first();
        $municipios     = Municipio::orderBy('nombre', 'asc')->get();
        $estados        = Estado::orderBy('nombre', 'asc')->get();

        $mensaje    = $cliente;
        Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Cliente editado, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );
        return view('sprint3/cliente.edit', compact('cliente','municipios','estados'));
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
        $cliente = Cliente::find($id);
        $cliente->codigo = $request->input('codigo');
        $cliente->identificacion = $request->input('identificacion');
        $cliente->nombre = $request->input('nombre');
        $cliente->imagen = $request->input('imagen');
        $cliente->telefono = $request->input('telefono');
        $cliente->celular = $request->input('celular');
        $cliente->correo = $request->input('correo');
        $cliente->direccion = $request->input('direccion');
        
        $cliente->id_municipio = $request->input('id_municipio');

        $cliente->estado = $request->input('estado');
        $cliente->save();

        return redirect()->route('clientes.edit', $cliente->id)
            ->with('info', 'Cliente guardado con éxito');
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

        $cliente = Cliente::find($id);

        $mensaje = Cliente::find($id);
        $darBaja    ="200"; 
        $darAlta    ="400";
        $eliminado  ="600";
        if($tipo === $darBaja){
            //si es 200 de da de baja
            $cliente->estado = false;
            Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Cliente dado de baja, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );
            
            $cliente->save();

            return back()->with('info', 'Dado de baja correctamente');
        }
        if($tipo === $darAlta){
            //si es 400 dar Alta
            $cliente->estado = true;
            Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Cliente dado de alta, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );
            $cliente->save();

            return back()->with('info', 'Dado de alta correctamente');
        }
        if($tipo === $eliminado){
            //si es 400 de cambia el eliminado
            $cliente->eliminado = true;

            //Cambia el estado eliminado de las areas dependientes de este cliente
            //DB::table('areas')->where('departamento_id',$cliente->id)->update(['eliminado'=>true]);

            Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Cliente eliminado, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );
            $cliente->save();

            return back()->with('info', 'Eliminado correctamente');
        }
        
    }
}
