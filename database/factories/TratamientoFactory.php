<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tratamiento;
use Faker\Generator as Faker;

$factory->define(Tratamiento::class, function (Faker $faker) {
    return [
		'fecha_inicio' =>$faker->dateTimeBetween($startDate = '-49', $endDate = '2025-01-01', $timezone = null),
		'fecha_fin' =>$faker->dateTimeBetween($startDate = '-48', $endDate = '2030-01-01', $timezone = null),
        'medico_id'=>$faker->numberBetween($min = 1, $max = 10),
		'paciente_id'=>$faker->numberBetween($min = 1, $max = 30),
		'tipo_tratamiento_id'=>$faker->numberBetween($min = 1, $max = 10),
		'descripcion'=>$faker->text($maxNbChars = 100),
    ];
});
