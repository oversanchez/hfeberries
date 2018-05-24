<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaOpcion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opcion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('url');
            $table->boolean('vigencia')->default(true);

            $table->integer('sistema_id')->unsigned();
            $table->foreign('sistema_id')->references('id')->on('sistema');

            $table->integer('opcion_padre_id')->unsigned()->nullable();
            $table->foreign('opcion_padre_id')->references('id')->on('opcion');

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
        Schema::dropIfExists('opcion');
    }
}
