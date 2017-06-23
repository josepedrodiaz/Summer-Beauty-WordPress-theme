<?php
/*
author: ANDRÉ VALLE - Web Developer
agency: http://b4w.com.br

description document: FUNCTIONS ESSENTIALS

*/



/*********************
PAGE NAVI
*********************/

// Numeric Page Navi (built into the theme by default)
function b4w_page_navi() {
	global $wp_query;
	$bignum = 999999999;
	if ( $wp_query->max_num_pages <= 1 )
		return;
	
	echo '<nav class="pagination">';
	
		echo paginate_links( array(
			'base' 			=> str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
			'format' 		=> '',
			'current' 		=> max( 1, get_query_var('paged') ),
			'total' 		=> $wp_query->max_num_pages,
			'prev_text' 	=> '&larr;',
			'next_text' 	=> '&rarr;',
			'type'			=> 'list',
			'end_size'		=> 3,
			'mid_size'		=> 3
		) );
	
	echo '</nav>';
} /* end page navi */

/*********************
RANDOM CLEANUP ITEMS
*********************/


/*
 * This is a modified the_author_posts_link() which just returns the link.
 *
 * This is necessary to allow usage of the usual l10n process with printf().
 */
function b4w_get_the_author_posts_link() {
	global $authordata;
	if ( !is_object( $authordata ) )
		return false;
	$link = sprintf(
		'<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
		get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
		esc_attr( sprintf( __( 'Posts by %s' ), get_the_author() ) ), // No further l10n needed, core will take care of this one
		get_the_author()
	);
	return $link;
}



/************* SEARCH FORM LAYOUT *****************/

// Search Form
function b4w_wpsearch($form) {
	$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_attr__( 'Search the Site...', 'b4wtheme' ) . '" />
	<input type="submit" id="searchsubmit" value="' . esc_attr__( 'Search' ) .'" />
	</form>';
	return $form;
}

// Chamada customizada de comentários
function custom_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
 	$GLOBALS['comment_depth'] = $depth;
  ?>
   <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
    
    <div class="comment-author">
    	<?php echo get_comment_author_link() ?> - 
    	<?php echo get_comment_meta( $comment->comment_ID, 'assunto', true ); ?>
    </div>

  	<?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Seu comentário está aguardando aprovação dos administradores.</span>\n", 'seu-template') ?>
	
	<div class="comment-content">
    	<?php comment_text() ?>
	</div>

<?php } // end custom_comments

// Chamada customizada para listar trackbacks
function custom_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
        ?>
      <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
       <div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'seu-template'),
         get_comment_author_link(),
         get_comment_date(),
         get_comment_time() );
         edit_comment_link(__('Editar', 'seu-template'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
    <?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'seu-template') ?>
            <div class="comment-content">
       <?php comment_text() ?>
   </div>
<?php } // end custom_pings

