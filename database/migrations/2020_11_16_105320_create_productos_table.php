<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            
            $table->bigIncrements('id');

            $table->string('nombre',128);
            $table->string('descripcion',512);
            $table->string('imagen',512);
            $table->float('precio',8,2);

            $table->unsignedBigInteger('proveedor_id');
            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('CASCADE');

            $table->unsignedBigInteger('marca_id');
            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('CASCADE');

            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('CASCADE');

            $table->unsignedBigInteger('sucursal_id')->nullable();
            $table->foreign('sucursal_id')->references('id')->on('sucursales')->onDelete('SET NULL');

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
        Schema::dropIfExists('productos');
    }
}
