<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaFichaMatricula extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_matricula', function (Blueprint $table) {
            $table->increments('id');
            //Datos del alumno
            $table->string('pem');
            $table->enum('tipo_matricula',['N','P','R']); //Nuevo/Promovido/Reingresante
            $table->enum('alumno_apoderado',['P','M','O'])->nullable(); //Padre/Madre/Otro

            $table->integer('seccion_id')->unsigned()->nullable();
            $table->foreign('seccion_id')->references('id')->on('seccion')->onDelete('cascade');

            $table->boolean('activo')->default(true);
            $table->boolean('imprimir')->default(false);

            $table->string('alumno_nombres')->nullable();
            $table->string('alumno_apellido_paterno')->nullable();
            $table->string('alumno_apellido_materno')->nullable();
            $table->string('alumno_numero_documento',15);
            $table->integer('alumno_tipo_documento_id')->unsigned()->nullable();
            $table->foreign('alumno_tipo_documento_id')->references('id')->on('tipo_documento');
            
            $table->date('alumno_fecha_nacimiento')->nullable();
            $table->enum('alumno_sexo',['M','F'])->nullable();
            $table->string('alumno_direccion')->nullable();
            $table->string('alumno_telf_fijo')->nullable();
            $table->boolean('alumno_padres_juntos')->nullable();

            $table->string('alumno_colegio_procedencia')->nullable();
            //Datos del Padre
            $table->string('padre_apellido_paterno')->nullable();
            $table->string('padre_apellido_materno')->nullable();
            $table->string('padre_nombres')->nullable();
            $table->string('padre_numero_documento',15)->nullable();
            $table->integer('padre_tipo_documento_id')->unsigned()->nullable();
            $table->foreign('padre_tipo_documento_id')->references('id')->on('tipo_documento');
            $table->date('padre_fecha_nacimiento')->nullable();
            $table->enum('padre_sexo',['M','F'])->nullable();
            $table->string('padre_direccion')->nullable();
            $table->string('padre_email')->nullable();
            $table->string('padre_telf_movil')->nullable();
            $table->boolean('padre_vive_educando')->nullable();
            $table->enum('padre_estado_civil',['S','C','V','D'])->nullable();
            $table->string('padre_ocupacion')->nullable();
            $table->string('padre_lugar_trabajo')->nullable();
            $table->string('padre_cargo')->nullable();
            $table->integer('padre_nivel_educativo_id')->unsigned()->nullable();
            $table->foreign('padre_nivel_educativo_id')->references('id')->on('nivel_educativo');
            //Datos del Madre
            $table->string('madre_apellido_paterno')->nullable();
            $table->string('madre_apellido_materno')->nullable();
            $table->string('madre_nombres')->nullable();
            $table->string('madre_numero_documento',15)->nullable();
            $table->integer('madre_tipo_documento_id')->unsigned()->nullable();
            $table->foreign('madre_tipo_documento_id')->references('id')->on('tipo_documento');
            $table->date('madre_fecha_nacimiento')->nullable();
            $table->enum('madre_sexo',['M','F'])->nullable();
            $table->string('madre_direccion')->nullable();
            $table->string('madre_email')->nullable();
            $table->string('madre_telf_movil')->nullable();
            $table->boolean('madre_apoderado')->nullable();
            $table->boolean('madre_vive_educando')->nullable();
            $table->enum('madre_estado_civil',['S','C','V','D'])->nullable();
            $table->string('madre_ocupacion')->nullable();
            $table->string('madre_lugar_trabajo')->nullable();
            $table->string('madre_cargo')->nullable();
            $table->integer('madre_nivel_educativo_id')->unsigned()->nullable();
            $table->foreign('madre_nivel_educativo_id')->references('id')->on('nivel_educativo');
            //Datos del Apoderado
            $table->string('apoderado_nombres')->nullable();
            $table->string('apoderado_apellido_paterno')->nullable();
            $table->string('apoderado_apellido_materno')->nullable();
            $table->string('apoderado_numero_documento',15)->nullable();
            $table->integer('apoderado_tipo_documento_id')->unsigned()->nullable();
            $table->foreign('apoderado_tipo_documento_id')->references('id')->on('tipo_documento');
            $table->date('apoderado_fecha_nacimiento')->nullable();
            $table->enum('apoderado_sexo',['M','F'])->nullable();
            $table->string('apoderado_direccion')->nullable();
            $table->string('apoderado_email')->nullable();
            $table->string('apoderado_telf_movil')->nullable();
            $table->boolean('apoderado_vive_educando')->nullable();
            $table->enum('apoderado_estado_civil',['S','C','V','D'])->nullable();
            $table->string('apoderado_ocupacion')->nullable();
            $table->string('apoderado_lugar_trabajo')->nullable();
            $table->string('apoderado_cargo')->nullable();
            $table->integer('apoderado_parentesco_id')->unsigned()->nullable();
            $table->foreign('apoderado_parentesco_id')->references('id')->on('parentesco');
            $table->integer('apoderado_nivel_educativo_id')->unsigned()->nullable();
            $table->foreign('apoderado_nivel_educativo_id')->references('id')->on('nivel_educativo');


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
        Schema::dropIfExists('ficha_matricula');
    }
}
