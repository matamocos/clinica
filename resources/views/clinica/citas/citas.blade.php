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


	{{ $citas->links("vendor.pagination.semantic-ui") }}

	<div class="modal-delete"></div>
	<div class="modal-show"></div>

	<script>
	$(document).ready(function(){
	
	toastr.options = {
        'closeButton': true,
        'progressBar': true,
    }
	
	//PROBLEMA: Se multiplica el número de ventanas modales que se generan exponencialmente a medida que vas clickeando en mostrar.
	
	$(document).on('click','.show-citas', function(){	
			
		var id = $(this).closest('tr').attr('data-id');
		//$('.modal-show').html('');
		$.ajax({
			url: location.protocol + '//' + location.host + location.pathname + '/show/' + id ,
			type:'GET', 
			success: function(data){
				if(data != 'error'){
					
					$('.ui.dimmer.modals.page.transition').remove();
					
					var ventanaModal = `
						<div class="ui mini modal modal-show" style="width:60%;">
							<div class="header"><span class="section-title">{{trans('citas.modal_cabecera')}} ${data.id_citas}</span></div>
							<div class="content">
								<p>
									{{trans('citas.modal_paciente')}}  <strong>${data.nombre_paciente} ${data.apellido_1_paciente} ${data.apellido_2_paciente}</strong> {{trans('citas.modal_concertar')}} 
									 <strong>${data.nombre_medico} ${data.apellido_1_medico} ${data.apellido_2_medico}</strong> {{trans('citas.modal_dia')}} ${data.fecha} {{trans('citas.modal_hora')}} ${data.hora}.
								</p>
								<p>{{trans('citas.modal_motivo')}} ${data.motivo}</p>
							</div>
							<div  class="actions">
								<button id="test"  class="ui approve positive button">{{trans('citas.modal_cerrar')}}</button>
							</div>
						</div>`;
					
					$('.modal-show').html(ventanaModal);
					
					$('.ui.mini.modal.modal-show')
  						.modal('show')
					;
				
				}else{
					toastr.warning(`{{trans('citas.modal_nosepuede')}}`, "Error");
				}
			}
		});//fin ajax
	});
});
		


		

		
		
	</script>


@endsection