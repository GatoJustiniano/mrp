<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sucursal;
use App\Estado;
//use Caffeinated\Shinobi\Models\Estado;

use Illuminate\Support\Facades\Log;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucursals = Sucursal::paginate();

        return view('sprint1/sucursals.index', compact('sucursals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
     
        $sucursal = Sucursal::first();
       // $estados = Estado::orderBy('id_estado', 'desc')->pluck('tipo_estado', 'id_estado');
       $estados = Estado::all();
        //return view('sucursals.create');
        return view('sprint1/sucursals.create',compact('sucursal','estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sucursal = Sucursal::create($request->all());
        $estados = Estado::all();
          //dd($sucursal);
        return redirect()->route('sucursals.index', $sucursal->id)
            ->with('info', 'Sucursal se ha guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sucursal = Sucursal::find($id);

        return view('sprint1/sucursals.show', compact('sucursal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sucursal = Sucursal::find($id);
       // $estados = Estado::orderBy('id_estado', 'desc')->pluck('tipo_estado', 'id_estado');
        //return view('sucursals.create');
        $estados = Estado::all();
        return view('sprint1/sucursals.edit', compact('sucursal','estados'));
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
        $sucursal = Sucursal::find($id);
        //dd($sucursal);
    


        $sucursal->codigo = $request->input('codigo');
        $sucursal->descripcion = $request->input('descripcion');
        $sucursal->direccion = $request->input('direccion');
        $sucursal->estado = $request->input('estado');
     
        $sucursal->save();

        return redirect()->route('sucursals.edit', $sucursal->id)
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
        $mensaje = Sucursal::find($id);
        $sucursal = Sucursal::find($id)->delete();
        
        Log::info( 'Producto eliminado: ' .$mensaje->id . ' ' . $mensaje->name . ' ' . $mensaje->description );
        return back()->with('info', 'Eliminado correctamente');
    }
}
