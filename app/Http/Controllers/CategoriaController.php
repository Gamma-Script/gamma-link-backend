<?php

namespace App\Http\Controllers;
use App\Categoria;
use App\Proveedor;
use Illuminate\Http\Request;
use Validator;
class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Categoria::all();
    }

    public function indexUsuario(Request $request)
    {
        $tipo=$request->usuarioTipo;
        $idUsuario=$request->usuarioId;
        switch ($tipo) {
            case "0":
                $proveedor = Proveedor::find($idUsuario);
                if(is_null($proveedor)){
                    return response()->json(null,200);
                }else{
                    $categorias = Categoria::where('proveedor_id',$idUsuario);
                    return response()->json($categorias,200);
                }
            break;
            case "1":
                $categorias = Categoria::all();
            break;
        }

        return response()->json($categorias,200);
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
            'descripcion'=>'required',
            'imagen'=>'required',
            'categoria_padre_id'=>'numeric|exists:categorias,id',
            'proveedor_id'=>'numeric|exists:proveedores,id',
        ];
        $mensajes= [
            'nombre.required'=>'Debe ingresar un nombre a la categoria',
            'descripcion.required'=> 'Debe ingresar una descripcion a la categoria',
            'imagen.required'=>'Debe ingresar una imagen',
            'categoria_padre_id.numeric'=>'Debe ingresar un id valido en la categoria',
            'categoria_padre_id.exists'=>'El id de la categoria padre no esta registrado',
            'proveedor_id.numeric'=>'Debe ingresar un id valido de proveedor',
            'proveedor_id.exists'=>'El id del proveedor no esta registrado',

        ];

        $validator = Validator::make($request->all(), $reglas, $mensajes);

        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        else{
            $categoria = new Categoria;
            $categoria->nombre = $request->nombre;
            $categoria->descripcion = $request->descripcion;
            $categoria->imagen=$request->imagen;
            $categoria->categoria_padre_id=$request->categoria_padre_id;
            $categoria->proveedor_id=$request->proveedor_id;
            $categoria->save();
            
            return response()->json($categoria,201);

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
        $categoria = Categoria::find($id);

        if(is_null($categoria)){
            return response()->json(null,404);
            
        }
        else{
            return response()->json($categoria,200);
        }
    }

    public function buscarPorNombre($cadena)
    {
        $categorias = Categoria::where('nombre', 'like', '%'.$cadena.'%')->get();
        if(is_null($categorias)){
            return response()->json(null,404);            
        }
        else{
            return response()->json($categorias,200);
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
        $categoria = Categoria::find($id);
        
        $reglas =[
            'nombre'=>'required',
            'descripcion'=>'required',
            'imagen'=>'required',
            'categoria_padre_id'=>'numeric|exists:categorias,id',
            'proveedor_id'=>'numeric|exists:proveedores,id',

        ];
        $mensajes= [
            'nombre.required'=>'Debe ingresar un nombre a la categoria',
            'descripcion.required'=> 'Debe ingresar una descripcion a la categoria',
            'imagen.required'=>'Debe ingresar una imagen',
            'categoria_padre_id.numeric'=>'Debe ingresar un id valido en la categoria',
            'categoria_padre_id.exists'=>'Debe ingresar un id valido en la categoria',
            'proveedor_id.numeric'=>'Debe ingresar un id valido de proveedor',
            'proveedor_id.exists'=>'El id del proveedor no esta registrado',

        ];
        $validator = Validator::make($request->all(), $reglas, $mensajes);

        if(is_null($categoria)){
            return response()->json(null,404);
            
        }
        else{
            if($validator->fails()){
                return response()->json($validator->errors(),400);
            }
            else{
                
                $categoria->nombre = $request->nombre;
                $categoria->descripcion = $request->descripcion;
                $categoria->imagen=$request->imagen;
                $categoria->categoria_padre_id=$request->categoria_padre_id;
                $categoria->proveedor_id=$request->proveedor_id;
                $categoria->save();
                
                return response()->json($categoria,201);
    
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
        $categoria = Categoria::find($id);

        if(is_null($categoria)){
            return response()->json(null,404);
            
        }
        else{
            $categoria->delete();
            return response()->json('La categoria se ha eliminado con exito',200);
        }
        
    }
}