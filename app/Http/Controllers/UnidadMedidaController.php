<?php

namespace App\Http\Controllers;

use App\UnidadMedida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UnidadMedidaController extends Controller
{

    public function index()
    {
        $unidad_medidas = UnidadMedida::where('eliminado',false)->paginate();

        return view('inventario/unidad_medidas.index', compact('unidad_medidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario/unidad_medidas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unidad_medida = UnidadMedida::create($request->all());

        return redirect()->route('unidad_medidas.show', $unidad_medida->id)
            ->with('info', 'Unidad de Medida guardada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unidad_medida = UnidadMedida::find($id);

        return view('inventario/unidad_medidas.show', compact('unidad_medida'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unidad_medida = UnidadMedida::find($id);

        return view('inventario/unidad_medidas.edit', compact('unidad_medida'));
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
        $unidad_medida = UnidadMedida::find($id);
        $unidad_medida->nombre = $request->input('nombre');
        $unidad_medida->abreviatura = $request->input('abreviatura');
        $unidad_medida->save();

        return redirect()->route('unidad_medidas.edit', $unidad_medida->id)
            ->with('info', 'Unidad de Medida guardada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mensaje = UnidadMedida::find($id);

        //Cambia el estado  eliminado del departamento
        $unidad_medida = UnidadMedida::find($id);
        $unidad_medida->eliminado = true;

        Log::info( 'Unidad de Medida eliminada: ' .$mensaje->id . ' ' . $mensaje->nombre . ' ' . $mensaje->codigo );
        $unidad_medida->save();

        return back()->with('info', 'Eliminado correctamente');
    }
}
