<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaGrupoOpcion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_opcion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('grupo_id')->unsigned()->nullable();
            $table->foreign('grupo_id')->references('id')->on('grupo')->onDelete('cascade');
            $table->integer('opcion_id')->unsigned()->nullable();
            $table->foreign('opcion_id')->references('id')->on('opcion')->onDelete('cascade');
            $table->boolean('vigencia')->default(true);
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
        Schema::dropIfExists('grupo_opcion');
    }
}
