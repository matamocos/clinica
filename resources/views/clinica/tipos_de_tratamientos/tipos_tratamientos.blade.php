@extends('layouts.template')

@section('content')
	
	@if(Session::has('mensaje_confirmacion'))
		<div class="ui success message">
  			<i class="close icon"></i>
			<div class="header">Nuevo registro creado. </div>
  			<p>{{Session::get('mensaje_confirmacion')}}</p>
		</div>
	@endif

	<h2 class="section-title">Registro de los tipos de tratamientos</h2>
	<div class="table-options">
		<a href="/tratamientos_tipos/create"><button class="ui button left">Insertar un nuevo registro</button></a>
		<div class="ui icon input right">
			<i class="search icon"></i>
			<input id="search-input" style="border-color: lightgrey" type="text" placeholder="Buscar...">
		</div>
	</div>

	<table id="table" class="ui selectable inverted table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Tipo de tratamiento</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tipos as $t)
				<tr data-id="{{$t->id}}">
					<td style="width: 10%;">{{$t->id}}</td>
					<td>{{$t->tipo}}</td>
					<td><img class="delete-button" src="{{ asset('/assets/img/delete.png',true)}}" alt="Borrar"></td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<!--
	<div class="ui mini modal">
 		<div class="header">Borrar registro</div>
  		<div class="content">
    		<p>¿Está seguro de que decea borrar este registro?</p>
  		</div>
		<div class="actions">
			<div class="ui cancel negative button">Cancelar</div>
			<div class="ui approve positive ok button">Aceptar</div>
		 </div>
	</div>
	-->

	<div class="ventana_modal">
		
	</div>
	
@endsection