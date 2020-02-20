@extends('layouts.template')

@section('content')

	<h2 class="section-title">Insertar un nuevo registro en Pacientes</h2>
	
	<div class="form-container">
		<form id="form" class="ui form" action="" method="POST">

			<div class="fields">

				<div class="six wide required field">
					<label>Nombre</label>
					<input type="text" name="nombre" placeholder="Nombre" required>
				</div>

				<div class="six wide required field">
					<label>Primer Apellido</label>
					<input type="text" name="1apellido" placeholder="Primer Apellido" required>
				</div>

				<div class="six wide required field">
					<label>Segundo Apellido</label>
					<input type="text" name="2apellido" placeholder="Segundo Apellido" required>
				</div>

			</div> <!-- End fields -->	

			<div class="fields">

				<div class="six wide required field">
					<label>País</label>
					<input type="text" name="pais" placeholder="País" required>
				</div>

				<div class="six wide required field">
					<label>Ciudad</label>
					<input type="text" name="ciudad" placeholder="Ciudad" required>
				</div>

				<div class="six wide required field">
					<label>Fecha de nacimiento</label>
					<input type="date" name="fecha_nacimiento" placeholder="Fecha de nacimiento" required>
				</div>

			</div> <!-- End fields -->	

			<div class="fields">

				<div class="twelve wide field">
					<label>Dirección</label>
					<input type="text" name="direccion" placeholder="Dirección">
				</div>

				<div class="six wide required field">
					<label>Dni</label>
					<input type="text" name="dni" placeholder="Dni" required>
				</div>

			</div> <!-- End fields -->

			<div class="fields">

				<div class="twelve wide field">
					<label>Email</label>
					<input type="text" name="email" placeholder="Email">
				</div>

				<div class="six wide required field">
					<label>Género</label>
					<select class="ui search dropdown" name="genero" required>
						<option value="Hombre">Hombre</option>
						<option value="Mujer">Mujer</option>
					</select>
				</div>

			</div> <!-- End fields -->

			<div class="sixteen wide required field">
				<label>Teléfono</label>
				<input type="text" name="telefono" placeholder="Email" required>
			</div>

			<a href="/pacientes/store"><button class="ui button left">Insertar registro</button></a>
			<button class="ui button left clear-form">Vaciar formulario</button>
			
		</form>
	</div>

@endsection