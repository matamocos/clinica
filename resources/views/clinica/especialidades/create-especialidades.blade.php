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

	<h2 class="section-title">Insertar un nuevo registro en Especialidades</h2>
	
	<div class="form-container">
		<form id="form" class="ui form" action="/especialidades/store" method="POST">
		@csrf
			<div class="sixteen wide required field">
				<label>Nombre de la nueva especialidad</label>
				<input type="text" name="especialidad" placeholder="Especialidad" required value={{old('especialidad')}} >
			</div>

			<button class="ui button left">Insertar registro</button>
			<button class="ui button left clear-form">Vaciar formulario</button>
			
		</form>
	</div>

@endsection