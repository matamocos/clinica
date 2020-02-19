<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
