<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Causa;
use \App\Tipo;
use \App\Tienda;
use \App\Orden;
use \App\User;
use Auth;

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
        $ordenes = Orden::where('user_id', Auth::user()->id)->get();
        return view('mantenimiento')->with([
            'ordenes' => $ordenes
        ]);
    }

    public function crearOrden(){
        $causas = Causa::all();
        $tipos = Tipo::all();
        $tiendas = Tienda::all();
        $orden = new Orden;
        $user = new User;
        return view('mantenimiento.crear_orden')->with([
            'causas' => $causas,
            'tipos' => $tipos,
            'tiendas' => $tiendas,
            'orden' => $orden
        ]);
    }

    public function store(Request $request){
        $orden = Orden::create(
            [
                'fecha' => $request->fecha,
                'hora_inicio' => $request->hora_inicio,
                'hora_termino' => $request->hora_termino,
                'tipo' => $request->tipo,
                'hora_parada' => $request->hora_parada,
                'hora_arranque' => $request->hora_arranque,
                'requerimiento' => $request->requerimiento,
                'equipo' => $request->equipo,
                'descripcion' => $request->descripcion,
                'codigo' => $request->codigo,
                'numero_orden' => $request->numero_orden,
                'estado' => $request->estado,
                'user_id' => $request->user_id,
                'tienda_id'  => $request->tienda_id,
                'numero_orden' => $request->numero_orden
            ]
        );
        $orden->tipos()->sync($request->tipos);
        $orden->causas()->sync($request->causas);
        return redirect('/orden/'. $orden->id);
    }

    public function edit(Request $request, $id) {
        $orden = Orden::find($id);
        $orden->causas = $orden->causas()->pluck('id')->toArray();
        $orden->tipos = $orden->tipos()->pluck('id')->toArray();
        $user = User::find($orden->user_id);
        $causas = Causa::all();
        $tipos = Tipo::all();
        $tiendas = Tienda::all();
        return view('mantenimiento.crear_orden')->with([
            'causas' => $causas,
            'tipos' => $tipos,
            'tiendas' => $tiendas,
            'orden' => $orden,
            'user'=> $user
        ]);
    }

    public function update(Request $request, $id) {
        $orden = Orden::find($id);
        $orden->fecha = $request->fecha;
        $orden->hora_inicio = $request->hora_inicio;
        $orden->hora_termino = $request->hora_termino;
        $orden->tipo = $request->tipo;
        $orden->hora_parada = $request->hora_parada;
        $orden->hora_arranque = $request->hora_arranque;
        $orden->requerimiento = $request->requerimiento;
        $orden->equipo = $request->equipo;
        $orden->descripcion = $request->descripcion;
        $orden->codigo = $request->codigo;
        $orden->numero_orden = $request->numero_orden;
        $orden->estado = $request->estado;
        $orden->user_id = $request->user_id;
        $orden->tienda_id  = $request->tienda_id;
        $orden->numero_orden = $request->numero_orden;
        $orden->save();
        $orden->tipos()->sync($request->tipos);
        $orden->causas()->sync($request->causas);
        return redirect('/orden/'. $orden->id);
        
    }
}
