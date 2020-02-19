<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
	protected $table = 'expedientes';
	
    public function paciente(){
		return $this->belongsTo('App\Paciente');
	}//fin paciente
	
	public function cita(){
		return $this->hasMany('App\Cita');
	}//fin cita
	
}//fin clase Expediente
