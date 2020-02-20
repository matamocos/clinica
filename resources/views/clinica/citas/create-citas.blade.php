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

	<h2 class="section-title">Insertar un nuevo registro en Citas</h2>
	
	<div class="form-container">
		<form id="form" class="ui form" action="" method="POST">

			<div class="sixteen wide required field">
				<label>Motivo de asistencia</label>
				<input type="text" name="motivo" placeholder="Motivo de asistencia" required value={{old('motivo')}} >
			</div>
			
			<div class="sixteen wide required field">
				<label>Observaciones</label>
				<input type="text" name="observaciones" placeholder="Observaciones" required value={{old('observaciones')}} >
			</div>
			
			<div class="sixteen wide required field">
				<label>Médico</label>
				<select class="ui search dropdown" name="medico_id" required value={{old('medico_id')}}>
					@foreach($medicos as $m)
						<option value="{{$m->id}}">{{$m->nombre}} {{$m->apellido_1}} {{$m->apellido_2}}</option>
					@endforeach
				</select>
			</div>
			
			<div class="sixteen wide required field">
				<label>Paciente</label>
				<select class="ui search dropdown" name="paciente_id" required value={{old('paciente_id')}}>
					@foreach($pacientes as $p)
						<option value="{{$p->id}}">{{$p->nombre}} {{$p->apellido_1}} {{$p->apellido_2}}</option>
					@endforeach
				</select>
			</div>

			<a href="/citas/store"><button class="ui button left">Insertar registro</button></a>
			<button class="ui button left clear-form">Vaciar formulario</button>
			
		</form>
	</div>

@endsection