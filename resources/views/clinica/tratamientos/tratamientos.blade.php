@extends('layouts.template')

@section('content')

	@if(Session::has('mensaje_confirmacion'))
		<div class="ui success message">
  			<i class="close icon"></i>
			<div class="header">Nuevo registro creado. </div>
  			<p>{{Session::get('mensaje_confirmacion')}}</p>
		</div>
	@endif

	<h2 class="section-title">Registro de los tratamientos</h2>
	<div class="table-options">
		<a href="/tratamientos/create"><button class="ui button left">Insertar un nuevo registro</button></a>
		<div class="ui icon input right">
			<i class="search icon"></i>
			<input id="search-input" style="border-color: lightgrey" type="text" placeholder="Buscar...">
		</div>
	</div>

	<table id="table" class="ui selectable inverted table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Descripción</th>
				<th>Fecha de inicio</th>
				<th>Fecha de finalización</th>
				<th>Médico (id)</th>
				<th>Paciente (id)</th>
				<th>Tipo de tratamiento (id)</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tratamientos as $t)
				<tr data-id="{{$t->id}}">
					<td>{{$t->id}}</td>
					<td>{{$t->descripcion}}</td>
					<td>{{$t->fecha_inicio}}</td>
					<td>{{$t->fecha_fin}}</td>
					<td>{{$t->medico_id}}</td>
					<td>{{$t->paciente_id}}</td>
					<td>{{$t->tipo_tratamiento_id}}</td>
					<td>
						<i class="edit large circular icon edit-button"></i>
						<i class="trash large circular alternate outline icon delete-button"></i>
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