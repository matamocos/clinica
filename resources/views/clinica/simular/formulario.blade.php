@extends('layouts.template')

@section('content')

	<h2 class="section-title">{{ trans('citas.simular_cita') }}</h2>
	
	<div class="form-container">
		<form id="form" class="ui form" action="/simular/pdf" method="POST">
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
				<input type="text" name="motivo" placeholder="{{ trans('citas.motivo_asistencia') }}" required value={{old('motivo')}} >
			</div>
			
			<div class="sixteen wide required field">
				<label>{{ trans('citas.observacion') }}</label>
				<input type="text" name="observaciones" placeholder="{{ trans('citas.observacion') }}" required value={{old('observaciones')}} >
			</div>
			
			<div class="six wide required field">
				<label>{{ trans('citas.tratamiento') }}</label>
				<select class="ui search dropdown" name="tipo_tratamiento_id" required value={{old('tipo_tratamiento_id')}} >
						<option value="ninguno">Ninguno</option>
					@foreach($tratamientos as $t)
						<option value="{{$t->id}}">{{$t->tipo}}</option>
					@endforeach
				</select>
			</div>
			
			<div class="sixteen wide field">
				<label>{{ trans('citas.descripcion') }}</label>
				<input type="text" name="descripcion" placeholder="{{ trans('citas.descripcion') }}" value={{old('descripcion')}} >
			</div>
			
			<div class="fields">

				<div class="eight wide field">
					<label>{{ trans('citas.f_inicio') }}</label>
					<input type="date" name="fecha_inicio" placeholder="{{ trans('citas.f_inicio') }}" value={{old('fecha_inicio')}} >
				</div>

				<div class="eight wide field">
					<label>{{ trans('citas.f_fin') }}</label>
					<input type="date" name="fecha_fin" placeholder="{{ trans('citas.f_fin') }}" value={{old('fecha_fin')}} >
				</div>

			</div> <!-- End fields -->	
			<button class="ui button left" style="margin-top: 1em;">{{ trans('citas.finalizar_cita') }}</button>
		</form>
		
	</div>

@endsection