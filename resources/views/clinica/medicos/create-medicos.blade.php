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

	<h2 class="section-title">Insertar un nuevo registro en Médicos</h2>
	
	<div class="form-container">
		<form id="form" class="ui form" action="/medicos/store" method="POST">
			@csrf
			<div class="sixteen wide required field">
				<label>Nombre</label>
				<input type="text" name="nombre" placeholder="Nombre" required value={{old('nombre')}} >
			</div>
			
			<div class="fields">
			
				<div class="eight wide required field">
					<label>Primer Apellido</label>
					<input type="text" name="apellido_1" placeholder="Primer Apellido" required value={{old("apellido_1")}} >
				</div>

				<div class="eight wide required field">
					<label>Segundo Apellido</label>
					<input type="text" name="apellido_2" placeholder="Segundo Apellido" required value={{old("apellido_2")}} >
				</div>

			</div> <!-- End fields -->	

			<div class="fields">

				<div class="eight wide required field">
					<label>Fecha de nacimiento</label>
					<input type="date" name="fecha_nacimiento" placeholder="Fecha de nacimiento" required value={{old("fecha_nacimiento")}} >
				</div>
				
				<div class="eight wide required field">
					<label>Teléfono</label>
					<input type="number" name="telefono" placeholder="Teléfono" required value={{old("telefono")}} >
				</div>

			</div> <!-- End fields -->	

			<a href="/medicos/create"><button class="ui button left">Insertar registro</button></a>
			<button class="ui button left clear-form">Vaciar formulario</button>
			
		</form>
	</div>

@endsection