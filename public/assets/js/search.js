$(document).ready(function(){
	
	$('#search-input').keyup(function(){ // Search all columns
		
		var search = $(this).val();
		$('#table tbody tr').hide();
		var len = $('table tbody tr:not(.notfound) td:contains("'+search+'")').length;

		if(len > 0){
			$('#search-input').css('border-color', 'lightgrey');
			$('#table tbody tr:not(.notfound) td:contains("'+search+'")').each(function(){
				$(this).closest('tr').show();
			});
		}else{
			$('#search-input').css('border-color', 'red');
		}

	});
	
})