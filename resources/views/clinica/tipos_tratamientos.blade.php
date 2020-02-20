@extends('layouts.template')

@section('content')

	<h2 class="section-title">Registro de los tipos de tratamientos</h2>
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
				<th>Tipo de tratamiento</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tipos as $t)
				<tr data-paciente="{{$t->id}}">
					<td>{{$t->id}}</td>
					<td>{{$t->tipo}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
@endsection