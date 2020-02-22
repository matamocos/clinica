@extends('layouts.template')

@section('content')

	@if (count($errors) > 0)
		<div class="ui negative message">
			<i class="close icon"></i>
			<div class="header">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		</div>
	@endif

	<h2 class="section-title">Actualizar cita</h2>
	
	<div class="form-container">
		<form id="form" class="ui form" action="/citas/update/{{$cita->id}}" method="POST">
			@csrf
			<input name="_method" type="hidden" value="PUT">
			
			<div class="fields">
			
				<div class="eight wide required field">
						<label>Día de la cita</label>
						<input type="date" name="fecha" placeholder="Fecha" required value="{{$cita->fecha}}">
				</div>

				<div class="eight wide required field">
						<label>Hora de la cita</label>
						<input type="time" name="hora" placeholder="Hora" step="3600" required value="{{$cita->hora}}">
				</div>
			
			</div>
				
			<div class="sixteen wide required field">
				<label>Motivo de asistencia</label>
				<input type="text" name="motivo" placeholder="Motivo de asistencia" required value="{{$cita->motivo}}" >
			</div>
			
			<div class="sixteen wide field">
				<label>Observaciones</label>
				<input type="text" name="observaciones" placeholder="Observaciones" value="{{$cita->observaciones}}" >
			</div>
			
			<div class="fields">
			
				<div class="eight wide required field">
					<label>Médico</label>
					<select class="ui search dropdown" name="medico_id" required value="{{$cita->medico_id}}">
						@foreach($medicos as $m)
							<option value="{{$m->id}}">{{$m->nombre}} {{$m->apellido_1}} {{$m->apellido_2}}</option>
						@endforeach
					</select>
				</div>

				<div class="eight wide required field">
					<label>Paciente</label>
					<select class="ui search dropdown" name="paciente_id" required value="{{$cita->paciente_id}}">
						@foreach($pacientes as $p)
							<option value="{{$p->id}}">{{$p->nombre}} {{$p->apellido_1}} {{$p->apellido_2}}</option>
						@endforeach
					</select>
				</div>
				
			</div>

			<a href="/citas/store"><button class="ui button left">Actualizar registro</button></a>
			<button class="ui button left clear-form">Vaciar formulario</button>
			
		</form>
	</div>

@endsection