<?php

use Illuminate\Database\Seeder;

class TratamientosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tratamiento::class,5)->create();
    }
}
