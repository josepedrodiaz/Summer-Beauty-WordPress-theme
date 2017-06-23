<?php

/*
author: ANDRÉ VALLE - Web Developer
agency: http://b4w.com.br

description document: SETUP'S

*/



// El Misti Setup
add_action( 'after_setup_theme', 'b4w_inicio', 16 );

function b4w_inicio() {

	// launching operation cleanup
	add_action( 'init', 'b4w_head_cleanup' );
	// remove WP version from RSS
	add_filter( 'the_generator', 'b4w_rss_version' );
	// remove pesky injected css for recent comments widget
	add_filter( 'wp_head', 'b4w_remove_wp_widget_recent_comments_style', 1 );
	// clean up comment styles in the head
	add_action( 'wp_head', 'b4w_remove_recent_comments_style', 1 );
	// clean up gallery output in wp
	add_filter( 'gallery_style', 'b4w_gallery_style' );
	// functions/content.php - search form layout
	add_filter( 'get_search_form', 'b4w_wpsearch' );

	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(290, 250, false);
	add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));
	add_post_type_support('page', 'excerpt');

	remove_filter('pre_user_description', 'wp_filter_kses');

}

function b4w_head_cleanup() {
	// category feeds
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	// post and comment feeds
	remove_action( 'wp_head', 'feed_links', 2 );
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// index link
	remove_action( 'wp_head', 'index_rel_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
	// remove WP version from css
	add_filter( 'style_loader_src', 'b4w_remove_wp_ver_css_js', 9999 );
	// remove Wp version from scripts
	add_filter( 'script_loader_src', 'b4w_remove_wp_ver_css_js', 9999 );

} 

// Habilitando Header_Image
$args = array(
	'flex-width'    => true, //Largura do cabeçalho flexivel
	'width'         => 350, //Largura do cabeçalho
	'flex-height'   => true, //Altura do cabeçalho flexivel
	'height'        => 133, //Altura do cabeçalho
	'default-text-color'     => '', //Cor do texto no cabeçalho
	'header-text'   => false, //Permitir texto no cabeçalho
	'default-image' => get_template_directory_uri() . '/images/header.png', //Imagem default do cabeçalho
);
add_theme_support( 'custom-header', $args );
// End Header Image

// remove WP version from RSS
function b4w_rss_version() { return ''; }

// remove WP version from scripts
function b4w_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}
// remove injected CSS for recent comments widget
function b4w_remove_wp_widget_recent_comments_style() {
	if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
		remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	}
}
// remove injected CSS from recent comments widget
function b4w_remove_recent_comments_style() {
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
	}
}
// remove injected CSS from gallery
function b4w_gallery_style($css) {
	return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}




//HABILIDANDO Menu
if ( function_exists( 'register_nav_menus' ) ) {
  	register_nav_menus(
  		array(
  		  'header-menu' => 'top menu',
  		  'footer-menu' => 'footer menu',
  		  'image-menu' => 'image home menu'
  		)
  	);
}

//ADD CLASSES MENU - PERSONALIZADO
class themeslug_walker_nav_menu extends Walker_Nav_Menu {
  
		// add classes to ul sub-menus
		function start_lvl( &$output, $depth ) {
		    // depth dependent classes
		    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
		    $classes = array(
		        'sub-menu',
		        ( $display_depth % 2  ? 'grid-containe2 ul-custom' : 'menu-even' ),
		        ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
		        'menu-depth-' . $display_depth
		        );
		    $class_names = implode( ' ', $classes );
		  
		    // build html
		    $output .= "<div class='grid-container6 grid-custom'>\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
		}
		  
		// add main/sub classes to li's and links
		 function start_el( &$output, $item, $depth, $args ) {
		    global $wp_query;
		    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
		  
		    // depth dependent classes
		    $depth_classes = array(
		        ( $depth == 0 ? '' : '' ),
		        ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
		        ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
		        'menu-item-depth-' . $depth
		    );
		    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
		  
		    // passed classes
		    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
		    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
		  
		    // build html
		    $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
		  	
		    // link attributes
		    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		    $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
		  
		    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
		        $args->before,
		        $attributes,
		        $args->link_before,
		        apply_filters( 'the_title', $item->title, $item->ID ),
		        $args->link_after,
		        $args->after
		    );
		  
		    // build html
		    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}


		}
// END MENU
add_filter( 'woocommerce_product_tabs', 'sb_woo_remove_reviews_tab', 98);
function sb_woo_remove_reviews_tab($tabs) {

 unset($tabs['reviews']);

 return $tabs;
}

/*******************
//EDIT PEDRO SAIZ
*******************/
//Filtro del title del home
//add_filter( 'wp_title', 'theme_name_wp_title' );
function theme_name_wp_title( $title )
{
	if( is_home() || is_front_page() ) {
		$text_home = new WP_Query(array('post_type' => 'text_home'));
		if($text_home->have_posts()): $text_home->the_post();
			return get_the_title();
		endif;
		wp_reset_query();
	}
	return $title.get_bloginfo();
}
/*******************
//END PEDRO SAIZ
*******************/

?>