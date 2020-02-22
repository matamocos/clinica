$(document).ready(function(){
	
	toastr.options = {
        'closeButton': true,
        'progressBar': true,
    }
	
	var tr;
	
	/*la ventana modal se crea aquí, porque si está en el blade se guarda en la memoria o algo similar, y se duplica
	  el evento de borrar*/
	var ventanaModal = `
			<div class="ui mini modal">
 				<div class="header"><span class="section-title">Borrar registro</span></div>
  				<div class="content">
    				<p>¿Está seguro de que decea borrar este registro?</p>
  				</div>
				<div class="actions">
					<div class="ui cancel negative button">Cancelar</div>
					<div class="ui approve positive ok button">Aceptar</div>
				</div>
			</div>`;
		
	$('.ventana_modal').append(ventanaModal);
	
	$(".delete-button").click(function(){	
		$('.modal').modal('show');
		tr = $(this).closest('tr');
	}); //fin función
	
	$(document).on('click', '.approve', function(e){
		$.ajax({                
			url: window.location.href + '/destroy/' + $(tr).attr('data-id'),  
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