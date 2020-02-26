<?php

namespace App;

use Carbon\Carbon;
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
	
	public function getFechaInicioAttribute($value) {
		$value = new Carbon($value);
        return $value->format('d-m-Y');
    }
	
	public function getFechaFinAttribute($value) {
		$value = new Carbon($value);
        return $value->format('d-m-Y');
	}
	
}//fin clase
