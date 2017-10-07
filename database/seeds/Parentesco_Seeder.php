<?php

use Illuminate\Database\Seeder;

class Parentesco_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parentesco')->insert([
            ['nombre' => "PADRE"],
            ['nombre' => "MADRE"],
            ['nombre' => "TIO"],
            ['nombre' => "TIA"],
            ['nombre' => "PADRASTRO"],
            ['nombre' => "MADRASTRA"],
        ]);
    }
}
