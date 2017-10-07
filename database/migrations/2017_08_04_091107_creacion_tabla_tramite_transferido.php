<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaTramiteTransferido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramite_transferido', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('tramite_id')->unsigned();
            $table->foreign('tramite_id')->references('id')->on('tramite');

            //Trabajador : EMITE Y RECIBE
            $table->integer('emite_trabajador_id')->unsigned()->nullable();
            $table->foreign('emite_trabajador_id')->references('id')->on('trabajador');
            $table->integer('emite_puesto_trabajo_id')->unsigned()->nullable();
            $table->foreign('emite_puesto_trabajo_id')->references('id')->on('puesto_trabajo');
            $table->dateTime('emite_fecha')->nullable();
            $table->string('emite_observacion')->nullable();
            $table->integer('emite_estado_tramite_id')->unsigned()->nullable();
            $table->foreign('emite_estado_tramite_id')->references('id')->on('estado_tramite');

            $table->integer('recibe_trabajador_id')->unsigned()->nullable();
            $table->foreign('recibe_trabajador_id')->references('id')->on('trabajador');
            $table->integer('recibe_puesto_trabajo_id')->unsigned()->nullable();
            $table->foreign('recibe_puesto_trabajo_id')->references('id')->on('puesto_trabajo');
            $table->dateTime('recibe_fecha')->nullable();
            $table->string('recibe_observacion')->nullable();
            $table->integer('recibe_estado_tramite_id')->unsigned()->nullable();
            $table->foreign('recibe_estado_tramite_id')->references('id')->on('estado_tramite');


            $table->boolean('vigencia');

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
        Schema::dropIfExists('tramite_transferido');
    }
}
