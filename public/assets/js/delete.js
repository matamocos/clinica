$(document).ready(function(){
	
	toastr.options = {
        'closeButton': true,
        'progressBar': true,
    }
	
	$(".delete-button").click(function(){
		var tr = $(this).closest('tr');
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
				}else{
					toastr.warning(`No se puede borrar el registro debido a la integridad referencial`, "Error");
				}
			},
		});
	}); //fin función
	
	//hace desaparecer el mesaje flass de confirmación de registro creado
	$('.close').click(function(){
		$('.success').css('display', 'none');
	});//fin close
	
});