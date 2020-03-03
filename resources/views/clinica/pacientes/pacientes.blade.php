@extends('layouts.template')

@section('content')

	@if(Session::has('mensaje_confirmacion'))
		<div class="ui success message">
  			<i class="close icon"></i>
			<div class="header">{{ trans('pacientes.paciente_creado') }}</div>
  			<p>{{Session::get('mensaje_confirmacion')}}</p>
		</div>
	@endif

	@if(Session::has('mensaje_editado'))
		<div class="ui success message">
  			<i class="close icon"></i>
			<div class="header">{{ trans('pacientes.paciente_editado') }}</div>
  			<p>{{Session::get('mensaje_editado')}}</p>
		</div>
	@endif

	@if(Session::has('mensaje_autorizacion'))
		<div class="ui negative message">
  			<i class="close icon"></i>
			<div class="header">{{ trans('pacientes.paciente_autorizado') }}</div>
  			<p>{{Session::get('mensaje_autorizacion')}}</p>
		</div>
	@endif

	<h2 class="section-title">{{ trans('pacientes.paciente') }}</h2>
	<div class="table-options">
		<a href="/pacientes/create"><button class="ui button left">{{ trans('pacientes.insertar') }}</button></a>
		<a id="borrar"><button class="ui button left" style="height: 36px;">{{ trans('pacientes.borrar') }}</button></a>
		
		<div class="ui icon input right">
			<i class="search icon"></i>
			<input id="search-input" style="border-color: lightgrey" type="text" placeholder="{{ trans('pacientes.buscar') }}">
		</div>
	</div>

		<table id="table" class="ui selectable inverted table">
		<thead>
			<tr>
				<th><div class="ui checkbox"><input type="checkbox" class="check_all"><label></label></div></th>
				<th>Id</th>
				<th>{{ trans('pacientes.nombre') }}</th>
				<th>{{ trans('pacientes.apellido_1') }}</th>
				<th>{{ trans('pacientes.apellido_2') }}</th>
				<th style="width: 10%;">{{ trans('pacientes.pais') }}</th>
				<th>{{ trans('pacientes.ciudad') }}</th>
				<th>{{ trans('pacientes.f_nacimiento') }}</th>
				<th>{{ trans('pacientes.edad') }}</th>
				<th>{{ trans('pacientes.direccion') }}</th>
				<th>{{ trans('pacientes.dni') }}</th>
				<th>Email</th>
				<th>{{ trans('pacientes.genero') }}</th>
				<th>{{ trans('pacientes.telefono') }}</th>
				<th>{{ trans('pacientes.accion') }}</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pacientes as $p)
				<tr data-id="{{$p->id}}">
					<td><div class="ui radio checkbox"><input type="checkbox" class="check"><label></label></div></td>
					<td style="width: 1%">{{$p->id}}</td>
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
					<td>
						<i class="search large circular icon show-pacientes"></i>
						<i class="edit large circular icon edit-button"></i>
						<i class="trash large circular alternate outline icon delete-button"></i>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	{{ $pacientes->links("vendor.pagination.semantic-ui") }}

	<div class="modal-delete"></div>

@endsection