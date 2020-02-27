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

	<h2 class="section-title">{{trans('medicos.insertar_registro')}}</h2>
	
	<div class="form-container">
		<form id="form" class="ui form" action="/medicos/store" method="POST">
			@csrf
			<div class="sixteen wide required field">
				<label>{{trans('medicos.nombre')}}</label>
				<input type="text" name="nombre" placeholder="{{trans('medicos.nombre')}}" required value={{old('nombre')}} >
			</div>
			
			<div class="fields">
			
				<div class="eight wide required field">
					<label>{{trans('medicos.apellido_1')}}</label>
					<input type="text" name="apellido_1" placeholder="{{trans('medicos.apellido_1')}}" required value={{old("apellido_1")}} >
				</div>

				<div class="eight wide required field">
					<label>{{trans('medicos.apellido_2')}}</label>
					<input type="text" name="apellido_2" placeholder="{{trans('medicos.apellido_2')}}" required value={{old("apellido_2")}} >
				</div>

			</div> <!-- End fields -->	

			<div class="fields">

				<div class="eight wide required field">
					<label>{{trans('medicos.f_nacimiento')}}</label>
					<input type="date" name="fecha_nacimiento" placeholder="{{trans('medicos.f_nacimiento')}}" required value={{old("fecha_nacimiento")}} >
				</div>
				
				<div class="eight wide required field">
					<label>{{trans('medicos.telefono')}}</label>
					<input type="number" name="telefono" placeholder="{{trans('medicos.telefono')}}" required value={{old("telefono")}} >
				</div>

			</div> <!-- End fields -->	

			<button class="ui button left">{{trans('medicos.insertar_registro')}}</button>
			<button class="ui button left clear-form">{{trans('medicos.vaciar')}}</button>
			
		</form>
	</div>

@endsection