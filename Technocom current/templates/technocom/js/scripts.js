$(document).ready(function(){
    //BEGIN script табы на странице cat_2.html
	$(".domtabs li a").click(function(e) {
    e.preventDefault();
    $(".domtabs li a").removeClass('d_activetab');
    $(this).addClass('d_activetab');
    $('.js-section').css('display', 'none');
    $(this).parents('.domtab').find('.js-section[data-id=' + $(this).attr('href') + ']');
  });
	//END script табы на странице cat_2.html
  	
	//BEGIN script табы на странице registration.html
	$('.d_pushone').click(function(){
		$(this).addClass('d_green');
		$('.d_box1').show();
		$('.d_box2').hide();
		$('.d_pushtwo').removeClass('d_blue');
    });
	$('.d_pushtwo').click(function(){
		$(this).addClass('d_blue');
		$('.d_box2').show();
		$('.d_box1').hide();
		$('.d_pushone').removeClass('d_green');
    });
	
	
	
	//прокручивание к формам
	$('.d_pushone').click(function(){
	 $('html, body').animate({
							scrollTop: $(this).offset().top
						}, 500);
	});
	 $('.d_pushtwo').click(function(){
	 $('html, body').animate({
							scrollTop: $(this).offset().top
						}, 500);
	});
	//END script табы на странице registration.html
});



