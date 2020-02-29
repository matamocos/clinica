@extends('layouts.template')

@section('content')

	@if(Session::has('mensaje_confirmacion'))
		<div class="ui success message">
  			<i class="close icon"></i>
			<div class="header">{{ trans('citas.cita_creado') }}</div>
  			<p>{{Session::get('mensaje_confirmacion')}}</p>
		</div>
	@endif

	@if(Session::has('mensaje_editado'))
		<div class="ui success message">
  			<i class="close icon"></i>
			<div class="header">{{ trans('citas.cita_editado') }}</div>
  			<p>{{Session::get('mensaje_editado')}}</p>
		</div>
	@endif

	@if(Session::has('mensaje_autorizacion'))
		<div class="ui negative message">
  			<i class="close icon"></i>
			<div class="header">{{ trans('citas.cita_autorizado') }}</div>
  			<p>{{Session::get('mensaje_autorizacion')}}</p>
		</div>
	@endif

	@if(Session::has('mensaje_simulacion'))
		<div class="ui success message">
  			<i class="close icon"></i>
			<div class="header">{{ trans('pacientes.cita_simulacion') }}</div>
  			<p>{{Session::get('mensaje_simulacion')}}</p>
		</div>
	@endif

	<h2 class="section-title">{{ trans('citas.cita') }}</h2>
	<div class="table-options">
		<a href="/citas/create"><button class="ui button left">{{ trans('citas.insertar') }}</button></a>
		<a id="borrar"><button class="ui button left" style="height: 36px;">{{ trans('citas.borrar') }}</button></a>
		<a href="/simular"><button class="ui button">{{ trans('citas.simular_cita') }}</button></a>
		<div class="ui icon input right">
			<i class="search icon"></i>
			<input id="search-input" style="border-color: lightgrey" type="text" placeholder="{{ trans('citas.buscar') }}">
		</div>
	</div>

	<table id="table" class="ui selectable inverted table">
		<thead>
			<tr>
				<th><div class="ui checkbox"><input type="checkbox" class="check_all"><label></label></div></th>
				<th>Id</th>
				<th>{{ trans('citas.dia') }}</th>
				<th>{{ trans('citas.hora') }}</th>
				<th>{{ trans('citas.motivo') }}</th>
				<th>{{ trans('citas.observacion') }}</th>
				<th>{{ trans('citas.paciente') }} (id)</th>
				<th>{{ trans('citas.medico') }} (id)</th>
				<th>{{ trans('citas.accion') }}</th>
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