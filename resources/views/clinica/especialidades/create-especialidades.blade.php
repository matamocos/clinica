@extends('layouts.template')

@section('content')

	<h2 class="section-title">Insertar un nuevo registro en Especialidades</h2>
	
	<div class="form-container">
		<form id="form" class="ui form" action="" method="POST">

			<div class="sixteen wide required field">
				<label>Nombre de la nueva especialidad</label>
				<input type="text" name="especialidad" placeholder="Especialidad" required>
			</div>

			<a href="/tratamientos/store"><button class="ui button left">Insertar registro</button></a>
			<button class="ui button left clear-form">Vaciar formulario</button>
			
		</form>
	</div>

@endsection