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

	<h2 class="section-title">Editar médico {{$medico->nombre}} {{$medico->apellido_1}} {{$medico->apellido_2}}</h2>
	
	<div class="form-container">
		<form id="form" class="ui form" action="/medicos/update/{{$medico->id}}" method="POST">
			@csrf
			<input name="_method" type="hidden" value="PUT">
			
			<div class="sixteen wide required field">
				<label>Nombre</label>
				<input type="text" name="nombre" placeholder="Nombre" required value="{{$medico->nombre}}" >
			</div>

			<div class="fields">
			
				<div class="eight wide required field">
					<label>Primer Apellido</label>
					<input type="text" name="apellido_1" placeholder="Primer Apellido" required value="{{$medico->apellido_1}}" >
				</div>

				<div class="eight wide required field">
					<label>Segundo Apellido</label>
					<input type="text" name="apellido_2" placeholder="Segundo Apellido" required value="{{$medico->apellido_2}}" >
				</div>

			</div> <!-- End fields -->	

			<div class="fields">
				
				<div class="eight wide required field">
					<label>Fecha de nacimiento</label>
					<input type="date" name="fecha_nacimiento" placeholder="Fecha de nacimiento" required value="{{$medico->fecha_nacimiento}}" >
				</div>

				<div class="eight wide required field">
					<label>Teléfono</label>
					<input type="text" name="telefono" placeholder="Teléfono" required value="{{$medico->telefono}}" >
				</div>

			</div> <!-- End fields -->	

			<button class="ui button left">Actualizar registro</button>
			<button class="ui button left clear-form">Vaciar formulario</button>
				
		</form>
	</div>

@endsection