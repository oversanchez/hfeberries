<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaFamiliar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familiar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_completo');
            $table->enum('tipo_documento',['DN','CE','PA'])->default('DN')->nullable();
            $table->string('numero_documento',15)->unique()->nullable();
            $table->enum('sexo',['M','F']);
            $table->date('fecha_nacimiento')->nullable();
            $table->string('direccion')->nullable();
            $table->string('email')->nullable();
            $table->string('telf_movil')->nullable();
            $table->string('telf_fijo')->nullable();

            $table->enum('estado_civil',['SO','CA','VI','DI'])->nullable();
            $table->string('ocupacion')->nullable();
            $table->string('lugar_trabajo')->nullable();

            $table->boolean('activo')->default(true);

            $table->integer('nivel_educativo_id')->unsigned()->nullable();
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
        Schema::dropIfExists('familiar');
    }
}
