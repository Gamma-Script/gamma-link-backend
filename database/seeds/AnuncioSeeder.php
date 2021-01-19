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

        $Anuncio = Anuncio::create([
    		'nombre'=>'Gran Oferta de Verano',
    		'descripcion'=>'Aprovecha nuestra gran oferta',
    		'imagen' => 'default.jgp',
    		'fecha_publicacion' => $this->fechaRandom('2020-11-01 00:00:00','2021-06-01 00:00:00'),
    		'fecha_baja' => $this->fechaRandom('2020-11-01 00:00:00','2021-06-01 00:00:00'),
    		'estado' => 0,
    		'proveedor_id'=>4,
		]);

		$Anuncio = Anuncio::create([
    		'nombre'=>'Gran Oferta de Fin de Año',
    		'descripcion'=>'Aprovecha nuestra gran oferta',
    		'imagen' => 'default.jgp',
    		'fecha_publicacion' => $this->fechaRandom('2020-11-01 00:00:00','2021-06-01 00:00:00'),
    		'fecha_baja' => $this->fechaRandom('2020-11-01 00:00:00','2021-06-01 00:00:00'),
    		'estado' => 0,
    		'proveedor_id'=>3,
		]);

		$Anuncio = Anuncio::create([
    		'nombre'=>'Gran Oferta de Año Escolar',
    		'descripcion'=>'Aprovecha nuestra gran oferta',
    		'imagen' => 'default.jgp',
    		'fecha_publicacion' => $this->fechaRandom('2020-11-01 00:00:00','2021-06-01 00:00:00'),
    		'fecha_baja' => $this->fechaRandom('2020-11-01 00:00:00','2021-06-01 00:00:00'),
    		'estado' => 0,
    		'proveedor_id'=>1,
		]);

		$Anuncio = Anuncio::create([
    		'nombre'=>'Gran Oferta de Agosto',
    		'descripcion'=>'Aprovecha nuestra gran oferta',
    		'imagen' => 'default.jgp',
    		'fecha_publicacion' => $this->fechaRandom('2020-11-01 00:00:00','2021-06-01 00:00:00'),
    		'fecha_baja' => $this->fechaRandom('2020-11-01 00:00:00','2021-06-01 00:00:00'),
    		'estado' => 0,
    		'proveedor_id'=>2,
		]);
    }

    public function fechaRandom($fechaInicio, $fechaFin)
	{
		$min = strtotime($fechaInicio);
	    $max = strtotime($fechaFin);
	    $val = rand($min, $max);
	    return date('Y-m-d H:i:s', $val);
	}
}
