<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $response = null;
        $usr = $request->user;
        $pwd = $request->password;
        $result = User::where('name', $usr)->where('password', $pwd)->get();

        if (count($result) > 0 ){
            $response = array(
                'acceso' => true,
                'msg' => "Acceso concedido"
            );
        }
        else{
            $response = array(
                'acceso' => false,
                'msg' => utf8_encode ("Acceso denegado, usuario o contraseña incorrectos")
            );
        }

        return $response;

    }
}
