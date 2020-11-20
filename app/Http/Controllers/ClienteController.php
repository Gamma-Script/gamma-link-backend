<?php

namespace App\Http\Controllers;
Use App\User;
Use App\Cliente;
use Illuminate\Http\Request;
use Validator;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas =[
            'nombre'=>'required',
            'email'=>'required',
            'password'=>'required',
            'tipo'=>'in:0,1',
            
        ];
        $mensajes= [
            'nombre.required'=>'Debe ingresar un nombre',
            'email.required'=> 'Debe ingresar una direccion de correo electronico',
            'password.required'=>'Debe ingresar una contraseña',
            'tipo.in'=>'Debe ingresar un tipo de cliente valido',
            
        ];

        $validator = Validator::make($request->all(), $reglas, $mensajes);

        if($validator->fails()){
            return response()->json(['errores'=>$validator->errors(), 'mensaje'=>'Se han encontrado errores en su peticion'],400);
        }
        else{

            $usuario=new User;
            $usuario->nombre=$request->nombre;
            $usuario->apellido=$request->apellido;
            $usuario->email=$request->email;
            $usuario->password=$request->password;
            $usuario->tipo=$request->tipo;
            $usuario->username=$request->username;
            $usuario->save();

            $cliente= new Cliente;
            $cliente->user_id = $usuario->id;
            $cliente->save();
            
            return response()->json(['mensaje'=>'La cuenta se ha creado con exito'],201);

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
