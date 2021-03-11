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
    public function sprint4(){
        return view('sprint4.home');
    }
    public function inventario(){
      return view('inventario.inventario');
    }
    public function settings(){
        return view('herramientas.herramientas');
    }

    public function produccion(){
        return view('produccion.produccion');
    }

}
  
