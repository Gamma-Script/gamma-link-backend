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
        for ($i=1; $i <=10 ; $i++) {

        	for ($j=1; $j <=3 ; $j++) {

        		$categoria = Categoria::create([
		    		'nombre'=>'Categoria '.$j.' del proveedor '.$i,
		    		'descripcion'=>'Descripción de categoria '.$j.' del proveedor '.$i,
		    		'imagen' => 'Imagen de categoria '.$j.' del proveedor '.$i,
		    		'proveedor_id'=>$i,
	    		]);

        	}
        }
    }
}
