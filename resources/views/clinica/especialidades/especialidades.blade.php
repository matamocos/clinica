@extends('layouts.template')

@section('content')

	@if(Session::has('mensaje_confirmacion'))
		<div class="ui success message">
  			<i class="close icon"></i>
			<div class="header">Nuevo registro creado. </div>
  			<p>{{Session::get('mensaje_confirmacion')}}</p>
		</div>
	@endif

	<h2 class="section-title">Registro de las especialidades</h2>
	<div class="table-options">
		<a href="/especialidades/create"><button class="ui button left">Insertar un nuevo registro</button></a>
		<div class="ui icon input right">
			<i class="search icon"></i>
			<input id="search-input" style="border-color: lightgrey" type="text" placeholder="Buscar...">
		</div>
	</div>

	<table id="table" class="ui selectable inverted table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Especialidad</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($especialidades as $e)
				<tr data-id="{{$e->id}}">
					<td style="width: 10%;">{{$e->id}}</td>
					<td>{{$e->especialidad}}</td>
					<td>
						<img class="edit-button" src="{{ asset('/assets/img/edit.png',true)}}" alt="Editar">
						<img class="delete-button" src="{{ asset('/assets/img/delete.png',true)}}" alt="Borrar">
					</td>
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