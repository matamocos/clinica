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
        // $this->call(UsersTableSeeder::class);
		$this->call(CitasTableSeeder::class);
		$this->call(EspecialidadesTableSeeder::class);
		$this->call(ExpedientesTableSeeder::class);
		$this->call(MedicosTableSeeder::class);
		$this->call(PacientesTableSeeder::class);
		$this->call(TipotratamientoTableSeeder::class);
		$this->call(TratamientosTableSeeder::class);
    }
}
