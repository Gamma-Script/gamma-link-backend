<?php

use App\Departamento;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <=10 ; $i++) {
        	$marca = Departamento::create([
	    		'nombre'=>'Departamento '.$i
    		]);
        }
    }
}