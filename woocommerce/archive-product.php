<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();

//imagen por defecto del listado de hostels, por si no encuentra una específica
$url = get_bloginfo('template_url').'/images/FOTO-CATEGORIAS.jpg';
$terms = get_the_terms( get_the_ID(), 'product_cat' );
if ($terms) {
	$thumbnail_id = get_woocommerce_term_meta( $terms[0]->term_id, 'thumbnail_id', true );
	if ($thumbnail_id) {
		$url = wp_get_attachment_url( $thumbnail_id );
	}
}
?>

<!-- <div id="header2" class="col-md-12" style="background-image: url(<?php echo $url; ?>);"> -->
<div id="header2" class="col-md-12 parallax-window" data-parallax="scroll" data-image-src="<?php echo $url; ?>">
  <?php include('wp-content/themes/El-Misti/inc/header-topo.php'); ?>
</div><!-- /#header -->


<div id="hostelList" class="contenedorInterno">
  <div id="hostelSelect">

    <?php 
		//Ésta estaba antes, pero no funca, solo imprime las categorías, pero no hace nada en el 'onchange'
		//woocommerce_product_dropdown_categories(); 
		
		//Funcão criada na shortcodes.php
		//Y necesita de un argumento para no sacar Warning. En este caso vacío porque no se necesita editar los valores iniciales.
   		woo_product_categories_dropdown( array() );
	?>
  </div><!-- /#hostelSelect -->

      <?php if ( have_posts() ) : ?>
		<?php //do_action( 'woocommerce_before_shop_loop' ); ?>
		<?php woocommerce_product_loop_start(); // START LOOP - LOOP/LOOP-START.PHP ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php 
					wc_get_template_part( 'content', 'product' ); 
					//CONTENT-PRODUCT.PHP 
				?>
			<?php endwhile; ?>
		<?php woocommerce_product_loop_end(); // END LOOP - LOOP/LOOP-END.PHP ?>		
		<?php do_action( 'woocommerce_after_shop_loop' ); ?>
	<?php endif; ?>

</div><!-- /#hostelList -->
<?php get_footer(); ?>