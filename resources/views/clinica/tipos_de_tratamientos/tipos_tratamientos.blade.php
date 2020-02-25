@extends('layouts.template')

@section('content')
	
	@if(Session::has('mensaje_confirmacion'))
		<div class="ui success message">
  			<i class="close icon"></i>
			<div class="header">Nuevo registro creado. </div>
  			<p>{{Session::get('mensaje_confirmacion')}}</p>
		</div>
	@endif

	<h2 class="section-title">Registro de los tipos de tratamientos</h2>
	<div class="table-options">
		<a href="/tratamientos_tipos/create"><button class="ui button left">Insertar un nuevo registro</button></a>
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
				<th>Tipo de tratamiento</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tipos as $t)
				<tr data-id="{{$t->id}}">
					<td><div class="ui radio checkbox"><input type="checkbox" class="check"><label></label></div></td>
					<td style="width: 1%">{{$t->id}}</td>
					<td style="width: 90%">{{$t->tipo}}</td>
					<td>
						<i class="edit large circular icon edit-button"></i>
						<i class="trash large circular alternate outline icon delete-button"></i>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="modal-delete"></div>
	
@endsection