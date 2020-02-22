<?php

namespace App\Http\Controllers;

use Session;
use App\Tipotratamiento;
use App\Tratamiento;
use Illuminate\Http\Request;

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
        return view('clinica.tipos_de_tratamientos.create-tipos_tratamientos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tipotratamiento::create($request->all());
        Session::flash('mensaje_confirmacion', 'El tipo de tratamiento se ha creado correctamente.');
        return redirect('tratamientos_tipos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tipotratamiento  $tipotratamiento
     * @return \Illuminate\Http\Response
     */
    public function show(Tipotratamiento $tipotratamiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipotratamiento  $tipotratamiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipotratamiento $tipotratamiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipotratamiento  $tipotratamiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipotratamiento $tipotratamiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipotratamiento  $tipotratamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$cant = Tratamiento::where("tipo_tratamiento_id", $id)->count();
		
		if($cant > 0){
			echo "error";
		}else{
        	Tipotratamiento::find($id)->delete();
			echo "success";
		}
    }
}
