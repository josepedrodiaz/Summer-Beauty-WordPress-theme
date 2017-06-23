<?php
/*
author: ANDRÉ VALLE - Web Developer
agency: http://b4w.com.br

description document: FUNCTIONS SHORTCODE

*/



function service_1(){
	return ' <div class="col-lg-4 col-sm-4 col-md-4 col-icons-service"><i class="icon-onda"></i><h3>PRÓXIMO DA PRAIA</h3></div>';
}
add_shortcode('service1', 'service_1');

// shortcode -> [service1]


function service_2(){
	return ' <div class="col-lg-3 col-sm-3 col-md-3 col-icons-service"><i class="icon-bus"></i><h3>TRANSPORTE</h3></div>';
}
add_shortcode('service2', 'service_2');

// shortcode -> [service2]


function service_3(){
	return ' <div class="col-lg-2 col-sm-2 col-md-2 col-icons-service"><i class="icon-wifi"></i><h3>WI-FI</h3></div>';
}
add_shortcode('service3', 'service_3');

// shortcode -> [service3]


function service_4(){
	return ' <div class="col-lg-2 col-sm-2 col-md-2 col-icons-service"><i class="icon-block"></i><h3>COFRES</h3></div>';
}
add_shortcode('service4', 'service_4');

// shortcode -> [service4]


add_action( 'init', 'register_shortcodes');





?>