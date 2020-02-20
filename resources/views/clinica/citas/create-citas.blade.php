@extends('layouts.template')

@section('content')

	<h2 class="section-title">Insertar un nuevo registro en Pacientes</h2>
	
	<div class="form-container">
		<form id="form" class="ui form" action="" method="POST">

			<div class="sixteen wide required field">
				<label>Motivo de asistencia</label>
				<input type="text" name="motivo" placeholder="Motivo de asistencia" required>
			</div>
			
			<div class="sixteen wide required field">
				<label>Observaciones</label>
				<input type="text" name="observaciones" placeholder="Observaciones" required>
			</div>
			
			<div class="sixteen wide required field">
				<label>Médico</label>
				<input type="text" name="medico" placeholder="Médico" required>
			</div>
			
			<div class="sixteen wide required field">
				<label>Paciente</label>
				<input type="text" name="paciente" placeholder="Paciente" required>
			</div>

			<a href="/pacientes/store"><button class="ui button left">Insertar registro</button></a>
			<button class="ui button left clear-form">Vaciar formulario</button>
			
		</form>
	</div>

@endsection