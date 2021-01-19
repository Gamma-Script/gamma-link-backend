<?php

use App\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria1 = Categoria::create([
            'nombre'=>'Abarrotes',
            'descripcion'=>'Articulos de Abarrotes',
            'imagen' => 'default.jpg',
            'proveedor_id'=>1
        ]);

        $categoria2 = Categoria::create([
            'nombre'=>'Hogar',
            'descripcion'=>'Articulos de Hogar',
            'imagen' => 'default.jpg',
            'proveedor_id'=>1
        ]);

        $categoria3 = Categoria::create([
            'nombre'=>'Cocina',
            'descripcion'=>'Articulos de Cocina',
            'imagen' => 'default.jpg',
            'proveedor_id'=>1
        ]);

        $categoria4 = Categoria::create([
            'nombre'=>'Carnes',
            'descripcion'=>'Carnes',
            'imagen' => 'default.jpg',
            'proveedor_id'=>2
        ]);

        $categoria5 = Categoria::create([
            'nombre'=>'Bebidas',
            'descripcion'=>'Bebidas',
            'imagen' => 'default.jpg',
            'proveedor_id'=>2
        ]);

        $categoria6 = Categoria::create([
            'nombre'=>'Panaderia',
            'descripcion'=>'Panaderia',
            'imagen' => 'default.jpg',
            'proveedor_id'=>2
        ]);

        $categoria7 = Categoria::create([
            'nombre'=>'Electricidad',
            'descripcion'=>'Electricidad',
            'imagen' => 'default.jpg',
            'proveedor_id'=>3
        ]);

        $categoria8 = Categoria::create([
            'nombre'=>'Pintura',
            'descripcion'=>'Pintura',
            'imagen' => 'default.jpg',
            'proveedor_id'=>3
        ]);

        $categoria9 = Categoria::create([
            'nombre'=>'Fontaneria',
            'descripcion'=>'Fontaneria',
            'imagen' => 'default.jpg',
            'proveedor_id'=>3
        ]);

        $categoria10 = Categoria::create([
            'nombre'=>'Memorias',
            'descripcion'=>'Memorias',
            'imagen' => 'default.jpg',
            'proveedor_id'=>4
        ]);

        $categoria11 = Categoria::create([
            'nombre'=>'CPUs',
            'descripcion'=>'CPUs',
            'imagen' => 'default.jpg',
            'proveedor_id'=>4
        ]);

        $categoria12 = Categoria::create([
            'nombre'=>'Monitores',
            'descripcion'=>'Monitores',
            'imagen' => 'default.jpg',
            'proveedor_id'=>4
        ]);



    }
}
