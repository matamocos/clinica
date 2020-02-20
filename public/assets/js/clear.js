$(document).ready(function(){
	$('.clear-form').click(function(e){
		e.preventDefault();
		document.getElementById("form").reset();
	});
});