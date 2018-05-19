<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Alumno::class, function (Faker\Generator $faker) {

    return  [
        'nombres' => $faker->name,
        'apellido_paterno' => $faker->lastName,
        'apellido_materno' => $faker->lastName,
        //'email' => $faker->unique()->safeEmail,
        'numero_documento' => $faker->unique()->numberBetween(11111111,99999999),
        'tipo_documento' => 'DN',
        'fecha_nacimiento' => $faker->date('Y-m-d','now'),
        'sexo' => $faker->randomElement(($array = array('M','F'))),
        'direccion' => $faker->address,
        'telf_fijo' => $faker->tollFreePhoneNumber,
        'padres_juntos' => true,
        'activo'=>true,
        'colegio_procedencia_id'=>  \App\Colegio_Procedencia::all()->random()->id
    ];
});

$factory->define(App\Trabajador::class, function (Faker\Generator $faker) {

    return  [
        'nombres' => $faker->name,
        'apellido_paterno' => $faker->lastName,
        'apellido_materno' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'numero_documento' => $faker->unique()->numberBetween(11111111,99999999),
        'tipo_documento' => 'DN',
        'fecha_nacimiento' => $faker->date('Y-m-d','now'),
        'sexo' => $faker->randomElement(($array = array('M','F'))),
        'direccion' => $faker->address,
        'telf_fijo' => $faker->tollFreePhoneNumber,
        'telf_movil' => $faker->e164PhoneNumber,

        'activo'=>true,
        'categoria_trabajador_id'=>  \App\Categoria_Trabajador::all()->random()->id,
        'nivel_educativo_id'=>  \App\Nivel_Educativo::all()->random()->id,
        'especialidad_id'=>  \App\Especialidad::all()->random()->id
    ];
});
