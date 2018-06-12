<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'Rol';

    public function getHorario()
    {
        return $this->belongsTo('App\Horario', 'idHorario', 'idHorario');
    }
}
