<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Proveedor;
use App\SubCategoria;
use App\UnidadMedida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArticuloController extends Controller
{
    public function index()
    {
        $articulos = Articulo::where('eliminado',false)->paginate();

        return view('inventario/articulo.index', compact('articulos'));
    }

    public function create()
    {
        $proveedors = Proveedor::all()->where('eliminado','=','false');
        $unidad_medidas = UnidadMedida::all()->where('eliminado','=','false');
        $sub_categorias = SubCategoria::all()->where('eliminado','=','false');
        $articulos = Articulo::first();
        return view('inventario/articulo.create', compact('articulos', 'sub_categorias'), compact('unidad_medidas', 'proveedors'));
    }

    public function store(Request $request)
    {





        $imageName = $_FILES['imagen']['name'];
        $file = $request->file('imagen');
        $file->move(public_path('imagenes'), $imageName);
        $request["imagen"]=$imageName;
        $articulo = Articulo::create($request->all());


        return redirect()->route('articulos.edit', $articulo->id )
            ->with('info', 'Articulo guardado con éxito.');
    }

    public function edit($id)
    {
        $articulo = Articulo::find($id);
        $sub_categorias = SubCategoria::all()->where('eliminado','=','false');
        $unidad_medidas = UnidadMedida::all()->where('eliminado','=','false');
        $proveedors = Proveedor::all()->where('eliminado','=','false');
        return view('inventario/articulo.edit',  compact('articulo', 'sub_categorias'), compact('unidad_medidas', 'proveedors'));
    }


    public function show($id)
    {
        $articulo = Articulo::find($id);
        return view('inventario/articulo.show', compact('articulo'));
    }

    public function update(Request $request, $id)
    {
        $articulo = Articulo::find($id);
        $articulo->nombre = $request->input('nombre');
        $articulo->cantidad_minima = $request->input('cantidad_minima');
        $articulo->codigo = $request->input('codigo');
        $articulo->precio_compra = $request->input('precio_compra');
        $articulo->precio_venta = $request->input('precio_venta');
        $articulo->tipo = $request->input('tipo');
        $articulo->estado = $request->input('estado');

        $articulo->sub_categoria_id = $request->input('sub_categoria_id');
        $articulo->unidad_medida_id = $request->input('unidad_medida_id');
        $articulo->proveedor_id= $request->input('proveedor_id');
        $articulo->save();

        return redirect()->route('articulos.edit', $articulo->id)
            ->with('info', 'Articulo guardado con éxito');
    }

    public function destroy($id)
    {

        $mensaje = Articulo::find($id);
        $articulo = Articulo::find($id);
        $articulo->eliminado= true;
        $articulo->save();

        Log::info( 'Articulo eliminada: ' .$mensaje->id . ' ' . $mensaje->nombre  );
        return back()->with('info', 'Eliminado correctamente');
    }

    public function upload($file){
        $name = time();
        $filename = $name;
        $current = public_path('img/proveedor/');

        return 'img/proveedor/'.$filename;
    }
}
