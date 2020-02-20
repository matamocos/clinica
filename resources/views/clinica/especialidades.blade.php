@extends('layouts.template')

@section('content')

	<h2 class="section-title">Registro de las especialidades</h2>
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
				<th>Especialidad</th>
			</tr>
		</thead>
		<tbody>
			@foreach($especialidades as $e)
				<tr data-paciente="{{$e->id}}">
					<td>{{$e->id}}</td>
					<td>{{$e->especialidad}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
@endsection