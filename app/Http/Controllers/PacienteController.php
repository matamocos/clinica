<?php

namespace App\Http\Controllers;

use Session;
use App\Paciente;
use App\Cita;
use App\Expediente;
use App\Tratamiento;
use Illuminate\Http\Request;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clinica.pacientes.create-pacientes');
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
        $paciente = Paciente::find($id);
		return view('clinica.pacientes.edit-pacientes', compact('paciente'));
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
        $citas = Cita::where("paciente_id", $id)->count();
		$tratamientos = Tratamiento::where("paciente_id", $id)->count();
		$cant = $citas + $tratamientos;
		
		if($cant > 0){
			echo "error";
		}else{
			Paciente::find($id)->delete();
			echo "success";
		}
		
    }
}
