<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provincia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Requests\ProvinciaFormRequest;
use DB;

class ProvinciaController extends Controller
{
    public function __construct()
    {
    	
    }

    public function index(Request $request)
    {
    	if ($request)
    	{
    		$query=trim($request->get('searchText'));
    		$provincias=DB::table('provincia as p')
    		->join('estado as e','p.id_estado','=','e.id')
    		->select('p.id','p.codigo','p.nombre','e.nombre as estadoss')
    		->where('p.nombre','LIKE','%'.$query.'%')
    		->where('p.estado','=','1')
    		->orderBy('p.id','asc')
    		->paginate(7);
            //dd($provincias);
    		return view('sprint1.provincia.index',["provincias"=>$provincias,"searchText"=>$query]);
    	}
    }

    public function create()
    {
    	$estados=DB::table('estado')->where('estado','=','1')->get();
    	return view("sprint1.provincia.create",["estados"=>$estados]);
    }

    public function store(ProvinciaFormRequest $request)
    {
    	$provincia=new Provincia;
    	$provincia->codigo=$request->get('codigo');
    	$provincia->nombre=$request->get('nombre');
        $provincia->id_estado=$request->get('id_estado');
    	$provincia->estado='1';
    	$provincia->save();

    	return Redirect::to('sprint1/provincia');
    }

    public function show($id)
    {
    	return view("sprint1.provincia.show",["provincia"=>Provincia::findOrFail($id)]);
    }

    public function edit($id)
    {
        $provincia=Provincia::findOrFail($id);
        $estados=DB::table('estado')->where('estado','=','1')->get();
    	return view("sprint1.provincia.edit",["provincia"=>$provincia,"estados"=>$estados]);
    }

    public function update(ProvinciaFormRequest $request,$id)
    {
    	$provincia=Provincia::findOrFail($id);
    	$provincia->codigo=$request->get('codigo');
    	$provincia->nombre=$request->get('nombre');
        $provincia->id_estado=$request->get('id_estado');
    	$provincia->update();

    	return Redirect::to('sprint1/provincia');
    }

    public function destroy($id)
    {
        $provincia=Provincia::findOrFail($id);
        $provincia->estado='0';
        $provincia->update();

        return Redirect::to('sprint1/provincia');
    }
}