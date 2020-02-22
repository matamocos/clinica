<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model{
	
	protected $table = 'citas';
	
	protected $fillable = ['fecha', 'hora','motivo', 'observaciones', 'paciente_id', 'medico_id'];
	
    public function paciente(){
		return $this->belongsTo('App\Paciente');
	}//fin paciente
	
	public function medico(){
		return $this->belongsTo('App\Medico');
	}//fin medico
	
	public function cita(){
		return $this->belongsTo('App\Cita');
	}//fin cita
	
}//fin clase cita
