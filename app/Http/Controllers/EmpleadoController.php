<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\Departamento;
use App\Sucursal;
use App\Cargo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;

class EmpleadoController extends Controller
{

    public function index()
    {
        $empleados = DB::table('empleados')
        ->join('departamentos', 'departamentos.id', '=', 'id_departamento')
        ->join('cargos', 'cargos.id', '=', 'id_cargo')
        ->join('sucursals', 'sucursals.id', '=', 'id_sucursal')
        ->select('empleados.*',
                 'departamentos.nombre as departamento',
                 'cargos.nombre as cargo',
                 'sucursals.descripcion as sucursal'
                )
        ->orderBy('codigo')
        ->paginate(15);

        return view('sprint1/empleado.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleado       = Empleado::first();
        $departamentos  = Departamento::orderBy('nombre', 'asc')->get();
        $sucursales     = Sucursal::orderBy('descripcion', 'asc')->get();
        $cargos         = Cargo::orderBy('nombre', 'asc')->get();

        return view('sprint1/empleado.create', compact('departamentos', 'sucursales', 'cargos','empleado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empleado = Empleado::create($request->all());

        return redirect()->route('empleados.show', $empleado->id)
            ->with('info', 'Empleado guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);
        $departamento = Departamento::find($empleado->id_departamento);
        $sucursal = Sucursal::find($empleado->id_sucursal);
        $cargo = Cargo::find($empleado->id_cargo);

        $edad= Carbon::parse($empleado->fecha_nac )->age;
        return view('sprint1/empleado.show', compact('empleado','edad','departamento','sucursal','cargo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
        $departamentos  = Departamento::orderBy('nombre', 'asc')->get();
        $sucursales     = Sucursal::orderBy('descripcion', 'asc')->get();
        $cargos         = Cargo::orderBy('nombre', 'asc')->get();

        return view('sprint1/empleado.edit', compact('empleado','departamentos','sucursales','cargos'));
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
        $empleado = Empleado::find($id);
        $empleado->codigo = $request->input('codigo');
        $empleado->cedula = $request->input('cedula');
        $empleado->nombre = $request->input('nombre');
        $empleado->direccion = $request->input('direccion');
        $empleado->email = $request->input('email');
        $empleado->edad = $request->input('edad');
        $empleado->fecha_nac = $request->input('fecha_nac');
        $empleado->telefono = $request->input('telefono');
        $empleado->foto = $request->input('foto');
        
        $empleado->id_departamento = $request->input('id_departamento');
        $empleado->id_sucursal = $request->input('id_sucursal');
        $empleado->id_cargo = $request->input('id_cargo');



        $empleado->estado = $request->input('estado');
        $empleado->save();

        return redirect()->route('empleados.edit', $empleado->id)
            ->with('info', 'Empleado guardado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mensaje = Empleado::find($id);

        //Cambia el estado  eliminado del empleado
        $empleado = Empleado::find($id);
        $empleado->eliminado = true;

        //Cambia el estado eliminado de las areas dependientes de este empleado
        DB::table('areas')->where('departamento_id',$empleado->id)->update(['eliminado'=>true]);

        Log::info( 'Empleado eliminado: ' .$mensaje->id . ' ' . $mensaje->nombre . ' ' . $mensaje->codigo );
        $empleado->save();

        return back()->with('info', 'Eliminado correctamente');
    }
        
}

