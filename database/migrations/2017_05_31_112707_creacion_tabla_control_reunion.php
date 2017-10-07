<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaControlReunion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_reunion', function (Blueprint $table) {
            $table->increments('id');

            $table->string('ref_alumno');
            $table->string('ref_seccion');

            $table->enum('sexo',['M','F']);
            $table->string('nombre_completo');
            $table->string('numero_documento',15)->nullable();

            ;
            $table->dateTime('marcacion')->nullable();

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
        Schema::dropIfExists('control_reunion');
    }
}


