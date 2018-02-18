<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Usuario_Seeder::class);
        //$this->call(Tabla_Sunat_Seeder::class);
        $this->call(Catalogo_Sunat_Seeder::class);
    }


}
