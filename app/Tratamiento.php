<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model{
	
    public function paciente(){
		return $this->belongsToMany('App\Paciente');
	}//fin paciente
	
	 public function medico(){
		return $this->belongsToMany('App\Medico');
	}//fin medico
	
}//fin clase
