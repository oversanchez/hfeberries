<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaGrado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grado', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre');
            $table->integer('numero');
            $table->boolean('activo');

            $table->integer('grado_anterior_id')->unsigned()->nullable();
            $table->foreign('grado_anterior_id')->references('id')->on('grado');

            $table->integer('nivel_id')->unsigned();
            $table->foreign('nivel_id')->references('id')->on('nivel');
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
        Schema::dropIfExists('grado');
    }
}
