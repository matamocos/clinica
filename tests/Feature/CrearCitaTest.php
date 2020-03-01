<?php

namespace Tests\Feature;

use App\User;
use App\Cita;
use App\Medico;
use App\Paciente;
use App\Tratamiento;
use App\Especialidade;
use App\Tipotratamiento;
use App\Expediente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CrearCitaTest extends TestCase
{
   use RefreshDatabase;
	
    public function testUsuarioRegistrado()
    {
		$response = $this->get('/citas')
			->assertRedirect('/login');
    }//fin test
	
	public function testUsuarioVeListados()
    {		
			$this->actingAs(factory(User::class)->create());
			$response = $this->get('/citas')
				->assertOk();	
    }//fin test
	
	public function testInsertarDatos()
    {		$this->withoutExceptionHandling();
			$this->actingAs(factory(User::class)->create([
				'name' => 'admin',
				'email' => 'admin@admin.com',
				'rol' => 'admin',
				'email_verified_at' => now(),
				'password' => '$2y$10$rZa/xJY.k1y8TQW867ME.O/KgCkHkgPLAKmuzbXQ/kxsEhlUxIml2', 
				
				]));
	 
			$response = $this->post('/especialidades/store', [
				'especialidad' => 'estssssso',
			]);
		
			$this->assertCount(1,Especialidade::all());
				
    }//fin test

}
