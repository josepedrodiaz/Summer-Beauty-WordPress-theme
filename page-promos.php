<?php

/*
 * Template Name: PAGE-PROMOS
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();

$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$btn = get_field('boton_condiciones',$post->ID, false);
$banner = wp_get_attachment_url(get_field('banner',$post->ID, false));

?>

<!-- <div id="header2" class="col-md-12" style="background-image: url(<?php echo $url; ?>);"> -->
<div id="header2" class="col-md-12 parallax-window" data-parallax="scroll" data-image-src="<?php echo $url; ?>" data-natural-width="1301" data-natural-height="301">
  <?php include('inc/header-topo.php'); ?>
</div><!-- /#header -->

<div id="promosList" class="contenedorInterno">
<div class="row-fluid">
<?php
$i=0;
$loop = new WP_Query( array( 'post_type' => 'especial', 'posts_per_page' => -1 ) );
while ( $loop->have_posts() ) : $loop->the_post();

//if($i%3==0) : echo '<div class="row-fluid">'; endif;

if($i==0 && $banner) : ?>
<div class="col-md-4 banner effects"  id="effect-promos">
    <div class="img" id="bannerPrincipalPromosWrapper">
        <img src="<?php echo $banner; ?>" />
        <div class="overlay">
            <h1 class="promoBannerTitle">
            <img id="cuore" alt="Hostels Rio de Janeiro - Promoções" src="//www.elmistihostels.com/wp-content/uploads/2015/08/cuore.svg">
            <?php _e('Nossas <br /> promoções especiais <br /> para viajantes<br />  do mundo <br />inteiro.','El-Misti'); ?>
            </h1>
            <a class="expand" href="#"> + </a>
            <a class="close-overlay hidden">x</a>
        </div>
    </div>
</div>
<?php $i++; endif; 
$img = wp_get_attachment_url(get_field('banner_promocoes',$post->ID, false)); 
$clase=array(0=>'uno',1=>'dos',2=>'tres');?>

<div class="col-md-4 promo <?php echo $clase[$i%3]; ?>">
    <div class="col-md-12 bannerPromoWrapper">
        <img src="<?php echo $img; ?>" class="bannerPromo" />
    </div>  
    <h1><?php the_title(); ?></h1>
    <?php the_excerpt(); ?>
    <div class="col-md-6 terms">
        <a role="button" rel="popover" onclick="cerrar()"><?php echo $btn; ?></a>
        <div class="htmlContainer"><a role="button" class="cerrar" onclick="cerrar()"><img src="<?php echo get_template_directory_uri(); ?>/images/close.png"></a><h1><?php the_title(); ?></h1><?php the_field('condiciones'); ?></div>
    </div>
</div>

<?php $i++; 
if($i%3==0 || $i==$loop->found_posts) :
 //echo '</div><!-- final row-fluid $loop->found_posts -->'; 
endif; 
 ?>
<?php endwhile; wp_reset_query(); ?>
</div><!-- final row-fluid $loop->found_posts -->
</div><!-- /#promosList -->

<script type="text/javascript">
$(function() {
    $('body').popover({
        selector: '[rel=popover]',
        trigger: 'click',
        placement: 'right',
        html: true,
        content: function () {
            return $(this).parents().first().find('.htmlContainer').html();
        }
    }).on('show.bs.popover', function(e){
        $('[rel=popover]').not(e.target).popover('destroy');
        $('.popover').remove();
    });

    $('a[rel=popover]').click(function () {
        $('a[rel=popover]').not(this).popover('destroy');
    });
});

function cerrar() {
   $('a[rel=popover]').each(function() {
        $(this).popover('destroy');
    });  
};
</script>

<?php get_footer(); ?>