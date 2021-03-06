<?php
/*
Template Name: PAGE EL MISTI TRAVEL
*/
?>

<?php get_header(); ?>
<?php 
    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<!-- <div id="header2" class="col-md-12" style="background-image: url(<?php echo $url; ?>);"> -->
<div id="header2" class="col-md-12 parallax-window" data-parallax="scroll" data-image-src="<?php echo $url; ?>" data-position-Y="-10px">
    <?php include('inc/header-topo.php'); ?>
</div><!-- /#header -->


<div id="custom" class="contenedorInterno">
    <div class="col-md-4">
        <div class="hostels">
            <div class="telefono">
                <img class="punta" src="<?php echo get_template_directory_uri(); ?>/images/arrow-down-custom.png">
                <div class="box">
                    <h2><?php echo get_field('numeroprincipal'); ?></h2>
                    <h3><?php echo get_field('datasemanal'); ?></h3>
                    <img class="whatsapp" src="<?php echo get_template_directory_uri(); ?>/images/whatsapp.png">
                    <h4>Whatsapp <?php echo get_field('whatsapp'); ?></h4>
                </div>
            </div>
            <h1><?php echo get_field('titulo_hostels'); ?></h1>
            <?php
            $i=0;
            $loop = new WP_Query( array( 'post_type' => 'contatobox', 'posts_per_page' => -1 ) );
            $total = $loop->found_posts;
            while ( $loop->have_posts() ) : $loop->the_post();
            $titulo = get_field('titulo_box',$post->ID, false);
            $class_title = explode('El Misti ',$titulo); 
            $clase=array(0=>'uno',1=>'dos',2=>'tres');?>
            <div class="col-md-4 hostel <?php echo remove_accents(strtolower(str_replace(" ","-",$class_title[1]))).' '.$clase[$i%3]; ?>">
                <div class="back circulo">
                    <p><?php echo strtoupper($class_title[1][0]); ?></p>
                </div>
                <div class="flecha"></div>
                <p class="box-custom"><?php echo $titulo; ?></p>
            </div>
            <?php
            $i++;
            endwhile; wp_reset_query()
            ;?>
        </div>
        <div class="help">
            <?php
            if(function_exists('icl_object_id')) {
               $page = get_page_by_path('contato');
               $id = icl_object_id($page->ID,'post',true);
               $link = get_permalink($id);
            }?>
            <a href="<?php echo $link; ?>"><div class="col-md-7">DO YOU NEED HELP?</div><div class="col-md-5">CONTACT US</div></a>
        </div>
        <?php if($imagen=wp_get_attachment_url(get_field('imagen_1',$post->ID, false))):?>
        <div id="effect-7" class="effects">
            <div class="img">
                <img class="img-responsive" src="<?php echo $imagen; ?>">
                <div class="overlay">
                    <a class="expand" href="https://www.facebook.com/MistiHostels/"> <img src="<?php echo get_bloginfo('template_url'); ?>/img/fb-reviews.png" /> </a>
                    <a class="expand" href="http://www.tripadvisor.com.br/Hotel_Review-g303506-d2561772-Reviews-El_Misti_Hostel_Rio-Rio_de_Janeiro_State_of_Rio_de_Janeiro.html"> <img src="<?php echo get_bloginfo('template_url'); ?>/img/trip-reviews.png" /> </a>
                    <a class="expand" href="https://instagram.com/elmistihostels/"> <img src="<?php echo get_bloginfo('template_url'); ?>/img/insta-reviews.png" /> </a>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if($imagen=wp_get_attachment_url(get_field('imagen_2',$post->ID, false))):?>
        <div class="img">
            <?php
            if(function_exists('icl_object_id')) {
               $page = get_page_by_path('promocoes');
               $id = icl_object_id($page->ID,'post',true);
               $link = get_permalink($id);
            } ?>
            <a href="<?php echo $link; ?>"><img class="img-responsive" src="<?php echo $imagen; ?>"></a>
        </div>
        <?php endif; ?>
        <?php if($imagen=wp_get_attachment_url(get_field('imagen_3',$post->ID, false))):?>
        <div class="img">
            <img class="img-responsive" src="<?php echo $imagen; ?>">
        </div>
        <?php endif; ?>
    </div>
    <div class="col-md-8 content mistiweek">
        <section class="section-mistiweek">
            <h2>EL MISTI WEEK</h2>
            <?php 
                $args = array(
                    'post_type' => 'mistitravel', 
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
                        <?php echo get_post_meta($post->ID, 'dayweek_eventweek', true); ?>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 content-mistiweek">
                    <h3><?php the_title(); ?></h3>
                    <hr class="hr-content-mistiweek">
                    <p><?php the_excerpt(); ?></p>
                    <!--<a href="<?php echo get_permalink() ?>" title="Veja mais sobre <?php the_title(); ?>" class="btn_lm" style="color: <?php echo $cor; ?>"><?php _e('Leia Mais','El-Misti'); ?></a>-->
                </div>
            </article>

            <?php
                endwhile;
                endif;
            ?> 
        </section>
    </div>
</div><!-- /#grupos -->

<?php get_footer(); ?>