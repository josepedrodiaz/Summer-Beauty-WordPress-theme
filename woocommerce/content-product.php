<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop, $wp_query;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ){
  $woocommerce_loop['loop'] = 0;
  $woocommerce_loop['otro_loop'] = 0;
  $woocommerce_loop['classes'] = array('col-md-4 hostel uno', 'col-md-4 hostel dos', 'col-md-4 hostel tres' );;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = 3;

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;
$woocommerce_loop['otro_loop']++;

// Extra post classes
$classes = array();
if ( 3 == $woocommerce_loop['otro_loop'] ){
  $classes[] = $woocommerce_loop['classes'][2];
} elseif ( 2 == $woocommerce_loop['otro_loop'] ){
  $classes[] = $woocommerce_loop['classes'][1];
} else {
  $classes[] = $woocommerce_loop['classes'][0];
  echo '<div class="row-fluid">';
}
?>



<div <?php post_class( $classes ); ?>>
  <?php $corhostel = get_post_meta($post->ID, 'cor_do_hostel', true); ?>
  <div class="hostelHeader" >
    <img src="<?php the_field('foto_listado_de_hostels'); ?>" class="hostel-list-header-hostel-image">
    <div class="trip">
      <?php 
      $trip_advisor = str_replace("selfserveprop", "socialButtonBubbles", get_field('box_avaliacao'));
      $trip_advisor = str_replace("150_logo-11900-2.png", "socialWidget/20x28_white-21693-2.png", $trip_advisor);
      $trip_advisor = str_replace("nreviews=1", "color=white", $trip_advisor);
      echo $trip_advisor;
      ?>
    </div><!-- /#trip -->
    <div class="iconos">
      <?php 
      $services = explode(",", get_post_meta($post->ID, "shortcodes-hotel", true));
      $count_services = count($services);
      for ($i=0; $i < $count_services; $i++) { 
        $url_service = get_bloginfo('template_url')."/img/iconoshostels/".$services[$i].".svg";
        ?>
        <img src="<?php echo $url_service; ?>" class="<?php echo $services[$i]; ?>" />
        <?php
      }
      ?>
    </div><!-- /#iconos -->
    <a href="<?php the_permalink(); ?>" class="hostelPhotoLink"></a>
  </div><!-- /#hostelHeader -->
  <div class="detalles">
    <div class="col-md-8 datos">
      <h1 class="nombreHostel">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        width="28.823px" height="28.992px" viewBox="0 0 28.823 28.992" enable-background="new 0 0 28.823 28.992" xml:space="preserve">
        <g>
          <circle fill="<?php echo $corhostel; ?>" cx="14.418" cy="14.532" r="13.79"/>
            <polygon fill="none" stroke="#FFFFFF" stroke-miterlimit="10" points="19.429,20.63 9.409,20.63 9.409,11.945 14.419,6.023 
            19.429,11.945   "/>
          </g>
        </svg>
        <a href="<?php the_permalink(); ?>" style="color:<?php echo $corhostel; ?>;"><?php the_title(); ?></a></h1>
        <p class="descripcion">
          <a href="<?php the_permalink(); ?>">
           <?php 
           $pattern = "/(?s)\<h1\>(.*?)\<\/h1\>/";
           $conteudo_side_bar = get_post_meta($post->ID, 'conteudo_side_bar', true);
           preg_match($pattern, $conteudo_side_bar, $matches);
           $conteudo_side_bar = str_replace($matches[0], '', $conteudo_side_bar);
                    //echo custom_field_excerpt($conteudo_side_bar);
           $conteudo_side_bar = strip_tags ( $conteudo_side_bar ) ;
           echo tokenTruncate($conteudo_side_bar, 125) . "...";
           ?> 
         </a>
         <a href="<?php the_permalink(); ?>">
          <img src="<?php bloginfo('template_url') ?>/img/plus.svg">
        </a>
      </p>
    </div><!-- /#datos -->
    <div class="col-md-4 reservas">
      <?php the_field('search'); ?>
      <?php $url_tipo_cama = get_bloginfo('template_url')."/img/".get_field('tipo_cama').".svg"; ?>
      <img src="<?php echo $url_tipo_cama ?>" />
      <div class="bedsprice">
        <span class="beds">Beds from</span>
        <span class="price">R$ 
          <?= get_field('precio_minimo')?>
          <!-- <?php include($_SERVER['DOCUMENT_ROOT'].'/mini-hotel/precio_min.php'); ?> -->
        </span>
      </div><!-- /#bedsprice -->
    </div><!-- /#reservas -->

  </div><!-- /#detalles -->
</div><!-- /#hostel -->


<?php
//echo "<h1>".$woocommerce_loop['loop'] ."</h1>";

//if ( 3 == $woocommerce_loop['otro_loop'] || $wp_query->found_posts == $woocommerce_loop['loop'] ){
 if($woocommerce_loop['loop'] == 10){
  echo '<div id="effect-zoom" class="effects clearfix ponloEnLinea">';

  for ($i=1; $i < 2 ; $i++) { 

    //set img overlay & banner text
    if($i==1){
      $img_overlay = "//www.elmistihostels.com/wp-content/uploads/2015/01/flor-logo-el-misti-hostels-200x200.svg";
      $txt_overlay = __('Descontos para reservas antecipadas!','El-Misti');
    } else {
      $img_overlay = "//www.elmistihostels.com/wp-content/uploads/2015/03/Taxi-Icono-Home.svg";
      $txt_overlay = __('Na sua chegada ao Rio não se preocupe com nada','El-Misti');
    }

    ?>
    <!-- <?php echo "i=".$i; ?> -->
    <div class="<?php echo $woocommerce_loop['classes'][$i]; ?> img anchOk"> 
      <img src="<?php _e('urlBannerHostelList','El-Misti'); ?>-<?=$i?>.jpg" class="hostel-list-header-hostel-image bannerFinal">
      <div class="overlay bannerFinalGrilla<?=$i?> banner2">
        <a class="expand" href="/promocoes/"> 
          <img alt="PROMO <?=$i?>" src="<?=$img_overlay?>"> + 
        </a>
        <a class="close-overlay hidden">x</a>
        <div class="textOverlay hidden-xs">
                <?= $txt_overlay  ?>
        </div>
      </div>
    </div>
    <?php
  }
  echo '</div></div>
    </div>
    </div>';
}
?>

