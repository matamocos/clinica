@extends('layouts.template')

@section('content')

	@if(Session::has('mensaje_confirmacion'))
		<div class="ui success message">
  			<i class="close icon"></i>
			<div class="header">{{trans('tratamientos.tratamiento_creado')}} </div>
  			<p>{{Session::get('mensaje_confirmacion')}}</p>
		</div>
	@endif

	@if(Session::has('mensaje_editado'))
		<div class="ui success message">
  			<i class="close icon"></i>
			<div class="header">{{trans('tratamientos.tratamiento_editado')}} </div>
  			<p>{{Session::get('mensaje_editado')}}</p>
		</div>
	@endif

	@if(Session::has('mensaje_autorizacion'))
		<div class="ui negative message">
  			<i class="close icon"></i>
			<div class="header">{{trans('tratamientos.tratamiento_autorizado')}} </div>
  			<p>{{Session::get('mensaje_autorizacion')}}</p>
		</div>
	@endif

	<h2 class="section-title">{{trans('tratamientos.tratamiento')}} </h2>
	<div class="table-options">
		<a href="/tratamientos/create"><button class="ui button left">{{trans('tratamientos.insertar')}} </button></a>
		<a id="borrar"><button class="ui button left" style="height: 36px;">{{trans('tratamientos.borrar')}} </button></a>
		<div class="ui icon input right">
			<i class="search icon"></i>
			<input id="search-input" style="border-color: lightgrey" type="text" placeholder="{{trans('tratamientos.buscar')}}">
		</div>
	</div>

	<table id="table" class="ui selectable inverted table">
		<thead>
			<tr>
				<th><div class="ui checkbox"><input type="checkbox" class="check_all"><label></label></div></th>
				<th>Id</th>
				<th>{{trans('tratamientos.descripcion')}}</th>
				<th>{{trans('tratamientos.f_inicio')}}</th>
				<th>{{trans('tratamientos.f_fin')}} </th>
				<th>{{trans('tratamientos.medico')}} (id)</th>
				<th>{{trans('tratamientos.paciente')}} (id)</th>
				<th>{{trans('tratamientos.tipo_tratamiento')}} (id)</th>
				<th>{{trans('tratamientos.accion')}}</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tratamientos as $t)
				<tr data-id="{{$t->id}}">
					<td><div class="ui radio checkbox"><input type="checkbox" class="check"><label></label></div></td>
					<td style="width: 1%">{{$t->id}}</td>
					<td>{{$t->descripcion}}</td>
					<td>{{$t->fecha_inicio}}</td>
					<td>{{$t->fecha_fin}}</td>
					<td>{{$t->medico_id}}</td>
					<td>{{$t->paciente_id}}</td>
					<td>{{$t->tipo_tratamiento_id}}</td>
					<td>
						<i class="search large circular icon show-tratamientos"></i>
						<i class="edit large circular icon edit-button"></i>
						<i class="trash large circular alternate outline icon delete-button"</i>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	{{ $tratamientos->links("vendor.pagination.semantic-ui") }}

	<div class="modal-delete"></div>
	<div class="modal-show-3"></div>

	<script>
		$(document).ready(function(){
	
		toastr.options = {
			'closeButton': true,
			'progressBar': true,
		}

		$(document).on('click','.show-tratamientos', function(){	
			var id = $(this).closest('tr').attr('data-id');
			$.ajax({
				url: location.protocol + '//' + location.host + location.pathname + '/show/' + id ,
				type:'GET', 
				success: function(data){
					if(data != 'error'){
						$('.ui.dimmer.modals.page.transition').remove();

						var ventanaModal = `
							<div class="ui mini modal modal-show-3" style="width:60%;">
								<div class="header"><span class="section-title">{{trans('tratamientos.modal_cabecera')}} ${data[0].tratamiento_id}</span></div>
								<div class="content">
									<p>{{trans('tratamientos.modal_tipo')}} <strong>${data[0].tipo}</strong></p>
									<p>{{trans('tratamientos.modal_paciente')}} <strong>${data[0].p_nombre} ${data[0].p_apellido1} ${data[0].p_apellido2}</strong></p>
									<p>{{trans('tratamientos.modal_medico')}}   <strong>${data[0].m_nombre} ${data[0].m_apellido1} ${data[0].m_apellido2}</strong></p>
									<p>{{trans('tratamientos.modal_fecha_inicio')}}     <strong>${data[0].fecha_inicio}</strong></p>
									<p>{{trans('tratamientos.modal_fecha_fin')}}     <strong>${data[0].fecha_fin}</strong></p>
									<p>{{trans('tratamientos.modal_descripcion')}} <strong>${data[0].descripcion}</strong></p>
								</div>
								<div  class="actions">
									<button class="ui approve positive button">{{trans('tratamientos.modal_cerrar')}}</button>
								</div>
							</div>`;

						$('.modal-show-3').html(ventanaModal);

						$('.ui.mini.modal.modal-show-3')
							.modal('show')
						;

					}else{
						toastr.warning(`No se ha podido mostrar el registro debido a un error.`, "Error");
					}
				}
			});//fin ajax
		});
	});

	</script>
	
@endsection