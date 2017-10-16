<?php

use Illuminate\Database\Seeder;

class Tabla_Sunat_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_movimiento')->insert([
            ['codigo'=>'01','nombre'=>'INGRESOS'],
            ['codigo'=>'02','nombre'=>'INGRESOS: ASIGNACIONES'],
            ['codigo'=>'03','nombre'=>'INGRESOS: BONIFICACIONES'],
            ['codigo'=>'04','nombre'=>'INGRESOS: GRATIFICACIONES / AGUINALDOS'],
            ['codigo'=>'05','nombre'=>'INGRESOS: INDEMNIZACIONES'],
            ['codigo'=>'06','nombre'=>'APORTACIONES DEL TRABAJADOR / PENSIONISTA'],
            ['codigo'=>'07','nombre'=>'DESCUENTOS AL TRABAJADOR'],
            ['codigo'=>'08','nombre'=>'APORTACIONES DE CARGO DEL EMPLEADOR'],
            ['codigo'=>'09','nombre'=>'CONCEPTOS VARIOS'],
            ['codigo'=>'10','nombre'=>'OTROS CONCEPTOS'],
            ['codigo'=>'20','nombre'=>'RÉGIMEN LABORAL PÚBLICO']
        ]);

        DB::table('movimiento')->insert([
        ]);


    }
}
