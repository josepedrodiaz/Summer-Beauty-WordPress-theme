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

//$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$url = get_bloginfo('template_url').'/img/bg-list.jpg';
?>

<!-- <div id="header2" class="col-md-12" style="background-image: url(<?php echo $url; ?>);"> -->
<div id="header2" class="col-md-12 parallax-window listado-hostels" data-parallax="scroll" data-image-src="<?php echo $url; ?>">
  <?php include('inc/header-topo.php'); ?>
</div><!-- /#header -->


<div id="hostelList" class="contenedorInterno">
  <div id="hostelSelect">
    <?php woo_product_categories_dropdown(); //Funcão criada na shortcodes.php ?>
  </div><!-- /#hostelSelect -->

      <?php if ( have_posts() ) : ?>
        <?php //do_action( 'woocommerce_before_shop_loop' ); ?>
          <?php woocommerce_product_loop_start(); // START LOOP - LOOP/LOOP-START.PHP ?>
            
          <?php 
            while ( have_posts() ) : the_post();
              //CONTENT-PRODUCT.PHP 
              wc_get_template_part( 'content', 'product' ); 
          ?>
          <?php
            endwhile; 
          ?>
          <?php woocommerce_product_loop_end(); // END LOOP - LOOP/LOOP-END.PHP ?>
          <?php do_action( 'woocommerce_after_shop_loop' ); ?>
      <?php endif; ?>

</div><!-- /#hostelList -->

<?php get_footer(); ?>