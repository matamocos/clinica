$(document).ready(function(){
	$(document).on('click','.show-pacientes', function(){
		location.href = location.protocol + '//' + location.host + location.pathname + '/show/' + $(this).closest('tr').attr('data-id');
	});
});