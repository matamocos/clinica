@extends('layouts.template')

@section('content')
	
		<div class="ui raised segment">
  			<p> 
				[título pendiente] paciente {{$cita->nombre_paciente}} {{$cita->apellido_1_paciente}} {{$cita->apellido_2_paciente}} ha concertado una cita con el [titulo pendiente]
				{{$cita->nombre_medico}} {{$cita->apellido_1_medico}} {{$cita->apellido_2_medico}} el día {{$cita->fecha}} a la hora {{$cita->hora}}.
			</p>
			
			<p> 
				Motivo de la cita: {{$cita->motivo}}.
			</p>
			<p> 
				Motivo de la cita: {{$cita->motivo}}.
			</p>
		</div>

		<button id="abrir_ver_modal" class="ui button left">Prueba modal</button>
		<button class="ui red button right">Cancelar cita</button>

		<div id="ver_modal" class="ui large modal">
 			<div class="header"><span class="section-title">Detalles de la cita</span></div>
  				<div class="content">
    				<p> 
						[título pendiente] paciente {{$cita->nombre_paciente}} {{$cita->apellido_1_paciente}} {{$cita->apellido_2_paciente}} ha concertado una cita con el [titulo pendiente]
						{{$cita->nombre_medico}} {{$cita->apellido_1_medico}} {{$cita->apellido_2_medico}} el día {{$cita->fecha}} a la hora {{$cita->hora}}.
					</p>
					
					<p> 
						<b>Motivo de la cita:</b> {{$cita->motivo}}.
					</p>
  				</div>
				<div class="actions">	
		<div class="ui approve positive ok button">Cerrar</div>
		</div>
		</div>


		<script>
			$(document).ready(function(){
				
				$('#abrir_ver_modal').click(function(){
					$('#ver_modal').modal('show');
				});
				
			
			});
		</script>
	

@endsection