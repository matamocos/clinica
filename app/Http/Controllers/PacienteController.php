<?php

namespace App\Http\Controllers;


use Gate;
use Carbon\Carbon;
use Auth;
use Session;
use App\Paciente;
use App\Medico;
use App\Cita;
use App\Expediente;
use App\Tratamiento;
use App\Tipotratamiento;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\PacientesRequest;
use PDF;
use Mail;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::paginate(10);
		return view('clinica.pacientes.pacientes', compact('pacientes'));
    }

	/**
	 * Method used to return the simulation form.
	 * 
	 * @return \Illuminate\Http\Response
	 */
	public function simular()
	{
		$lang = \App::getLocale(session('lang'));
		if(Gate::allows('administradores', Auth::user())){
			
			$pacientes = Paciente::All();
			$medicos = Medico::All();
			$tratamientos = Tipotratamiento::All();
			return view('clinica.simular.formulario', compact('pacientes','medicos','tratamientos'));
			
		}else{
			if($lang == 'es'){
				Session::flash('mensaje_autorizacion', 'Su cuenta de usuario no estรก autorizada para introducir nuevas citas.');	
			}else{
				Session::flash('mensaje_autorizacion', 'Your account does not have permission to insert new appointments.');	
			}
			return redirect('pacientes');
			
		}
	}
	
	public function pdf(Request $request)
	{
		$lang = \App::getLocale(session('lang'));
		$cita = new Cita;
		$cita->paciente_id = $request->input('paciente_id');
		$cita->medico_id = $request->input('medico_id');
		$cita->motivo = $request->input('motivo');
		if($request->input('observaciones')){
			$cita->observaciones = $request->input('observaciones');
		}

		$cita->save();

		if($request->tipo_tratamiento_id != 'ninguno'){
			$tratamiento = new Tratamiento;
			$tratamiento->medico_id = $request->input('medico_id');
			$tratamiento->paciente_id = $request->input('paciente_id');
			$tratamiento->tipo_tratamiento_id = $request->input('tipo_tratamiento_id');
			if($request->input('descripcion')){
				$tratamiento->descripcion = $request->input('descripcion');
			}
			if($request->input('fecha_inicio')){
				$tratamiento->fecha_inicio = $request->input('fecha_inicio');
			}
			if($request->input('fecha_fin')){
				$tratamiento->fecha_fin = $request->input('fecha_fin');
			}
			$tratamiento->save();
		}

		$paciente = Paciente::find($request->input('paciente_id'));
		$medico = Medico::find($request->input('medico_id'));
		$tipo = $request->input('tipo_tratamiento_id');

		if($tipo != 'ninguno'){ 
			$tipo = Tipotratamiento::select('tipo')->find($request->input('tipo_tratamiento_id'));; 
			$tipo = $tipo->tipo;
		}

		date_default_timezone_set('Europe/London');
		$hora = date('G:i:s', time());

		$data = array (
			"p_nombre" => $paciente->nombre,
			"p_apellido1" => $paciente->apellido_1,
			"p_apellido2" => $paciente->apellido_2,
			"dni" => $paciente->dni,
			"telefono" => $paciente->telefono,
			"m_nombre" => $medico->nombre,
			"m_apellido1" => $medico->apellido_1,
			"m_apellido2" => $medico->apellido_2,
			"motivo" => $request->input('motivo'),
			"observaciones" => $request->input('observaciones'),
			"tipo" => $tipo,
			"descripcion" => $request->input('descripcion'),
			"fecha_inicio" => $request->input('fecha_inicio'),
			"fecha_fin" => $request->input('fecha_fin'),
			"fecha_cita" => "Día ".Carbon::now('UTC')->format('d-m-20y')." a las ".$hora." horas.",
		);

		$pdf = PDF::loadView('clinica.simular.pdf', $data);
		$nombre = $paciente->nombre." ".$paciente->apellido_1." ".$paciente->apellido_2;

		Mail::send('clinica.simular.mail', $data, function($message) use ($nombre, $paciente, $pdf){
			$message->from('carlosydanieldaw@gmail.com', 'Clínica Dalos')
					->to($paciente->email, $nombre)->subject("Cíta clínica")
					->attachData($pdf->output(), "Cita.pdf");
		});  

		
		if($lang == 'es'){
			Session::flash('mensaje_simulacion', 'Se han insertado los registros y enviado el correo correctamente.');	
		}else{
			Session::flash('mensaje_simulacion', 'The registries have been inserted and the email has been sent.');	
		}
		return redirect('citas');
	
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
			return view('clinica.pacientes.create-pacientes');
		}else{
			if($lang == 'es'){
				Session::flash('mensaje_autorizacion', 'Su cuenta de usuario no estรก autorizada para introducir nuevos pacientes.');	
			}else{
				Session::flash('mensaje_autorizacion', 'Your account does not have permission to insert new patients.');	
			}
			return redirect('pacientes');
		}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PacientesRequest $request)
    {
		Paciente::create($request->all());
        Session::flash('mensaje_confirmacion', 'El paciente se ha creado correctamente.');
        return redirect('pacientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $citas = Cita::where('paciente_id', $id)->get();
		$tratamientos = Tratamiento::where('paciente_id', $id)->get();
		return view('clinica.pacientes.show-pacientes', compact('citas', 'tratamientos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$lang = \App::getLocale(session('lang'));
		if(Gate::allows('administradores', Auth::user())){
			$paciente = Paciente::find($id);
			return view('clinica.pacientes.edit-pacientes', compact('paciente'));
		}else{
			if($lang == 'es'){
				Session::flash('mensaje_autorizacion', 'Su cuenta de usuario no está autorizada para editar pacientes.');	
			}else{
				Session::flash('mensaje_autorizacion', 'Your account does not have permission to edit patients.');	
			}
			return redirect('pacientes');
		}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(PacientesRequest $request, $id)
    {
		$lang = \App::getLocale(session('lang'));
        $request = request()->except('_token','_method');
		Paciente::where('id',$id)->update($request);
		if($lang == 'es'){
			Session::flash('mensaje_editado', 'El paciente se ha actualizado correctamente.');	
		}else{
			Session::flash('mensaje_editado', 'The patient has been updated.');	
		}
        return redirect('pacientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		if(Gate::allows('administradores', Auth::user())){
			$citas = Cita::where("paciente_id", $id)->count();
			$tratamientos = Tratamiento::where("paciente_id", $id)->count();
			$cant = $citas + $tratamientos;

			if($cant > 0){
				echo "error";
			}else{
				Paciente::find($id)->delete();
				echo "success";
			}
		}else{
			return "desautorizado";
		}
    }
}
