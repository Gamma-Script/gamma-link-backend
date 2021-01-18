<?php

namespace App\Http\Controllers;

use App\Marca;
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
        return Producto::with('marca', 'categoria')->get();
    }

    public function indexProveedor($id)
    {
        $proveedor = Proveedor::find($id);
        if (is_null($proveedor)) {
            return response()->json(null, 200);
        } else {
            $categorias = $proveedor->categorias;
            foreach ($categorias as $categoria) {

                $productosCategoria = $categoria->productos;
                foreach ($productosCategoria as $p) {
                    $p->marca;
                    $p->categoria;
                    $productosProveedor[] = $p;
                }
            }
            return response()->json($productosProveedor, 200);
        }
    }

    public function getMarcas()
    {
        return Marca::all();
    }

    public function indexUsuario(Request $request)
    {
        $tipo = $request->usuarioTipo;
        $idUsuario = $request->usuarioId;
        $productosProveedor = [];
        switch ($tipo) {
            case "0":
                $proveedor = Proveedor::find($idUsuario);
                if (is_null($proveedor)) {
                    return response()->json(null, 200);
                } else {
                    $categorias = $proveedor->categorias;
                    foreach ($categorias as $categoria) {

                        $productosCategoria = $categoria->productos;

                        $marca = $request->filtroMarca;
                        $categoria = $request->filtroCategoria;
                        $precio = $request->filtroPrecio;

                        if (!is_null($marca) && !is_null($categoria) && !is_null($precio)) {
                            $productosFiltrados = $productosCategoria->where('marca_id', $marca)->where('categoria_id', $categoria)->where('precio', '<=', $precio);
                        } elseif (!is_null($marca) && !is_null($categoria)) {
                            $productosFiltrados = $productosCategoria->where('marca_id', $marca)->where('categoria_id', $categoria);
                        } elseif (!is_null($marca) && !is_null($precio)) {
                            $productosFiltrados = $productosCategoria->where('marca_id', $marca)->where('precio', '<=', $precio);
                        } elseif (!is_null($marca)) {
                            $productosFiltrados = $productosCategoria->where('marca_id', $marca);
                        } elseif (!is_null($categoria) && !is_null($precio)) {
                            $productosFiltrados = $productosCategoria->where('categoria_id', $categoria)->where('precio', '<=', $precio);
                        } elseif (!is_null($categoria)) {
                            $productosFiltrados = $productosCategoria->where('categoria_id', $categoria);
                        } elseif (!is_null($precio)) {
                            $productosFiltrados = $productosCategoria->where('precio', '<=', $precio);
                        } else {
                            $productosFiltrados = $productosCategoria;
                        }

                        foreach ($productosFiltrados as $productoFiltrado) {
                            $productosProveedor[] = $productoFiltrado;
                        }
                    }
                    return response()->json($productosProveedor, 200);
                }
                break;
            case "1":
                $marca = $request->filtroMarca;
                $categoria = $request->filtroCategoria;
                $precio = $request->filtroPrecio;

                if (!is_null($marca) && !is_null($categoria) && !is_null($precio)) {
                    $productos = Producto::where('marca_id', $marca)->where('categoria_id', $categoria)->where('precio', '<=', $precio)->get();
                } elseif (!is_null($marca) && !is_null($categoria)) {
                    $productos = Producto::where('marca_id', $marca)->where('categoria_id', $categoria)->get();
                } elseif (!is_null($marca) && !is_null($precio)) {
                    $productos = Producto::where('marca_id', $marca)->where('precio', '<=', $precio)->get();
                } elseif (!is_null($marca)) {
                    $productos = Producto::where('marca_id', $marca)->get();
                } elseif (!is_null($categoria) && !is_null($precio)) {
                    $productos = Producto::where('categoria_id', $categoria)->where('precio', '<=', $precio)->get();
                } elseif (!is_null($categoria)) {
                    $productos = Producto::where('categoria_id', $categoria)->get();
                } elseif (!is_null($precio)) {
                    $productos = Producto::where('precio', '<=', $precio)->get();
                } else {
                    $productos = Producto::all();
                }

                $cantidad = count($productos);
                return response()->json($productos, 200);
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
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
            'precio' => 'required|numeric|min:0',
            'marca_id' => 'required',
            'categoria_id' => 'required'
        ];

        $mensajes = [
            'nombre.required' => 'El nombre debe ser ingresado',
            'descripcion.required' => 'La descripcion debe ser ingresada',
            'imagen.required' => 'La imagen debe ser ingresada',
            'precio.required' => 'El precio debe ser ingresado',
            'precio.numeric' => 'El precio debe ser un numero',
            'precio.min' => 'El precio debe ser un numero positivo',
            'marca_id.required' => 'La marca debe ser ingresada',
            'categoria_id.required' => 'La categoria debe ser ingresada' //
        ];

        $validator = Validator::make($request->all(), $reglas, $mensajes);

        if ($validator->fails()) {

            return response()->json($validator->errors(), 400);
        } else {
            $producto = new Producto;

            $producto->nombre = $request->nombre;
            $producto->descripcion = $request->descripcion;
            $producto->imagen = $request->imagen;
            $producto->precio = $request->precio;
            $producto->marca_id = $request->marca_id;
            $producto->categoria_id = $request->categoria_id;
            $producto->save();

            // return $producto;
            return response()->json($producto, 201);
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
        if (is_null($producto)) {
            return response()->json(null, 400);
        } else {
            return response()->json($producto, 200);
        }
    }

    public function buscarPorNombre($cadena)
    {
        $productos = Producto::with('marca', 'categoria')->where('nombre', 'like', '%' . $cadena . '%')->get();
        if (is_null($productos)) {
            return response()->json(null, 404);
        } else {
            return response()->json($productos, 200);
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
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
            'precio' => 'required|numeric|min:0',
            'marca_id' => 'required',
            'categoria_id' => 'required'
        ];

        $mensajes = [
            'nombre.required' => 'El nombre debe ser ingresado',
            'descripcion.required' => 'La descripcion debe ser ingresada',
            'imagen.required' => 'La imagen debe ser ingresada',
            'precio.required' => 'El precio debe ser ingresado',
            'precio.numeric' => 'El precio debe ser un numero',
            'precio.min' => 'El precio debe ser un numero positivo',
            'marca_id.required' => 'La marca debe ser ingresada',
            'categoria_id.required' => 'La descripcion debe ser ingresada'
        ];

        $validator = Validator::make($request->all(), $reglas, $mensajes);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {

            $producto = Producto::find($id);

            if (is_null($producto)) {
                return response()->json(null, 404);
            } else {

                $producto->nombre = $request->nombre;
                $producto->descripcion = $request->descripcion;
                $producto->imagen = $request->imagen;
                $producto->precio = $request->precio;
                $producto->marca_id = $request->marca_id;
                $producto->categoria_id = $request->categoria_id;

                $producto->save();

                return response()->json($producto, 200);
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

        if (is_null($producto)) {
            return response()->json(null, 404);
        } else {
            $producto->delete();
            return response()->json('El producto se ha eliminado con exito', 200);
        }
    }

    public function productosFiltrados($marca, $categoria, $precio)
    {
        if ($marca !=0 && $categoria !=0 && $precio !=0) {
            $productos = Producto::with('marca', 'categoria')->where('marca_id', $marca)->where('categoria_id', $categoria)->where('precio', '<=', $precio)->get();
        } elseif ($marca !=0 && $categoria !=0) {
            $productos = Producto::with('marca', 'categoria')->where('marca_id', $marca)->where('categoria_id', $categoria)->get();
        } elseif ($marca !=0 && $precio !=0) {
            $productos = Producto::with('marca', 'categoria')->where('marca_id', $marca)->where('precio', '<=', $precio)->get();
        } elseif ($marca !=0) {
            $productos = Producto::with('marca', 'categoria')->where('marca_id', $marca)->get();
        } elseif ($categoria !=0 && $precio !=0) {
            $productos = Producto::with('marca', 'categoria')->where('categoria_id', $categoria)->where('precio', '<=', $precio)->get();
        } elseif ($categoria !=0) {
            $productos = Producto::with('marca', 'categoria')->where('categoria_id', $categoria)->get();
        } elseif ($precio !=0) {
            $productos = Producto::with('marca', 'categoria')->where('precio', '<=', $precio)->get();
        } else {
            $productos = Producto::with('marca', 'categoria')->get();
        }
        $cantidad = count($productos);
        return response()->json($productos, 200);
    }
}
