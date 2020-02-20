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
		'fecha_nacimiento'=>$faker->dateTimeBetween($startDate = '-50 years', $endDate = '2020-01-01', $timezone = null),
		'direccion' => $faker->address,
		'email' =>$faker->freeEmail,
		'dni' =>$faker->dni,
		'genero'=>$faker->randomElement($array = array ('Hombre', 'Mujer')) ,
		'telefono'=>$faker->phoneNumber(),	
    ];
});
