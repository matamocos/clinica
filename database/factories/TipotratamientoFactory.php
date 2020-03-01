<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tipotratamiento;
use Faker\Generator as Faker;

$factory->define(Tipotratamiento::class, function (Faker $faker) {
    return [
        'tipo'=>$faker->unique()->randomElement($array = array ('Cirugía','Dietoterapia','Farmacoterapia','Fisioterapia','Hidroterapia','Logopedia','Ortopedia','Prótesis','Psicoterapia','Quimioterapia','Radioterapia','Rehabilitación','Reposo','Sueroterapia','Terapia de quelación','Terapia ocupacional')),
    ];
});