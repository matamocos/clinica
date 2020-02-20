<?php

namespace App\Http\Controllers;

use App\Tipotratamiento;
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
		return view('clinica.tipos_tratamientos', compact('tipos'));
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
        //
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
    public function destroy(Tipotratamiento $tipotratamiento)
    {
        //
    }
}
