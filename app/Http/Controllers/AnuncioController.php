<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;
use Validator;

class AnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Anuncio::all();
    }

    public function indexProveedor($proveedorId)
    {
        $anuncios = Anuncio::where("proveedor_id",$proveedorId);
        if(is_null($anuncio)){
            return response()->json(null,200);
        }else{
            return Anuncio::all();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $requerimientos=[
            'nombre'=>'required',
            'descripcion'=>'required',
            'imagen'=>'required',
            'fecha_publicacion'=>'required',
            'fecha_baja'=>'required',
            'estado'=>'required',
            'proveedor_id'=>'required'
        ];

        $mensajes=[
            'nombre.required'=>'Ingrese un nombre',
            'descripcion.required'=>'Debe ingresar una descripcion',
            'imagen.required'=>'Debe ingresar una imagen',
            'fecha_publicacion.required'=>'Debe ingresar la fecha de publicacion',
            'fecha_baja.required'=>'Debe ingresar la fecha de baja',
            'estado.required'=>'Ingrese un estado',
            'proveedor_id.required'=>'Debe ingresar el id de proveedor'

        ];

        $validator= Validator::make($request->all(),$requerimientos,$mensajes);

        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }else{
            
            $anuncio = new Anuncio;

            $anuncio->nombre = $request ->nombre;
            $anuncio->descripcion = $request->descripcion;
            $anuncio->imagen = $request->imagen;
            $anuncio->fecha_publicacion = $request->fecha_publicacion;
            $anuncio->fecha_baja = $request->fecha_baja;
            $anuncio->estado = $request->estado;
            $anuncio->proveedor_id = $request ->proveedor_id;

            $anuncio->save();

        return response()->json($anuncio,201);
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
        $anuncio = Anuncio::find($id);
        if(is_null($anuncio)){
            return response()->json(null,404);
        }else{
            return response()->json($anuncio,200);
        }
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

         $anuncio = Anuncio::find($id);

         if(is_null($anuncio)){
            return response()->json(null,404);
         }else{

            $requerimientos=[
                'nombre'=>'required',
                'descripcion'=>'required',
                'imagen'=>'required',
                'fecha_publicacion'=>'required',
                'fecha_baja'=>'required',
                'estado'=>'required',
                'proveedor_id'=>'required'
            ];

            $mensajes=[
                'nombre.required'=>'Ingrese un nombre',
                'descripcion.required'=>'Debe ingresar una descripcion',
                'imagen.required'=>'Debe ingresar una imagen',
                'fecha_publicacion.required'=>'Debe ingresar la fecha de publicacion',
                'fecha_baja.required'=>'Debe ingresar la fecha de baja',
                'estado.required'=>'Ingrese un estado',
                'proveedor_id.required'=>'Debe ingresar el id de proveedor'

            ];

            $validator= Validator::make($request->all(),$requerimientos,$mensajes);

            if($validator->fails()){
                return response()->json($validator->errors(),400);
            }else{

                $anuncio->nombre = $request ->nombre;
                $anuncio->descripcion = $request->descripcion;
                $anuncio->imagen = $request->imagen;
                $anuncio->fecha_publicacion = $request->fecha_publicacion;
                $anuncio->fecha_baja = $request->fecha_baja;
                $anuncio->estado = $request->estado;
                $anuncio->proveedor_id = $request ->proveedor_id;

                $anuncio->save();

                return response()->json($anuncio,200); //201
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
        $anuncio = Anuncio::find($id);
        if(is_null($anuncio)){
            return response()->json(null,404);
        }else{
            $anuncio->delete();
            return response()->json('El anuncio se ha eliminado con éxito',200);
        }
    }

    public function baja($id)
    {
        $anuncio = Anuncio::find($id);
        if(is_null($anuncio)){
            return response()->json(null,404);
        }else{
            $anuncio->estado=0;
            $anuncio->save();
            return response()->json('El anuncio se ha dado de baja con éxito',200);
        }
    }

    public function subida($id)
    {
        $anuncio = Anuncio::find($id);
        if(is_null($anuncio)){
            return response()->json(null,404);
        }else{
            $anuncio->estado=1;
            $anuncio->save();
            return response()->json('El anuncio se ha subido con éxito',200);
        }
    }
}
