<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Medico extends Model
{
	protected $table = 'medicos';
	
    public function cita(){
		return $this->hasMany('App\Cita');
	}//fin cita
	
	public function especialidade(){
		return $this->belongsToMany('App\Especialidade');
	}//fin especialidade
	
	 public function tratamiento(){
		return $this->belongsToMany('App\Tratamiento');
	}//fin tratamiento
	
	public function getEdadMedicoAttribute()
    {
		$nacimiento = new Carbon($this->fecha_nacimiento);
		$now = Carbon::now('Europe/London');
		$edad = $now->diffInYears($nacimiento);
		
		return $edad;
    }
}
