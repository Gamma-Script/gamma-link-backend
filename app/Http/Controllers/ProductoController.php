<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;


use validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Producto::all();
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
        $reglas = [
            'nombre'=>'required',
            'descripcion'=>'required',
            'imagen'=>'required',
            'precio'=> 'required|numeric|min:0',
            'marca_id'=>'required',
            'categoria_id'=>'required'
        ];

        $mensajes=[
            'nombre.required'=>'El nombre debe ser ingresado',
            'descripcion.required'=>'La descripcion debe ser ingresada',
            'imagen.required'=>'La imagen debe ser ingresada',
            'precio.required'=> 'El precio debe ser ingresado',
            'precio.numeric'=> 'El precio debe ser un numero',
            'precio.min'=> 'El precio debe ser un numero positivo',
            'marca_id.required'=>'La marca debe ser ingresada',
            'categoria_id.required'=>'La descripcion debe ser ingresada'
        ];

        $validator= Validator::make($request->all(),$reglas,$mensajes);

        if($validator->fails()){

            return response()->json([
                'errores' =>$validator->errors(),
                'mensaje'=>'se ha encontrado errores en su peticion :( '
            ],400);
        }else{
            $producto = new Producto;

            $producto->nombre= $request->nombre;
            $producto->descripcion= $request->descripcion;
            $producto->imagen= $request->imagen;
            $producto->precio= $request->precio;
            $producto->marca_id= $request->marca_id;
            $producto->categoria_id= $request->categoria_id;
            $producto->save();
    
            return $producto;
            return response()->json([
                'producto'=>$producto,
                'mensaje'=>'El producto se ha creado con exito'
            ],201);
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
       $producto =Producto::find($id);
       return $producto;
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

        $reglas = [
            'nombre'=>'required',
            'descripcion'=>'required',
            'imagen'=>'required',
            'precio'=> 'required|numeric|min:0',
            'marca_id'=>'required',
            'categoria_id'=>'required'
        ];

        $mensajes=[
            'nombre.required'=>'El nombre debe ser ingresado',
            'descripcion.required'=>'La descripcion debe ser ingresada',
            'imagen.required'=>'La imagen debe ser ingresada',
            'precio.required'=> 'El precio debe ser ingresado',
            'precio.numeric'=> 'El precio debe ser un numero',
            'precio.min'=> 'El precio debe ser un numero positivo',
            'marca_id.required'=>'La marca debe ser ingresada',
            'categoria_id.required'=>'La descripcion debe ser ingresada'
        ];

        $validator= Validator::make($request->all(),$reglas,$mensajes);
        if($validator->fails()){

            return response()->json([
                'errores' =>$validator->errors(),
                'mensaje'=>'se ha encontrado errores en su peticion :( '
            ],400);
        }else{

        $producto = Producto::find($id);

        $producto->nombre= $request->nombre;
        $producto->descripcion= $request->descripcion;
        $producto->imagen= $request->imagen;
        $producto->precio= $request->precio;
        $producto->marca_id= $request->marca_id;
        $producto->categoria_id= $request->categoria_id;

        $producto->save();

        return $producto;
        return response()->json([
            'producto'=>$producto,
            'mensaje'=>'El producto se ha actualizado con exito'
        ],201);
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
        //
        $reglas = [
            'nombre'=>'required',
            'descripcion'=>'required',
            'imagen'=>'required',
            'precio'=> 'required|numeric|min:0',
            'marca_id'=>'required',
            'categoria_id'=>'required'
        ];

        $mensajes=[
            'nombre.required'=>'El nombre debe ser ingresado',
            'descripcion.required'=>'La descripcion debe ser ingresada',
            'imagen.required'=>'La imagen debe ser ingresada',
            'precio.required'=> 'El precio debe ser ingresado',
            'precio.numeric'=> 'El precio debe ser un numero',
            'precio.min'=> 'El precio debe ser un numero positivo',
            'marca_id.required'=>'La marca debe ser ingresada',
            'categoria_id.required'=>'La descripcion debe ser ingresada'
        ];

        $validator= Validator::make($request->all(),$reglas,$mensajes);
        if($validator->fails()){

            return response()->json([
                'errores' =>$validator->errors(),
                'mensaje'=>'se ha encontrado errores en su peticion :( '
            ],400);
        }else{
        $producto =Producto::find($id);
        $producto->delete();
        return $producto;
        return response()->json([
            'producto'=>$producto,
            'mensaje'=>'El producto se ha actualizado con exito'
        ],201);
        }
    }

    public function productosFiltrados(Request $request){
        $filtroMarca ="";
        $filtroPrecio ="";
        $precioComparacion ="";
        $filtroCategoria ="";
        
        if(!is_null($request->filtroMarca)){
            $productosFiltrados =Producto::where('marca_id',$request->fitroMarca)->get();
        }
        if(!is_null($request->filtroPrecio)){
            $productosFiltrados =Producto::where('precio',$precioComparacion,$request->fitroPrecio)->get();
        }
        if(!is_null($request->filtroCategoria)){
            $productosFiltrados =Producto::where('categoria_id',$request->fitroCategoria)->get();
        }

    }

}
