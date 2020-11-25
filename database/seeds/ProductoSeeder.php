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
        for ($i=1; $i <=30 ; $i++) { //Categoria
        	for ($j=1; $j <=10 ; $j++) { // Marca
        		for ($k=1; $k<=3 ; $k++) { // Producto
	        		$producto = Producto::create([
			    		'nombre'=>'Producto '.$k.' de Categoria '.$i.' de Marca '.$j,
			    		'descripcion'=>'Descripción de producto '.$k.' de categoría '.$i,
			    		'imagen' => 'Imagen de producti '.$k.' del categoría '.$i,
			    		'precio' => $i+$j,
			    		'marca_id'=>$j,
			    		'categoria_id'=>$i,
		    		]);
	        	}
	        }
        }
    }
}
