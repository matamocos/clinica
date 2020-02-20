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

	<h2 class="section-title">Insertar un nuevo registro en Pacientes</h2>
	
	<div class="form-container">
		<form id="form" class="ui form" action="" method="POST">

			<div class="fields">

				<div class="six wide required field">
					<label>Nombre</label>
					<input type="text" name="nombre" placeholder="Nombre" required value={{old('nombre')}} >
				</div>

				<div class="six wide required field">
					<label>Primer Apellido</label>
					<input type="text" name="1apellido" placeholder="Primer Apellido" required value={{old('1apellido')}} >
				</div>

				<div class="six wide required field">
					<label>Segundo Apellido</label>
					<input type="text" name="2apellido" placeholder="Segundo Apellido" required value={{old('2apellido')}} >
				</div>

			</div> <!-- End fields -->	

			<div class="fields">

				<div class="six wide required field">
					<label>País</label>
					<input type="text" name="pais" placeholder="País" required value={{old('pais')}}>
				</div>

				<div class="six wide required field">
					<label>Ciudad</label>
					<input type="text" name="ciudad" placeholder="Ciudad" required value={{old('ciudad')}} >
				</div>

				<div class="six wide required field">
					<label>Fecha de nacimiento</label>
					<input type="date" name="fecha_nacimiento" placeholder="Fecha de nacimiento" required value={{old('fecha_nacimiento')}}>
				</div>

			</div> <!-- End fields -->	

			<div class="fields">

				<div class="twelve wide field">
					<label>Dirección</label>
					<input type="text" name="direccion" placeholder="Dirección" value={{old('direccion')}}>
				</div>

				<div class="six wide required field">
					<label>Dni</label>
					<input type="text" name="dni" placeholder="Dni" required value={{old('dni')}}>
				</div>

			</div> <!-- End fields -->

			<div class="fields">

				<div class="twelve wide field">
					<label>Email</label>
					<input type="text" name="email" placeholder="Email" value={{old('email')}}>
				</div>

				<div class="six wide required field">
					<label>Género</label>
					<select class="ui search dropdown" name="genero" required value={{old('genero')}}>
						<option value="Hombre">Hombre</option>
						<option value="Mujer">Mujer</option>
					</select>
				</div>

			</div> <!-- End fields -->

			<div class="sixteen wide required field">
				<label>Teléfono</label>
				<input type="text" name="telefono" placeholder="Email" required value={{old('telefono')}}>
			</div>

			<a href="/pacientes/store"><button class="ui button left">Insertar registro</button></a>
			<button class="ui button left clear-form">Vaciar formulario</button>
			
		</form>
	</div>

@endsection