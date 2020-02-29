<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Paciente;
use Illuminate\Http\Request;

class ClinicaController extends Controller
{
    public function index(){
		
		$paciente = Paciente::All();
		return view('clinica.inicio', compact('paciente'));
	}
}
