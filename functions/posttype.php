<?php
/*
author: ANDRÉ VALLE - Web Developer
agency: http://b4w.com.br

description document: POST TYPES

*/

// POST TYPE TEXT HOME
// function type_post_text_home(){
// 	$labels = array('name' => _x('Text Home', 'post type general name'),'singular_name' => _x('Text Home', 'post type singular name'),'parent_item_colon' => '','menu_name' => 'Text Home');
// 	$args = array('labels'=>$labels,'public'=>true,'public_queryable'=>true,'show_ui' =>true,'query_var'=>true,'rewrite'=>true,'capability_type'=>'post','has_archive' => true, 'hierarchical' => false, 'menu_position' => 4, 'supports' => array('title','editor'));

// 	register_post_type('text_home',$args);
// 	flush_rewrite_rules();
// }
// add_action('init', 'type_post_text_home');
// END POST TYPE TEXT HOME

// POST TYPE BANNER
function type_post_banner(){
	$labels = array('name' => _x('Banners', 'post type general name'),'singular_name' => _x('Banner', 'post type singular name'),'parent_item_colon' => '','menu_name' => 'Banners');
	$args = array('labels'=>$labels,'public'=>true,'public_queryable'=>true,'show_ui' =>true,'query_var'=>true,'rewrite'=>true,'capability_type'=>'post','has_archive' => true, 'hierarchical' => false, 'menu_position' => 5, 'supports' => array('title','editor','thumbnail', 'custom-fields'));

	register_post_type('banner',$args);
	flush_rewrite_rules();
}
add_action('init', 'type_post_banner');
// END POST TYPE BANNER


// POST TYPE BANNER 2
function type_post_banner2(){
	$labels = array('name' => _x('Banners2', 'post type general name'),'singular_name' => _x('Banner2', 'post type singular name'),'parent_item_colon' => '','menu_name' => 'Banners 2');
	$args = array('labels'=>$labels,'public'=>true,'public_queryable'=>true,'show_ui' =>true,'query_var'=>true,'rewrite'=>true,'capability_type'=>'post','has_archive' => true, 'hierarchical' => false, 'menu_position' => 6, 'supports' => array('title','thumbnail'));

	register_post_type('banner2',$args);
	flush_rewrite_rules();
}

add_action('init', 'type_post_banner2');

// POST TYPE BANNER CHECKOUT
function type_post_banner_checkout(){
	$labels = array('name' => _x('banners_checkout', 'post type general name'),'singular_name' => _x('banners_checkout', 'post type singular name'),'parent_item_colon' => '','menu_name' => 'Banner Checkout');
	$args = array('labels'=>$labels,'public'=>true,'public_queryable'=>true,'show_ui' =>true,'query_var'=>true,'rewrite'=>true,'capability_type'=>'post','has_archive' => true, 'hierarchical' => false, 'menu_position' => 7, 'supports' => array('title','thumbnail'));

	register_post_type('banner_checkout',$args);
	flush_rewrite_rules();
}

add_action('init', 'type_post_banner_checkout');
// END POST TYPE BANNER 2

// POST TYPE HOTEL
/*
function type_post_hotel(){
	$labels = array('name' => _x('Hoteis', 'post type general name'),'singular_name' => _x('Hotel', 'post type singular name'),'parent_item_colon' => '','menu_name' => 'Hotéis');
	$args = array('labels'=>$labels,'public'=>true,'public_queryable'=>true,'show_ui' =>true,'query_var'=>true,'rewrite'=>true,'capability_type'=>'post','has_archive' => true, 'hierarchical' => false, 'menu_position' => 5, 'supports' => array('title','editor','thumbnail', 'comments' ), 'taxonomies' => array('category'));

	register_post_type('hotel',$args);
	flush_rewrite_rules();
}
add_action('init', 'type_post_hotel');
*/
// END POST TYPE HOTEL


// POST TYPE PAGE_CONTATO 
function type_post_contatotel(){
	$labels = array('name' => _x('Contatotels', 'post type general name'),'singular_name' => _x('Contatotel', 'post type singular name'),'parent_item_colon' => '','menu_name' => 'Contato Tels');
	$args = array('labels'=>$labels,'public'=>true,'public_queryable'=>true,'show_ui' =>true,'query_var'=>true,'rewrite'=>true,'capability_type'=>'post','has_archive' => true, 'hierarchical' => false, 'menu_position' => 7, 'supports' => array('title','editor','thumbnail', 'custom-fields'));

	register_post_type('contatotel',$args);
	flush_rewrite_rules();
}
add_action('init', 'type_post_contatotel');
// END POST TYPE PAGE_CONTATO


