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

	<h2 class="section-title">{{ trans('pacientes.insertar') }}</h2>
	
	<div class="form-container">
		<form id="form" class="ui form" action="/pacientes/store" method="POST">
			@csrf
			<div class="fields">

				<div class="six wide required field">
					<label>{{ trans('pacientes.nombre') }}</label>
					<input type="text" name="nombre" placeholder="{{ trans('pacientes.nombre') }}" required value={{old('nombre')}} >
				</div>

				<div class="six wide required field">
					<label>{{ trans('pacientes.apellido_1') }}</label>
					<input type="text" name="apellido_1" placeholder="{{ trans('pacientes.apellido_1') }}" required value={{old('apellido_1')}} >
				</div>

				<div class="six wide required field">
					<label>{{ trans('pacientes.apellido_2') }}</label>
					<input type="text" name="apellido_2" placeholder="{{ trans('pacientes.apellido_2') }}" required value={{old('apellido_2')}} >
				</div>

			</div> <!-- End fields -->	

			<div class="fields">

				<div class="six wide required field">
					<label>{{ trans('pacientes.pais') }}</label>
					<input type="text" name="pais" placeholder="{{ trans('pacientes.pais') }}" required value={{old('pais')}}>
				</div>

				<div class="six wide required field">
					<label>{{ trans('pacientes.ciudad') }}</label>
					<input type="text" name="ciudad" placeholder="{{ trans('pacientes.ciudad') }}" required value={{old('ciudad')}} >
				</div>

				<div class="six wide required field">
					<label>{{ trans('pacientes.f_nacimiento') }}</label>
					<input type="date" name="fecha_nacimiento" placeholder="Fecha de nacimiento" required value={{old('fecha_nacimiento')}}>
				</div>

			</div> <!-- End fields -->	

			<div class="fields">

				<div class="twelve wide field">
					<label>{{ trans('pacientes.direccion') }}</label>
					<input type="text" name="direccion" placeholder="{{ trans('pacientes.direccion') }}" value={{old('direccion')}}>
				</div>

				<div class="six wide required field {{ $errors->has('dni') ? 'has-error' : '' }}">
					<label>{{ trans('pacientes.dni') }}</label>
					<input type="text" name="dni" placeholder="{{ trans('pacientes.dni') }}" required value={{old('dni')}}>
				</div>

			</div> <!-- End fields -->

			<div class="fields">

				<div class="twelve wide required field">
					<label>Email</label>
					<input type="text" name="email" placeholder="Email" required value={{old('email')}}>
				</div>

				<div class="six wide required field">
					<label>{{ trans('pacientes.genero') }}</label>
					<select class="ui search dropdown" name="genero" required value={{old('genero')}}>
						<option value="Hombre">Hombre</option>
						<option value="Mujer">Mujer</option>
					</select>
				</div>

			</div> <!-- End fields -->

			<div class="sixteen wide required field">
				<label>{{ trans('pacientes.telefono') }}</label>
				<input type="text" name="telefono" placeholder="{{ trans('pacientes.telefono') }}" required value={{old('telefono')}}>
			</div>

			<button class="ui button left">{{ trans('pacientes.insertar_registro') }}</button>
			<button class="ui button left clear-form">{{ trans('pacientes.vaciar') }}</button>
				
		</form>
	</div>

@endsection