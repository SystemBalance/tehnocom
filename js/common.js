//window.onscroll = function(event)
//{
//    console.log(event);
//    console.log(window.location.hash);
////    event.preventDefault();
////    return false;
//
//    var h = window.location.hash.substr(1);
//
//    //Делаем только для ID= покачто
//    var anc = $(window.location.hash);
//
//    console.log(anc);
//
//    if(h!=''){
//        $('html, body').animate({
//            scrollTop: anc.offset().top
//        }, 500);
//
////        window.location.hash = '';
//        if (typeof event.preventDefault != 'undefined')
//            event.preventDefault();
//        else
//            return false;
//
////        window.location.
//    }
//
//}


//
//$(function () {
//    var currentHash = "#initial_hash"
//    $(document).scroll(function () {
//        $('.anchor_tags').each(function () {
//            var top = window.pageYOffset;
//            var distance = top - $(this).offset().top;
//            var hash = $(this).attr('href');
//            // 30 is an arbitrary padding choice,
//            // if you want a precise check then use distance===0
//            if (distance < 30 && distance > -30 && currentHash != hash) {
//                window.location.hash = (hash);
//                currentHash = hash;
//            }
//        });
//    });
//});





//
//myAnchorGo = function() {
//    if ($(this).attr('href').charAt(o) === '#') {
//        $('html, body').animate({
//            scrollTop: $($(this).attr('href')).offset().top
//        }, 500);
//        return false;
//    }
//});


head.ready(function() {

	var agent = navigator.userAgent,
	event = (agent.match(/iPad/i)) ? "touchstart" : "click";

	$(document).bind(event, function(e){
		$(".js-popup").hide();
	});

	//slider
	function slider() {
		var el = $('.js-slider');
		el.each(function(){
			var el_in = $(this).find('.slider__list'),
			el_item = $(this).find('.slider__item'),
			el_prev = $(this).find('.slider__prev'),
			el_next = $(this).find('.slider__next');
			el_in.cycle({
				fx: 'carousel',
				timeout: 4000,
				carouselVisible: 4,
				next: el_next,
				prev: el_prev,
				slides: el_item
//                autostart
			});
		})
	}
	slider();
	
	//window scroll
//	$(window).scroll(function(){
//		var offset_top = $(document).scrollTop(),
//				map = $('.map'),
//				map_top = map.offset().top;
//		if (offset_top > map_top) {
//			map.addClass('is-animated');
//		};
//	});



});