<?php

use App\User;
use App\Proveedor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=1; $i <=10 ; $i++) {

    		$usuario = User::create([
	    		'nombre'=>'Proveedor '.$i,
	    		'email'=>'proveedor'.$i.'@gmail.com',
	    		'email_verified_at' => now(),
	    		'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
	    		'tipo'=>'0',
	    		'username'=>'Proveedor '.$i,
	    		'remember_token' => Str::random(10),
    		]);

    		$proveedor = Proveedor::create([
	    		'descripcion'=>'Descripción del Proveedor '.$i,
	    		'imagen'=>'Imagen del Proveedor '.$i,
	    		'user_id'=> $usuario->id
    		]);
    		
    	}
    	
        
    }
}
