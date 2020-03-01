<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UserTableSeeder::class);
		$this->call(PacientesTableSeeder::class);
		$this->call(EspecialidadesTableSeeder::class);
		$this->call(MedicosTableSeeder::class);
		$this->call(Especialidade_medicoTableSeeder::class);
		$this->call(CitasTableSeeder::class);
		$this->call(TipotratamientoTableSeeder::class);	
		$this->call(TratamientosTableSeeder::class);
		$this->call(UserTableSeeder::class);
    }
}
