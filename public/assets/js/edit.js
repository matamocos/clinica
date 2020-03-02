$(document).ready(function(){
	
	$(document).on('click','.edit-button', function(){	
		location.href = location.protocol + '//' + location.host + location.pathname + '/edit/' + $(this).closest('tr').attr('data-id');
	});
	
});