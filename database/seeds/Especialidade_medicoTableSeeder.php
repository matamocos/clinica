<?php

use Illuminate\Database\Seeder;

class Especialidade_medicoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Especialidade_medico::class,100)->create();
    }
}
