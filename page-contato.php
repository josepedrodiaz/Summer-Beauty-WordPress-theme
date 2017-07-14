<?php

/*
 * Template Name: PAGE CONTATO
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();

$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$banner = wp_get_attachment_url(get_field('banner',$post->ID, false));
$form = get_field('formulario',$post->ID, false);

?>

<!-- <div id="header2" class="col-md-12" style="background-image: url(<?php echo $url; ?>);"> -->
<div id="header2" class="col-md-12 parallax-window" data-parallax="scroll" data-image-src="<?php echo $url; ?>"  data-natural-width="1301" data-natural-height="301">
  <?php include('inc/header-topo.php'); ?>
</div><!-- /#header -->

<div id="formContacto" class="contenedorInterno">
    <div class="row">
        <div class="col-md-12 box-gris" style="margin-top:30px;">

            <?php
            echo do_shortcode('['.$form.']');
            ?>
            
        </div>
        <div class="col-md-12 titulo-central">
            <h1><?php echo get_field('titulo_central',$post->ID, false); ?></h1>
        </div>
        <div class="col-md-12 reserva">
            <div class="col-md-4 uno">
                <img class="punta" src="<?php echo get_template_directory_uri(); ?>/images/up-arrow-contacto.png">
                <div class="box">
                    <h2><?php echo get_field('numeroprincipal'); ?></h2>
                    <h3><?php echo get_field('datasemanal'); ?></h3>
                    <img class="whatsapp" src="<?php echo get_template_directory_uri(); ?>/images/whatsapp.png">
                    <h4>Whatsapp <?php echo get_field('whatsapp'); ?></h4>
                </div>
            </div>
            <div class="col-md-8 dos">
                <div class="box">
                    <?php
                    $i=0;$j=0;
                    $clase=array(0=>'uno',1=>'dos',2=>'tres',3=>'cuatro');
                    $loop = new WP_Query( array( 'post_type' => 'contatotel', 'posts_per_page' => -1,'orderby' => 'date',
'order' => 'ASC' ) );
                    while ( $loop->have_posts() ) : $loop->the_post();
                    if($i%3==0) : echo '<div class="col-md-3 column '.$clase[$j%3].'">'; endif; ?>
                    <div class="fila">
                        <img class="flag" src="<?php the_field('icon-bandeira'); ?>">
                        <p class="tel"><?php echo get_field('numerotel',$post->ID, false); ?></p>
                    </div>
                    <?php
                    $i++;
                    if($i==3) : $j++; $i=0; echo '</div>'; endif;
                    endwhile; wp_reset_query(); ?>
                </div>
            </div>
        </div>
        <div class="col-md-12 hostels">
            <?php
            $i=0;
            $loop = new WP_Query( array( 'post_type' => 'contatobox', 'posts_per_page' => -1 ) );
            $total = $loop->found_posts;
            while ( $loop->have_posts() ) : $loop->the_post();
            $clase=array(0=>'uno',1=>'dos',2=>'tres');
            $titulo = get_field('titulo_box',$post->ID, false);
            $class_title = explode('El Misti ',$titulo); ?>
            <div class="col-md-4 hostel <?php echo $clase[$i%3].' '.remove_accents(strtolower(str_replace(" ","-",$class_title[1]))); ?>">
                <h2><?php echo $titulo; ?></h2>
                <p><span class="first">D</span><?php echo get_field('endereco_box',$post->ID, false); ?></p>
                <p><span class="first">T</span><?php echo get_field('telefone_box',$post->ID, false); ?></p>
                <p><span class="first">E</span><?php echo get_field('email_box',$post->ID, false); ?></p>
                <?php echo '<div class="separador"></div>';  ?>
            </div>
            <?php
            $i++;
            endwhile; wp_reset_query()
            ;?>
        </div>
        <div class="col-md-12 centered"><?php
            $banner = wp_get_attachment_url(get_field('banner_bottom',$post->ID, false));
            if($banner) : ?>
            <div id="effect-7" class="effects">
                <div class="img">
                  <img src="<?php echo $banner; ?>" width="100%" class="banner" />
                      <div class="overlay">
                        <a class="expand" href="https://www.facebook.com/MistiHostels/"> <img src="<?php echo get_bloginfo('template_url'); ?>/img/fb-reviews.png" /> </a>
                        <a class="expand" href="http://www.tripadvisor.com.br/Hotel_Review-g303506-d2561772-Reviews-El_Misti_Hostel_Rio-Rio_de_Janeiro_State_of_Rio_de_Janeiro.html"> <img src="<?php echo get_bloginfo('template_url'); ?>/img/trip-reviews.png" /> </a>
                        <a class="expand" href="https://instagram.com/elmistihostels/"> <img src="<?php echo get_bloginfo('template_url'); ?>/img/insta-reviews.png" /> </a>
                      </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div><!-- /#formFran -->
</div>

<?php get_footer(); ?>