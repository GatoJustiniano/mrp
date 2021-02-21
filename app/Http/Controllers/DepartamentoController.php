<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DepartamentoController extends Controller
{

    public function index()
    {
        $departamentos = Departamento::where('eliminado',false)->paginate();

        return view('sprint1/departamentos.index', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sprint1/departamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departamento = Departamento::create($request->all());

        return redirect()->route('departamentos.show', $departamento->id)
            ->with('info', 'Departamento guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departamento = Departamento::find($id);

        return view('sprint1/departamentos.show', compact('departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamento = Departamento::find($id);

        return view('sprint1/departamentos.edit', compact('departamento'));
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
        $departamento = Departamento::find($id);
        $departamento->nombre = $request->input('nombre');
        $departamento->codigo = $request->input('codigo');
        $departamento->estado = $request->input('estado');
        $departamento->save();

        return redirect()->route('departamentos.edit', $departamento->id)
            ->with('info', 'Departamento guardado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mensaje = Departamento::find($id);

        //Cambia el estado  eliminado del departamento
        $departamento = Departamento::find($id);
        $departamento->eliminado = true;

        //Cambia el estado eliminado de las areas dependientes de este departamento
        DB::table('areas')->where('departamento_id',$departamento->id)->update(['eliminado'=>true]);

        Log::info( 'Departamento eliminado: ' .$mensaje->id . ' ' . $mensaje->nombre . ' ' . $mensaje->codigo );
        $departamento->save();

        return back()->with('info', 'Eliminado correctamente');
    }
        
}
