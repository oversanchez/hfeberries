<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaTrabajador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajador', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellido_paterno');
            $table->string('apellido_materno')->nullable();
            $table->string('numero_documento',15)->unique();
            $table->enum('tipo_documento',['DN','CE','PA']);
            $table->date('fecha_nacimiento');
            $table->enum('sexo',['M','F']);
            $table->string('direccion');
            $table->string('email')->unique();
            $table->string('telf_movil');
            $table->string('telf_fijo')->nullable();

            $table->boolean('activo');
            
            $table->integer('categoria_trabajador_id')->unsigned();
            $table->foreign('categoria_trabajador_id')->references('id')->on('categoria_trabajador');

            $table->integer('nivel_educativo_id')->unsigned();
            $table->foreign('nivel_educativo_id')->references('id')->on('nivel_educativo');
            
            $table->integer('especialidad_id')->unsigned();
            $table->foreign('especialidad_id')->references('id')->on('especialidad');

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
        Schema::dropIfExists('trabajador');
    }
}
