<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model{
	
	protected $table = 'especialidades';
	
	protected $fillable = ['especialidad'];
	
    public function medico(){
		return $this->belongsToMany('App\Medico');
	}//fin medico
	
}//fin Clase
