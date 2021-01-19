<?php

use App\Marca;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marca = Marca::create([
            'nombre'=>'El Faro'
        ]);

        $marca = Marca::create([
            'nombre'=>'Gato Negro'
        ]);

        $marca = Marca::create([
            'nombre'=>'Facela'
        ]);

        $marca = Marca::create([
            'nombre'=>'Faber-Castell'
        ]);

        $marca = Marca::create([
            'nombre'=>'Staedler'
        ]);

        $marca = Marca::create([
            'nombre'=>'Stanley'
        ]);

        $marca = Marca::create([
            'nombre'=>'FUD'
        ]);

        $marca8 = Marca::create([
            'nombre'=>'La Única'
        ]);

        $marca = Marca::create([
            'nombre'=>'Sula'
        ]);

        $marca = Marca::create([
            'nombre'=>'Dell'
        ]);

        $marca = Marca::create([
            'nombre'=>'HP'
        ]);

        $marca = Marca::create([
            'nombre'=>'Lenovo'
        ]);

        $marca = Marca::create([
            'nombre'=>'Intel'
        ]);

        $marca14 = Marca::create([
            'nombre'=>'BTicino'
        ]);

        $marca = Marca::create([
            'nombre'=>'Corona'
        ]);

        $marca = Marca::create([
            'nombre'=>'Sherwin-Williams'
        ]);

        $marca = Marca::create([
            'nombre'=>'Samsung'
        ]);

        $marca = Marca::create([
            'nombre'=>'Pajarito'
        ]);

        $marca = Marca::create([
            'nombre'=>'Ken'
        ]);

        $marca = Marca::create([
            'nombre'=>'Kraff'
        ]);

        $marca = Marca::create([
            'nombre'=>'Discovery'
        ]);
    }
}
