<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Area;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    public function index()
    {
        $areas = DB::table('areas')
        ->join('departamentos', 'departamentos.id', '=', 'departamento_id')
        ->select('areas.*',
                 'departamentos.nombre as departamento'
                )
        ->orderBy('areas.codigo')
        ->where('areas.eliminado',0)
        ->paginate(15);
        return view('sprint1/area.index', compact('areas'));
    }
    public function create()
    {
        $departamentos = Departamento::all()->where('eliminado','=','false');
        $area = Area::first();
        return view('sprint1/area.create', compact('departamentos'), compact('area'));
    }
    public function store(Request $request)
    {
        $area = Area::create($request->all());

        return redirect()->route('areas.edit', $area->id)
            ->with('info', 'Area guardada con éxito');
    }

    public function edit($id)
    {
        $area = Area::find($id);
        $departamentos = Departamento::all()->where('eliminado','=','false');
        return view('sprint1/area.edit', compact('area'), compact('departamentos'));
    }


    public function show($id)
    {
        $area = Area::find($id);
        return view('sprint1/area.show', compact('area'));
    }

    public function update(Request $request, $id)
    {
        $area = Area::find($id);
        $area->nombre = $request->input('nombre');
        $area->codigo = $request->input('codigo');
        $area->estado = $request->input('estado');
        $area->departamento_id= $request->input('departamento_id');
        $area->save();

        return redirect()->route('areas.edit', $area->id)
            ->with('info', 'Area guardada con éxito');
    }

    public function destroy($id)
    {

        $mensaje = Area::find($id);
        $area = Area::find($id);
        $area->eliminado= true;
        $area->save();

        Log::info( 'Area eliminada: ' .$mensaje->id . ' ' . $mensaje->nombre  );
        return back()->with('info', 'Eliminado correctamente');
    }

}