//remove $field 'URL'
function remove_comment_fields($fields) {
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields','remove_comment_fields');

//ADICIONA NOVO CAMPO NO FORM COMMENTS.PHP
function add_comment_fields($fields) {
 
    $fields['assunto'] = '<p class="comment-form-assunto"><label for="assunto">' . __( 'Assunto' ) . '</label>' .
        '<input id="assunto" name="assunto" type="text" size="30" /></p>';
    return $fields;
 
}
add_filter('comment_form_default_fields','add_comment_fields');

function add_comment_meta_values($comment_id) {
 
    if(isset($_POST['assunto'])) {
        $assunto = wp_filter_nohtml_kses($_POST['assunto']);
        add_comment_meta($comment_id, 'assunto', $assunto, false);
    }
 
}
add_action ('comment_post', 'add_comment_meta_values', 1);

/* ALTERANDO LOOP WOOCOMMERCE */
//Função para excluir produtos do loop
add_action( 'pre_get_posts', 'custom_pre_get_posts_query' ); 
function custom_pre_get_posts_query( $q ) {
 
	if ( ! $q->is_main_query() ) return;
	if ( ! $q->is_post_type_archive() ) return;
	if ( ! is_admin() ) {
	 
	$q->set( 'tax_query', array(array(
	'taxonomy' => 'product_cat',
	'field' => 'slug',
	'terms' => array( 'seguro' ), //para multiplas categorias, separe com virgula.
	'operator' => 'NOT IN'
	)));
	 
	} 
	
	remove_action( 'pre_get_posts', 'custom_pre_get_posts_query' );
}

add_filter('woocommerce_get_catalog_ordering_args', 'am_woocommerce_catalog_orderby');
function am_woocommerce_catalog_orderby( $args ) {
	//$args['orderby'] = 'rand'; //ordena aleatoriamente el listado de hostels en la pagina NOSSOS HOSTELS
	$args['meta_key'] = '';
	$args['orderby'] = 'date';
	$args['order'] = 'asc';
    return $args;
}
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 10;' ), 20 );
/* END LOOP WOOCOMMERCE */


/*******************
//EDIT PEDRO SAIZ
*******************/
//Filtro de todas las imagenes para remover el protocolo
function image_without_protocol($url) {

	// //Skip file attachments
	// if(!wp_attachment_is_image($post_id)) {
	//	 return $url;
	// }

	// //Correct protocol for https connections
	// list($protocol, $uri) = explode('://', $url, 2);

	// if(is_ssl()) {
	//   if('http' == $protocol) {
	//     $protocol = 'https';
	//   }
	// } else {
	//   if('https' == $protocol) {
	//     $protocol = 'http';
	//   }
	// }

	//return $protocol.'://'.$uri;

	$uri = str_replace(array('http:', 'https:'), '', $url);
	return $uri;
}
add_filter('wp_get_attachment_url', 'image_without_protocol');

function combo_hostels(){
	$args=array('post_type' => 'product');
	$my_query = new WP_Query($args);
	$co_co_co_combo_breaker = '<select name="hostel" id="hostel" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required form-control input-sm">';
	if ($my_query->have_posts()) : 
	    while ($my_query->have_posts()) : $my_query->the_post(); 
	        $co_co_co_combo_breaker .= '<option value="'.get_the_title(get_the_ID()).'">'.get_the_title(get_the_ID()).'</option>';
	    endwhile;
	endif;
	$co_co_co_combo_breaker .= '</select>';
	return $co_co_co_combo_breaker;
}

// function tomjn_filter_relative_content_urls( $content ) {
//     $content = str_replace( set_url_scheme( home_url(), 'http' ), set_url_scheme( home_url(), 'relative' ), $content);
//     return $content;
// }
// add_filter( 'the_content', 'tomjn_filter_relative_content_urls' );

//Para remover campos del formulario de "finalizar-compra"
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
	unset($fields['billing']['billing_company']);
	unset($fields['billing']['billing_address_1']);
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_city']);
	unset($fields['billing']['billing_state']);
	unset($fields['billing']['billing_postcode']);

     return $fields;
}
/*******************
//END PEDRO SAIZ
*******************/

//Error en too many redirects en la pagina del hostel P Diaz
add_filter( 'old_slug_redirect_url', function ( $link ) {
	if ( $link === get_the_permalink() ) {
		return '';
	};

	return $link;
} );


//text truncate en nossos hostels and quartos
function tokenTruncate($string, $your_desired_width) {
                      $parts = preg_split('/([\s\n\r]+)/u', $string, null, PREG_SPLIT_DELIM_CAPTURE);
                      $parts_count = count($parts);

                      $length = 0;
                      $last_part = 0;
                      for (; $last_part < $parts_count; ++$last_part) {
                        $length += strlen($parts[$last_part]);
                        if ($length > $your_desired_width) { break; }
                      }

                      return implode(array_slice($parts, 0, $last_part));
                    }

//change store title from PRODUCTS to HOSTELS
/**
 * Change the Shop archive page title.
 * @param  string $title
 * @return string
 */
function wc_custom_shop_archive_title( $title ) {
    if ( is_shop() ) {
        //return str_replace( __( 'Products', 'woocommerce' ), 'Hostels', $title );
        return 'Hostels';
    }

    return $title;
}
add_filter( 'wp_title', 'wc_custom_shop_archive_title' );  


?>
