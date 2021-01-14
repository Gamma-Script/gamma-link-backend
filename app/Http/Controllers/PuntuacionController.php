<?php

namespace App\Http\Controllers;

use App\Puntuacion;
use Illuminate\Http\Request;
use Validator;

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
    {
        $reglas =[
            'puntuacion'=>'required|integer|min:1|max:5',
            'proveedorId'=>'required',
            'clienteId'=>'required'
        ];

        $mensajes= [
            'puntuacion.required'=>'Debe ingresar una puntuación',
            'puntuacion.integer'=> 'Puntuación debe ser un valor entero',
            'puntuacion.min'=>'Puntuación debe ser un valor entre 1 y 5',
            'puntuacion.max'=>'Puntuación debe ser un valor entre 1 y 5',
            'proveedorId.required'=>'Debe ingresar un proveedor',
            'clienteId.required'=>'Debe ingresar un cliente'
        ];

        $validator = Validator::make($request->all(), $reglas, $mensajes);

        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        else{

            $puntuacion = new Puntuacion;

            $puntuacion->puntuacion = $request->puntuacion;
            $puntuacion->comentario = $request->comentario;
            $puntuacion->proveedor_id=$request->proveedorId;
            $puntuacion->cliente_id=$request->clienteId;
            $puntuacion->save();
            
            return response()->json($puntuacion,201);

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

        $puntuacion = Puntuacion::find($id);

        if(is_null($puntuacion)){
            return response()->json(null,404);
        }else{

            $reglas =[
                'puntuacion'=>'required|integer|min:1|max:5',
                'proveedorId'=>'required',
                'clienteId'=>'required',
            ];
            $mensajes= [
                'puntuacion.required'=>'Debe ingresar una puntuación',
                'puntuacion.integer'=> 'Puntuación debe ser un valor entero',
                'puntuacion.min'=>'Puntuación debe ser un valor entre 1 y 5',
                'puntuacion.max'=>'Puntuación debe ser un valor entre 1 y 5',
                'proveedorId.required'=>'Debe ingresar un proveedor',
                'clienteId.required'=>'Debe ingresar un cliente'
            ];

            $validator = Validator::make($request->all(), $reglas, $mensajes);

            if($validator->fails()){
                return response()->json($validator->errors(),400);
            }
            else{

                $puntuacion->puntuacion = $request->puntuacion;
                $puntuacion->comentario = $request->comentario;
                $puntuacion->proveedor_id=$request->proveedorId;
                $puntuacion->cliente_id=$request->clienteId;
                $puntuacion->save();
                
                return response()->json($puntuacion,200);

            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $puntuacion = Puntuacion::find($id);

        if(is_null($puntuacion)){
            return response()->json(null,404);
            
        }
        else{
            $puntuacion->delete();
            return response()->json('La puntuación se ha eliminado con exito',200);
        }
    }
}