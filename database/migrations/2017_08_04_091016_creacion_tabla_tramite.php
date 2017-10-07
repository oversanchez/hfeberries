<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaTramite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tramite', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('folios');
            $table->boolean('prioridad')->default(false);

            $table->string('numero_documento');
            $table->string('nombre_completo');
            $table->string('celular');

            $table->string('asunto');
            $table->string('referencia');

            $table->integer('tipo_tramite_id')->unsigned();
            $table->foreign('tipo_tramite_id')->references('id')->on('tipo_tramite');

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
        Schema::dropIfExists('tramite');
    }
}
