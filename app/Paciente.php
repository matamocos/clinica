<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    public function expediente(){
		return $this->hasOne('App\Expediente');
	}//fin expediente
	
}//fin clase Paciente
