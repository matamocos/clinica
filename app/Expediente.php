<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    public function paciente(){
		return $this->belongsTo('App\Paciente');
	}//fin paciente
	
}//fin clase Expediente
