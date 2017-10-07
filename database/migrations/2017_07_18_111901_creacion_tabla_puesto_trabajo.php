<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaPuestoTrabajo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puesto_trabajo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');

            //Responsable
            $table->integer('trabajador_id')->unsigned()->nullable();
            $table->foreign('trabajador_id')->references('id')->on('trabajador');

            $table->boolean('registro')->default(false);

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
        Schema::dropIfExists('puesto_trabajo');
    }
}
