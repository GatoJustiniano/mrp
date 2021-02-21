<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Municipio;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Requests\MunicipioFormRequest;
use DB;

class MunicipioController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $municipios=DB::table('municipio as m')
            ->join('provincia as p','m.id_provincia','=','p.id')
            ->select('m.id','m.codigo','m.nombre','p.nombre as provinciass')
            ->where('m.nombre','LIKE','%'.$query.'%')
            ->where('m.estado','=','1')
            ->orderBy('m.id','asc')
            ->paginate(7);
            //dd($provincias);
            return view('sprint1.municipio.index',["municipios"=>$municipios,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $provincias=DB::table('provincia')->where('estado','=','1')->get();
        return view("sprint1.municipio.create",["provincias"=>$provincias]);
    }

    public function store(MunicipioFormRequest $request)
    {
        $municipio=new Municipio;
        $municipio->codigo=$request->get('codigo');
        $municipio->nombre=$request->get('nombre');
        $municipio->id_provincia=$request->get('id_provincia');
        $municipio->estado='1';
        $municipio->save();

        return Redirect::to('sprint1/municipio');
    }

    public function show($id)
    {
        return view("sprint1.municipio.show",["municipio"=>Municipio::findOrFail($id)]);
    }

    public function edit($id)
    {
        $municipio=Municipio::findOrFail($id);
        $provincias=DB::table('provincia')->where('estado','=','1')->get();
        return view("sprint1.municipio.edit",["municipio"=>$municipio,"provincias"=>$provincias]);
    }

    public function update(MunicipioFormRequest $request,$id)
    {
        $municipio=Municipio::findOrFail($id);
        $municipio->codigo=$request->get('codigo');
        $municipio->nombre=$request->get('nombre');
        $municipio->id_provincia=$request->get('id_provincia');
        $municipio->update();

        return Redirect::to('sprint1/municipio');
    }

    public function destroy($id)
    {
        $municipio=Municipio::findOrFail($id);
        $municipio->estado='0';
        $municipio->update();

        return Redirect::to('sprint1/municipio');
    }
}