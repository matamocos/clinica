<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Paciente;
use Illuminate\Http\Request;

class ClinicaController extends Controller
{
    public function index(){
		return redirect('http://clinica-plyrm.run.goorm.io/');
	}
	
	public function estadisticas(){
		$paciente = Paciente::All();
		return view('clinica.estadisticas', compact('paciente'));
	}
}
