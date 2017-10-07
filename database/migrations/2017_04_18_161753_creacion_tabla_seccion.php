<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaSeccion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seccion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('letra');
            $table->integer('vacantes');

            $table->enum('tipo_calificacion',['L','V']);

            $table->integer('anio_lectivo_id')->unsigned();
            $table->foreign('anio_lectivo_id')->references('id')->on('anio_lectivo');

            $table->integer('turno_id')->unsigned();
            $table->foreign('turno_id')->references('id')->on('turno');

            $table->integer('grado_id')->unsigned();
            $table->foreign('grado_id')->references('id')->on('grado');

            $table->integer('trabajador_id')->unsigned()->nullable();
            $table->foreign('trabajador_id')->references('id')->on('trabajador');

            $table->boolean('activo');
            
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
        Schema::dropIfExists('seccion');
    }
}
