<?php
header("X-Content-Type-Options: nosniff");
header("Content-type: text/css");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
if(!empty($_COOKIE['clientZoom']) && !empty($_COOKIE['clientHeight'])){

    echo '
    .out{

        -webkit-transform-origin: left top;
		-ms-transform-origin: left top;
		transform-origin: left top;

		-moz-transform: scale('.floatval($_COOKIE['clientZoom']).');
		-ms-transform: scale('.floatval($_COOKIE['clientZoom']).');
		-webkit-transform: scale('.floatval($_COOKIE['clientZoom']).');
		-o-transform: scale('.floatval($_COOKIE['clientZoom']).');
		transform: scale('.floatval($_COOKIE['clientZoom']).');
        
    }
    body{
        height: '.floatval($_COOKIE['clientHeight']).';
    }
';
}