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
        $usuario5 = User::create([
            'nombre'=>'Juan',
            'apellido'=>'Pérez',
            'email'=>'jperez@gmail.com',
            'email_verified_at' => now(),
            'password'=>'$2b$10$QdxiokZ1A6HB.4wX.2zIm.GbVpT7r/X2pQVwwmOdfxJxcoRe1VWgy', // password
            'tipo'=>'1',
            'username'=>'jperez',
            'remember_token' => Str::random(10),
        ]);

        $cliente5 = Cliente::create([
                'user_id'=> $usuario5->id
            ]);

        $usuario6 = User::create([
            'nombre'=>'Carlos',
            'apellido'=>'Martínez',
            'email'=>'Cmartinez@gmail.com',
            'email_verified_at' => now(),
            'password'=>'$2b$10$QdxiokZ1A6HB.4wX.2zIm.GbVpT7r/X2pQVwwmOdfxJxcoRe1VWgy', // password
            'tipo'=>'1',
            'username'=>'Cmartinez',
            'remember_token' => Str::random(10),
        ]);

        $cliente6 = Cliente::create([
                'user_id'=> $usuario6->id
            ]);

        $usuario7 = User::create([
            'nombre'=>'Pablo',
            'apellido'=>'Bonilla',
            'email'=>'pbonilla@gmail.com',
            'email_verified_at' => now(),
            'password'=>'$2b$10$QdxiokZ1A6HB.4wX.2zIm.GbVpT7r/X2pQVwwmOdfxJxcoRe1VWgy', // password
            'tipo'=>'1',
            'username'=>'pbonilla',
            'remember_token' => Str::random(10),
        ]);

        $cliente7 = Cliente::create([
                'user_id'=> $usuario7->id
            ]);

        $usuario8 = User::create([
            'nombre'=>'Juan',
            'apellido'=>'Escobar',
            'email'=>'jescobar@gmail.com',
            'email_verified_at' => now(),
            'password'=>'$2b$10$QdxiokZ1A6HB.4wX.2zIm.GbVpT7r/X2pQVwwmOdfxJxcoRe1VWgy', // password
            'tipo'=>'1',
            'username'=>'jescobar',
            'remember_token' => Str::random(10),
        ]);

        $cliente8 = Cliente::create([
                'user_id'=> $usuario8->id
            ]);
    }
}
