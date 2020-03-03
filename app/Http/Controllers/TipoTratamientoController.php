<?php

namespace App\Http\Controllers;

use Gate;
use Auth;
use Session;
use App\Tipotratamiento;
use App\Tratamiento;
use Illuminate\Http\Request;
use App\Http\Requests\TipotratamientoResquest;

class TipoTratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = Tipotratamiento::All();
		return view('clinica.tipos_de_tratamientos.tipos_tratamientos', compact('tipos'));
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
			return view('clinica.tipos_de_tratamientos.create-tipos_tratamientos');
		}else{
			if($lang == 'es'){
				Session::flash('mensaje_autorizacion', 'Su cuenta de usuario no estรก autorizada para introducir un nuevo tipo de tratamiento.');	
			}else{
				Session::flash('mensaje_autorizacion', 'Your account does not have permission to create new treatments.');	
			}
			return redirect('tratamientos_tipos');
		} 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipotratamientoResquest $request)
    {
		$lang = \App::getLocale(session('lang'));
        Tipotratamiento::create($request->all());
		if($lang == 'es'){
			Session::flash('mensaje_confirmacion', 'El tipo de tratamiento se ha creado correctamente.');	
		}else{
			Session::flash('mensaje_confirmacion', 'The type of treatment has been created.');	
		}
        return redirect('tratamientos_tipos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tipotratamiento  $tipotratamiento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipotratamiento  $tipotratamiento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$lang = \App::getLocale(session('lang'));
		if(Gate::allows('administradores', Auth::user())){
			$tipo = Tipotratamiento::find($id);
			return view('clinica.tipos_de_tratamientos.edit-tipos_tratamientos', compact('tipo'));
		}else{
			if($lang == 'es'){
				Session::flash('mensaje_autorizacion', 'Su cuenta de usuario no estรก autorizada para editar un tipo de tratamiento.');	
			}else{
				Session::flash('mensaje_autorizacion', 'Your account does not have permission to edit types of treatments.');	
			}
			return redirect('tratamientos_tipos');
		} 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipotratamiento  $tipotratamiento
     * @return \Illuminate\Http\Response
     */
    public function update(TipotratamientoResquest $request, $id)
    {
		$lang = \App::getLocale(session('lang'));
        $request = request()->except('_token','_method');
		Tipotratamiento::where('id',$id)->update($request);
		if($lang == 'es'){
			Session::flash('mensaje_editado', 'El tipo de tratamiento se ha actualizado correctamente.');	
		}else{
			Session::flash('mensaje_editado', 'The type of treatment has been updated.');	
		}
        return redirect('tratamientos_tipos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipotratamiento  $tipotratamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$lang = \App::getLocale(session('lang'));
		if(Gate::allows('administradores', Auth::user())){
			$cant = Tratamiento::where("tipo_tratamiento_id", $id)->count();
		
			if($cant > 0){
				echo "error";
			}else{
				Tipotratamiento::find($id)->delete();
				echo "success";
			}
		}else{
			return "desautorizado";
		}
		
    }
}
