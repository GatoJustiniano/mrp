<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listamaterial;
use App\Estado;
use App\Articulo;
//use Caffeinated\Shinobi\Models\Estado;

use Illuminate\Support\Facades\Log;

class ListamaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listamaterials = Listamaterial::paginate();

        return view('sprint4/listamaterials.index', compact('listamaterials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
     
        $listamaterial = Listamaterial::first();
       // $estados = Estado::orderBy('id_estado', 'desc')->pluck('tipo_estado', 'id_estado');
       $estados = Estado::all();
      // $componentes = Articulo::orderBy('id', 'desc')->pluck('nombre', 'id');
       $componentes = Articulo::where("tipo","=",1) ->orWhere("tipo","=",3)->paginate(10);;
       // dd($process);
        //return view('sucursals.create');
        return view('sprint4/listamaterials.create',compact('listamaterial','componentes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $listamaterial = Listamaterial::create($request->all());
        //$listamaterial = Listamaterial::create($request->id,$request->componente, $request->cantidad, $request->unidadmedidad,$request->costounitario,$request->subtotal,$request->created_at,$request->update_at);
        //$listamaterial = Listamaterial::create(array_merge(request()->all(), ['unidadmedidad' => 'text']));
        /*$listamaterial = Listamaterial::all();
       // dd($id);
    

       $req=0;
        $listamaterial->id = $request->input('id');
        $listamaterial->componente = $request->input('componente');
        $listamaterial->cantidad = $request->input('cantidad');
        $listamaterial->unidadmedida = $request->input('unidadmedida');
        $listamaterial->costounitario = $request->input('costounitario');
        $listamaterial->subtotal = $req;
       $listamaterial->save();*/
        $estados = Estado::all();
       // $componentes = Articulo::orderBy('id', 'desc')->pluck('nombre', 'id');
          //dd($listamaterial);
        return redirect()->route('listamaterials.index', $listamaterial->id)
            ->with('info', 'Listamaterial se ha guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listamaterial = Listamaterial::find($id);

        return view('sprint4/listamaterials.show', compact('listamaterial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listamaterial = Listamaterial::find($id);
       // $estados = Estado::orderBy('id_estado', 'desc')->pluck('tipo_estado', 'id_estado');
        //return view('sucursals.create');
        $estados = Estado::all();
        return view('sprint4/listamaterials.edit', compact('listamaterial','estados'));
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
        $listamaterial = Listamaterial::find($id);
       // dd($id);
    


        $listamaterial->componente = $request->input('componente');
        $listamaterial->cantidad = $request->input('cantidad');
        $listamaterial->unidadmedida = $request->input('unidadmedida');
        $listamaterial->costounitario = $request->input('costounitario');
        $listamaterial->subtotal = $request->input('subtotal');
        $listamaterial->save();

        return redirect()->route('listamaterials.index', $listamaterial->id)
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
        $mensaje = Listamaterial::find($id);
        $listamaterial = Listamaterial::find($id)->delete();
        
        Log::info( 'listamaterial eliminado: ' .$mensaje->id . ' ' . $mensaje->name . ' ' . $mensaje->description );
        return back()->with('info', 'Eliminado correctamente');
    }
}
