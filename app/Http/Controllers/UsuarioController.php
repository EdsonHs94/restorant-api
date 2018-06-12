<?php

namespace App\Http\Controllers;

use App\Http\Response\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Usuario;

class UsuarioController extends Controller
{
    public function find($id, Response $response)
    {
        $model = new Usuario();
        $user = $model->getById($id);

        $response->setData($user)
            ->setMessage('Petición exitosa.');

        return $response->response();
    }
}
