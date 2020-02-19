<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
	
}//fin clase Paciente
