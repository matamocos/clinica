<?php

namespace App\Http\Controllers;

use Session;
use App\Especialidade;
use App\Especialidade_medico;
use Illuminate\Http\Request;
use App\Http\Requests\EspecialidadesRequest;

class EspecialidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especialidades = Especialidade::All();
		return view('clinica.especialidades.especialidades', compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clinica.especialidades.create-especialidades');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EspecialidadesRequest $request)
    {
        Especialidade::create($request->all());
        Session::flash('mensaje_confirmacion', 'La especialidad médica se ha creado correctamente.');
        return redirect('especialidades');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cita = Cita::find($id);
		return view('clinica.citas.edit-citas', compact('cita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function update(EspecialidadesRequest $request, $id)
    {
        $request = request()->except('_token','_method');
		Especialidade::where('id',$id)->update($request);
		Session::flash('mensaje_editado', 'La especialidad se ha actualizado correctamente.');
        return redirect('especialidades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Especialidade  $especialidade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$cant = Especialidade_medico::where("especialidade_id", $id)->count();
		
		if($cant > 0){
			echo "error";
		}else{
			Especialidad::find($id)->delete();
			echo "success";
		}
    }
}
