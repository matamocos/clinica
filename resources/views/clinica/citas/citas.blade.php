@extends('layouts.template')

@section('content')

	<h2 class="section-title">Registro de las citas</h2>
	<div class="table-options">
		<a href="/citas/create"><button class="ui button left">Insertar un nuevo registro</button></a>
		<div class="ui icon input right">
			<i class="search icon"></i>
			<input id="search-input" style="border-color: lightgrey" type="text" placeholder="Buscar...">
		</div>
	</div>

	<table id="table" class="ui selectable inverted table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Fecha</th>
				<th>Motivos de la consulta</th>
				<th>Observaciones</th>
				<th>Paciente (id)</th>
				<th>Medico (id)</th>
			</tr>
		</thead>
		<tbody>
			@foreach($citas as $c)
				<tr data-paciente="{{$c->id}}">
					<td>{{$c->id}}</td>
					<td>{{$c->fecha}}</td>
					<td>{{$c->motivo}}</td>
					<td>{{$c->observaciones}}</td>
					<td>{{$c->paciente_id}}</td>
					<td>{{$c->medico_id}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
@endsection