// POST TYPE PAGE_CONTATO
function type_post_contatobox(){
	$labels = array('name' => _x('Contatoboxs', 'post type general name'),'singular_name' => _x('Contatobox', 'post type singular name'),'parent_item_colon' => '','menu_name' => 'Contato Box´s');
	$args = array('labels'=>$labels,'public'=>true,'public_queryable'=>true,'show_ui' =>true,'query_var'=>true,'rewrite'=>true,'capability_type'=>'post','has_archive' => true, 'hierarchical' => false, 'menu_position' => 8, 'supports' => array('title','editor','thumbnail', 'custom-fields'));

	register_post_type('contatobox',$args);
	flush_rewrite_rules();
}
add_action('init', 'type_post_contatobox');
// END POST TYPE PAGE_CONTATO

// POST TYPE PAGE QUARTOS PRIVADOS
function type_post_privado(){
	$labels = array('name' => _x('Privados', 'post type general name'),'singular_name' => _x('Privado', 'post type singular name'),'parent_item_colon' => '','menu_name' => 'Quartos Privados');
	$args = array('labels'=>$labels,'public'=>true,'public_queryable'=>true,'show_ui' =>true,'query_var'=>true,'rewrite'=>true,'capability_type'=>'post','has_archive' => true, 'hierarchical' => false, 'menu_position' => 8, 'supports' => array('title','editor','thumbnail'));

	register_post_type('privado',$args);
	flush_rewrite_rules();
}
add_action('init', 'type_post_privado');
// END POST TYPE PAGE QUARTOS PRIVADOS

// POST TYPE PAGE SPECIALS
function type_post_especial(){
	$labels = array('name' => _x('Especials', 'post type general name'),'singular_name' => _x('Especial', 'post type singular name'),'parent_item_colon' => '','menu_name' => 'Especial');
	$args = array('labels'=>$labels,'public'=>true,'public_queryable'=>true,'show_ui' =>true,'query_var'=>true,'rewrite'=>true,'capability_type'=>'post','has_archive' => true, 'hierarchical' => false, 'menu_position' => 8, 'supports' => array('title','editor','thumbnail', 'excerpt'));

	register_post_type('especial',$args);
	flush_rewrite_rules();
}
add_action('init', 'type_post_especial');
// END POST TYPE PAGE SPECIALS

// POST TYPE PAGE MISTI WEEK
function type_post_mistiweek(){
	$labels = array('name' => _x('Event Weeks', 'post type general name'),'singular_name' => _x('Event Week', 'post type singular name'),'parent_item_colon' => '','menu_name' => 'Event Week');
	$args = array('labels'=>$labels,'public'=>true,'public_queryable'=>true,'show_ui' =>true,'query_var'=>true,'rewrite'=>true,'capability_type'=>'post','has_archive' => true, 'hierarchical' => false, 'menu_position' => 8, 'supports' => array('title','editor','thumbnail', 'excerpt'));

	register_post_type('mistiweek',$args);
	flush_rewrite_rules();
}
add_action('init', 'type_post_mistiweek');
// END POST TYPE PAGE MISTI WEEK

// POST TYPE PAGE MISTI TRAVEL
function type_post_mistitravel(){
	$labels = array('name' => _x('Event Travel', 'post type general name'),'singular_name' => _x('Event Travel', 'post type singular name'),'parent_item_colon' => '','menu_name' => 'Event Travel');
	$args = array('labels'=>$labels,'public'=>true,'public_queryable'=>true,'show_ui' =>true,'query_var'=>true,'rewrite'=>true,'capability_type'=>'post','has_archive' => true, 'hierarchical' => false, 'menu_position' => 8, 'supports' => array('title','editor','thumbnail', 'excerpt'));

	register_post_type('mistitravel',$args);
	flush_rewrite_rules();
}
add_action('init', 'type_post_mistitravel');
// END POST TYPE PAGE MISTI TRAVEL


