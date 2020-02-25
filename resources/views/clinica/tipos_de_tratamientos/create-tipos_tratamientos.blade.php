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

	<h2 class="section-title">Insertar un nuevo registro en Tipos de tratamientos</h2>
	
	<div class="form-container">
		<form id="form" class="ui form" action="/tratamientos_tipos/store" method="POST">
			@csrf
			<div class="sixteen wide required field">
				<label>Nombre del nuevo tratamiento</label>
				<input type="text" name="tipo" placeholder="Tratamiento" required value={{old('tipo')}}>
			</div>

			<button class="ui button left">Insertar registro</button>
			<button class="ui button left clear-form">Vaciar formulario</button>
			
		</form>
	</div>

@endsection