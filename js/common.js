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
			});
		})
	}
	slider();
	
//	window scroll
	$(window).scroll(function(e){
		var offset_top = $(document).scrollTop(),
				map = $('.map'),
				map_top = map.offset().top;
		if (offset_top > map_top) {
			map.addClass('is-animated');
		};
	});



});