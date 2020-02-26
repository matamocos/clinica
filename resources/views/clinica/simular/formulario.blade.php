@extends('layouts.template')

@section('content')

	<h2 class="section-title">Simular una cita</h2>
	
	<div class="form-container">
		<form id="form" class="ui form" action="/citas/store" method="POST">
			@csrf
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
			
			<div class="sixteen wide required field">
				<label>{{ trans('citas.motivo_asistencia') }}</label>
				<input type="text" name="motivo" placeholder="Motivo de asistencia" required value={{old('motivo')}} >
			</div>
			
			<div class="sixteen wide field">
				<label>{{ trans('citas.observacion') }}</label>
				<input type="text" name="observaciones" placeholder="Observaciones" value={{old('observaciones')}} >
			</div>
			
			<div class="six wide required field">
				<label>Tratamiento</label>
				<select class="ui search dropdown" name="tipo_tratamiento_id" required value={{old('tipo_tratamiento_id')}} >
						<option value="0">Ninguno</option>
					@foreach($tratamientos as $t)
						<option value="{{$t->id}}">{{$t->tipo}}</option>
					@endforeach
				</select>
			</div>
			
			<div class="sixteen wide field">
				<label>Descripc&oacute;in</label>
				<input type="text" name="descripcion" placeholder="Descripción" value={{old('descripcion')}} >
			</div>
			
			<div class="fields">

				<div class="eight wide field">
					<label>Fecha de inicio</label>
					<input type="date" name="fecha_inicio" placeholder="Fecha de inicio" value={{old('fecha_inicio')}} >
				</div>

				<div class="eight wide field">
					<label>Fecha de finalizaci&oacute;n</label>
					<input type="date" name="fecha_fin" placeholder="Fecha de finalización" value={{old('fecha_fin')}} >
				</div>

			</div> <!-- End fields -->	
			
		</form>
		<a href="/simular/pdf"><button class="ui button left" style="margin-top: 1em;">Finalizar cita</button></a>
	</div>

@endsection