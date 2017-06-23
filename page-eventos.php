<?php
/*
Template Name: PAGE EVENTOS
*/
?>

<?php get_header(); 

$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

include('inc/modal.php'); 

?>
<section class="container container-custompage">

<div class="col-lg-12 contato-box-custompage" style="background: url(<?php echo $url; ?>) no-repeat; background-size: cover;">

    <!-- FORM RESERVA RESPONSIVE -->
    
    <a class="button-modal-reserva" href="#signup" data-toggle="modal" data-target=".bs-modal-sm"><?php _e('Reserve online ou por telefone','El-Misti'); ?></a>
    <?php include('inc/boxreserva.php'); ?> 
        
    <div class="col-lg-8 col-sm-8 col-md-8 col-lg-offset-4 content-custompage">
    
        <h1 style="margin: 0;">
            <?php the_title(); ?>
        </h1>
       
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
        <div class="fb-like-box" data-href="https://www.facebook.com/MistiHostels?fref=ts" data-width="345px" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>

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
    
    <div class="col-lg-8 col-sm-8 col-md-8 section-eventos">
        
        <section class="section-mistiweek">
            <h2>EL MISTI WEEK</h2>
            
            <?php 

                $args = array(
                    'post_type' => 'mistiweek', 
                    'posts_per_page' => 15,
                    'order' => 'ASC',
                );
                $the_query = new WP_Query( $args );
                if ( $the_query->have_posts() ) :
                while ( $the_query->have_posts() ) : $the_query->the_post();
                $url2 = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                $cor = get_post_meta($post->ID, 'cor-eventweek', true);
            ?>

            <article class="wrapper-article-mistiweek" style="background: <?php echo $cor; ?>">
                <div class="col-lg-5 col-md-5 img-mistiweek">
                    <img src="<?php echo $url2 ?>" alt="" class="img-responsive">
                    <div class="dia-mistiweek" style="background: <?php echo $cor; ?>">
                        <div class="triangle" style="background: <?php echo $cor; ?>"></div>
                        <strong>
                            <?php echo get_post_meta($post->ID, 'dayweek_eventweek', true); ?>
                        </strong>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 content-mistiweek">
                    <a href="<?php echo get_permalink() ?>" title="Veja mais sobre <?php the_title(); ?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
                    <hr class="hr-content-mistiweek">
                    <p><?php the_excerpt(); ?></p>
                    <a href="<?php echo get_permalink() ?>" title="Veja mais sobre <?php the_title(); ?>" class="btn_lm" style="color: <?php echo $cor; ?>">Leia Mais</a>
                </div>
            </article>

            <?php
                endwhile;
                endif;
            ?> 
        </section>

       

    </div>
   
</div>



</section>

<?php get_footer(); ?>



