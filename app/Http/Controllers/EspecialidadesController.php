<?php

namespace App\Http\Controllers;

use Gate;
use Auth;
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
		if(Gate::allows('administradores', Auth::user())){
			return view('clinica.especialidades.create-especialidades');
		}else{
			Session::flash('mensaje_autorizacion', 'Su cuenta de usuario no está autorizada para introducir una nueva especialidad.');
			return redirect('especialidades');
		} 
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
		if(Gate::allows('administradores', Auth::user())){
			$especialidad = Especialidade::find($id);
			return view('clinica.especialidades.edit-especialidades', compact('especialidad'));
		}else{
			Session::flash('mensaje_autorizacion', 'Su cuenta de usuario no está autorizada para editar una especialidad.');
			return redirect('especialidades');
		} 
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
		if(Gate::allows('administradores', Auth::user())){
			$cant = Especialidade_medico::where("especialidade_id", $id)->count();
		
			if($cant > 0){
				echo "error";
			}else{
				Especialidad::find($id)->delete();
				echo "success";
			}
		}else{
			return "desautorizado";
		}		
    }
}
