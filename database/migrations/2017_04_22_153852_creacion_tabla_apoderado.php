<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaApoderado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apoderado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellido_paterno');
            $table->string('apellido_materno')->nullable();
            $table->string('numero_documento',15);
            $table->enum('tipo_documento',['DN','CE','PA']);
            $table->date('fecha_nacimiento');
            $table->enum('sexo',['M','F']);
            $table->string('direccion');
            $table->string('email')->nullable();
            $table->string('telf_movil');
            $table->string('telf_fijo')->nullable();

            $table->boolean('apoderado');
            $table->boolean('vive_educando');
            $table->enum('estado_civil',['SO','CA','VI','DI']);
            $table->string('ocupacion');
            $table->string('lugar_trabajo');

            $table->boolean('activo');

            $table->integer('alumno_id')->unsigned();
            $table->foreign('alumno_id')->references('id')->on('alumno');

            $table->integer('parentesco_id')->unsigned();
            $table->foreign('parentesco_id')->references('id')->on('parentesco');

            $table->integer('nivel_educativo_id')->unsigned();
            $table->foreign('nivel_educativo_id')->references('id')->on('nivel_educativo');

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
        Schema::dropIfExists('apoderado');
    }
}
