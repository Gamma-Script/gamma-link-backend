<?php

use App\Sucursal;
use Illuminate\Database\Seeder;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <=4 ; $i++) {
            for ($j=1; $j <=2 ; $j++) {
            	$marca = Sucursal::create([
    	    		'nombre'=>'Sucursal '.$j.' del Proveedor '.$i,
                    'proveedor_id'=>$i,
                    'departamento_id'=>$j
        		]);
            }
        }
    }
}
