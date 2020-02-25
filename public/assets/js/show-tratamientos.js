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
					console.log(data);
					$('.ui.dimmer.modals.page.transition').remove();
					
					let tratamiento_id = data.tratamiento_id;
					
					var ventanaModal = `
						<div class="ui mini modal modal-show-3" style="width:60%;">
							<div class="header"><span class="section-title">Mostrando el tratamiento con ID: ${tratamiento_id}</span></div>
							<div class="content">
								
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


