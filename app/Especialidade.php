<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model{
	
	protected $table = 'especialidades';
	
    public function medico(){
		return $this->belongsToMany('App\Medico');
	}//fin medico
	
}//fin Clase
