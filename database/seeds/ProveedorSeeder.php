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

        $usuario1 = User::create([
            'nombre'=>'Tienda Molina ',
            'email'=>'TiendaMolina@gmail.com',
            'email_verified_at' => now(),
            'password'=>'$2b$10$QdxiokZ1A6HB.4wX.2zIm.GbVpT7r/X2pQVwwmOdfxJxcoRe1VWgy', // password
            'tipo'=>'0',
            'username'=>'TiendaMolina',
            'remember_token' => Str::random(10),
        ]);

        $proveedor1 = Proveedor::create([
            'descripcion'=>'Productos varios',
            'imagen'=>'default.jpg',
            'user_id'=> $usuario1->id
        ]);

        $usuario2 = User::create([
            'nombre'=>'Productos El Zocalo',
            'email'=>'ProductosZocalo@gmail.com',
            'email_verified_at' => now(),
            'password'=>'$2b$10$QdxiokZ1A6HB.4wX.2zIm.GbVpT7r/X2pQVwwmOdfxJxcoRe1VWgy', // password
            'tipo'=>'0',
            'username'=>'ProductosZocalo',
            'remember_token' => Str::random(10),
        ]);

        $proveedor2 = Proveedor::create([
            'descripcion'=>'Productos alimenticios',
            'imagen'=>'default.jpg',
            'user_id'=> $usuario2->id
        ]);

        $usuario3 = User::create([
            'nombre'=>'MATEP',
            'email'=>'MATEP@gmail.com',
            'email_verified_at' => now(),
            'password'=>'$2b$10$QdxiokZ1A6HB.4wX.2zIm.GbVpT7r/X2pQVwwmOdfxJxcoRe1VWgy', // password
            'tipo'=>'0',
            'username'=>'matep',
            'remember_token' => Str::random(10),
        ]);

        $proveedor = Proveedor::create([
            'descripcion'=>'Productos de Ferreteria',
            'imagen'=>'default.jpg',
            'user_id'=> $usuario3->id
        ]);

        $usuario4 = User::create([
            'nombre'=>'Microson',
            'email'=>'Microson@gmail.com',
            'email_verified_at' => now(),
            'password'=>'$2b$10$QdxiokZ1A6HB.4wX.2zIm.GbVpT7r/X2pQVwwmOdfxJxcoRe1VWgy', // password
            'tipo'=>'0',
            'username'=>'microson',
            'remember_token' => Str::random(10),
        ]);

        $proveedor = Proveedor::create([
            'descripcion'=>'Productos Informáticos',
            'imagen'=>'default.jpg',
            'user_id'=> $usuario4->id
        ]);
    	
        
    }
}
