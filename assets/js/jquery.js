/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 $(function () {
//                $('.image_icon').click(function () {
//                    $("#menu").slideToggle("medium");
//                });
//              
                
                
                
                 $("a[rel=modal]").click( function(ev){
        ev.preventDefault();
 
        var id = $(this).attr("href");
 
        var alturaTela = $(document).height();
        var larguraTela = $(window).width();
     
        //colocando o fundo preto
        $('#mascara').css({'width':larguraTela,'height':alturaTela});
        $('#mascara').fadeIn(1000); 
        $('#mascara').fadeTo("slow",0.8);
//        $('#mascara').fadeTo(1000);
 
        var left = ($(window).width() /2) - ( $(id).width() / 2 );
        var top = $(window).scrollTop()+30;
var top = $(window).scrollTop()+10;
     
        $(id).css({'top':top,'left':left});
        $(id).show();   
    });
 
    $("#mascara").click( function(){
        $(this).hide();
        $(".window").hide();
    });
 
    $('.fechar').click(function(ev){
        ev.preventDefault();
        $("#mascara").hide();
        $(".window").hide();
    });
    
//    para ir ao contato
//    $('#solicitar_01').click(function(ev){
//       
//        $("#mascara").hide();
//        $(".window").hide();
//    });
//    
//    $('#solicitar_02').click(function(ev){
//       
//        $("#mascara").hide();
//        $(".window").hide();
//    });
//    
//    $('#solicitar_03').click(function(ev){
//       
//        $("#mascara").hide();
//        $(".window").hide();
//    });
//    
//    $('#solicitar_04').click(function(ev){
//       
//        $("#mascara").hide();
//        $(".window").hide();
//    });
    
//    slide upinside

//$('.slide_nav_item.g').click(function(){
//    slidego();
//});
//    
//
//function slideGo(){
//    if($('slide_item.first').next().size()){
//        $('slide_item.first').fadeOut(400,function(){
//           $(this).removeClass('first').next().fadeIn().addClass('first'); 
//        });
//    }else{
//        $('slide_item.first').fadeOut(400,function(){
//           $('.slide_item').removeClass('first');
//           $('.slide_item:eq(0)').fadeIn().addClass('first');
//        });
//    }
//    
//}

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
          

            });
