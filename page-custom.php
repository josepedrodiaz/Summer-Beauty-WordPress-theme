<?php
/*
Template Name: PAGE CUSTOM
*/
?>
<?php get_header(); ?>
<?php 
$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$form = get_field('formulario_topo',$post->ID, false);
?>
<!-- <div id="header2" class="col-md-12" style="background-image: url(<?php echo $url; ?>);"> -->
<div id="header2" class="col-md-12 parallax-window" data-parallax="scroll" data-image-src="<?php echo $url; ?>">
    <?php include('inc/header-topo.php'); ?>
</div><!-- /#header -->
<div id="custom" class="contenedorInterno">
    <?php if($form): ?>
        <div class="row content">
        <!--
        <div class="col-md-12">
            <div class="box-gris">
            <?php
            echo do_shortcode('['.$form.']');
            ?>
            </div>
        </div>
    -->
</div>
<?php endif; ?>
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
    <?php
    if(function_exists('icl_object_id')) {
     $page = get_page_by_path('promocoes');
     $id = icl_object_id($page->ID,'post',true);
     $link = get_permalink($id);
 } ?>
 <div id="effect-7" class="effects">
    <div class="img">
        <img class="img-responsive" src="<?php echo $imagen; ?>">
        <div class="overlay">
            <a href="<?php echo $link; ?>" class="expand-big"> 
                <img src="<?php  $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2015/01/flor-logo-el-misti-hostels-200x200.svg" alt="" width="200" height="200">
            </a>
        </div>
    </div>
</div>
<?php endif; ?>
<?php if($imagen=wp_get_attachment_url(get_field('imagen_3',$post->ID, false))):?>
    <div class="img">
        <div id="effect-7" class="effects">
            <div class="img">
                <img class="img-responsive" src="<?php echo $imagen; ?>">
                <div class="overlay">
                    <a href="#" class="expand-big2"> 
                        <img src="<?php  $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl']; ?>/2015/01/flor-logo-el-misti-hostels-200x200.svg" alt="" width="200" height="200">
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
</div>
<div class="col-md-8 content">
    <?php
    if ($form!=""){
        ?>
        <div class="col-md-12" style="padding:0">
            <div class="box-gris">
                <?php
                echo do_shortcode('['.$form.']');
                ?>
            </div>
        </div>
        <?php    
    }
    ?>




    <?php echo the_content(); ?>
</div>
</div><!-- /#grupos -->

<?php get_footer(); ?>