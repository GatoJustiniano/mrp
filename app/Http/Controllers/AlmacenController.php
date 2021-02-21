<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Almacen;
use App\Sucursal;
use Illuminate\Support\Facades\Log;

class AlmacenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $almacens = Almacen::paginate();

        return view('sprint1/almacens.index', compact('almacens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $almacen = Almacen::first();
        // $estados = Estado::orderBy('id_estado', 'desc')->pluck('tipo_estado', 'id_estado');
        $sucursals = Sucursal::all();
      //  $sucursals = Sucursal::orderBy('id', 'desc')->pluck('descripcion', 'id');
        //return view('sucursals.create');
        return view('sprint1/almacens.create',compact('almacen','sucursals'));
        //return view('almacens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $almacen = Almacen::create($request->all());
        $sucursals = Sucursal::all();

        return redirect()->route('almacens.index', $almacen->id)
            ->with('info', 'Rol guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $almacen = Almacen::find($id);

        return view('sprint1/almacens.show', compact('almacen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $almacen = Almacen::find($id);
        $sucursals = Sucursal::all();
        return view('sprint1/almacens.edit', compact('almacen','sucursals'));
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
        $almacen = Almacen::find($id);
        $almacen->codigo = $request->input('codigo');
        $almacen->descripcion = $request->input('description');
        $almacen->id_sucursal = $request->input('id_sucursal');
        $almacen->save();

        return redirect()->route('almacens.edit', $almacen->id)
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
        $mensaje = Almacen::find($id);
        $almacen = Almacen::find($id)->delete();
        
        Log::info( 'Producto eliminado: ' .$mensaje->id . ' ' . $mensaje->name . ' ' . $mensaje->description );
        return back()->with('info', 'Eliminado correctamente');
    }
}
