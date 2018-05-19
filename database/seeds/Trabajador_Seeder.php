<?php

use Illuminate\Database\Seeder;

class Trabajador_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Trabajador::class, 30)->create();
    }
}
