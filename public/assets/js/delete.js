
$(document).ready(function(){
	
	toastr.options = {
        'closeButton': true,
        'progressBar': true,
    }
	
	var tr;
	

	var ventanaModal = `
		<div class="ui mini modal modal-delete">
			<div class="header"><span class="section-title"> Borrar registro</span></div>
			<div class="content">
				<p>¿Está seguro de que decea borrar este registro?</p>
			</div>
			<div class="actions">
				<div class="ui cancel negative button">Cancelar</div>
				<div class="ui approve positive ok button">Aceptar</div>
			</div>
		</div>`;
		
	$('.modal-delete').append(ventanaModal);
	
	$(document).on('click','.delete-button', function(){	
		$('.modal-delete').modal('show');
		tr = $(this).closest('tr');
	}); //fin función
	
	$(document).on('click', '.modal-delete .approve', function(e){
		$.ajax({                
			url: location.protocol + '//' + location.host + location.pathname + '/destroy/' + $(tr).attr('data-id'),  
			type: 'DELETE',              
			data: {
				"_token": $("meta[name='csrf-token']").attr("content")
			},
			success: function(message) {
				
				console.log(message)
				
				if(message == "success"){
					toastr.success(`El registro se borró correctamente.`, "Éxito");
					$(tr).fadeOut();
					$('.modal').css('display', 'none');
				}else if(message == "desautorizado"){
					toastr.warning(`Su cuenta de usuario no está autorazada para borrar registros.`, "Usuario no autorizado");
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

