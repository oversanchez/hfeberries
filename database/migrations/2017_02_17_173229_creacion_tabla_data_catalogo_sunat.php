<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaDataCatalogoSunat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_catalogo_sunat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->string('abreviatura')->nullable();
            $table->boolean('sector_privado')->nullable();
            $table->boolean('sector_publico')->nullable();
            $table->boolean('otras_entidades')->nullable();
            $table->boolean('vigente')->default(true);

            $table->integer('catalogo_sunat_id')->unsigned()->nullable();
            $table->foreign('catalogo_sunat_id')->references('id')->on('catalogo_sunat');
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
        Schema::dropIfExists('data_catalogo_sunat');
    }
}
