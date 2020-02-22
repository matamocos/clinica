<?php

namespace App\Http\Controllers;

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
		$medicos = Medico::All();
		$pacientes = Paciente::All();
        return view('clinica.citas.create-citas', compact('medicos','pacientes'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cita = Cita::find($id);
		$medicos = Medico::All();
		$pacientes = Paciente::All();
		return view('clinica.citas.edit-citas', compact('cita','medicos','pacientes'));
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
