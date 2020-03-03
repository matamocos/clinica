window.onscroll = function() {scrollFunction()};

function scrollFunction() {

 	if (document.body.scrollTop >250 || document.documentElement.scrollTop > 250) {

  	  	$(".navbar").css('position', 'fixed');
		$(".content-wrapper").css('margin-top', '76px');

  	} else {

    	$(".navbar").css('position', 'initial');
		$(".content-wrapper").css('margin-top', 'initial');

  	}

}