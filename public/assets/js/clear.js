$(document).ready(function(){
	$('.clear-form').click(function(e){
		e.preventDefault();
		
		$('#form input').val('');
		//document.getElementById("form").reset();
	});
});