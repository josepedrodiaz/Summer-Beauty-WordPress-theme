<?php

/*
author: ANDRÉ VALLE - Web Developer Full Stack
agency: http://b4w.com.br

description document: Gerenciador de Funções.

*/

load_theme_textdomain( 'El-Misti', TEMPLATEPATH.'/languages' );


/************* INCLUDE FILES ***************/

//1. functions/header.php - Algumas funções, Registrando e Adicionando Menu Personalizado.
require_once( 'functions/header.php' ); 

//2. functions/posttype.php	- Registro de Custom Post Types.
require_once( 'functions/posttype.php' ); 

//3. functions/content.php	
require_once( 'functions/content.php' ); 

//4. functions/metabox.php - Registro de Meta box's
//require_once( 'functions/metabox.php' ); 

//5. library/translation/translation.php
// require_once( 'library/translation/translation.php' ); // this comes turned off by default

//6. functions/shortcode.php - criando shortcodes
require_once( 'functions/sc/shortcodes.php' );

//7. Fucnionalidades 2016 P. Diaz
require_once( 'functions/elmisti.php' );


//Enable upload SVG images
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');



// Custom Scripting to Move JavaScript from the Head to the Footer
//INSIGHTS!


/*
function remove_head_scripts() { 
   remove_action('wp_head', 'wp_print_scripts'); 
   remove_action('wp_head', 'wp_print_head_scripts', 9); 
   remove_action('wp_head', 'wp_enqueue_scripts', 1);

   add_action('wp_footer', 'wp_print_scripts', 5);
   add_action('wp_footer', 'wp_enqueue_scripts', 5);
   add_action('wp_footer', 'wp_print_head_scripts', 5); 
} 
add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );
*/
// END Custom Scripting to Move JavaScript

?>
