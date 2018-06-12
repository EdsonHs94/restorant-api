<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    const ENTRADA = 1;
    const TARDANZA = 4;

    protected $table = 'Referencia';

}