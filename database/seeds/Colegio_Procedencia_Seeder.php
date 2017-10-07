<?php

use Illuminate\Database\Seeder;

class Colegio_Procedencia_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colegio_procedencia')->insert([
            ['nombre' => "I.E. SAN JOSE",'codigo'=>''],
            ['nombre' => "I.E. COSOME",'codigo'=>''],
        ]);
    }
}
