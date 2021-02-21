<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProveedorController extends Controller
{
use App\Proveedor;

use App\Estado;
use App\Provincia;
use App\Municipio;
use App\Contacto;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProveedorController extends Controller
{
    public function byEstado($id)
    {   
        return Provincia::where('id_estado', $id)->get();
    }
    public function byProvincia($id)
    {   
        return Municipio::where('id_provincia', $id)->get();
    }

    public function index()
    {
        $proveedores = DB::table('proveedors')
        ->join('municipio', 'municipio.id', '=', 'id_municipio')
        ->select('proveedors.*',
                 'municipio.nombre as municipio'
                )
        ->orderBy('codigo')
        ->where('proveedors.eliminado',1)
        ->paginate(15);

        return view('sprint2/proveedor.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedor      = Proveedor::first();
        $estados        = Estado::orderBy('nombre', 'asc')->get();

        $municipios     = Municipio::orderBy('nombre', 'asc')->get();

        return view('sprint2/proveedor.create', compact('proveedor', 'estados' ,'municipios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proveedor = Proveedor::create($request->all());
        $mensaje   = $proveedor;
        Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Proveedor creado, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );

        return redirect()->route('proveedores.show', $proveedor->id)
            ->with('info', 'Proveedor guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedor      = Proveedor::find($id);
        $municipio      = Municipio::find($proveedor->id_municipio);
        
        $provincia      = Provincia::find($municipio->id_provincia);
        $estado         = Estado::find($provincia->id_estado);
        $contactos      = Contacto::where('id_proveedor',$proveedor->id)->get();
        return view('sprint2/proveedor.show', compact('proveedor','municipio','provincia','estado','contactos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor = DB::table('proveedors')
        ->join('municipio', 'municipio.id', '=', 'id_municipio')
        ->join('provincia', 'provincia.id', '=', 'municipio.id_provincia')
        ->where('proveedors.id','=',$id)
        ->select('proveedors.*',
                 'municipio.nombre as municipio',
                 'provincia.nombre as provincia',
                 'provincia.id as id_provincia',
                 'provincia.id_estado as id_estado'
                )->first();
        $municipios     = Municipio::orderBy('nombre', 'asc')->get();
        $estados        = Estado::orderBy('nombre', 'asc')->get();

        $mensaje    = $proveedor;
        Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Proveedor editado, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );
        return view('sprint2/proveedor.edit', compact('proveedor','municipios','estados'));
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
        $proveedor = Proveedor::find($id);
        $proveedor->codigo = $request->input('codigo');
        $proveedor->nombre = $request->input('nombre');
        $proveedor->imagen = $request->input('imagen');
        $proveedor->direccion = $request->input('direccion');
        $proveedor->telefono = $request->input('telefono');
        $proveedor->correo = $request->input('correo');
        
        $proveedor->id_municipio = $request->input('id_municipio');

        $proveedor->estado = $request->input('estado');
        $proveedor->save();

        return redirect()->route('proveedores.edit', $proveedor->id)
            ->with('info', 'Proveedor guardado con éxito');
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

        $proveedor = Proveedor::find($id);

        $mensaje = Proveedor::find($id);
        $darBaja    ="200"; 
        $darAlta    ="400";
        $eliminado  ="600";
        if($tipo === $darBaja){
            //si es 200 de da de baja
            $proveedor->estado = false;
            Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Proveedor dado de baja, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );
            
            $proveedor->save();

            return back()->with('info', 'Dado de baja correctamente');
        }
        if($tipo === $darAlta){
            //si es 400 dar Alta
            $proveedor->estado = true;
            Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Proveedor dado de alta, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );
            $proveedor->save();

            return back()->with('info', 'Dado de alta correctamente');
        }
        if($tipo === $eliminado){
            //si es 400 de cambia el eliminado
            $proveedor->eliminado = false;

            //Cambia el estado eliminado de las areas dependientes de este proveedor
            //DB::table('areas')->where('departamento_id',$proveedor->id)->update(['eliminado'=>true]);

            Log::info( 'IP DEL CLIENTE:'. $ip['REMOTE_ADDR'] . ' CLIENTE: '. $user->name . ' DESDE NAVEGADOR:'.$ip['HTTP_USER_AGENT'] . ' DESCRIPCIÓN: Proveedor eliminado, id: ' .$mensaje->id . ', Nombre: ' . $mensaje->nombre . ' ' );
            $proveedor->save();

            return back()->with('info', 'Eliminado correctamente');
        }
        
    }
}
