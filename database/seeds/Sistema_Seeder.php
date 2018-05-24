<?php

use Illuminate\Database\Seeder;

class Sistema_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sistema')->insert([
            ['nombre'=>'Seguridad','descripcion'=>'Sistema de Seguridad'],
            ['nombre'=>'Calidad','descripcion'=>'Sistema de Calidad'],
            ['nombre'=>'Contabilidad','descripcion'=>'Sistema de Contabilidad'],
            ['nombre'=>'Recursos Humanos','descripcion'=>'Sistema de Recursos Humanos'],
        ]);

        DB::table('grupo')->insert([
            ['nombre'=>'Inspector de Calidad'],
            ['nombre'=>'Administrador de Calidad'],
        ]);

        DB::table('opcion')->insert([
            ['nombre'=>'Evaluar','descripcion'=>'','sistema_id'=>1,'url'=>'#','opcion_padre_id'=>null],
            ['nombre'=>'Registrar inspección','descripcion'=>'','url'=>'/calidad/registrarInspeccion','sistema_id'=>1,'opcion_padre_id'=>1],
        ]);


    }
}
