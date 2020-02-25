<?php

namespace App\Http\Controllers;

use Gate;
use Auth;
use Session;
use App\Cita;
use App\Medico;
use App\Paciente;
use Illuminate\Http\Request;
use App\Http\Requests\CitasRequest;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//dd($request);
        $citas = Cita::All();
		return view('clinica.citas.citas', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		if(Gate::allows('administradores', Auth::user())){
			$medicos = Medico::All();
			$pacientes = Paciente::All();
        	return view('clinica.citas.create-citas', compact('medicos','pacientes'));
		}else{
			Session::flash('mensaje_autorizacion', 'Su cuenta de usuario no está autorizada para crear nuevas citas.');
			return redirect('citas');
		}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CitasRequest $request)
    {
		Cita::create($request->all());
        Session::flash('mensaje_confirmacion', 'La cita se ha creado correctamente.');
        return redirect('citas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$cita = Cita::select('medicos.nombre AS nombre_medico',
							 'medicos.apellido_1 AS apellido_1_medico',
							 'medicos.apellido_2 AS apellido_2_medico',
							 'medicos.fecha_nacimiento AS fecha_nacimiento_medico',
							 'medicos.telefono AS telefono_medico', 
							 'pacientes.nombre AS nombre_paciente',
							 'pacientes.apellido_1 AS apellido_1_paciente',
							 'pacientes.apellido_2 AS apellido_2_paciente',
							 'pacientes.telefono AS telefono_paciente',
							 'citas.id AS id_citas',
							 'pais','ciudad', 'email', 'dni', 'genero', 'direccion', 'fecha', 'hora', 'motivo', 'observaciones' )
						->join('pacientes', 'citas.paciente_id', '=', 'pacientes.id')
						->join('medicos', 'citas.medico_id', '=', 'medicos.id')
						->find($id);
		if($cita){
			return $cita;	
		}else{
			echo "error";
		}
        
    }//fin show

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

		if(Gate::allows('administradores', Auth::user())){
			$cita = Cita::find($id);
			$medicos = Medico::All();
			$pacientes = Paciente::All();
			return view('clinica.citas.edit-citas', compact('cita','medicos','pacientes'));
		}else{
			Session::flash('mensaje_autorizacion', 'Su cuenta de usuario no está autorizada para editar citas.');
			return redirect('citas');
		}

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(CitasRequest $request, $id)
    {
        $request = request()->except('_token','_method');
		Cita::where('id',$id)->update($request);
		Session::flash('mensaje_editado', 'La cita se ha actualizado correctamente.');
        return redirect('citas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cita::find($id)->delete();
		echo "success";
    }
}
