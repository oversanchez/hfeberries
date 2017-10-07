<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablaTestimonio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('url_foto');
            $table->string('empresa');
            $table->string('ocupacion');
            $table->text('descripcion');
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
        Schema::dropIfExists('testimonio');
    }
}
