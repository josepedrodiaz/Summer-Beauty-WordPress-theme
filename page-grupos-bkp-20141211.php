<?php
/*
Template Name: PAGE GRUPOS
*/

get_header(); 

$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>

<?php include('inc/modal.php'); ?>

<section class="container container-custompage">

<div class="col-lg-12 contato-box-custompage" style="background: url(<?php echo $url; ?>) no-repeat; background-size: cover;">

    <!-- FORM RESERVA RESPONSIVE -->
    
    <a class="button-modal-reserva" href="#signup" data-toggle="modal" data-target=".bs-modal-sm"><?php _e('Reserve online ou por telefone','El-Misti'); ?></a>
    <?php include('inc/boxreserva.php'); ?> 
        
    <div class="col-lg-8 col-sm-8 col-md-8 col-lg-offset-4 content-custompage">

        <h1><?php the_title(); ?></h1>

    </div>

</div>

<div class="clear"></div>

<div class="container container-section2-custompage">

    <aside class="col-lg-4 col-sm-4 col-md-4 aside-custompage">
        
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-like-box" data-href="https://www.facebook.com/MistiHostels?fref=ts" data-width="300px" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>

        <div class="clear"></div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-sm-12-instagram">
            <div class="row">
                <i class="img">
                    <img class="img-responsive" src="<?php bloginfo('template_url') ?>/images/instagram-box.jpg">
                </i>
                <div class="instagram-box" style=" width: 100%;">
                    <div id="instafeed" class="instafeed"></div>
                </div>
            </div>
        </div>

    </aside>

    <section class="col-lg-8 col-sm-8 col-md-8 section-custompage-grupos">
        <div class="col-lg-12 col-sm-12 col-md-12 box-one-section-custompage-grupos">
            
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 box-one3-grupos">
                <?php echo get_post_meta($post->ID, 'titulo-grupos', true); ?>
                <br>
                <?php echo get_post_meta($post->ID, 'conteudo-grupos', true); ?>
            </div>

            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 box-one5-grupos">
                <ul>
                    <?php

                        $args = array(
                            'post_type' => 'postgroups', 
                            'posts_per_page' => 12
                            );
                        $group = new WP_Query( $args );
                        if ( $group->have_posts() ) :
                        while ( $group->have_posts() ) : $group->the_post();
                        $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                    ?>
                        <li>
                            <div class="col-img-group">
                                <img src="<?php echo $url; ?>" alt="image-group">
                            </div>
                            <div class="col-text-group">
                                <h4><?php the_title(); ?></h4>
                                <p><?php the_content(); ?></p>
                            </div>
                        </li>
                    <?php
                        endwhile;
                        endif;
                        wp_reset_query();
                    ?>   
                </ul>
            </div>

        </div>
    </section>
   
</div>



</section>

<?php get_footer(); ?>



