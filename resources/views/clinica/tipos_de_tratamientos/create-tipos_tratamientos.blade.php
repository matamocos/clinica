@extends('layouts.template')

@section('content')

	<h2 class="section-title">Insertar un nuevo registro en Tipos de tratamientos</h2>
	
	<div class="form-container">
		<form id="form" class="ui form" action="" method="POST">

			<div class="sixteen wide required field">
				<label>Nombre del nuevo tratamiento</label>
				<input type="text" name="tipo" placeholder="Tratamiento" required>
			</div>

			<a href="/tratamientos/store"><button class="ui button left">Insertar registro</button></a>
			<button class="ui button left clear-form">Vaciar formulario</button>
			
		</form>
	</div>

@endsection