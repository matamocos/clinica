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
        $tratamientos = Tratamiento::paginate(10);
		return view('clinica.tratamientos.tratamientos', compact('tratamientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$lang = \App::getLocale(session('lang'));
		if(Gate::allows('administradores', Auth::user())){
			$tipos = Tipotratamiento::All();
			$medicos = Medico::All();
			$pacientes = Paciente::All();
        	return view('clinica.tratamientos.create-tratamientos', compact('medicos','pacientes','tipos'));
		}else{
			if($lang == 'es'){
				Session::flash('mensaje_autorizacion', 'Su cuenta de usuario no estรก autorizada para crear tratamientos.');	
			}else{
				Session::flash('mensaje_autorizacion', 'Your account does not have permission to create treatments.');	
			}
			return redirect('tratamientos');
		}  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TratamientosRequest $request)
    {
		$lang = \App::getLocale(session('lang'));
		Tratamiento::create($request->all());
		if($lang == 'es'){
			Session::flash('mensaje_confirmacion', 'El tratamiento se ha creado correctamente.');	
		}else{
			Session::flash('mensaje_confirmacion', 'The treatment has been created.');	
		}
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
        $tratamiento = Tratamiento::select('tratamientos.id AS tratamiento_id','tratamientos.descripcion','tratamientos.fecha_inicio','tratamientos.fecha_fin','tipotratamientos.tipo',
										   'pacientes.nombre AS p_nombre','pacientes.apellido_1 AS p_apellido1','pacientes.apellido_2 AS p_apellido2',
										   'medicos.nombre AS m_nombre','medicos.apellido_1 AS m_apellido1','medicos.apellido_2 AS m_apellido2',)
									->join('pacientes', 'tratamientos.paciente_id', '=', 'pacientes.id')
									->join('medicos', 'tratamientos.medico_id', '=', 'medicos.id')
									->join('tipotratamientos', 'tratamientos.tipo_tratamiento_id', '=', 'tipotratamientos.id')
									->where('tratamientos.id', $id)
									->get();
		if($tratamiento){
			return $tratamiento;
		}else{
			echo "error";
		}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$lang = \App::getLocale(session('lang'));
		if(Gate::allows('administradores', Auth::user())){
			$tratamiento = Tratamiento::find($id);
			$medicos = Medico::All();
			$pacientes = Paciente::All();
			$tipos = Tipotratamiento::All();
			return view('clinica.tratamientos.edit-tratamientos', compact('tratamiento','medicos','pacientes','tipos'));
		}else{
			if($lang == 'es'){
				Session::flash('mensaje_autorizacion', 'Su cuenta de usuario no estรก autorizada para editar tratamientos.');	
			}else{
				Session::flash('mensaje_autorizacion', 'Your account does not have permission to edit treatments.');	
			}
			return redirect('tratamientos');
		}
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
		$lang = \App::getLocale(session('lang'));
        $request = request()->except('_token','_method');
		Tratamiento::where('id',$id)->update($request);
		if($lang == 'es'){
			Session::flash('mensaje_editado', 'El tratamiento se ha actualizado correctamente.');	
		}else{
			Session::flash('mensaje_editado', 'The treatment has been updated.');	
		}
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
		if(Gate::allows('administradores', Auth::user())){
			Tratamiento::find($id)->delete();
			echo "success";
		}else{
			return "desautorizado";
		}
    }
}
