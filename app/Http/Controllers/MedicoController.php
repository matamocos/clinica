<?php

namespace App\Http\Controllers;

use Gate;
use Auth;
use Session;
use App\Medico;
use App\Cita;
use App\Especialidade_medico;
use App\Especialidade;
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
		if(Gate::allows('administradores', Auth::user())){
			return view('clinica.medicos.create-medicos');
		}else{
			Session::flash('mensaje_autorizacion', 'Su cuenta de usuario no está autorizada para introducir nuevos médicos.');
			return redirect('medicos');
		}  
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
        $medico = Medico::find($id);
		
		$especialidades = Especialidade_medico::select('especialidades.id AS especialidad_id','especialidades.especialidad')
												->join('especialidades', 'especialidade_medico.especialidade_id', '=', 'especialidades.id')
												->where('especialidade_medico.medico_id', $id)
												->get();
		
		$especialidades_select = Especialidade::All();
		
		return view('clinica.medicos.especialidades_medicos', compact('medico', 'especialidades','especialidades_select'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		if(Gate::allows('administradores', Auth::user())){
			$medico = Medico::find($id);
			return view('clinica.medicos.edit-medicos', compact('medico'));
		}else{
			Session::flash('mensaje_autorizacion', 'Su cuenta de usuario no está autorizada para editar médicos.');
			return redirect('medicos');
		}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function update(MedicoRequest $request, $id)
    {
        $request = request()->except('_token','_method');
		Medico::where('id',$id)->update($request);
		Session::flash('mensaje_editado', 'El médico se ha actualizado correctamente.');
        return redirect('medicos');
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
