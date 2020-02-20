@extends('layouts.template')

@section('content')

	<h2 class="section-title">Insertar un nuevo registro en Médicos</h2>
	
	<div class="form-container">
		<form id="form" class="ui form" action="" method="POST">

			<div class="sixteen wide required field">
				<label>Nombre</label>
				<input type="text" name="nombre" placeholder="Nombre" required>
			</div>
			
			<div class="fields">
			
				<div class="eight wide required field">
					<label>Primer Apellido</label>
					<input type="text" name="1apellido" placeholder="Primer Apellido" required>
				</div>

				<div class="eight wide required field">
					<label>Segundo Apellido</label>
					<input type="text" name="2apellido" placeholder="Segundo Apellido" required>
				</div>

			</div> <!-- End fields -->	

			<div class="fields">

				<div class="eight wide required field">
					<label>Fecha de nacimiento</label>
					<input type="date" name="fecha_nacimiento" placeholder="Fecha de nacimiento" required>
				</div>
				
				<div class="eight wide required field">
					<label>Teléfono</label>
					<input type="text" name="telefono" placeholder="Email" required>
				</div>

			</div> <!-- End fields -->	

			<a href="/medicos/store"><button class="ui button left">Insertar registro</button></a>
			<button class="ui button left clear-form">Vaciar formulario</button>
			
		</form>
	</div>

@endsection