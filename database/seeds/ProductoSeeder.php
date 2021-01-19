<?php

use App\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $producto = Producto::create([
            'nombre'=>'Escoba',
            'descripcion'=>'Escoba para el hogar',
            'imagen' => 'default.jpg',
            'precio' => '3.50',
            'marca_id'=>'2',
            'categoria_id'=>'2',
        ]);

        $producto = Producto::create([
            'nombre'=>'Vajilla',
            'descripcion'=>'Vajilla completa',
            'imagen' => 'default.jpg',
            'precio' => '13.50',
            'marca_id'=>'1',
            'categoria_id'=>'3',
        ]);

        $producto = Producto::create([
            'nombre'=>'Colores',
            'descripcion'=>'Caja de 24 Colores',
            'imagen' => 'default.jpg',
            'precio' => '5.20',
            'marca_id'=>'3',
            'categoria_id'=>'1',
        ]);

        $producto = Producto::create([
            'nombre'=>'Jamón Serrano',
            'descripcion'=>'Serrano',
            'imagen' => 'default.jpg',
            'precio' => '5.20',
            'marca_id'=>'7',
            'categoria_id'=>'4',
        ]);

        $producto = Producto::create([
            'nombre'=>'Jamón de Pavo',
            'descripcion'=>'Pavo',
            'imagen' => 'default.jpg',
            'precio' => '5.20',
            'marca_id'=>'8',
            'categoria_id'=>'4',
        ]);

        $producto = Producto::create([
            'nombre'=>'Lomo de Cerdo',
            'descripcion'=>'Cerdo',
            'imagen' => 'default.jpg',
            'precio' => '5.20',
            'marca_id'=>'8',
            'categoria_id'=>'4',
        ]);

        $producto = Producto::create([
            'nombre'=>'Set de Focos LED',
            'descripcion'=>'LED',
            'imagen' => 'default.jpg',
            'precio' => '5.20',
            'marca_id'=>'6',
            'categoria_id'=>'7',
        ]);

        $producto = Producto::create([
            'nombre'=>'Caja de Switchs Pared ARx1',
            'descripcion'=>'Switchs',
            'imagen' => 'default.jpg',
            'precio' => '5.20',
            'marca_id'=>'8',
            'categoria_id'=>'7',
        ]);

        $producto = Producto::create([
            'nombre'=>'Caja Térmica',
            'descripcion'=>'Térmica',
            'imagen' => 'default.jpg',
            'precio' => '5.20',
            'marca_id'=>'14',
            'categoria_id'=>'7',
        ]);

        $producto = Producto::create([
            'nombre'=>'Memoria RAM 4GB',
            'descripcion'=>'RAM',
            'imagen' => 'default.jpg',
            'precio' => '55.20',
            'marca_id'=>'13',
            'categoria_id'=>'10',
        ]);

        $producto = Producto::create([
            'nombre'=>'Memoria RAM 8GB',
            'descripcion'=>'RAM',
            'imagen' => 'default.jpg',
            'precio' => '76.20',
            'marca_id'=>'13',
            'categoria_id'=>'10',
        ]);

        $producto = Producto::create([
            'nombre'=>'Memoria RAM 16GB',
            'descripcion'=>'RAM',
            'imagen' => 'default.jpg',
            'precio' => '99.20',
            'marca_id'=>'13',
            'categoria_id'=>'10',
        ]);

        $producto = Producto::create([
            'nombre'=>'Galón de Pintura Azul',
            'descripcion'=>'Pintura',
            'imagen' => 'default.jpg',
            'precio' => '23.20',
            'marca_id'=>'15',
            'categoria_id'=>'8',
        ]);

        $producto = Producto::create([
            'nombre'=>'Galón de Pintura Azul',
            'descripcion'=>'Pintura',
            'imagen' => 'default.jpg',
            'precio' => '42.20',
            'marca_id'=>'16',
            'categoria_id'=>'8',
        ]);

        $producto = Producto::create([
            'nombre'=>'Galón de Pintura Roja',
            'descripcion'=>'Pintura',
            'imagen' => 'default.jpg',
            'precio' => '42.20',
            'marca_id'=>'16',
            'categoria_id'=>'8',
        ]);

        $producto = Producto::create([
            'nombre'=>'Monitor 14"',
            'descripcion'=>'Monitor',
            'imagen' => 'default.jpg',
            'precio' => '102.20',
            'marca_id'=>'11',
            'categoria_id'=>'12',
        ]);

        $producto = Producto::create([
            'nombre'=>'Monitor 20"',
            'descripcion'=>'Monitor',
            'imagen' => 'default.jpg',
            'precio' => '89.20',
            'marca_id'=>'12',
            'categoria_id'=>'12',
        ]);

        $producto = Producto::create([
            'nombre'=>'Monitor 20"',
            'descripcion'=>'Monitor',
            'imagen' => 'default.jpg',
            'precio' => '60.20',
            'marca_id'=>'12',
            'categoria_id'=>'12',
        ]);

    }
}
