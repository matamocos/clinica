$(document).ready(function(){
	
	toastr.options = {
        'closeButton': true,
        'progressBar': true,
    }
	
	//PROBLEMA: Se multiplica el número de ventanas modales que se generan exponencialmente a medida que vas clickeando en mostrar.
	
	$('.show-tratamientos').click(function(){
		var id = $(this).closest('tr').attr('data-id');
		//$('.modal-show').html('');
		$.ajax({
			url: location.href + '/show/' + id ,
			type:'GET', 
			success: function(data){
				if(data != 'error'){
					
					$('.ui.dimmer.modals.page.transition').remove();
					
					var ventanaModal = `
						<div class="ui mini modal modal-show-3" style="width:60%;">
							<div class="header"><span class="section-title">Mostrando la cita con ID: ${data.id_citas}</span></div>
							<div class="content">
								<p>
									El paciente <strong>${data.nombre_paciente} ${data.apellido_1_paciente} ${data.apellido_2_paciente}</strong> concertó / ha concertado una cita con el médico
									 <strong>${data.nombre_medico} ${data.apellido_1_medico} ${data.apellido_2_medico}</strong> el día ${data.fecha} a la/s hora/s ${data.hora}.
								</p>
								<p>Motivo de la cita: ${data.motivo}</p>
							</div>
							<div  class="actions">
								<button id="test"  class="ui approve positive button">Cerrar</button>
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


