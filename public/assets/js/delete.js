$(document).ready(function(){
	
	toastr.options = {
        'closeButton': true,
        'progressBar': true,
    }
	
	$(".delete-button").click(function(){
		/*la ventana modal se crea aquí, porque si está en el blade se guarda en la memoria o algo similar, y se duplica
		  el evento de borrar*/
		var ventanaModal = `
			<div class="ui mini modal">
 				<div class="header">Borrar registro</div>
  				<div class="content">
    				<p>¿Está seguro de que decea borrar este registro?</p>
  				</div>
				<div class="actions">
					<div class="ui cancel negative button">Cancelar</div>
					<div class="ui approve positive ok button">Aceptar</div>
		 		</div>
			</div>`;
		
		$('.ventana_modal').append(ventanaModal);
		
		var tr = $(this).closest('tr');
	
		$('.modal').modal('show');
		
		$('.approve').click(function(){
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
						$('.modal').remove();
					}else{
						toastr.warning(`No se puede borrar el registro debido a la integridad referencial`, "Error");
						$('.modal').remove();
					}
				},
			});//fin ajax
		});//fin approve

	}); //fin función
	
	
	$('.close').click(function(){
		//hace desaparecer el mesaje flass de confirmación de registro creado
		$('.success').css('display', 'none');
		//en los formularios hace desaparecer los mensajes que avisan de datos introducidos incorrectamente
		$('.negative').css('display', 'none');
	});//fin close
	
});