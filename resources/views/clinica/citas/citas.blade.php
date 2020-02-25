@extends('layouts.template')

@section('content')

	@if(Session::has('mensaje_confirmacion'))
		<div class="ui success message">
  			<i class="close icon"></i>
			<div class="header">Nuevo registro creado. </div>
  			<p>{{Session::get('mensaje_confirmacion')}}</p>
		</div>
	@endif

	@if(Session::has('mensaje_editado'))
		<div class="ui success message">
  			<i class="close icon"></i>
			<div class="header">Registro editado.</div>
  			<p>{{Session::get('mensaje_editado')}}</p>
		</div>
	@endif

	@if(Session::has('mensaje_autorizacion'))
		<div class="ui negative message">
  			<i class="close icon"></i>
			<div class="header">Usuario no autorizado.</div>
  			<p>{{Session::get('mensaje_autorizacion')}}</p>
		</div>
	@endif

	<h2 class="section-title">Registro de las citas</h2>
	<div class="table-options">
		<a href="/citas/create"><button class="ui button left">Insertar un nuevo registro</button></a>
		<a id="borrar"><button class="ui button left" style="height: 36px;">Borrar seleccionados</button></a>
		<div class="ui icon input right">
			<i class="search icon"></i>
			<input id="search-input" style="border-color: lightgrey" type="text" placeholder="Buscar...">
		</div>
	</div>

	<table id="table" class="ui selectable inverted table">
		<thead>
			<tr>
				<th><div class="ui checkbox"><input type="checkbox" class="check_all"><label></label></div></th>
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
					<td><div class="ui radio checkbox"><input type="checkbox" class="check"><label></label></div></td>
					<td style="width: 1%">{{$c->id}}</td>
					<td>{{$c->fecha}}</td>
					<td>{{$c->hora}}</td>
					<td>{{$c->motivo}}</td>
					<td>{{$c->observaciones}}</td>
					<td>{{$c->paciente_id}}</td>
					<td>{{$c->medico_id}}</td>
					<td>
						<i class="search large circular icon show-citas"></i>
						<i class="edit large circular icon edit-button"></i>
						<i class="trash large circular alternate outline icon delete-button"></i>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="modal-delete"></div>
	<div class="modal-show"></div>
@endsection