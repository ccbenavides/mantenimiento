<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $fillable = [
        'fecha',
        'hora_inicio',
        'hora_termino',
        'tipo',
        'hora_parada',
        'hora_arranque',
        'requerimiento',
        'equipo',
        'descripcion',
        'codigo',
        'numero_orden',
        'estado',
        'user_id',
        'tienda_id'
    ];

    public function causas()
    {
        return $this->belongsToMany('App\Causa', 'orden_causa');
    }

    public function tipos()
    {
        return $this->belongsToMany('App\Tipo', 'orden_tipo');
    }
}
