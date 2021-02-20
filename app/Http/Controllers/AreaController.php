<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Area;
use Illuminate\Support\Facades\Log;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::where('eliminado',false)->paginate();

        return view('gestion-administrativa/area.index', compact('areas'));
    }
    public function create()
    {
        $departamentos = Departamento::all()->where('eliminado','=','false');
        $area = Area::first();
        return view('gestion-administrativa/area.create', compact('departamentos'), compact('area'));
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
        return view('gestion-administrativa/area.edit', compact('area'), compact('departamentos'));
    }


    public function show($id)
    {
        $area = Area::find($id);
        return view('gestion-administrativa/area.show', compact('area'));
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
