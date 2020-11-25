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
        for ($i=1; $i <=10 ; $i++) { //Proveedor
        	for ($j=1; $j <=10 ; $j++) { // Cliente
        		$puntuacion = Puntuacion::create([
	        		'puntuacion'=>rand(1,5),
	        		'comentario'=>'Comentario sobre proveedor '.$i.' por parte del cliente '.$j,
		    		'proveedor_id'=>$i,
		    		'cliente_id'=>$j,
	    		]);
	        }
        }
    }
}
