@extends('layouts.template')

@section('content')

	@if(Session::has('mensaje_confirmacion'))
		<div class="ui success message">
  			<i class="close icon"></i>
			<div class="header">Nuevo registro creado. </div>
  			<p>{{Session::get('mensaje_confirmacion')}}</p>
		</div>
	@endif

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
				<th>Día</th>
				<th>Hora</th>
				<th>Motivos de la consulta</th>
				<th>Observaciones</th>
				<th>Paciente (id)</th>
				<th>Medico (id)</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($citas as $c)
				<tr data-id="{{$c->id}}">
					<td>{{$c->id}}</td>
					<td>{{$c->fecha}}</td>
					<td>{{$c->hora}}</td>
					<td>{{$c->motivo}}</td>
					<td>{{$c->observaciones}}</td>
					<td>{{$c->paciente_id}}</td>
					<td>{{$c->medico_id}}</td>
					<td>
						<img class="edit-button" src="{{ asset('/assets/img/edit.png',true)}}" alt="Editar">
						<img class="delete-button" src="{{ asset('/assets/img/delete.png',true)}}" alt="Borrar">
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="ventana_modal"></div>

@endsection