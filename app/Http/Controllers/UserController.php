<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Proveedor;
use App\Cliente;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    public function usuario($id){
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(null,404);
        }else{
            switch ($user->tipo) {
                case 0:
                    $user->proveedor;
                break;
                case 1:
                    $user->cliente;
                break;
            }
            return response()->json($user,200);
        }
    }

    public function getUsuarioPorCorreo($correo){
        $user = User::where('email',$correo)->first();
        if(is_null($user)){
            return response()->json(null,404);
        }else{
            switch ($user->tipo) {
                case 0:
                    $user->proveedor;
                break;
                case 1:
                    $user->cliente;
                break;
            }
            return response()->json($user,200);
        }
    }

    public function cliente($id){
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(null,404);
        }else{
            return response()->json($user->cliente,200);
        }
    }

    public function proveedor($id){
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(null,404);
        }else{
            return response()->json($user->proveedor,200);
        }
    }
}