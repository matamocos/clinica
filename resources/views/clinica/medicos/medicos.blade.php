@extends('layouts.template')

@section('content')
	
	@if(Session::has('mensaje_confirmacion'))
		<div class="ui success message">
  			<i class="close icon"></i>
			<div class="header">Nuevo registro creado. </div>
  			<p>{{Session::get('mensaje_confirmacion')}}</p>
		</div>
	@endif

	<h2 class="section-title">Registro de los medicos</h2>
	<div class="table-options">
		<a href="/medicos/create"><button class="ui button left">Insertar un nuevo registro</button></a>
		<div class="ui icon input right">
			<i class="search icon"></i>
			<input id="search-input" style="border-color: lightgrey" type="text" placeholder="Buscar...">
		</div>
	</div>

	<table id="table" class="ui selectable inverted table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>1er Apellido</th>
				<th>2do Apellido</th>
				<th>Fecha de nacimiento</th>
				<th>Edad</th>
				<th>Teléfono</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($medicos as $m)
				<tr data-id="{{$m->id}}">
					<td>{{$m->id}}</td>
					<td>{{$m->nombre}}</td>
					<td>{{$m->apellido_1}}</td>
					<td>{{$m->apellido_2}}</td>
					<td>{{$m->fecha_nacimiento}}</td>
					<td>{{$m->edad_medico}}</td>
					<td>{{$m->telefono}}</td>
					<td><img class="delete-button" src="{{ asset('/assets/img/delete.png',true)}}" alt="Borrar"></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
@endsection