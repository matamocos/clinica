$(document).ready(function(){
	
	let url = location.href;
	
	switch(url){
		case "http://clinica-plyrm.run.goorm.io/inicio":
			$('body > div > div.navbar > div.ui.inverted.segment > div > a:nth-child(1)').addClass('active');
			break;
		case "http://clinica-plyrm.run.goorm.io/pacientes":
			$('body > div > div.navbar > div.ui.inverted.segment > div > a:nth-child(2)').addClass('active');
			break;
		case "http://clinica-plyrm.run.goorm.io/medicos":
			$('body > div > div.navbar > div.ui.inverted.segment > div > a:nth-child(3)').addClass('active');
			break;
		case "http://clinica-plyrm.run.goorm.io/citas":
			$('body > div > div.navbar > div.ui.inverted.segment > div > a:nth-child(4)').addClass('active');
			break;
		case "http://clinica-plyrm.run.goorm.io/tratamientos":
			$('body > div > div.navbar > div.ui.inverted.segment > div > a:nth-child(5)').addClass('active');
			break;
		case "http://clinica-plyrm.run.goorm.io/tratamientos_tipos":
			$('body > div > div.navbar > div.ui.inverted.segment > div > a:nth-child(6)').addClass('active');
			break;
		case "http://clinica-plyrm.run.goorm.io/especialidades":
			$('body > div > div.navbar > div.ui.inverted.segment > div > a:nth-child(7)').addClass('active');
			break;
		case "http://clinica-plyrm.run.goorm.io/especialidades_medicos":
			$('body > div > div.navbar > div.ui.inverted.segment > div > a:nth-child(8)').addClass('active');
			break;
		case "http://clinica-plyrm.run.goorm.io/expedientes":
			$('body > div > div.navbar > div.ui.inverted.segment > div > a:nth-child(9)').addClass('active');
			break;
	}
	
	$('body > div > div.content-wrapper > div.ui.success.message > i').click(function(){
		$(this).parent().remove();
	});
	
});