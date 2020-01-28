<?php

use Illuminate\Database\Seeder;

class ExpedientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Expediente::class,20)->create();
    }
}
