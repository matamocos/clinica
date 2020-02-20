@extends('layouts.template')

@section('content')

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
			</tr>
		</thead>
		<tbody>
			@foreach($medicos as $m)
				<tr data-paciente="{{$m->id}}">
					<td>{{$m->id}}</td>
					<td>{{$m->nombre}}</td>
					<td>{{$m->apellido_1}}</td>
					<td>{{$m->apellido_2}}</td>
					<td>{{$m->fecha_nacimiento}}</td>
					<td>{{$m->edad_medico}}</td>
					<td>{{$m->telefono}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
@endsection