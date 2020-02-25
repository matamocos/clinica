$(document).ready(function(){
	
	toastr.options = {
        'closeButton': true,
        'progressBar': true,
    }
	
	$('.show-tratamientos').click(function(){
		var id = $(this).closest('tr').attr('data-id');
		$.ajax({
			url: location.href + '/show/' + id ,
			type:'GET', 
			success: function(data){
				if(data != 'error'){
					$('.ui.dimmer.modals.page.transition').remove();
					
					var ventanaModal = `
						<div class="ui mini modal modal-show-3" style="width:60%;">
							<div class="header"><span class="section-title">Mostrando el tratamiento con ID: ${data[0].tratamiento_id}</span></div>
							<div class="content">
								<p>Tipo de tratamiento: <strong>${data[0].tipo}</strong></p>
								<p>Nombre del paciente: <strong>${data[0].p_nombre} ${data[0].p_apellido1} ${data[0].p_apellido2}</strong></p>
								<p>Nombre del médico:   <strong>${data[0].m_nombre} ${data[0].m_apellido1} ${data[0].m_apellido2}</strong></p>
								<p>Fecha de inicio:     <strong>${data[0].fecha_inicio}</strong></p>
								<p>Fecha de fin:     <strong>${data[0].fecha_fin}</strong></p>
								<p>Descripción del tratamiento: <strong>${data[0].descripcion}</strong></p>
							</div>
							<div  class="actions">
								<button class="ui approve positive button">Cerrar</button>
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


