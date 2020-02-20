@extends('layouts.template')

@section('content')

	<h2 class="section-title">Insertar un nuevo registro en Tratamientos</h2>
	
	<div class="form-container">
		<form id="form" class="ui form" action="" method="POST">

			<div class="sixteen wide required field">
				<label>Descripción</label>
				<input type="text" name="descripcion" placeholder="Descripción" required value={{old('descripcion')}} >
			</div>
			
			<div class="fields">

				<div class="eight wide required field">
					<label>Fecha de inicio</label>
					<input type="text" name="fecha_inicio" placeholder="Fecha de inicio" required value={{old('fecha_inicio')}} >
				</div>

				<div class="eight wide field">
					<label>Fecha de finalización</label>
					<input type="text" name="fecha_fin" placeholder="Fecha de finalización" value={{old('fecha_fin')}} >
				</div>

			</div> <!-- End fields -->	

			<div class="fields">

				<div class="six wide required field">
					<label>Médico</label>
					<select class="ui search dropdown" name="medico_id" required value={{old('medico_id')}} >
						@foreach($medicos as $m)
							<option value="{{$m->id}}">{{$m->nombre}} {{$m->apellido_1}} {{$m->apellido_2}}</option>
						@endforeach
					</select>
				</div>

				<div class="six wide required field">
					<label>Paciente</label>
					<select class="ui search dropdown" name="paciente_id" required value={{old('paciente_id')}} >
						@foreach($pacientes as $p)
							<option value="{{$p->id}}">{{$p->nombre}} {{$p->apellido_1}} {{$p->apellido_2}}</option>
						@endforeach
					</select>
				</div>

				<div class="six wide required field">
					<label>Tipo de tratamiento</label>
					<select class="ui search dropdown" name="tipo_tratamiento_id" required value={{old('tipo_tratamiento_id')}} >
						@foreach($tipos as $t)
							<option value="{{$t->id}}">{{$t->tipo}}</option>
						@endforeach
					</select>
				</div>

			</div> <!-- End fields -->	

			<a href="/tratamientos/store"><button class="ui button left">Insertar registro</button></a>
			<button class="ui button left clear-form">Vaciar formulario</button>
			
		</form>
	</div>

@endsection