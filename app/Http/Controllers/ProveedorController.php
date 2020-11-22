<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Puntuacion;
use App\Proveedor;
use App\Sucursal;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Proveedor::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedor =Proveedor::find($id);
       return $proveedor;
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

    public function filtradoProveedor(Request $request){
        $filtroUbicacion ="";
        $filtroPuntuacion ="";
        
        if(!is_null($request->filtroUbicacion)){
            $filtradoProveedor =Sucursal::where('proveedor_id',$request->filtroUbicacion)->get();
        }
        if(!is_null($request->filtroPuntuacion)){
            $filtradoProveedor =Puntuacion::where('proveedor_id',$request->filtroPuntuacion)->get();
        }

    }

}
