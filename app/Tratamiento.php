<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model{
	
	protected $table = 'tratamientos';
	
	protected $fillable = ['descripcion', 'fecha_inicio','fecha_fin', 'medico_id', 'paciente_id', 'tipo_tratamiento_id'];
	
    public function paciente(){
		return $this->belongsToMany('App\Paciente');
	}//fin paciente
	
	public function medico(){
		return $this->belongsToMany('App\Medico');
	}//fin medico
	
	public function tipo_tratamiento(){
		return $this->hasOne('App\Tipotratamiento');
	}//fin tipotratamiento
	
}//fin clase
