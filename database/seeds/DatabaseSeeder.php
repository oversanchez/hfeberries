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
        $this->call(Categoria_Trabajador_Seeder::class);
        $this->call(Especialidad_Seeder::class);
        $this->call(Parentesco_Seeder::class);
        $this->call(Colegio_Procedencia_Seeder::class);
        $this->call(Nivel_Educativo_Seeder::class);
        $this->call(Alumno_Seeder::class);
        $this->call(Trabajador_Seeder::class);

        $this->call(Academico_2017_Seeder::class);
        
        $this->call(Website_Seeder::class);
        $this->call(Familiar_Seeder::class);

        // $this->call(UsersTableSeeder::class);
    }


}
