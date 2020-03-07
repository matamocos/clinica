
$(document).ready(function(){
	
	var	lang = $('div.dropdown:nth-child(1) > div:nth-child(3)').text();
		
	toastr.options = {
        'closeButton': true,
        'progressBar': true,
    }
	
	var tr;
	

	var ventanaModal = `
		<div class="ui mini modal modal-delete">
			<div class="header"><span class="section-title"> ${lang == 'Idioma' ? 'Borrar registro' : 'Delete record'} &nbsp; </span></div>
			<div class="content">
				<p> ${lang == 'Idioma' ? '¿Está seguro de que decea borrar este registro?' : 'Are you sure you want to delete this record?'} &nbsp; </p>
			</div>
			<div class="actions">
				<div class="ui cancel negative button">${lang == 'Idioma' ? 'Cancelar' : 'Cancel'} &nbsp;</div>
				<div class="ui approve positive ok button">${lang == 'Idioma' ? 'Aceptar' : 'Accept'} &nbsp;</div>
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
					toastr.success(` ${lang == 'Idioma' ? 'El registro se borró correctamente.' : 'The record was deleted successfully.'}`, lang == 'Idioma' ? 'Éxito' : 'Success' );
					$(tr).fadeOut();
					$('.modal').css('display', 'none');
				}else if(message == "desautorizado"){
					toastr.warning(`${lang == 'Idioma' ? 'Su cuenta de usuario no está autorazada para borrar registros.' : 'Your user account is not autorized to delete records.'}`, lang == 'Idioma' ? 'Usuario no autorizado' : 'Unauthorized User');
					$('.modal').css('display', 'none');
				}else{
					toastr.warning(`  ${lang == 'Idioma' ? 'No se puede borrar el registro debido a la integridad referencial' : 'The record cannot be deleted due to referential integrity'}`, "Error");
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

