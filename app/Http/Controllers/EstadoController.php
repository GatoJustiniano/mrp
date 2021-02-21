<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estado;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Requests\EstadoFormRequest;
use DB;

class EstadoController extends Controller
{
    public function __construct()
    {
    	
    }

    public function index(Request $request)
    {
    	if ($request)
    	{
    		$query=trim($request->get('searchText'));
    		$estados=DB::table('estado')->where('nombre','LIKE','%'.$query.'%')
    		->where('estado','=','1')
    		->orderBy('id','asc')
    		->paginate(7);
    		return view('sprint1.estado.index',["estados"=>$estados,"searchText"=>$query]);
    	}
    }

    public function create()
    {
    	return view("sprint1.estado.create");
    }

    public function store(EstadoFormRequest $request)
    {
    	$estado=new Estado;
    	$estado->codigo=$request->get('codigo');
    	$estado->nombre=$request->get('nombre');
    	$estado->estado='1';
    	$estado->save();

    	return Redirect::to('sprint1/estado');
    }

    public function show($id)
    {
    	return view("sprint1.estado.show",["estado"=>Estado::findOrFail($id)]);
    }

    public function edit($id)
    {
    	return view("sprint1.estado.edit",["estado"=>Estado::findOrFail($id)]);
    }

    public function update(EstadoFormRequest $request,$id)
    {
    	$estado=Estado::findOrFail($id);
    	$estado->codigo=$request->get('codigo');
    	$estado->nombre=$request->get('nombre');
    	$estado->update();

    	return Redirect::to('sprint1/estado');
    }

    public function destroy($id)
    {
    	$estado=Estado::findOrFail($id);
    	$estado->estado='0';
    	$estado->update();

    	return Redirect::to('sprint1/estado');
    }
}
