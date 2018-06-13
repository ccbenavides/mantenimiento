<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Causa;
use \App\Tipo;
use \App\Orden;
use Excel;
use DB;

class AdminController extends Controller
{
    public function index(Request $request){
        $ordenes = Orden::where('estado', 'completado')->get();
        return view('admin')->with([
            'ordenes' => $ordenes            
        ]);
    }
    public function imprimirOrden(){
        $causas = Causa::all();
        $tipos = Tipo::all();

        return view('administrador.imprimir_orden')->with([
            'causas' => $causas,
            'tipos' => $tipos,
        ]);
    }

    public function excelCantidadRequerimientos(){
        $data = Orden::join('tiendas', 'ordens.tienda_id', '=', 'tiendas.id')
                    ->select('name',  DB::raw('count(*) as total'))
                    ->groupBy('name')
                    ->get();
        $cantidad = Orden::count();

        foreach ($data as $key => $item) {
            $item->porcentaje = ((100*$item->total)/$cantidad) . '%';
            # code...
        }

        Excel::create('cantidad-requerientos'. date('\-YdmHms'), function($excel) use ($data, $cantidad) {
            $excel->sheet('Sheetname', function($sheet) use ($data, $cantidad) {
                $sheet->loadView('excel.cantidad-requerientos')->with([
                    'data' => $data,
                    'cantidad' => $cantidad
                ]);
            });
        
        })->download('xls');
        
        
    }

    public function excelCantidadCausas(){

        $data = Causa::join('orden_causa', 'causas.id', '=', 'orden_causa.causa_id')
                    ->select('description as name',  DB::raw('count(*) as total'))
                    ->groupBy('description')
                    ->get();
        $cantidad = DB::table('orden_causa')->count();

        foreach ($data as $key => $item) {
            $item->porcentaje = ((100*$item->total)/$cantidad) . '%';
        }

        Excel::create('cantidad-causas'. date('\-YdmHms'), function($excel) use ($data, $cantidad){
            $excel->sheet('Sheetname', function($sheet) use ($data, $cantidad) {
                $sheet->loadView('excel.cantidad-causas')->with([
                    'data' => $data,
                    'cantidad' => $cantidad
                ]);
            });
        
        })->download('xls');
    }

    public function excelCantidadTipos(){

        $data = Tipo::join('orden_tipo', 'tipos.id', '=', 'orden_tipo.tipo_id')
                        ->select('description as name',  DB::raw('count(*) as total'))
                        ->groupBy('description')
                        ->get();
        $cantidad = DB::table('orden_tipo')->count();

        foreach ($data as $key => $item) {
            $item->porcentaje = ((100*$item->total)/$cantidad) . '%';
        }
        Excel::create('cantidad-tipos'. date('\-YdmHms'), function($excel) use ($data, $cantidad) {
            $excel->sheet('Sheetname', function($sheet) use ($data, $cantidad) {
                $sheet->loadView('excel.cantidad-tipos')->with([
                    'data' => $data,
                    'cantidad' => $cantidad
                ]);
            });
        
        })->download('xls');
    }
}
