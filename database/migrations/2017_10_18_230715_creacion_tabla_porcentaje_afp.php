<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaPorcentajeAfp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('porcentaje_afp', function (Blueprint $table) {
            $table->increments('id');
            $table->date('periodo');
            $table->float('aporte_fondo');
            $table->float('seguro_invalidez');
            $table->float('comision_mixta');
            $table->float('comision_flujo');
            $table->float('tope_prima');

            //$table->integer('regimen_pensionario_id')->unsigned();
            //$table->foreign('regimen_pensionario_id')->references('id')->on('regimen_pensionario')->onDelete('cascade');
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
        Schema::dropIfExists('porcentaje_afp');
    }
}
