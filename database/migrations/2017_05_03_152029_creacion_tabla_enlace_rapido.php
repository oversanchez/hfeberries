<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaEnlaceRapido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enlace_rapido', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orden');
            $table->string('nombre');
            $table->enum('categoria',['CO','DO','DE']);
            $table->string('url');
            $table->string('color')->nullable();
            $table->boolean('publico')->default(true);
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
        Schema::dropIfExists('enlace_rapido');
    }
}
