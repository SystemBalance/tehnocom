head.ready(function() {

	var agent = navigator.userAgent,
	event = (agent.match(/iPad/i)) ? "touchstart" : "click";

	$(document).bind(event, function(e){
		$(".js-popup").hide();
	});

	//slider
	function slider() {
		var el = $('.js-slider'),
            delay = 0;
        
        el.each(function(){            
            var $this = $(this);
            setTimeout(function() {                
                $this.xipslider();
            }, delay);
            delay += 1000;                
        });
//		el.each(function(){
//			var el_in = $(this).find('.slider__list'),
//			el_item = $(this).find('.slider__item'),
//			el_prev = $(this).find('.slider__prev'),
//			el_next = $(this).find('.slider__next');
//			el_in.cycle({
//				fx: 'carousel',
//				timeout: 4000,
//                delay: delay,
//				carouselVisible: 4,
//                updateView: -1,
//				next: el_next,
//				prev: el_prev,
//				slides: el_item
//			});
//            delay += 1000;
//		})
	}
	slider();
	
//	window scroll
    if($('.map').length !=0){
        $(window).scroll(function(e){
            var offset_top = $(document).scrollTop(),
                    map = $('.map'),
                    map_top = map.offset().top;
            if (offset_top > map_top) {
                map.addClass('is-animated');
            };
        });
    }



});