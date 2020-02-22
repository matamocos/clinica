<?php

namespace App\Http\Controllers;

use Session;
use App\Medico;
use App\Cita;
use App\Especialidade_medico;
use App\Tratamiento;
use Illuminate\Http\Request;
use App\Http\Requests\MedicoRequest;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medico::All();
		return view('clinica.medicos.medicos', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clinica.medicos.create-medicos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicoRequest $request)
    {
		Medico::create($request->all());
		Session::flash('mensaje_confirmacion', 'El médico se ha creado correctamente.');
        return redirect('medicos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $citas = Cita::where("medico_id", $id)->count();
		$tratamientos = Tratamiento::where("medico_id", $id)->count();
		$especialidades = Especialidade_medico::where("medico_id", $id)->count();
		$cant = $citas + $tratamientos;
		
		if($cant > 0){
			echo "error";
		}else{
			Medico::find($id)->delete();
			echo "success";
		}
    }
}
