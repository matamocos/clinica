@extends('layouts.template')

@section('content')

	<h2 class="section-title">Registro de los pacientes</h2>
	<div class="table-options">
		<a href="/pacientes/create"><button class="ui button left">Insertar un nuevo registro</button></a>
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
				<th style="width: 10%;">País</th>
				<th>Ciudad</th>
				<th>Fecha de nacimiento</th>
				<th>Edad</th>
				<th>Dirección</th>
				<th>Dni</th>
				<th>Email</th>
				<th>Género</th>
				<th>Teléfono</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pacientes as $p)
				<tr data-paciente="{{$p->id}}">
					<td>{{$p->id}}</td>
					<td>{{$p->nombre}}</td>
					<td>{{$p->apellido_1}}</td>
					<td>{{$p->apellido_2}}</td>
					<td>{{$p->pais}}</td>
					<td>{{$p->ciudad}}</td>
					<td>{{$p->fecha_nacimiento}}</td>
					<td>{{$p->edad_paciente}}</td>
					<td>{{$p->direccion}}</td>
					<td>{{$p->dni}}</td>
					<td>{{$p->email}}</td>
					<td>{{$p->genero}}</td>
					<td>{{$p->telefono}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
@endsection