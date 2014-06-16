$( document ).ready(function() {
	//пересчитываем зум
	function changeZoom() {
		freeWidth = document.body.clientWidth;
		freeHeight = document.body.clientHeight;
        
		freeWidth = document.body.clientWidth;
		freeHeight = document.body.clientHeight;

        offsetHeight

//        wHeight = document.hei

		tmpzoom = freeWidth/2560;
		setZoom(tmpzoom);
		$('.out').css('marginLeft', ((freeWidth-2560)/2) + 'px');
		$('.out').css('marginTop', ((freeHeight - freeHeight/tmpzoom)/2) + 'px');
		//$('body').css('height', (freeHeight - ((freeHeight - freeHeight/tmpzoom)/2)) + 'px');
	}
	
	//пересчитываем зум
	function setZoom(zoom) {
		$('.out').css({'-moz-transform':'scale(' + zoom + ')'});
		$('.out').css({'-ms-transform':'scale(' + zoom + ')'});
		$('.out').css({'-webkit-transform':'scale(' + zoom + ')'});
		$('.out').css({'-o-transform':'scale(' + zoom + ')'});
		$('.out').css({'transform':'scale(' + zoom + ')'});
	}
	
	changeZoom();
	
	window.onresize = function(e){
		changeZoom();
	}
});