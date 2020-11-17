<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            
            $table->bigIncrements('id');

            $table->string('nombre',128);
            $table->string('descripcion',512);
            $table->string('imagen',512);

            $table->unsignedBigInteger('proveedor_id')->nullable();
            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('CASCADE');

            $table->unsignedBigInteger('categoria_padre_id')->nullable();
            $table->foreign('categoria_padre_id')->references('id')->on('categorias')->onDelete('SET NULL');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}
