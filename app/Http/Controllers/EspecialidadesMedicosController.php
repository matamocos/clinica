<?php

namespace App\Http\Controllers;

use Gate;
use Auth;
use App\Especialidade_medico;
use Illuminate\Http\Request;
use Session;

class EspecialidadesMedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especialidades = Especialidade_medico::All();
		return view('clinica.especialidades_medicos', compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
		if(Gate::allows('administradores', Auth::user())){
			$count = Especialidade_medico::where('especialidade_id', $request->especialidad)->where('medico_id', $request->medico_id)->count();
			
			if($count == 0){
				$object = new Especialidade_medico;
				$object->medico_id = $request->medico_id;
				$object->especialidade_id = $request->especialidad;
				$object->save();

				Session::flash('mensaje_confirmacion', 'Se ha añadido correctamente la especialidad.');
				return redirect('http://clinica-plyrm.run.goorm.io/medicos/show/'.$request->medico_id);
			}else{
				Session::flash('mensaje_error', 'El médico ya posee esa especialidad.');
				return redirect('http://clinica-plyrm.run.goorm.io/medicos/show/'.$request->medico_id);
			}
		}else{
			Session::flash('mensaje_autorizacion', 'Su cuenta de usuario no está autorizada para introducir una nueva especialidad.');
			return redirect('/medicos/show/'.$request->medico_id);
		} 
		        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Especialidade_medico  $especialidade_medico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Especialidade_medico  $especialidade_medico
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
     * @param  \App\Especialidade_medico  $especialidade_medico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Especialidade_medico  $especialidade_medico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $medico)
    {
		if(Gate::allows('administradores', Auth::user())){
			Especialidade_medico::where('especialidade_id', $id)->where('medico_id', $medico)->delete();
			echo "success";
		}else{
			return "desautorizado";
		}	
    }
}
