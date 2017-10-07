<?php

use Illuminate\Database\Seeder;

class Categoria_Trabajador_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_trabajador')->insert([
            ['nombre' => "DOCENTE",'abreviatura' => "DOC"],
            ['nombre' => "ADMINISTRATIVO",'abreviatura' => "ADM"],
            ['nombre' => "SERVICIO",'abreviatura' => "SER"],
        ]);
    }
}
