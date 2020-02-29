<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CrearCitaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCita()
    {
		
		$this->withoutMiddleware();
        $this->get('/citas')
		->assertStatus(200);

    }
	
	public function bienvenidaUsuario(){
		$user = new \App\User(['name' => 'Jhn Doe']);
   		auth()->login($user);
    	$this->assertSame(welcome(), 'Hola Jhon!');
	}//fin bienvenida
}
