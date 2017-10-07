<?php

use Illuminate\Database\Seeder;

class Especialidad_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('especialidad')->insert([
            ['nombre' => "MATEMÁTICA",'abreviatura' => "MAT"],
            ['nombre' => "HISTORIA",'abreviatura' => "HIST"],
            ['nombre' => "LENGUA Y LITERATURA",'abreviatura' => "LENG"]
        ]);
    }
}
