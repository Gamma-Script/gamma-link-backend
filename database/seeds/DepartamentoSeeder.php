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
        $departamento = Departamento::create([
            'nombre'=>'Ahuachapán'
        ]);
        $departamento = Departamento::create([
            'nombre'=>'Santa Ana'
        ]);
        $departamento = Departamento::create([
            'nombre'=>'Sonsonate'
        ]);
        $departamento = Departamento::create([
            'nombre'=>'Chalatenango'
        ]);
        $departamento = Departamento::create([
            'nombre'=>'La Libertad'
        ]);
        $departamento = Departamento::create([
            'nombre'=>'San Salvador'
        ]);
        $departamento = Departamento::create([
            'nombre'=>'Cuscatlán'
        ]);
        $departamento = Departamento::create([
            'nombre'=>'La Paz'
        ]);
        $departamento = Departamento::create([
            'nombre'=>'Cabañas'
        ]);
        $departamento = Departamento::create([
            'nombre'=>'San Vicente'
        ]);
        $departamento = Departamento::create([
            'nombre'=>'Usulután'
        ]);
        $departamento = Departamento::create([
            'nombre'=>'San Miguel'
        ]);
        $departamento = Departamento::create([
            'nombre'=>'Morazán'
        ]);
        $departamento = Departamento::create([
            'nombre'=>'La Unión'
        ]);


    }
}
