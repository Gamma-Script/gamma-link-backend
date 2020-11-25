<?php

use App\Cliente;
use App\User;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
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
	    		'nombre'=>'Nombre'.$i,
	    		'apellido'=>'Apellido'.$i,
	    		'email'=>'Cliente'.$i.'@gmail.com',
	    		'email_verified_at' => now(),
	    		'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
	    		'tipo'=>'1',
	    		'username'=>'Cliente'.$i,
	    		'remember_token' => Str::random(10),
    		]);

    		$cliente = Cliente::create([
	    		'user_id'=> $usuario->id
    		]);
    		
    	}
    }
}
