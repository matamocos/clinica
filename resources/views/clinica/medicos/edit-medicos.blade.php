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

	<h2 class="section-title">{{trans('medicos.editar')}} {{$medico->nombre}} {{$medico->apellido_1}} {{$medico->apellido_2}}</h2>
	
	<div class="form-container">
		<form id="form" class="ui form" action="/medicos/update/{{$medico->id}}" method="POST">
			@csrf
			<input name="_method" type="hidden" value="PUT">
			
			<div class="sixteen wide required field">
				<label>{{trans('medicos.nombre')}}</label>
				<input type="text" name="nombre" placeholder="{{trans('medicos.nombre')}}" required value="{{$medico->nombre}}" >
			</div>

			<div class="fields">
			
				<div class="eight wide required field">
					<label>{{trans('medicos.apellido_1')}}</label>
					<input type="text" name="apellido_1" placeholder="{{trans('medicos.apellido_2')}}" required value="{{$medico->apellido_1}}" >
				</div>

				<div class="eight wide required field">
					<label>{{trans('medicos.apellido_2')}}</label>
					<input type="text" name="apellido_2" placeholder="{{trans('medicos.apellido_2')}}" required value="{{$medico->apellido_2}}" >
				</div>

			</div> <!-- End fields -->	

			<div class="fields">
				
				<div class="eight wide required field">
					<label>{{trans('medicos.f_nacimiento')}}</label>
					<input type="date" name="fecha_nacimiento" placeholder="{{trans('medicos.f_nacimiento')}}" required value="{{$medico->fecha_nacimiento}}" >
				</div>

				<div class="eight wide required field">
					<label>{{trans('medicos.telefono')}}</label>
					<input type="text" name="telefono" placeholder="{{trans('medicos.telefono')}}" required value="{{$medico->telefono}}" >
				</div>

			</div> <!-- End fields -->	

			<button class="ui button left">{{trans('medicos.actualizar_registro')}}</button>
			<button class="ui button left clear-form">{{trans('medicos.vaciar')}}</button>
				
		</form>
	</div>

@endsection