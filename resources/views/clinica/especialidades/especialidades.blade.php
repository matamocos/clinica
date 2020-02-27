@extends('layouts.template')

@section('content')

	@if(Session::has('mensaje_confirmacion'))
		<div class="ui success message">
  			<i class="close icon"></i>
			<div class="header">{{trans('especialidades.especialidad_creado')}} </div>
  			<p>{{Session::get('mensaje_confirmacion')}}</p>
		</div>
	@endif

	@if(Session::has('mensaje_editado'))
		<div class="ui success message">
  			<i class="close icon"></i>
			<div class="header">{{trans('especialidades.especialidad_editado')}}</div>
  			<p>{{Session::get('mensaje_editado')}}</p>
		</div>
	@endif

	@if(Session::has('mensaje_autorizacion'))
		<div class="ui negative message">
  			<i class="close icon"></i>
			<div class="header">{{trans('especialidades.especialidad_autorizado')}}</div>
  			<p>{{Session::get('mensaje_autorizacion')}}</p>
		</div>
	@endif

	<h2 class="section-title">{{trans('especialidades.r_especialidad')}}</h2>
	<div class="table-options">
		<a href="/especialidades/create"><button class="ui button left">{{trans('especialidades.insertar')}}</button></a>
		<a id="borrar"><button class="ui button left" style="height: 36px;">{{trans('especialidades.borrar')}}</button></a>
		<div class="ui icon input right">
			<i class="search icon"></i>
			<input id="search-input" style="border-color: lightgrey" type="text" placeholder="{{trans('especialidades.buscar')}}">
		</div>
	</div>

	<table id="table" class="ui selectable inverted table">
		<thead>
			<tr>
				<th><div class="ui checkbox"><input type="checkbox" class="check_all"><label></label></div></th>
				<th>Id</th>
				<th>{{trans('especialidades.especialidad')}}</th>
				<th>{{trans('especialidades.accion')}}</th>
			</tr>
		</thead>
		<tbody>
			@foreach($especialidades as $e)
				<tr data-id="{{$e->id}}">
					<td><div class="ui radio checkbox"><input type="checkbox" class="check"><label></label></div></td>
					<td style="width: 1%">{{$e->id}}</td>
					<td style="width: 90%">{{$e->especialidad}}</td>
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