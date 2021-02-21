<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

   public function sprint1(){
        return view('sprint1.home');
    }
    public function sprint2(){
        return view('sprint2.home');
    }
    
    public function inventario(){
      return view('inventario.inventario');
    }
    public function settings(){
        return view('herramientas.herramientas');
    }

    public function nomina(){
        $empleados = DB::table('historial_empleado')
            ->join('empleado', 'id_empleado_historial', '=', 'id_empleado')
            ->join('area', 'id_area_historial', '=', 'id_area')
            ->join('cargo', 'id_cargo_historial', '=', 'id_cargo')
            ->join('sucursal', 'id_sucursal_historial', '=', 'id_sucursal')
            ->select('historial_empleado.*',
                     'nombre_empleado',
                     'nombre_area',
                     'nombre_cargo',
                     'nombre_sucursal'         
                     )
            ->paginate(15);
        return view('nomina.nomina', compact('empleados'));
    }

}
  
