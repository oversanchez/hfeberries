<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaInformacionMedica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacion_medica', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('especial');
            $table->boolean('diabetico');
            $table->boolean('operado');
            $table->boolean('perdida_conocimiento');
            $table->boolean('convulsiones_epilepsia');
            $table->text('impedimientos_fisicos');
            $table->text('enfermedades');
            $table->text('alergias');
            $table->text('alergias_sintomas');
            $table->boolean('medicado');
            $table->text('medicado_dosis');
            $table->text('medicado_forma');
            $table->text('medicinas_contraindicadas');
            $table->text('otros');

            $table->enum('grupo_sanguineo',['O-','O+','A−','A+','B−','B+','AB−','AB+']);

            $table->integer('alumno_id')->unsigned();
            $table->foreign('alumno_id')->references('id')->on('alumno')->onDelete('cascade');
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
        Schema::dropIfExists('informacion_medica');
    }
}
