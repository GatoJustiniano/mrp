<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cproduccione;
use App\Estado;
//use Caffeinated\Shinobi\Models\Estado;

use Illuminate\Support\Facades\Log;

class CproduccioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cproducciones = Cproduccione::paginate();

        return view('sprint4/cproducciones.index', compact('cproducciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
     
        $cproduccione = Cproduccione::first();
       // $estados = Estado::orderBy('id_estado', 'desc')->pluck('tipo_estado', 'id_estado');
       $estados = Estado::all();
        //return view('sucursals.create');
        return view('sprint4/cproducciones.create',compact('cproduccione','estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cproduccione = Cproduccione::create($request->all());
        $estados = Estado::all();
          //dd($sucursal);
        return redirect()->route('cproducciones.index', $cproduccione->id)
            ->with('info', 'operacione se ha guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cproduccione = Cproduccione::find($id);

        return view('sprint4/cproducciones.show', compact('cproduccione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cproduccione = Cproduccione::find($id);
       // $estados = Estado::orderBy('id_estado', 'desc')->pluck('tipo_estado', 'id_estado');
        //return view('sucursals.create');
       // $estados = Estado::all();
        return view('sprint4/cproducciones.edit', compact('cproduccione'));
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
        $cproduccione = Cproduccione::find($id);
        //dd($sucursal);
    

        $cproduccione->capacidad = $request->input('capacidad');
        $cproduccione->codigo = $request->input('codigo');
        $cproduccione->costoadicional = $request->input('costoadicional');
        $cproduccione->costohora = $request->input('costohora');
        $cproduccione->descripcion = $request->input('descripcion');
    
        $cproduccione->estado = $request->input('estado');
        $cproduccione->nombre = $request->input('nombre');
     
        $cproduccione->save();

        return redirect()->route('cproducciones.index', $cproduccione->id)
            ->with('info', 'Rol guardado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mensaje = Cproduccione::find($id);
        $cproduccione = Cproduccione::find($id)->delete();
        
        Log::info( 'Centro Produccion eliminado: ' .$mensaje->id . ' ' . $mensaje->name . ' ' . $mensaje->description );
        return back()->with('info', 'Eliminado correctamente');
    }
}
