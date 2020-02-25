$(document).ready(function(){
	$('.show-medicos').click(function(){
		location.href = location.href + '/show/' + $(this).closest('tr').attr('data-id');
	});
});
	
