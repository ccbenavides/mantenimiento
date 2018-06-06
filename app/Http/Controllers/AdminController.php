<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Causa;
use \App\Tipo;

class AdminController extends Controller
{
    public function index(Request $request){
        return view('admin');
    }
    public function imprimirOrden(){
        $causas = Causa::all();
        $tipos = Tipo::all();
        return view('administrador.imprimir_orden')->with([
            'causas' => $causas,
            'tipos' => $tipos
        ]);
    }
}
