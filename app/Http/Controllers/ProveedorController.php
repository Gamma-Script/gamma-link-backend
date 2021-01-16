<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Puntuacion;
use App\User;
use App\Proveedor;
use App\Sucursal;

use DB;

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

    public function anuncios($id){
        $proveedor = Proveedor::find($id);
        if(is_null($proveedor)){
            return response()->json(null,404);
        }else{
            $anuncios = $proveedor->anuncios;
            if(is_null($anuncios) || count($anuncios)==0){
                return response()->json($anuncios,200);
            }else{
                return response()->json($anuncios,200);
            }
        }
    }

    public function buscarPorNombre($cadena)
    {
        $proveedores = User::where('nombre', 'like', '%'.$cadena.'%')->get();
        if(is_null($proveedores)){
            return response()->json(null,404);            
        }else{

            foreach ($proveedores as $proveedor) {
                $proveedor->proveedor;
            }
            return response()->json($proveedores,200);
        }
    }

    public function buscarPorPuntuacion($puntuacion)
    {

        // Agrupar puntuaciones de cada proveedor

        $puntuaciones= DB::table('puntuaciones')
        ->select(DB::raw('proveedor_id, ROUND(AVG(puntuacion),0) as promedio'))
        ->groupBy('proveedor_id')
        ->get();

        $proveedores=[];

        if(is_null($puntuaciones)){
            return response()->json(null,404);            
        }else{
            $puntuaciones = $puntuaciones->where('promedio',$puntuacion);
            foreach ($puntuaciones as $puntuacione) {
                $proveedores[]= Proveedor::find($puntuacione->proveedor_id);
            }
            return response()->json($proveedores,200);
        }
    }

    public function puntuaciones($id){
        $proveedor = Proveedor::find($id);
        if(is_null($proveedor)){
            return response()->json(null,404);
        }else{
            $puntuaciones = $proveedor->puntuaciones;
            if(is_null($puntuaciones) || count($puntuaciones)==0){
                return response()->json($puntuaciones,200);
            }else{
                return response()->json($puntuaciones,200);
            }
        }
    }

    public function categorias($id){
        $proveedor = Proveedor::find($id);
        if(is_null($proveedor)){
            return response()->json(null,404);
        }else{
            $categorias = $proveedor->categorias;
            if(is_null($categorias) || count($categorias)==0){
                return response()->json($categorias,200);
            }else{
                return response()->json($categorias,200);
            }
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
        $proveedor = Proveedor::find($id);
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
