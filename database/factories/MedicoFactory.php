<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'nombre'=>$faker->firstName(),
		'apellido_1'=>$faker->lastName(),
		'apellido_2'=>$faker->lastName(),
		'fecha_nacimiento'=>$faker->dateTimeBetween($startDate = '-50 years', $endDate = '2000-01-01', $timezone = null),
		'telefono'=>$faker->phoneNumber(),	
    ];
});
