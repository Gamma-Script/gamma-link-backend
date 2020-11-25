<?php

use App\Anuncio;
use Illuminate\Database\Seeder;

class AnuncioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=1; $i <=10 ; $i++) { //Proveedor
        	for ($j=1; $j <=3 ; $j++) { //Anuncio

        		$Anuncio = Anuncio::create([
		    		'nombre'=>'Anuncio '.$j.' del proveedor '.$i,
		    		'descripcion'=>'Descripción de Anuncio '.$j.' del proveedor '.$i,
		    		'imagen' => 'Imagen de Anuncio '.$j.' del proveedor '.$i,
		    		'fecha_publicacion' => $this->fechaRandom('2020-11-01 00:00:00','2021-06-01 00:00:00'),
		    		'fecha_baja' => $this->fechaRandom('2020-11-01 00:00:00','2021-06-01 00:00:00'),
		    		'estado' => 0,
		    		'proveedor_id'=>$i,
	    		]);
        	}
        }
    }

    public function fechaRandom($fechaInicio, $fechaFin)
	{
		$min = strtotime($fechaInicio);
	    $max = strtotime($fechaFin);
	    $val = rand($min, $max);
	    return date('Y-m-d H:i:s', $val);
	}
}
