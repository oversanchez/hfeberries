<?php

use Illuminate\Database\Seeder;

class Nivel_Educativo_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nivel_educativo')->insert([
            [
                'codigo' => '01',
                'descripcion' => 'SIN EDUCACIÓN FORMAL',
                'abreviatura' => 'SIN EDUCACIÓN FORMAL'],
            [
                'codigo' => '02',
                'descripcion' => 'EDUCACIÓN ESPECIAL INCOMPLETA',
                'abreviatura' => 'ESPECIAL INCOMPLETA'],
            [
                'codigo' => '03',
                'descripcion' => 'EDUCACIÓN ESPECIAL COMPLETA',
                'abreviatura' => 'ESPECIAL COMPLETA'],
            [
                'codigo' => '04',
                'descripcion' => 'EDUCACIÓN PRIMARIA INCOMPLETA',
                'abreviatura' => 'PRIMARIA INCOMPLETA'],
            [
                'codigo' => '05',
                'descripcion' => 'EDUCACIÓN PRIMARIA COMPLETA',
                'abreviatura' => 'PRIMARIA COMPLETA'],
            [
                'codigo' => '06',
                'descripcion' => 'EDUCACIÓN SECUNDARIA INCOMPLETA',
                'abreviatura' => 'SECUNDARIA INCOMPLETA'],
            [
                'codigo' => '07',
                'descripcion' => 'EDUCACIÓN SECUNDARIA COMPLETA',
                'abreviatura' => 'SECUNDARIA COMPLETA'],
            [
                'codigo' => '08',
                'descripcion' => 'EDUCACIÓN TÉCNICA INCOMPLETA',
                'abreviatura' => 'TÉCNICA INCOMPLETA'],
            [
                'codigo' => '09',
                'descripcion' => 'EDUCACIÓN TÉCNICA COMPLETA',
                'abreviatura' => 'TÉCNICA COMPLETA'],
            [
                'codigo' => '10',
                'descripcion' => 'EDUCACIÓN SUPERIOR (INSTITUTO SUPERIOR, ETC) INCOMPLETA ',
                'abreviatura' => 'SUPERIOR INCOMPLETA (INSTIT. SUPER)'],
            [
                'codigo' => '11',
                'descripcion' => 'EDUCACIÓN SUPERIOR (INSTITUTO SUPERIOR, ETC) COMPLETA ',
                'abreviatura' => 'SUPERIOR COMPLETA  (INSTIT SUPER)'],
            [
                'codigo' => '12',
                'descripcion' => 'EDUCACIÓN UNIVERSITARIA INCOMPLETA',
                'abreviatura' => 'UNIVERSITARIA INCOMPLETA'],
            [
                'codigo' => '13',
                'descripcion' => 'EDUCACIÓN UNIVERSITARIA COMPLETA',
                'abreviatura' => 'UNIVERSITARIA COMPLETA'],
            [
                'codigo' => '14',
                'descripcion' => 'GRADO DE BACHILLER',
                'abreviatura' => 'GRADO DE BACHILLER'],
            [
                'codigo' => '15',
                'descripcion' => 'TITULADO',
                'abreviatura' => 'TITULADO'],
            [
                'codigo' => '16',
                'descripcion' => 'ESTUDIOS DE MAESTRÍA INCOMPLETA',
                'abreviatura' => 'ESTUD. MAESTRÍA INCOMPLETA'],
            [
                'codigo' => '17',
                'descripcion' => 'ESTUDIOS DE MAESTRÍA COMPLETA',
                'abreviatura' => 'ESTUD. MAESTRÍA COMPLETA'],
            [
                'codigo' => '18',
                'descripcion' => 'GRADO DE MAESTRÍA',
                'abreviatura' => 'GRADO DE MAESTRÍA'],
            [
                'codigo' => '19',
                'descripcion' => 'ESTUDIOS DE DOCTORADO INCOMPLETO',
                'abreviatura' => 'ESTUD. DOCTORADO INCOMPLETO'],
            [
                'codigo' => '20',
                'descripcion' => 'ESTUDIOS DE DOCTORADO COMPLETO',
                'abreviatura' => 'ESTUD. DOCTORADO COMPLETO'],
            [
                'codigo' => '21',
                'descripcion' => 'GRADO DE DOCTOR',
                'abreviatura' => 'GRADO DE DOCTOR']
        ]);
    }
}
