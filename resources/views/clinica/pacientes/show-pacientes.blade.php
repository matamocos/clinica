@extends('layouts.template')

@section('content')

	<h2 class="section-title">{{ trans('pacientes.paciente') }}</h2>
	<h3 class="section-title">{{ trans('citas.cita') }}</h3>
	<table class="ui selectable inverted table">
	<thead>
		<tr>
			<th>Id</th>
			<th>{{ trans('citas.dia') }}</th>
			<th>{{ trans('citas.hora') }}</th>
			<th>{{ trans('citas.motivo') }}</th>
			<th>{{ trans('citas.observacion') }}</th>
			<th>{{ trans('citas.medico') }} (id)</th>
		</tr>
	</thead>
	<tbody>
		@foreach($citas as $c)
			<tr data-id="{{$c->id}}">
				<td style="width: 1%">{{$c->id}}</td>
				<td>{{$c->fecha}}</td>
				<td>{{$c->hora}}</td>
				<td>{{$c->motivo}}</td>
				<td>{{$c->observaciones}}</td>
				<td>{{$c->medico_id}}</td>
			</tr>
		@endforeach
	</tbody>
	</table>

	<h3 class="section-title">{{trans('tratamientos.tratamiento')}} </h3>
	<table class="ui selectable inverted table">
		<thead>
			<tr>
				<th>Id</th>
				<th>{{trans('tratamientos.descripcion')}}</th>
				<th>{{trans('tratamientos.f_inicio')}}</th>
				<th>{{trans('tratamientos.f_fin')}} </th>
				<th>{{trans('tratamientos.medico')}} (id)</th>
				<th>{{trans('tratamientos.tipo_tratamiento')}} (id)</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tratamientos as $t)
				<tr data-id="{{$t->id}}">
					<td style="width: 1%">{{$t->id}}</td>
					<td>{{$t->descripcion}}</td>
					<td>{{$t->fecha_inicio}}</td>
					<td>{{$t->fecha_fin}}</td>
					<td>{{$t->medico_id}}</td>
					<td>{{$t->tipo_tratamiento_id}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection