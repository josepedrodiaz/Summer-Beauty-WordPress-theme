<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>

<div id="header" class="col-md-12">
  <?php include('wp-content/themes/El-Misti/inc/header-topo.php'); ?>
</div><!-- /#header -->

<!-- HTML5 Shiv | videojs -->
<script type="text/javascript">
  document.createElement('video');document.createElement('audio');document.createElement('track');
</script>

<?php 
  // SLIDE PRINCIPAL
  $images_switcher[] = get_field('imagem_slide');
  $images_switcher[] = get_field('imagem_slide2');
  $images_switcher[] = get_field('imagem_slide3');
  $images_switcher[] = get_field('imagem_slide4');

  $latitud = explode(";", get_field('latitud'));
  $longitud = explode(";", get_field('longitud'));
?>
<script type="text/javascript">
    var images_switcher = <?php echo json_encode($images_switcher); ?>;
</script>

<?php
	/**
	 * woocommerce_before_main_content hook
	 *
	 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
	 * @hooked woocommerce_breadcrumb - 20
	 */
	//do_action( 'woocommerce_before_main_content' );
?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php wc_get_template_part( 'content', 'single-product' ); ?>
<?php endwhile; // end of the loop. ?>
<?php 
	//content-single-product.php
	//do_action( 'woocommerce_after_main_content' );
?>
<?php //do_action( 'woocommerce_sidebar' ); ?>

<!-- Google Maps -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDac4uAnjTgJa4QydoqY0y1dt0lLNuIyZQ&sensor=false"></script>
<!-- Google Maps Customization -->
<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/maps.js"></script>
<!-- SLide secundario de la home de cada hostel-->
<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/hostelSlides.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/fancybox/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/js/fancybox/jquery.fancybox.css" media="screen" />
<script>
	//MAPS -->
	// When the window has finished loading create our google map below
	var marker_lat=<?php echo $latitud[0] ?>;
	var marker_lng=<?php echo $longitud[0] ?>;
	var map_lat=marker_lat+<?php echo $latitud[1] ?>;
	var map_lng=marker_lng+<?php echo $longitud[1] ?>;
	init(marker_lat, marker_lng, map_lat, map_lng);
</script>
	
<?php get_footer(); ?>