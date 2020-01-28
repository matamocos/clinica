<?php

use Illuminate\Database\Seeder;

class TipotratamientoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tipotratamiento::class,5)->create();
    }
}
