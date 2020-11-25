<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        	ProveedorSeeder::class,
            ClienteSeeder::class,
            CategoriaSeeder::class,
            MarcaSeeder::class,
            ProductoSeeder::class,
            AnuncioSeeder::class,
            PuntuacionSeeder::class,
        ]);
    }
}
