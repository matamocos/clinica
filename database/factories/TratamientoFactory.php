<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tratamiento;
use Faker\Generator as Faker;

$factory->define(Tratamiento::class, function (Faker $faker) {
    return [
        'medico_id'=>$faker->numberBetween($min = 1, $max = 10),
		'paciente_id'=>$faker->numberBetween($min = 1, $max = 50),
		'tipo_tratamiento_id'=>$faker->numberBetween($min = 1, $max = 20),
		'descripcion'=>$faker->text($maxNbChars = 100),
    ];
});
