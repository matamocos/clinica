<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Medico;
use Faker\Generator as Faker;

$factory->define(Medico::class, function (Faker $faker) {
    return [
        'nombre'=>$faker->firstName(),
		'apellido_1'=>$faker->lastName(),
		'apellido_2'=>$faker->lastName(),
		'fecha_nacimiento'=>$faker->dateTimeBetween($startDate = '-50 years', $endDate = '1990-01-01', $timezone = null),
		'telefono'=>$faker->unique()->numberBetween(700000000, 999999999),	
    ];
});
