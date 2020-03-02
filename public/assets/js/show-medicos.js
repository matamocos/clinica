$(document).ready(function(){
	$(document).on('click','.show-medicos', function(){
		location.href = location.protocol + '//' + location.host + location.pathname + '/show/' + $(this).closest('tr').attr('data-id');
	});
});
	