// POST TYPE PAGE MISTI EXPERIENCE
function type_post_mistiexperience(){
	$labels = array('name' => _x('Event Experiences', 'post type general name'),'singular_name' => _x('Event Experience', 'post type singular name'),'parent_item_colon' => '','menu_name' => 'Event Experience');
	$args = array('labels'=>$labels,'public'=>true,'public_queryable'=>true,'show_ui' =>true,'query_var'=>true,'rewrite'=>true,'capability_type'=>'post','has_archive' => true, 'hierarchical' => false, 'menu_position' => 8, 'supports' => array('title','editor','thumbnail', 'excerpt'));

	register_post_type('mistiexperience',$args);
	flush_rewrite_rules();
}
add_action('init', 'type_post_mistiexperience');
// END POST TYPE PAGE MISTI EXPERIENCE

// POST TYPE PAGE MISTI UP COMING
function type_post_mistiupcoming(){
	$labels = array('name' => _x('Event UpComings', 'post type general name'),'singular_name' => _x('Event UpComing', 'post type singular name'),'parent_item_colon' => '','menu_name' => 'Event UpComing');
	$args = array('labels'=>$labels,'public'=>true,'public_queryable'=>true,'show_ui' =>true,'query_var'=>true,'rewrite'=>true,'capability_type'=>'post','has_archive' => true, 'hierarchical' => false, 'menu_position' => 8, 'supports' => array('title','editor', 'excerpt'));

	register_post_type('mistiupcoming',$args);
	flush_rewrite_rules();
}
add_action('init', 'type_post_mistiupcoming');
// END POST TYPE PAGE MISTI UP COMING

// POST TYPE PAGE GALERIA HOSTEL
function type_post_galeriahostel(){
	$labels = array('name' => _x('Galeria Hostels', 'post type general name'),'singular_name' => _x('Galeria Hostel', 'post type singular name'),'parent_item_colon' => '','menu_name' => 'Galeria Hostels');
	$args = array('labels'=>$labels,'public'=>true,'public_queryable'=>true,'show_ui' =>true,'query_var'=>true,'rewrite'=>true,'capability_type'=>'post','has_archive' => true, 'hierarchical' => false, 'menu_position' => 8, 'supports' => array('title','editor','thumbnail'));

	register_post_type('galeriahostel',$args);
	flush_rewrite_rules();
}
add_action('init', 'type_post_galeriahostel');
// END POST TYPE PAGE GALERIA HOSTEL

// POST TYPE PAGE ROOM E RATES
function type_post_roomsrates(){
	$labels = array('name' => _x('Rooms e Rates', 'post type general name'),'singular_name' => _x('Room e Rate', 'post type singular name'),'parent_item_colon' => '','menu_name' => 'Rooms e Rates');
	$args = array('labels'=>$labels,'public'=>true,'public_queryable'=>true,'show_ui' =>true,'query_var'=>true,'rewrite'=>true,'capability_type'=>'post','has_archive' => true, 'hierarchical' => false, 'menu_position' => 8, 'supports' => array('title','editor','thumbnail'));

	register_post_type('roomsrates',$args);
	flush_rewrite_rules();
}
add_action('init', 'type_post_roomsrates');
// END POST TYPE PAGE ROOMS E RATES

// POST TYPE PAGE ROOMS LOOP/ ROOMS E RATES
function type_post_roomshostels(){
	$labels = array('name' => _x('Rooms Hostels', 'post type general name'),'singular_name' => _x('Room Hostel', 'post type singular name'),'parent_item_colon' => '','menu_name' => 'Rooms Hostels');
	$args = array('labels'=>$labels,'public'=>true,'public_queryable'=>true,'show_ui' =>true,'query_var'=>true,'rewrite'=>true,'capability_type'=>'post','has_archive' => true, 'hierarchical' => false, 'menu_position' => 8, 'supports' => array('title','editor','thumbnail'));

	register_post_type('roomshostels',$args);
	flush_rewrite_rules();
}
add_action('init', 'type_post_roomshostels');
// END POST TYPE PAGE ROOMS LOOP / ROOMS E RATES

// POST TYPE PAGE GROUPS
/*function type_post_postgroups(){
	$labels = array('name' => _x('Post Groups', 'post type general name'),'singular_name' => _x('Post Group', 'post type singular name'),'parent_item_colon' => '','menu_name' => 'Post Groups');
	$args = array('labels'=>$labels,'public'=>true,'public_queryable'=>true,'show_ui' =>true,'query_var'=>true,'rewrite'=>true,'capability_type'=>'post','has_archive' => true, 'hierarchical' => false, 'menu_position' => 8, 'supports' => array('title','editor','thumbnail'));

	register_post_type('postgroups',$args);
	flush_rewrite_rules();
}
add_action('init', 'type_post_postgroups');*/
// END POST TYPE PAGE GROUPS






?>