<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoriaController extends Controller
{

    public function index()
    {
        $categorias = Categoria::where('eliminado',false)->paginate();

        return view('inventario/categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario/categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = Categoria::create($request->all());
        Log::info( 'Categoria añadida: ' .$categoria->id . ' ' . $categoria->nombre . ' ' . $categoria->codigo );
        return redirect()->route('categorias.show', $categoria->id)
            ->with('info', 'Categoria guardada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);

        return view('inventario/categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);

        return view('inventario/categorias.edit', compact('categoria'));
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
        $categoria = Categoria::find($id);
        $nombrea= $categoria->nombre;
        $categoria->nombre = $request->input('nombre');
        $categoria->save();
        Log::info( 'Categoria modificada: ' .$categoria->id . ' '. $nombrea .' a ' . $categoria->nombre  );
        return redirect()->route('categorias.edit', $categoria->id)
            ->with('info', 'Categoria guardada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mensaje = Categoria::find($id);

        //Cambia el estado  eliminado del departamento
        $categoria = Categoria::find($id);
        $categoria->eliminado = true;

        Log::info( 'Categoria eliminada: ' .$mensaje->id . ' ' . $mensaje->nombre . ' ' . $mensaje->codigo );
        $categoria->save();

        return back()->with('info', 'Eliminado correctamente');
    }
}
