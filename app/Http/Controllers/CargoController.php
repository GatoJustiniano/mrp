<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cargo;
use Illuminate\Support\Facades\Log;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = Cargo::paginate();

        return view('sprint1/cargos.index', compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
     
        $cargo = Cargo::first();

        return view('sprint1/cargos.create',compact('cargo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cargo = Cargo::create($request->all());
        return redirect()->route('cargos.index', $cargo->id)
            ->with('info', 'Cargo se ha guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cargo = Cargo::find($id);

        return view('sprint1/cargos.show', compact('cargo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cargo = Cargo::find($id);
        return view('sprint1/cargos.edit', compact('cargo'));
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
        $cargo = Cargo::find($id); 
        $cargo->codigo = $request->input('codigo');
        $cargo->nombre = $request->input('nombre');
        $cargo->descripcion = $request->input('descripcion');
        $cargo->estado = $request->input('estado');
     
        $cargo->save();

        return redirect()->route('cargos.edit', $cargo->id)
            ->with('info', 'Cargo guardado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mensaje = Cargo::find($id);
        $cargo = Cargo::find($id)->delete();
        
        Log::info( 'Producto eliminado: ' .$mensaje->id . ' ' . $mensaje->nombre . ' ' . $mensaje->descripcion );
        return back()->with('info', 'Eliminado correctamente');
    }
}
