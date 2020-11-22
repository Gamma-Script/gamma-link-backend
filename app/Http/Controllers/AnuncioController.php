<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anuncio;

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
            'estado'=>'require',
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
            return response()->json([
                'errores'=>$validator->errors(),
                'mensaje'=>'Error en la peticion'],400);
        }else{
            $anuncio = new Anuncio;
        $anuncio->id = $request->id;
        $anuncio->nombre = $request ->nombre;
        $anuncio->descripcion = $request->descripcion;
        $anuncio->imagen = $request->imagen;
        $anuncio->fecha_publicacion = $request->fecha_publicacion;
        $anuncio->fecha_baja = $request->fecha_baja;
        $anuncio->estado = $request->estado;
        $anuncio->proveedor_id = $request ->proveedor_id;

        $anuncio->save();

        return $anuncio;

        return response()->json([
            'anuncio'=>$anuncio,'mensaje'=>'El anuncio se ha creado con exito'],201);
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
        return Anuncio::find($id);
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
         $requerimientos=[
            'nombre'=>'required',
            'descripcion'=>'required',
            'imagen'=>'required',
            'fecha_publicacion'=>'required',
            'fecha_baja'=>'required',
            'estado'=>'require',
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
            return response()->json([
                'errores'=>$validator->errors(),
                'mensaje'=>'Error en la peticion'],400);
        }else{

        $anuncio = Anuncio::find($id);

        $anuncio->id = $request->id;
        $anuncio->nombre = $request ->nombre;
        $anuncio->descripcion = $request->descripcion;
        $anuncio->imagen = $request->imagen;
        $anuncio->fecha_publicacion = $request->fecha_publicacion;
        $anuncio->fecha_baja = $request->fecha_baja;
        $anuncio->estado = $request->estado;
        $anuncio->proveedor_id = $request ->proveedor_id;

        $anuncio->save();

        return $anuncio;

        return response()->json([
            'anuncio'=>$anuncio,'mensaje'=>'El anuncio se ha actualizado con exito'],201);


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
         $requerimientos=[
            'nombre'=>'required',
            'descripcion'=>'required',
            'imagen'=>'required',
            'fecha_publicacion'=>'required',
            'fecha_baja'=>'required',
            'estado'=>'require',
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
            return response()->json([
                'errores'=>$validator->errors(),
                'mensaje'=>'Error en la peticion'],400);
        }else{
            return Anuncio::find($id)->delete();
            return response()->json([
            'anuncio'=>$anuncio,'mensaje'=>'El anuncio se ha eliminado con exito'],201);
        }
        
    }
}
