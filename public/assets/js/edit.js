$(document).ready(function(){
	
	$('.edit-button').click(function(){
		location.href = location.href + '/edit/' + $(this).closest('tr').attr('data-id');
	});
	
});