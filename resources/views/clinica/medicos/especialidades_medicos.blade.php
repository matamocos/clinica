@extends('layouts.template')

@section('content')

	<h2 class="section-title">Registro de las especialidades de los médicos</h2>
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
				<th>Médico (id)</th>
				<th>Especialidad (id)</th>
			</tr>
		</thead>
		<tbody>
			@foreach($especialidades as $e)
				<tr data-id="{{$p->id}}">
					<td>{{$e->id}}</td>
					<td>{{$e->medico_id}}</td>
					<td>{{$e->especialidade_id}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
@endsection