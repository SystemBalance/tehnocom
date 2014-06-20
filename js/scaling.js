var freeHeight = 0;

$( document ).ready(function() {
	//пересчитываем зум
	function changeZoom() {
		freeHeight = $('.out').height();
		freeWidth = document.body.clientWidth;
		tmpzoom = freeWidth/2560;
		setZoom(tmpzoom);
		//$('.out').css('marginLeft', ((freeWidth-2560)/2) + 'px');
		//$('.out').css('marginTop', ((freeHeight*tmpzoom) - freeHeight)/2 + 'px');
		$('body').css('height', freeHeight + ((freeHeight*tmpzoom) - freeHeight) + 'px');
	}
	
	//пересчитываем зум
	function setZoom(zoom) {
		$('.out').css({'-webkit-transform-origin':'left top'});
		$('.out').css({'-ms-transform-origin':'left top'});
		$('.out').css({'transform-origin':'left top'});

		$('.out').css({'-moz-transform':'scale(' + zoom + ')'});
		$('.out').css({'-ms-transform':'scale(' + zoom + ')'});
		$('.out').css({'-webkit-transform':'scale(' + zoom + ')'});
		$('.out').css({'-o-transform':'scale(' + zoom + ')'});
		$('.out').css({'transform':'scale(' + zoom + ')'});
	}
	
	function checkZoom() {
		if (freeHeight !== $('.out').height()) {
			changeZoom();
		}
		setTimeout( function() {checkZoom();}, 20);
	}

	checkZoom();
	
	window.onresize = function(e){
		changeZoom();
	}
	
	$('.out').on('resize', function(e){
		console.log($('.out').height()); 
	});
});