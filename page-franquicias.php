<?php

/*
 * Template Name: PAGE-FRANQUICIAS
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header();

$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
//$url = the_post_thumbnail();
$form = get_field('formulario',$post->ID, false);

?>

<!-- <div id="header2" class="col-md-12" style="background-image: url(<?php echo $url; ?>);"> -->
<div id="header2" class="col-md-12 parallax-window" data-parallax="scroll" data-image-src="<?php echo $url; ?>" data-position-Y="-10px">
  <?php include('inc/header-topo.php'); ?>
</div><!-- /#header -->

<div id="formFran" class="contenedorInterno">
    <div class="row">
        <div class="col-md-12 box-gris">
        <?php
        echo do_shortcode('['.$form.']');
        ?>
        </div>
        <div class="col-md-12 slogan">
            <h1><?php echo get_field('titulo',$post->ID, false); ?></h1>
        </div>
        <div class="col-md-12 contenido">
            <div class="col-md-4 uno">
                <?php echo get_field('conteudo_1'); ?>
            </div>
            <div class="col-md-4 dos">
                <div class="box">
                    <?php echo get_field('conteudo_2'); ?>
                </div>
                <img class="punta" src="<?php echo get_template_directory_uri(); ?>/images/left-arrow-franq.png">
            </div>
            <div class="col-md-4">
                <?php echo get_field('conteudo_3'); ?>
            </div>
        </div>
        <div class="col-md-12 boxes">
            <div class="col-md-4 uno">
            <?php
            $i=0;
            $loop = new WP_Query( array( 'post_type' => 'franquiciasboxes', 'posts_per_page' => -1, 'orderby' => 'date', 'order'   => 'ASC') );
            $total = $loop->found_posts;
            while ( $loop->have_posts() ) : $loop->the_post();
            $clase=array(0=>'uno',1=>'tres',2=>'dos');
            $titulo = get_field('titulo_box',$post->ID, false);
            $class_title = explode('El Misti ',$titulo);
            $back = wp_get_attachment_url(get_field('background',$post->ID, false));
            if($i%($total/3)==0 && $i > 0) : echo '</div><div class="col-md-4 '.$clase[$i%3].'">'; endif; ?>
                <div class="box" style="background-image: url(<?php echo $back; ?>)">
                    <h1><?php echo the_title(); ?></h1>
                    <p><?php echo the_content(); ?></p>
                </div>
            <?php
            $i++;
            endwhile; wp_reset_query()
            ;?>
            </div>
        </div>
    </div>
</div><!-- /#formFran -->

<?php get_footer(); ?>