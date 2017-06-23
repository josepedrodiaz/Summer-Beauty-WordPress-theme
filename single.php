<?php
/*
Single Post Template: hotel
*/
?>
<?php get_header(); ?>
<?php 
$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$page = get_page_by_path('travel-news');
$pid = icl_object_id($page->ID,'post',true);
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
                    <h2><?php echo get_field('numeroprincipal',$pid,false); ?></h2>
                    <h3><?php echo get_field('datasemanal',$pid,false); ?></h3>
                    <img class="whatsapp" src="<?php echo get_template_directory_uri(); ?>/images/whatsapp.png">
                    <h4>Whatsapp <?php echo get_field('whatsapp',$pid,false); ?></h4>
                </div>
            </div>
            <h1><?php echo get_field('titulo_hostels',$pid,false); ?></h1>
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
        <?php if($imagen=wp_get_attachment_url(get_field('imagen_1',$pid, false))):?>
        <div id="effect-7" class="effects">
            <div class="img">
                <img class="img-responsive" src="<?php echo wp_get_attachment_url(get_field('imagen_1',$pid, false)) ?>">
                <div class="overlay">
                    <a class="expand" href="https://www.facebook.com/MistiHostels/"> <img src="<?php echo get_bloginfo('template_url'); ?>/img/fb-reviews.png" /> </a>
                    <a class="expand" href="http://www.tripadvisor.com.br/Hotel_Review-g303506-d2561772-Reviews-El_Misti_Hostel_Rio-Rio_de_Janeiro_State_of_Rio_de_Janeiro.html"> <img src="<?php echo get_bloginfo('template_url'); ?>/img/trip-reviews.png" /> </a>
                    <a class="expand" href="https://instagram.com/elmistihostels/"> <img src="<?php echo get_bloginfo('template_url'); ?>/img/insta-reviews.png" /> </a>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if($imagen=wp_get_attachment_url(get_field('imagen_2',$pid, false))):?>
        <div class="img">
            <?php
            if(function_exists('icl_object_id')) {
               $page = get_page_by_path('promocoes');
               $id = icl_object_id($page->ID,'post',true);
               $link = get_permalink($id);
            }?>
            <a href="<?php echo $link; ?>"><img class="img-responsive" src="<?php echo $imagen; ?>"></a>
        </div>
        <?php endif; ?>
        <?php if($imagen=wp_get_attachment_url(get_field('imagen_3',$pid, false))):?>
        <div class="img">
            <img class="img-responsive" src="<?php echo $imagen; ?>">
        </div>
        <?php endif; ?>
    </div>
    <div class="col-md-8 content">
        <h3><?php the_title(); ?></h3>
        <p>
            <?php if ( has_post_thumbnail() ) { ?>
				<div style="float:left; width:306px; margin-right:10px; padding:2px">
					<?php the_post_thumbnail( 'medium' ); ?>
				</div>
			<?php } ?>	
			<?php the_content(); ?>
        </p>
    </div>
</div><!-- /#grupos -->

<?php get_footer(); ?>