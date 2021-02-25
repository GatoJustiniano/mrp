<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\SubCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SubCategoriaController extends Controller
{
    public function index()
    {
        $sub_categorias = SubCategoria::where('eliminado',false)->paginate(3);

        return view('inventario/sub_categoria.index', compact('sub_categorias'));
    }

    public function create()
    {
        $categorias = Categoria::all()->where('eliminado','=','false');
        $sub_categorias = SubCategoria::first();
        return view('inventario/sub_categoria.create', compact('sub_categorias'), compact('categorias'));
    }

    public function store(Request $request)
    {
        $sub_categoria = SubCategoria::create($request->all());

        return redirect()->route('sub_categorias.edit', $sub_categoria->id)
            ->with('info', 'Sub Categoria guardada con éxito');
    }

    public function edit($id)
    {
        $sub_categoria = SubCategoria::find($id);
        $categorias = Categoria::all()->where('eliminado','=','false');
        return view('inventario/sub_categoria.edit', compact('sub_categoria'), compact('categorias'));
    }


    public function show($id)
    {
        $sub_categoria = SubCategoria::find($id);
        return view('inventario/sub_categoria.show', compact('sub_categoria'));
    }

    public function update(Request $request, $id)
    {
        $sub_categoria = SubCategoria::find($id);
        $sub_categoria->nombre = $request->input('nombre');

        $sub_categoria->categoria_id= $request->input('categoria_id');
        $sub_categoria->save();

        return redirect()->route('sub_categorias.edit', $sub_categoria->id)
            ->with('info', 'Sub Categoria guardada con éxito');
    }

    public function destroy($id)
    {

        $mensaje = SubCategoria::find($id);
        $sub_categoria = SubCategoria::find($id);
        $sub_categoria->eliminado= true;
        $sub_categoria->save();

        Log::info( 'Area eliminada: ' .$mensaje->id . ' ' . $mensaje->nombre  );
        return back()->with('info', 'Eliminado correctamente');
    }
}
