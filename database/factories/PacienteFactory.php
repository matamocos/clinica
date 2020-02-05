<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Paciente;
use Faker\Generator as Faker;

$factory->define(Paciente::class, function (Faker $faker) {
    return [
        'nombre'=>$faker->firstName(),
		'apellido_1'=>$faker->lastName(),
		'apellido_2'=>$faker->lastName(),
		'pais'=>$faker->country(),
		'ciudad'=>$faker->city(),
		'fecha_nacimiento'=>$faker->dateTimeBetween($startDate = '-50 years', $endDate = '2000-01-01', $timezone = null),
		'direccion' => $faker->address,
		'genero'=>$faker->title(),
		'telefono'=>$faker->phoneNumber(),
		
    ];
});
