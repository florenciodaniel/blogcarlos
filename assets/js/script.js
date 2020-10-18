//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.botaotopo').fadeIn();
		} else {
			$('.botaotopo').fadeOut();
		}
	});
	
	//Click event to scroll to top
	$('.botaotopo').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
   
//maskaras para ajustar os inputs
$(function(){
   $('#inicio').mask('000.000.000.000.000,00', {reverse: true});
   $('#valor').mask('000.000.000.000.000,00', {reverse: true});
   $('#vencimento').mask('00/00/0000');
});
            