<?php

use App\Puntuacion;
use Illuminate\Database\Seeder;

class PuntuacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <=4 ; $i++) { //Proveedor
        	for ($j=1; $j <=4 ; $j++) { // Cliente
        		$puntuacion = Puntuacion::create([
	        		'puntuacion'=>rand(1,5),
	        		'comentario'=>'Muy buen proveedor',
		    		'proveedor_id'=>$i,
		    		'cliente_id'=>$j,
	    		]);
	        }
        }
    }
}
