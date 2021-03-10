<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operacione;
use App\Cproduccione;
use App\Estado;
//use Caffeinated\Shinobi\Models\Estado;

use Illuminate\Support\Facades\Log;

class OperacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operaciones = Operacione::paginate();

        return view('sprint4/operaciones.index', compact('operaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
     
        $operacione = Operacione::first();
       // $estados = Estado::orderBy('id_estado', 'desc')->pluck('tipo_estado', 'id_estado');
       $cproducciones = Cproduccione::all();
        //return view('sucursals.create');
        return view('sprint4/operaciones.create',compact('operacione','cproducciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $operacione = Operacione::create($request->all());
        $cproducciones = Cproduccione::all();
        //dd($operacione);
        return redirect()->route('operaciones.index', $operacione->id)
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
        $operacione = Operacione::find($id);

        return view('sprint4/operaciones.show', compact('operacione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operacione = Operacione::find($id);
       // $estados = Estado::orderBy('id_estado', 'desc')->pluck('tipo_estado', 'id_estado');
        //return view('sucursals.create');
       // $estados = Estado::all();
        return view('sprint4/operaciones.edit', compact('operacione'));
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
        $operacione = Operacione::find($id);
        //dd($sucursal);
    
        $operacione->codigo = $request->input('codigo');
        $operacione->nombre = $request->input('nombre');
        $operacione->cproduccione = $request->input('cproduccione');
      
        $operacione->duracion = $request->input('duracion');
        $operacione->costoduracion = $request->input('costoduracion');
        $operacione->descripcion = $request->input('descripcion');
    
        
     
     
        $operacione->save();

        return redirect()->route('operaciones.index', $operacione->id)
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
        $mensaje = Operacione::find($id);
        $operacione = Operacione::find($id)->delete();
        
        Log::info( 'Operacione eliminado: ' .$mensaje->id . ' ' . $mensaje->name . ' ' . $mensaje->description );
        return back()->with('info', 'Eliminado correctamente');
    }
}
