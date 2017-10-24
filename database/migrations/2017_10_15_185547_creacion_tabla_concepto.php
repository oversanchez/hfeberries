<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaConcepto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concepto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',50);
            $table->string('abreviatura',10);
            $table->string('descripcion',130);
            $table->enum('tipo',['I','D','A']);
            $table->enum('columna_boleta',['I','D','A']);
            $table->integer('orden')->default(-1);
            $table->boolean('afecta_remuneracion_computable');
            $table->boolean('renta_quinta_fijo');
            $table->boolean('afecta_plame');

            $table->integer('movimiento_id')->unsigned()->nullable();
            $table->foreign('movimiento_id')->references('id')->on('movimiento');
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
        Schema::dropIfExists('concepto');
    }
}
