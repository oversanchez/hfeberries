<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaEmergente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('fecha');
            $table->text('contenido')->nullable();
            $table->string('url');
            $table->string('url_foto')->default("#");
            $table->enum('tipo',["L","P","I"]);
            $table->boolean('publico');
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
        Schema::dropIfExists('emergente');
    }
}
