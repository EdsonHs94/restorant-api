<?php

namespace App\Http\Controllers;

use App\Asistencia;
use App\Http\Response\Response;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    public function createAsistence(Request $request, Response $response)
    {
        $model = new Asistencia();
        $asistence = $model->createAsistence(
            $request->get("Detalle"),
            $request->get("idUsuario"),
            $request->get("idReferencia"),
            $request->get("idLocal")
        );

        $response->setData($asistence)
            ->setMessage('Petición exitosa.');

        return $response->response();
    }
}
