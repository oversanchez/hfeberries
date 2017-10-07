<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaOpcionMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opcion_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orden');
            $table->string('nombre');
            $table->string('url');
            $table->integer('nro_opciones')->default(0);
            $table->enum('tipo',['L','B'])->default('L'); //LINK | BUTTON
            $table->integer('opcion_superior_id')->unsigned()->nullable();
            $table->foreign('opcion_superior_id')->references('id')->on('opcion_menu');
            $table->boolean('publico');

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
        Schema::dropIfExists('opcion_menu');
    }
}
