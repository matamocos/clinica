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

	<h2 class="section-title">{{trans('tipo-tratamientos.insertar_t_tratamiento')}}</h2>
	
	<div class="form-container">
		<form id="form" class="ui form" action="/tratamientos_tipos/store" method="POST">
			@csrf
			<div class="sixteen wide required field">
				<label>{{trans('tipo-tratamientos.t_nombre')}}</label>
				<input type="text" name="tipo" placeholder="{{trans('tipo-tratamientos.t_nombre')}}" required value={{old('tipo')}}>
			</div>

			<button class="ui button left">{{trans('tipo-tratamientos.insertar_registro')}}</button>
			<button class="ui button left clear-form">{{trans('tipo-tratamientos.vaciar')}}</button>
			
		</form>
	</div>

@endsection