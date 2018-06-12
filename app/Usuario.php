<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'Usuario';

    public function getById(int $id)
    {
        $user = self::where("idUsuario", $id)->first();
        if (empty($user)) {
            return [];
        }

        return $user->toArray();
    }

    public function find(int $id)
    {
        $user = self::where("idUsuario", $id)->first();
        if (empty($user)) {
            return [];
        }

        return $user;
    }

    public function getRole()
    {
        return $this->belongsTo('App\Rol', 'idRol', 'idRol');
    }
}
