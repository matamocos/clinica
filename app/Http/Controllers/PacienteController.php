<?php

namespace App\Http\Controllers;


use Gate;
use Carbon\Carbon;
use Auth;
use Session;
use App\Paciente;
use App\Medico;
use App\Cita;
use App\Expediente;
use App\Tratamiento;
use App\Tipotratamiento;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\PacientesRequest;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::All();
		return view('clinica.pacientes.pacientes', compact('pacientes'));
    }

	/**
	 * Method used to return the simulation form.
	 * 
	 * @return \Illuminate\Http\Response
	 */
	public function simular()
	{
		$pacientes = Paciente::All();
		$medicos = Medico::All();
		$tratamientos = Tipotratamiento::All();
		return view('clinica.simular.formulario', compact('pacientes','medicos','tratamientos'));
	}
	
	public function pdf(Request $request)
	{
		$cita = new Cita;
		$cita->medico_id = $request->medico_id;
		$cita->paciente_id = $request->paciente_id;
		$cita->motivo = $request->motivo;
		
		$tratamiento = new Tratamiento;
		$tratamiento->medico_id = $request->medico_id;
		$tratamiento->paciente_id = $request->paciente_id;
		
	}
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
		if(Gate::allows('administradores', Auth::user())){
			return view('clinica.pacientes.create-pacientes');
		}else{
			Session::flash('mensaje_autorizacion', 'Su cuenta de usuario no estรก autorizada para introducir nuevos pacientes.');
			return redirect('pacientes');
		}

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PacientesRequest $request)
    {
		Paciente::create($request->all());
        Session::flash('mensaje_confirmacion', 'El paciente se ha creado correctamente.');
        return redirect('pacientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		if(Gate::allows('administradores', Auth::user())){
			$paciente = Paciente::find($id);
			return view('clinica.pacientes.edit-pacientes', compact('paciente'));
		}else{
			Session::flash('mensaje_autorizacion', 'Su cuenta de usuario no estáก autorizada para editar pacientes.');
			return redirect('pacientes');
		}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(PacientesRequest $request, $id)
    {
        $request = request()->except('_token','_method');
		Paciente::where('id',$id)->update($request);
		Session::flash('mensaje_editado', 'El paciente se ha actualizado correctamente.');
        return redirect('pacientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		if(Gate::allows('administradores', Auth::user())){
			$citas = Cita::where("paciente_id", $id)->count();
			$tratamientos = Tratamiento::where("paciente_id", $id)->count();
			$cant = $citas + $tratamientos;

			if($cant > 0){
				echo "error";
			}else{
				Paciente::find($id)->delete();
				echo "success";
			}
		}else{
			return "desautorizado";
		}	
    }
}
