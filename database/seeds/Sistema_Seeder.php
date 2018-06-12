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
            ['nombre'=>'Usuarios','descripcion'=>'','url'=>'#','sistema_id'=>1,'opcion_padre_id'=>null],
            ['nombre'=>'Grupos','descripcion'=>'','url'=>'#','sistema_id'=>1,'opcion_padre_id'=>null],
            ['nombre'=>'Permisos','descripcion'=>'','url'=>'#','sistema_id'=>1,'opcion_padre_id'=>null],
            ['nombre'=>'Evaluar','descripcion'=>'','url'=>'#','sistema_id'=>2,'opcion_padre_id'=>null],
            ['nombre'=>'Registrar inspección','descripcion'=>'','url'=>'calidad/registrarInspeccion','sistema_id'=>2,'opcion_padre_id'=>4],
            ['nombre'=>'Reportes','descripcion'=>'','url'=>'#','sistema_id'=>2,'opcion_padre_id'=>null],
            ['nombre'=>'Diario','descripcion'=>'','url'=>'','sistema_id'=>2,'opcion_padre_id'=>6],
            ['nombre'=>'Mensual','descripcion'=>'','url'=>'','sistema_id'=>2,'opcion_padre_id'=>6],
            ['nombre'=>'Empleados','descripcion'=>'','url'=>'#','sistema_id'=>4,'opcion_padre_id'=>null],
            ['nombre'=>'Planillas','descripcion'=>'','url'=>'#','sistema_id'=>4,'opcion_padre_id'=>null],
            ['nombre'=>'Mantenimiento','descripcion'=>'','url'=>'intranet/mantenimientos/defecto','sistema_id'=>2,'opcion_padre_id'=>null],

        ]);

        DB::table('grupo_opcion')->insert([
            ['grupo_id'=>2,'opcion_id'=>1],
            ['grupo_id'=>2,'opcion_id'=>2],
            ['grupo_id'=>2,'opcion_id'=>3],
            ['grupo_id'=>2,'opcion_id'=>4],
            ['grupo_id'=>2,'opcion_id'=>5],
            ['grupo_id'=>2,'opcion_id'=>6],
            ['grupo_id'=>2,'opcion_id'=>7],
            ['grupo_id'=>2,'opcion_id'=>8],
            ['grupo_id'=>2,'opcion_id'=>9],
            ['grupo_id'=>2,'opcion_id'=>10],
            ['grupo_id'=>2,'opcion_id'=>11],
        ]);

        DB::table('grupo_opcion')->insert([
            ['grupo_id'=>2,'opcion_id'=>1],
            ['grupo_id'=>2,'opcion_id'=>2],
            ['grupo_id'=>2,'opcion_id'=>3],
            ['grupo_id'=>2,'opcion_id'=>4],
            ['grupo_id'=>2,'opcion_id'=>5],
            ['grupo_id'=>2,'opcion_id'=>6],
            ['grupo_id'=>2,'opcion_id'=>7],
            ['grupo_id'=>2,'opcion_id'=>8],
            ['grupo_id'=>2,'opcion_id'=>9],
            ['grupo_id'=>2,'opcion_id'=>10],
        ]);

        DB::table('defecto')->insert([
            ['nombre'=>'Fruta inmadura','tipo'=>'CALIDAD'],
            ['nombre'=>'Falta de Bloom','tipo'=>'CALIDAD'],
            ['nombre'=>'Deformes','tipo'=>'CALIDAD'],
            ['nombre'=>'Bajo calibre','tipo'=>'CALIDAD'],
            ['nombre'=>'Restos florales','tipo'=>'CALIDAD'],
            ['nombre'=>'Frutos con pedicelo','tipo'=>'CALIDAD'],

            ['nombre'=>'Indicios de pudrición','tipo'=>'CONDICION'],
            ['nombre'=>'Hongo (Micelio)','tipo'=>'CONDICION'],
            ['nombre'=>'Manchas de aplicación/polvo','tipo'=>'CONDICION'],
            ['nombre'=>'Reventados','tipo'=>'CONDICION'],
            ['nombre'=>'Exudación de jugo ','tipo'=>'CONDICION'],
            ['nombre'=>'Fruta Blanda','tipo'=>'CONDICION'],
            ['nombre'=>'Frutos con machucón','tipo'=>'CONDICION'],
            ['nombre'=>'Deshidratación','tipo'=>'CONDICION'],
            ['nombre'=>'Pedicelo Desgarrado','tipo'=>'CONDICION'],
        ]);

    }
}
