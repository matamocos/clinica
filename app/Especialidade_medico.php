<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidade_medico extends Model
{
    protected $table = 'especialidade_medico';
	
	protected $fillable = ['medico_id','especialidade_id'];
	
	public function especialidades(){
		return $this->belongsTo('App\Especialidade');
	}//fin especialidades
	
	public function medico(){
		return $this->belongsTo('App\Medico');
	}//fin medico
	
	public function especialidade_medicos(){
		return $this->belongsTo('App\Especialidade_medico');
	}//fin especialidade_medicos
}
