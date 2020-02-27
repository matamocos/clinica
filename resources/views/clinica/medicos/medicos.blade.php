@extends('layouts.template')

@section('content')
	
	@if(Session::has('mensaje_confirmacion'))
		<div class="ui success message">
  			<i class="close icon"></i>
			<div class="header">{{trans('medicos.medico_creado')}}</div>
  			<p>{{Session::get('mensaje_confirmacion')}}</p>
		</div>
	@endif

	@if(Session::has('mensaje_editado'))
		<div class="ui success message">
  			<i class="close icon"></i>
			<div class="header">{{trans('medicos.medico_editado')}}</div>
  			<p>{{Session::get('mensaje_editado')}}</p>
		</div>
	@endif

	@if(Session::has('mensaje_autorizacion'))
		<div class="ui negative message">
  			<i class="close icon"></i>
			<div class="header">{{trans('medicos.medico_autorizado')}}</div>
  			<p>{{Session::get('mensaje_autorizacion')}}</p>
		</div>
	@endif

	<h2 class="section-title">{{trans('medicos.medico')}}</h2>
	<div class="table-options">
		<a href="/medicos/create"><button class="ui button left">{{trans('medicos.insertar')}}</button></a>
		<a id="borrar"><button class="ui button left" style="height: 36px;">{{trans('medicos.borrar')}}</button></a>
		<div class="ui icon input right">
			<i class="search icon"></i>
			<input id="search-input" style="border-color: lightgrey" type="text" placeholder="{{trans('medicos.buscar')}}">
		</div>
	</div>

	<table id="table" class="ui selectable inverted table">
		<thead>
			<tr>
				<th><div class="ui checkbox"><input type="checkbox" class="check_all"><label></label></div></th>
				<th>Id</th>
				<th>{{trans('medicos.nombre')}}</th>
				<th>{{trans('medicos.apellido_1')}}</th>
				<th>{{trans('medicos.apellido_2')}}</th>
				<th>{{trans('medicos.f_nacimiento')}}</th>
				<th>{{trans('medicos.edad')}}</th>
				<th>{{trans('medicos.telefono')}}</th>
				<th style="width:10%;">{{trans('medicos.accion')}}</th>
			</tr>
		</thead>
		<tbody>
			@foreach($medicos as $m)
				<tr data-id="{{$m->id}}">
					<td><div class="ui radio checkbox"><input type="checkbox" class="check"><label></label></div></td>
					<td style="width: 1%">{{$m->id}}</td>
					<td>{{$m->nombre}}</td>
					<td>{{$m->apellido_1}}</td>
					<td>{{$m->apellido_2}}</td>
					<td>{{$m->fecha_nacimiento}}</td>
					<td>{{$m->edad_medico}}</td>
					<td>{{$m->telefono}}</td>
					<td>
						<i class="search large circular icon show-medicos"></i>
						<i class="edit large circular icon edit-button"></i>
						<i class="trash large circular alternate outline icon delete-button"></i>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
	<div class="modal-delete"></div>

@endsection