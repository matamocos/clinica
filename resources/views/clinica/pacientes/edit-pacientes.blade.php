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

	<h2 class="section-title">{{ trans('pacientes.editar') }} {{$paciente->nombre}} {{$paciente->apellido_1}} {{$paciente->apellido_2}}</h2>
	
	<div class="form-container">
		<form id="form" class="ui form" action="/pacientes/update/{{$paciente->id}}" method="POST">
			@csrf
			<input name="_method" type="hidden" value="PUT">
			<div class="fields">

				<div class="six wide required field">
					<label>{{ trans('pacientes.nombre') }}</label>
					<input type="text" name="nombre" placeholder="Nombre" required value="{{$paciente->nombre}}" >
				</div>

				<div class="six wide required field">
					<label>{{ trans('pacientes.apellido_1') }}</label>
					<input type="text" name="apellido_1" placeholder="Primer Apellido" required value="{{$paciente->apellido_1}}" >
				</div>

				<div class="six wide required field">
					<label>{{ trans('pacientes.apellido_2') }}</label>
					<input type="text" name="apellido_2" placeholder="Segundo Apellido" required value="{{$paciente->apellido_2}}" >
				</div>

			</div> <!-- End fields -->	

			<div class="fields">

				<div class="six wide required field">
					<label>{{ trans('pacientes.pais') }}</label>
					<input type="text" name="pais" placeholder="País" required value="{{$paciente->pais}}" >
				</div>

				<div class="six wide required field">
					<label>{{ trans('pacientes.ciudad') }}</label>
					<input type="text" name="ciudad" placeholder="Ciudad" required value="{{$paciente->ciudad}}" >
				</div>

				<div class="six wide required field">
					<label>{{ trans('pacientes.f_nacimiento') }}</label>
					<input type="date" name="fecha_nacimiento" placeholder="Fecha de nacimiento" required value="{{ date('Y-m-d', strtotime($paciente->fecha_nacimiento)) }}" >
				</div>

			</div> <!-- End fields -->	

			<div class="fields">

				<div class="twelve wide field">
					<label>{{ trans('pacientes.direccion') }}</label>
					<input type="text" name="direccion" placeholder="Dirección" value="{{$paciente->direccion}}" >
				</div>

				<div class="six wide required field">
					<label>{{ trans('pacientes.dni') }}</label>
					<input type="text" name="dni" placeholder="Dni" required value="{{$paciente->dni}}" >
				</div>

			</div> <!-- End fields -->

			<div class="fields">

				<div class="twelve wide required field">
					<label>Email</label>
					<input type="text" name="email" placeholder="Email" required value="{{$paciente->email}}" >
				</div>

				<div class="six wide required field">
					<label>{{ trans('pacientes.genero') }}</label>
					<select class="ui search dropdown" name="genero" required value="{{$paciente->genero}}" >
						<option value="Hombre">Hombre</option>
						<option value="Mujer">Mujer</option>
					</select>
				</div>

			</div> <!-- End fields -->

			<div class="sixteen wide required field">
				<label>{{ trans('pacientes.telefono') }}</label>
				<input type="text" name="telefono" placeholder="Teléfono" required value="{{$paciente->telefono}}" >
			</div>

			<button class="ui button left">{{ trans('pacientes.actualizar_registro') }}</button>
			<button class="ui button left clear-form">{{ trans('pacientes.vaciar') }}</button>	
		</form>
	</div>

@endsection