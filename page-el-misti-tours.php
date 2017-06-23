<?php
/*
Template Name: PAGE EL MISTI TOURS
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
    <div class="col-md-8 content mistitours accordion">
        <?php
        $contacto = get_field('frase_contacto');
        $destinos = get_terms( 'destino', array('orderby' => 'count','order'=>'DESC','hide_empty' => 0) );
        foreach ( $destinos as $item ) {
            $item_query = new WP_Query( array(
                'post_type' => 'mistitours',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'destino',
                        'field' => 'slug',
                        'terms' => array( $item->slug ),
                        'operator' => 'IN'
                    )
                )
            ) );
            ?>
            <div class="destino">
                <?php if($link=wp_get_attachment_url(get_field('pdf',$item, false))):?>
                <a class="btn btn-download" title="Download PDF" href="<?php echo $link; ?>" download="">Download PDF</a>
                <?php endif; ?>
                <h2 class="accordion-toggle">Tours <?php echo $item->name; ?></h2>
            </div>
            <div class="row accordion-content">
                <?php
                $i=0;
                if ( $item_query->have_posts() ) : while ( $item_query->have_posts() ) : $item_query->the_post(); 
                    $clase=array(0=>'uno',1=>'dos',2=>'tres');?>
                    <div class="col-md-4 box <?php echo $clase[$i%3]; $i++; ?>" style="background-color: <?php echo get_field('color'); ?>;">
                        <?php if($imagen=wp_get_attachment_url( get_post_thumbnail_id($item_query->ID))):?>
                        <div class="img">
                            <img class="img-responsive" src="<?php echo $imagen; ?>">
                        </div>
                        <?php endif; ?>
                        <div class="title">
                            <hr>
                            <h4><?php echo the_title(); ?><br><span><?php echo get_field('subtitulo'); ?></span></h4>
                            <hr>
                        </div>
                        <div class="main-text"><?php the_content(''); ?></div>
                        <div class="foot">
                            <?php if($comentario=get_field('comentario')):?>
                            <hr>
                            <p class="comentario"><?php echo $comentario; ?></p>
                            <?php endif; ?>    
                            <hr>
                            <div class="col-md-6 izq">
                                <?php echo get_field('box_footer'); ?>
                            </div>
                            <div class="col-md-6 der">
                                <p class="frase"><?php echo $contacto; ?></p>
                                <p class="mail">info@elmistihostels.com</p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </div>
            <?php
            // Reset things, for good measure
            $item_query = null;
            wp_reset_postdata();
        }
        ?>
    </div>
</div><!-- /#grupos -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script>
    $(function() {
        $('.accordion').find('.accordion-toggle').click(function(){
            //Expand or collapse this panel
            $('.accordion-content').slideToggle('fast');
            //Hide the other panels
            $('.accordion-content').not.slideUp('fast');
        });
    });
</script>
<?php get_footer(); ?>