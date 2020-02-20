@extends('layouts.template')

@section('content')

	<h2 class="section-title">Registro de los tratamientos</h2>
	<div class="table-options">
		<button class="ui button left">Insertar un nuevo registro</button>
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
				<th>Médico (id)</th>
				<th>Paciente (id)</th>
				<th>Tipo de tratamiento (id)</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tratamientos as $t)
				<tr data-paciente="{{$t->id}}">
					<td>{{$t->id}}</td>
					<td>{{$t->descripcion}}</td>
					<td>{{$t->medico_id}}</td>
					<td>{{$t->paciente_id}}</td>
					<td>{{$t->tipo_tratamiento_id}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
@endsection