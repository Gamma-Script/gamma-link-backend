<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Proveedor;


use Validator; //validator

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

    public function indexUsuario(Request $request)
    {
        $tipo=$request->usuarioTipo;
        $idUsuario=$request->usuarioId;
        $productosProveedor=[];
        switch ($tipo) {
            case "0":
                $proveedor = Proveedor::find($idUsuario);
                if(is_null($proveedor)){
                    return response()->json(['proveedor'=>null,'mensaje'=>'El proveedor no está registrado en la base de datos'],200);
                }else{
                    $categorias = $proveedor->categorias;
                    foreach ($categorias as $categoria) {

                        $productosCategoria = $categoria->productos;

                        $marca = $request->filtroMarca;
                        $categoria = $request->filtroCategoria;
                        $precio = $request->filtroPrecio;

                        if(!is_null($marca) && !is_null($categoria) && !is_null($precio)){
                            $productosFiltrados = $productosCategoria->where('marca_id',$marca)->where('categoria_id',$categoria)->where('precio','<=',$precio);
                        }elseif(!is_null($marca) && !is_null($categoria)){
                            $productosFiltrados = $productosCategoria->where('marca_id',$marca)->where('categoria_id',$categoria);
                        }elseif(!is_null($marca) && !is_null($precio)){
                            $productosFiltrados = $productosCategoria->where('marca_id',$marca)->where('precio','<=',$precio);
                        }elseif(!is_null($marca)){
                            $productosFiltrados = $productosCategoria->where('marca_id',$marca);
                        }elseif(!is_null($categoria) && !is_null($precio)){
                            $productosFiltrados = $productosCategoria->where('categoria_id',$categoria)->where('precio','<=',$precio);
                        }elseif(!is_null($categoria)){
                            $productosFiltrados = $productosCategoria->where('categoria_id',$categoria);
                        }elseif(!is_null($precio)){
                            $productosFiltrados = $productosCategoria->where('precio','<=',$precio);
                        }else{
                            $productosFiltrados = $productosCategoria;
                        }

                        foreach ($productosFiltrados as $productoFiltrado) {
                            $productosProveedor[]=$productoFiltrado;
                        }
                    }
                    return response()->json(['cantidad'=>count($productosProveedor),'productos'=>$productosProveedor, 'mensaje'=>'Productos obtenidas con exito'],200);
                }
            break;
            case "1":
                $marca = $request->filtroMarca;
                $categoria = $request->filtroCategoria;
                $precio = $request->filtroPrecio;

                if(!is_null($marca) && !is_null($categoria) && !is_null($precio)){
                    $productos = Producto::where('marca_id',$marca)->where('categoria_id',$categoria)->where('precio','<=',$precio)->get();
                }elseif(!is_null($marca) && !is_null($categoria)){
                    $productos = Producto::where('marca_id',$marca)->where('categoria_id',$categoria)->get();
                }elseif(!is_null($marca) && !is_null($precio)){
                    $productos = Producto::where('marca_id',$marca)->where('precio','<=',$precio)->get();
                }elseif(!is_null($marca)){
                    $productos = Producto::where('marca_id',$marca)->get();
                }elseif(!is_null($categoria) && !is_null($precio)){
                    $productos = Producto::where('categoria_id',$categoria)->where('precio','<=',$precio)->get();
                }elseif(!is_null($categoria)){
                    $productos = Producto::where('categoria_id',$categoria)->get();
                }elseif(!is_null($precio)){
                    $productos = Producto::where('precio','<=',$precio)->get();
                }else{
                    $productos = Producto::all();
                }

                $cantidad = count($productos);
                return response()->json(['cantidad'=>$cantidad,'productos'=>$productos, 'mensaje'=>'Productos obtenidas con exito'],200);
            break;
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
            'categoria_id.required'=>'La categoria debe ser ingresada' //
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
    
            // return $producto;
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
        $producto = Producto::find($id);
        if(is_null($producto)){
            return response()->json(['producto'=>null,'mensaje'=>'El producto no está registrado en la base de datos'],400);
        }else{
            return response()->json(['producto'=>$producto,'mensaje'=>'El producto obtenido con exito'],200);
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
            
            if(is_null($producto)){
                return response()->json(['producto'=>null,'mensaje'=>'El producto no está registrado en la base de datos'],404);
            }else{
                
                $producto->nombre= $request->nombre;
                $producto->descripcion= $request->descripcion;
                $producto->imagen= $request->imagen;
                $producto->precio= $request->precio;
                $producto->marca_id= $request->marca_id;
                $producto->categoria_id= $request->categoria_id;
                
                $producto->save();

                return response()->json(['producto'=>$producto,'mensaje'=>'El producto se ha actualizado con exito'],200);

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
        $producto = Producto::find($id);

        if(is_null($producto)){
            return response()->json(['producto'=>null,'mensaje'=>'El producto no está registrado en la base de datos'],404);
        }
        else{
            $producto->delete();
            return response()->json(['mensaje'=> 'El producto se ha eliminado con exito'],200);
        }
    }

    public function productosFiltrados(Request $request){
        
        $marca = $request->filtroMarca;
        $categoria = $request->filtroCategoria;
        $precio = $request->filtroPrecio;

        if(!is_null($marca) && !is_null($categoria) && !is_null($precio)){
            $productos = Producto::where('marca_id',$marca)->where('categoria_id',$categoria)->where('precio','<=',$precio)->get();
        }elseif(!is_null($marca) && !is_null($categoria)){
            $productos = Producto::where('marca_id',$marca)->where('categoria_id',$categoria)->get();
        }elseif(!is_null($marca) && !is_null($precio)){
            $productos = Producto::where('marca_id',$marca)->where('precio','<=',$precio)->get();
        }elseif(!is_null($marca)){
            $productos = Producto::where('marca_id',$marca)->get();
        }elseif(!is_null($categoria) && !is_null($precio)){
            $productos = Producto::where('categoria_id',$categoria)->where('precio','<=',$precio)->get();
        }elseif(!is_null($categoria)){
            $productos = Producto::where('categoria_id',$categoria)->get();
        }elseif(!is_null($precio)){
            $productos = Producto::where('precio','<=',$precio)->get();
        }else{
            $productos = Producto::all();
        }

        $cantidad = count($productos);

        return response()->json([
            'cantidad'=>$cantidad,
            'mensaje'=>'Lista de productos filtrados',
            'productos'=>$productos,
        ],200);

    }

}
