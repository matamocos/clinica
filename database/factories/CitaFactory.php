<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cita;
use Faker\Generator as Faker;

$factory->define(Cita::class, function (Faker $faker) {
    return [
		
	
		
		//'paciente_id' => factory('App\Paciente')->create()->id,
		//'paciente_id' => function () {
          //  return factory(App\Paciente::class)->create()->id;
		//},
		//'paciente_id'=>$faker->randomElement(App\Paciente::pluck('id')->toArray()),
		
		 //'paciente_id' => random_int(\DB::table('pacientes')->min('id'), \DB::table('pacientes')->max('id')),
        'fecha'=>$faker->dateTimeBetween($startDate = '-50 years', $endDate = '2000-01-01', $timezone = null),
		'comentario'=>$faker->paragraph(),
		
			
		//'paciente_id' => $faker->randomDigit(),
    ];
});
