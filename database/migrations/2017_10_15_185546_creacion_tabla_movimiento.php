<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaMovimiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',4);
            $table->string('nombre',120);

            $table->integer('tipo_movimiento_id')->unsigned();
            $table->foreign('tipo_movimiento_id')->references('id')->on('tipo_movimiento')->onDelete('cascade');

            $table->boolean('afecta_senati')->default(false);
            $table->boolean('afecta_sctr')->default(false);
            $table->boolean('afecta_snp')->default(false);
            $table->boolean('afecta_spp')->default(false);
            $table->boolean('afecta_renta_quinta')->default(false);
            $table->boolean('afecta_essalud_pens')->default(false);

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
        Schema::dropIfExists('movimiento');
    }
}
