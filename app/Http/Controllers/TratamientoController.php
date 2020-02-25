<?php

namespace App\Http\Controllers;

use Gate;
use Auth;
use Session;
use App\Tratamiento;
use App\Medico;
use App\Paciente;
use App\Tipotratamiento;
use Illuminate\Http\Request;
use App\Http\Requests\TratamientosRequest;

class TratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tratamientos = Tratamiento::All();
		return view('clinica.tratamientos.tratamientos', compact('tratamientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$tipos = Tipotratamiento::All();
		$medicos = Medico::All();
		$pacientes = Paciente::All();
        return view('clinica.tratamientos.create-tratamientos', compact('medicos','pacientes','tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TratamientosRequest $request)
    {
		Tratamiento::create($request->all());
        Session::flash('mensaje_confirmacion', 'El tratamiento se ha creado correctamente.');
        return redirect('tratamientos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tratamiento = Tratamiento::find($id);
		$medicos = Medico::All();
		$pacientes = Paciente::All();
		$tipos = Tipotratamiento::All();
		return view('clinica.tratamientos.edit-tratamientos', compact('tratamiento','medicos','pacientes','tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function update(TratamientosRequest $request, $id)
    {
        $request = request()->except('_token','_method');
		Tratamiento::where('id',$id)->update($request);
		Session::flash('mensaje_editado', 'El tratamiento se ha actualizado correctamente.');
        return redirect('tratamientos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tratamiento::find($id)->delete();
		echo "success";
    }
}
