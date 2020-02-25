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

	<h2 class="section-title">Editar tratamiento</h2>
	
	<div class="form-container">
		<form id="form" class="ui form" action="/tratamientos/update/{{$tratamiento->id}}" method="POST">
			@csrf
			<input name="_method" type="hidden" value="PUT">
			<div class="sixteen wide required field">
				<label>Descripción</label>
				<input type="text" name="descripcion" placeholder="Descripción" required value="{{$tratamiento->descripcion}}" >
			</div>
			
			<div class="fields">

				<div class="eight wide required field">
					<label>Fecha de inicio</label>
					<input type="date" name="fecha_inicio" placeholder="Fecha de inicio" required value="{{$tratamiento->fecha_inicio}}" >
				</div>

				<div class="eight wide field">
					<label>Fecha de finalización</label>
					<input type="date" name="fecha_fin" placeholder="Fecha de finalización" value="{{$tratamiento->fecha_fin}}" >
				</div>

			</div> <!-- End fields -->	

			<div class="fields">

				<div class="six wide required field">
					<label>Médico</label>
					<select class="ui search dropdown" name="medico_id" required value="{{$tratamiento->medico_id}}" >
						@foreach($medicos as $m)
							<option value="{{$m->id}}">{{$m->nombre}} {{$m->apellido_1}} {{$m->apellido_2}}</option>
						@endforeach
					</select>
				</div>

				<div class="six wide required field">
					<label>Paciente</label>
					<select class="ui search dropdown" name="paciente_id" required value="{{$tratamiento->paciente_id}}" >
						@foreach($pacientes as $p)
							<option value="{{$p->id}}">{{$p->nombre}} {{$p->apellido_1}} {{$p->apellido_2}}</option>
						@endforeach
					</select>
				</div>

				<div class="six wide required field">
					<label>Tipo de tratamiento</label>
					<select class="ui search dropdown" name="tipo_tratamiento_id" required value="{{$tratamiento->tipo_tratamiento_id}}" >
						@foreach($tipos as $t)
							<option value="{{$t->id}}">{{$t->tipo}}</option>
						@endforeach
					</select>
				</div>

			</div> <!-- End fields -->	

			<button class="ui button left">Actualizar registro</button>
			<button class="ui button left clear-form">Vaciar formulario</button>
			
		</form>
	</div>

@endsection