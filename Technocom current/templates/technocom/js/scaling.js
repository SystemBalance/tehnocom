var freeHeight = 0;
var tmpAnchor = '';

if(location.hash){
	tmpAnchor = location.hash;
	location.hash = '';
}
function setCookie(name, value, options) {
    options = options || {};

    var expires = options.expires;

    if (typeof expires == "number" && expires) {
        var d = new Date();
        d.setTime(d.getTime() + expires*1000);
        expires = options.expires = d;
    }
    if (expires && expires.toUTCString) {
        options.expires = expires.toUTCString();
    }

    value = encodeURIComponent(value);

    var updatedCookie = name + "=" + value;

    for(var propName in options) {
        updatedCookie += "; " + propName;
        var propValue = options[propName];
        if (propValue !== true) {
            updatedCookie += "=" + propValue;
        }
    }

    document.cookie = updatedCookie;
}

function deleteCookie(name) {
    setCookie(name, "", { expires: -1 })
}


$( document ).ready(function() {

    //Date для куков +1 день от текущего момента
    var date = new Date;
    date.setDate( date.getDate() + 1 );

	//пересчитываем зум
	function changeZoom() {
		freeHeight = $('.out').height();
		freeWidth = document.body.clientWidth;
		tmpzoom = freeWidth/2560;
		setZoom(tmpzoom);
		//$('.out').css('marginLeft', ((freeWidth-2560)/2) + 'px');
		//$('.out').css('marginTop', ((freeHeight*tmpzoom) - freeHeight)/2 + 'px');
        var bodyHeight = (freeHeight + ((freeHeight*tmpzoom) - freeHeight));

		$('body').css('height', bodyHeight + 'px');
        setCookie('clientHeight',bodyHeight,{path:'/', expires: date.toUTCString()});
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

        //Кука зумы
        setCookie('clientZoom', zoom, {path:'/',expires: date.toUTCString()});
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
	
	$('a').on('click', function() {
        if($(this).attr('href')!=undefined){
            if ($(this).attr('href').charAt(0) === '#' && $($(this).attr('href')).length !=0) {
                $('html, body').animate({
                    scrollTop: $($(this).attr('href')).offset().top
                }, 500);
                return false;
            }
        }
	});

	if (tmpAnchor !== '') {
		$('html, body').animate({
			scrollTop: $(tmpAnchor).offset().top
		}, 500);
	}

});