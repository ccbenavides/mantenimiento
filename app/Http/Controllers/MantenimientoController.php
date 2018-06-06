<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Causa;
use \App\Tipo;

class MantenimientoController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mantenimiento');
    }

    public function crearOrden(){
        $causas = Causa::all();
        $tipos = Tipo::all();
        return view('mantenimiento.crear_orden')->with([
            'causas' => $causas,
            'tipos' => $tipos
        ]);
    }
}
