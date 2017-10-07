<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaAlumno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellido_paterno');
            $table->string('apellido_materno')->nullable();
            $table->string('numero_documento',15)->unique();
            $table->enum('tipo_documento',['DN','CE','PA']);
            $table->date('fecha_nacimiento');
            $table->enum('sexo',['M','F']);
            $table->string('direccion')->nullable();
            $table->string('telf_fijo')->nullable();

            $table->string('codigo_educando')->nullable();
            $table->string('codigo_recaudacion')->nullable();
            $table->string('url_foto')->nullable();
            $table->boolean('padres_juntos')->nullable();
            $table->boolean('activo')->default(true);

            $table->integer('colegio_procedencia_id')->unsigned()->nullable();
            $table->foreign('colegio_procedencia_id')->references('id')->on('colegio_procedencia');

            $table->integer('user_info_id')->unsigned()->nullable()->unique();
            $table->foreign('user_info_id')->references('id')->on('user_info');

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
        Schema::dropIfExists('alumno');
    }
}
