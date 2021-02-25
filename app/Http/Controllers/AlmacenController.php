<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Almacen;
use App\Sucursal;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AlmacenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $almacens = DB::table('almacens')
        ->join('sucursals', 'sucursals.id', '=', 'sucursal')
        ->select('almacens.*',
                 'sucursals.descripcion as nombresucursal'
                )
        ->orderBy('almacens.codigo')
        ->paginate(10);

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
        $sucursals = Sucursal::all();
        return view('sprint1/almacens.create',compact('almacen','sucursals'));
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
            ->with('info', 'Almacén guardado con éxito');
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
            ->with('info', 'Almacén guardado con éxito');
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
        
        Log::info( 'Producto eliminado: ' .$mensaje->id . ' ' . $mensaje->decripcion . ' ' . $mensaje->codigo );
        return back()->with('info', 'Eliminado correctamente');
    }
}
