<?php

namespace App\Http\Controllers;

use App\Puntuacion;
use Illuminate\Http\Request;
use validator;

class PuntuacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Puntuacion::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {/*
        $reglas = [
            'puntuacion'=>'required',
            'comentario'=>'required',
            'proveedor_id'=>'required',
            'cliente_id'=>'required'
        ];

        $mensajes=[
            'puntuacion.required'=>'La puntuacion debe ser ingresada',
            'comentario.required'=>'Comentario debe ser ingresado',
            'proveedor_id.required'=>'El proveedor debe ser seleccionado',
            'cliente_id.required'=>'El cliente tiene que identificarse'
        ];

        $validator= Validator::make($request->all(),$reglas,$mensajes);

        if($validator->fails()){

            return response()->json([
                'errores' =>$validator->errors(),
                'mensaje'=>'Error al procesar '
            ],400);
        }else{
            $puntuacion = new Puntuacion;

            $puntuacion->puntuacion = $request->puntuacion;
            $puntuacion->comentario = $request->comentario;
            $puntuacion->proveedor_id = $request->proveedor_id;
            $puntuacion->cliente_id = $request->cliente_id;

            $puntuacion->save();

            return $puntuacion;
            return response()->json([
                'puntuacion'=>$puntuacion,
                'mensaje'=>'La puntuacion ha sido procesada con exito'
            ],201);
        }
        */
        $puntuacion = new Puntuacion;

        $puntuacion->puntuacion = $request->puntuacion;
        $puntuacion->comentario = $request->comentario;
        $puntuacion->proveedor_id = $request->proveedor_id;
        $puntuacion->cliente_id = $request->cliente_id;

        $puntuacion->save();

        return $puntuacion;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $puntuacion =Puntuacion::find($id);
       return $puntuacion;
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
