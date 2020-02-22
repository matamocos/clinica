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

	<h2 class="section-title">Editar paciente {{$paciente->nombre}} {{$paciente->apellido_1}} {{$paciente->apellido_2}}</h2>
	
	<div class="form-container">
		<form id="form" class="ui form" action="/pacientes/update/{{$paciente->id}}" method="POST">
			@csrf
			<input name="_method" type="hidden" value="PUT">
			<div class="fields">

				<div class="six wide required field">
					<label>Nombre</label>
					<input type="text" name="nombre" placeholder="Nombre" required value="{{$paciente->nombre}}" >
				</div>

				<div class="six wide required field">
					<label>Primer Apellido</label>
					<input type="text" name="apellido_1" placeholder="Primer Apellido" required value="{{$paciente->apellido_1}}" >
				</div>

				<div class="six wide required field">
					<label>Segundo Apellido</label>
					<input type="text" name="apellido_2" placeholder="Segundo Apellido" required value="{{$paciente->apellido_2}}" >
				</div>

			</div> <!-- End fields -->	

			<div class="fields">

				<div class="six wide required field">
					<label>País</label>
					<input type="text" name="pais" placeholder="País" required value="{{$paciente->pais}}" >
				</div>

				<div class="six wide required field">
					<label>Ciudad</label>
					<input type="text" name="ciudad" placeholder="Ciudad" required value="{{$paciente->ciudad}}" >
				</div>

				<div class="six wide required field">
					<label>Fecha de nacimiento</label>
					<input type="date" name="fecha_nacimiento" placeholder="Fecha de nacimiento" required value="{{$paciente->fecha_nacimiento}}" >
				</div>

			</div> <!-- End fields -->	

			<div class="fields">

				<div class="twelve wide field">
					<label>Dirección</label>
					<input type="text" name="direccion" placeholder="Dirección" value="{{$paciente->direccion}}" >
				</div>

				<div class="six wide required field">
					<label>Dni</label>
					<input type="text" name="dni" placeholder="Dni" required value="{{$paciente->dni}}" >
				</div>

			</div> <!-- End fields -->

			<div class="fields">

				<div class="twelve wide field">
					<label>Email</label>
					<input type="text" name="email" placeholder="Email" value="{{$paciente->email}}" >
				</div>

				<div class="six wide required field">
					<label>Género</label>
					<select class="ui search dropdown" name="genero" required value="{{$paciente->genero}}" >
						<option value="Hombre">Hombre</option>
						<option value="Mujer">Mujer</option>
					</select>
				</div>

			</div> <!-- End fields -->

			<div class="sixteen wide required field">
				<label>Teléfono</label>
				<input type="text" name="telefono" placeholder="Teléfono" required value="{{$paciente->telefono}}" >
			</div>

			<button class="ui button left">Actualizar registro</button>
			<button class="ui button left clear-form">Vaciar formulario</button>
				
		</form>
	</div>

@endsection