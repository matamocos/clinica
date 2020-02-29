$(document).ready(function(){
	$('.show-pacientes').click(function(){
		location.href = location.href + '/show/' + $(this).closest('tr').attr('data-id');
	});
});