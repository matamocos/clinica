<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Especialidade_medico;
use Faker\Generator as Faker;

$factory->define(Especialidade_medico::class, function (Faker $faker) {
    return [
    	'medico_id'=>$faker->numberBetween($min = 1, $max = 10),
		'especialidade_id'=>$faker->numberBetween($min = 1, $max = 15),
    ];
});