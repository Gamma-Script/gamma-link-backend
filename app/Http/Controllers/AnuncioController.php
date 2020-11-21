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
