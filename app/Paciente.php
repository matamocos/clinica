<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Paciente extends Model
{
	protected $table = 'pacientes';
	
    public function expediente(){
		return $this->hasOne('App\Expediente');
	}//fin expediente
	
	public function cita(){
		return $this->hasMany('App\Cita');
	}//fin cita
	
	public function tratamiento(){
		return $this->belongsToMany('App\Tratamiento');
	}//fin tratamiento
	
	public function getEdadPacienteAttribute()
    {
		$nacimiento = new Carbon($this->fecha_nacimiento);
		$now = Carbon::now('Europe/London');
		$edad = $now->diffInYears($nacimiento);
		
		return $edad;
    }
	
}//fin clase Paciente
