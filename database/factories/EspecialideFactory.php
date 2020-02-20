<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Especialidade;
use Faker\Generator as Faker;

$factory->define(Especialidade::class, function (Faker $faker) {
    return [
    	'especialidad'=>$faker->unique(true)->randomElement($array = array ('Cardiología','Aparato Digestivo','Alergología','Endocrinología y Nutrición','Dermatología Médico-Quirúrgica y Venereología','Neurología','Geriatría','Neumología','Otorrinolaringología','Psiquiatría','Medicina Física y Rehabilitación','Anestesiología y Reanimación 
','Nefrología','Neurocirugía','Oftalmología','Cirugía','Hematología y Hemoterapia','Radiodiagnóstico','Urología')),
    ];
});
