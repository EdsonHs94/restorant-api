<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table = 'Registro_Asistencia';
    public $timestamps = false;

    public function createAsistence($detalle, $idUser, $idReference, $idLocal)
    {
        $modelUser = new Usuario();
        $user = $modelUser->find($idUser);
        $horario = $user->getRole->getHorario;
        if ($idReference == Referencia::ENTRADA) {
            $idReference =
                (
                    strtotime(date("H:i:s"))
                    <= strtotime($horario->Horario_Entrada)
                ) ? $idReference : Referencia::TARDANZA;
        }
        $asistence = new Asistencia();
        $asistence->FechaMarcada = date("Y-m-d H:i:s");
        $asistence->Detalle = $detalle;
        $asistence->idReferencia = $idReference;
        $asistence->idUsuario = $idUser;
        $asistence->idLocal = $idLocal;
        $asistence->save();
        return $asistence->toArray();
    }
}
