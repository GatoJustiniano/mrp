<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacto;
use App\Proveedor;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ContactoController extends Controller
{
    public function index()
    {
        $contactos = DB::table('contactos')
        ->join('proveedors', 'proveedors.id', '=', 'id_proveedor')
        ->select('contactos.*',
                 'proveedors.nombre as proveedor'
                )
        ->orderBy('nombre')
        ->paginate(15);

        return view('sprint2/contacto.index', compact('contactos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacto      = Contacto::first();
        $proveedores     = Proveedor::orderBy('nombre', 'asc')->get();

        return view('sprint2/contacto.create', compact('contacto', 'proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contacto = Contacto::create($request->all());

        return redirect()->route('contactos.show', $contacto->id)
            ->with('info', 'Contacto guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contacto   = Contacto::find($id);
        $proveedor  = Proveedor::find($contacto->id_proveedor);

        return view('sprint2/contacto.show', compact('contacto','proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacto      = Contacto::find($id);
        $proveedores   = Proveedor::orderBy('nombre', 'asc')->get();

        return view('sprint2/contacto.edit', compact('contacto','proveedores'));
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
        $contacto = Contacto::find($id);
        $contacto->nombre = $request->input('nombre');
        $contacto->cargo = $request->input('cargo');
        $contacto->telefono = $request->input('telefono');
        $contacto->celular = $request->input('celular');
        $contacto->correo = $request->input('correo');
        $contacto->nota = $request->input('nota');
        
        $contacto->id_proveedor = $request->input('id_proveedor');

        $contacto->estado = $request->input('estado');
        $contacto->save();

        return redirect()->route('contactos.edit', $contacto->id)
            ->with('info', 'Contacto guardado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mensaje = Contacto::find($id);

        //Cambia el estado  eliminado del contacto
        $contacto = Contacto::find($id);
        $contacto->eliminado = true;

        //Cambia el estado eliminado de las areas dependientes de este contacto
        DB::table('areas')->where('departamento_id',$contacto->id)->update(['eliminado'=>true]);

        Log::info( 'Contacto eliminado: ' .$mensaje->id . ' ' . $mensaje->nombre . ' ' . $mensaje->codigo );
        $contacto->save();

        return back()->with('info', 'Eliminado correctamente');
    }
}
