@extends('layouts.template')

@section('content')
	
	<style>
		.grid-especialidades-medicos div{
			width: 100%;
		}
		
		#table > tbody > tr > td:last-child{
			justify-content: center;
		}
		
		#table i{
			transform: translate(4px, 0);
		}
		
	</style>

	@if(Session::has('mensaje_confirmacion'))
		<div class="ui success message">
  			<i class="close icon"></i>
			<div class="header">{{trans('medicos.medico_creado')}} </div>
  			<p>{{Session::get('mensaje_confirmacion')}}</p>
		</div>
	@endif

	@if(Session::has('mensaje_error'))
		<div class="ui negative message">
  			<i class="close icon"></i>
			<div class="header">Error</div>
  			<p>{{Session::get('mensaje_error')}}</p>
		</div>
	@endif

	@if(Session::has('mensaje_autorizacion'))
		<div class="ui negative message">
  			<i class="close icon"></i>
			<div class="header">{{trans('medicos.medico_autorizado')}}</div>
  			<p>{{Session::get('mensaje_autorizacion')}}</p>
		</div>
	@endif

	<h2 class="section-title" style="margin-top: 0">{{trans('medicos.r_especialidad')}} {{$medico->nombre}} {{$medico->apellido_1}} {{$medico->apellido_2}}</h2>
	
	<div class="grid-especialidades-medicos">	
		
		<div style="padding-right: 1em;">	
			
			<h3 class="section-title">{{trans('medicos.b_eliminar')}}</h3>
			
			<div class="ui icon input right">
				<i class="search icon"></i>
				<input id="search-input" style="border-color: lightgrey" type="text" placeholder="{{trans('medicos.buscar')}}">
			</div>
			
			<table id="table" class="ui selectable inverted table" style="width: 100%;" data-medico="{{$medico->id}}">
				<thead>
					<tr>
						<th style="width: 90%;">{{trans('medicos.especialidad')}}</th>
						<th style="width: 10%; text-align: center;">{{trans('medicos.accion')}}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($especialidades as $e)
						<tr data-id="{{$e->especialidad_id}}">
							<td>{{$e->especialidad}}</td>
							<td>
								<i class="trash large circular alternate outline icon delete-button-2"></i>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			
		</div> <!-- fin tabla -->
		
		<div style="padding-left: 1em;">
			
			<h3 class="section-title">{{trans('medicos.a_especialidad')}}</h3>
			
			<form action="/especialidades_medicos/store" method="POST">
				@csrf
				<input name="medico_id" type="hidden" value="{{$medico->id}}">
				<select class="ui search dropdown" name="especialidad" required>
					@foreach($especialidades_select as $e)
						<option value="{{$e->id}}">{{$e->especialidad}}</option>
					@endforeach
				</select>
				<button class="ui button" style="margin-top: 1em;">{{trans('medicos.a_especialidad')}}</button>
			</form>
		</div> <!-- fin formulario -->
	
	</div>

	<div class="modal-delete-2"></div>
	
	<script>
		$(document).ready(function(){
			
			toastr.options = {
				'closeButton': true,
				'progressBar': true,
			}

			var tr;

			/*la ventana modal se crea aquí, porque si está en el blade se guarda en la memoria o algo similar, y se duplica
			  el evento de borrar*/
			var ventanaModal = `
				<div class="ui mini modal modal-delete-2">
					<div class="header"><span class="section-title">{{trans('medicos.modal_borrar')}}</span></div>
					<div class="content">
						<p>{{trans('medicos.modal_seguro')}}</p>
					</div>
					<div class="actions">
						<div class="ui cancel negative button">{{trans('medicos.modal_cancelar')}}</div>
						<div class="ui approve positive ok button">{{trans('medicos.modal_aceptar')}}</div>
					</div>
				</div>`;

			$('.modal-delete-2').append(ventanaModal);

			$(".delete-button-2").click(function(){	
				$('.modal-delete-2').modal('show');
				tr = $(this).closest('tr');
			}); //fin función

			$(document).on('click', '.modal-delete-2 .approve', function(e){
				$.ajax({                
					url: '/especialidades_medicos/destroy/' + $(tr).attr('data-id') + '/' + $('#table').attr('data-medico'),  
					type: 'DELETE',              
					data: {
						"_token": $("meta[name='csrf-token']").attr("content")
					},
					success: function(message) {
						if(message == "success"){
							toastr.success(`El registro se borró correctamente.`, "Éxito");
							$(tr).fadeOut();
							$('.modal').css('display', 'none');
						}else{
							toastr.warning(`No se puede borrar el registro debido a la integridad referencial`, "Error");
							$('.modal').css('display', 'none');
						}
					},
				});//fin ajax
			});//fin approve

			$(document).on('click', '.close', function(e){
				//hace desaparecer el mesaje flass de confirmación de registro creado
				$('.success').remove();
				//en los formularios hace desaparecer los mensajes que avisan de datos introducidos incorrectamente
				$('.negative').remove();
			});//fin close
		});
	</script>

@endsection