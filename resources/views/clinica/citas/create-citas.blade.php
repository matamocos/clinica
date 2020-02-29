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

	<h2 class="section-title">{{ trans('citas.insertar_cita') }}</h2>
	
	<div class="form-container">
		<form id="form" class="ui form" action="/citas/store" method="POST">
			@csrf
			
			<div class="fields">
			
				<div class="eight wide required field">
						<label>{{ trans('citas.dia_cita') }}</label>
						<input type="date" name="fecha" placeholder="Fecha" required value={{old('fecha')}}>
				</div>

				<div class="eight wide required field">
						<label>{{ trans('citas.hora_cita') }}</label>
						<input type="time" name="hora" placeholder="Hora" step="1" required value={{old('hora')}}>
				</div>
				
			</div>
			
			<div class="sixteen wide required field">
				<label>{{ trans('citas.motivo_asistencia') }}</label>
				<input type="text" name="motivo" placeholder="Motivo de asistencia" required value={{old('motivo')}} >
			</div>
			
			<div class="sixteen wide field">
				<label>{{ trans('citas.observacion') }}</label>
				<input type="text" name="observaciones" placeholder="Observaciones" value={{old('observaciones')}} >
			</div>
			
			<div class="fields">
			
				<div class="eight wide required field">
					<label>{{ trans('citas.medico') }}</label>
					<select class="ui search dropdown" name="medico_id" required value={{old('medico_id')}}>
						@foreach($medicos as $m)
							<option value="{{$m->id}}">{{$m->nombre}} {{$m->apellido_1}} {{$m->apellido_2}}</option>
						@endforeach
					</select>
				</div>

				<div class="eight wide required field">
					<label>{{ trans('citas.paciente') }}</label>
					<select class="ui search dropdown" name="paciente_id" required value={{old('paciente_id')}}>
						@foreach($pacientes as $p)
							<option value="{{$p->id}}">{{$p->nombre}} {{$p->apellido_1}} {{$p->apellido_2}}</option>
						@endforeach
					</select>
				</div>
				
			</div>

			<a href="/citas/store"><button class="ui button left">{{ trans('citas.insertar_registro') }}</button></a>
			<button class="ui button left clear-form">{{ trans('citas.vaciar') }}</button>
			
		</form>
	</div>

@endsection