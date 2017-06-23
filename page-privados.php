 <?php
/*
Template Name: PAGE QUARTOS PRIVADOS
*/
?>
<!-- Template Name: page-index -->
<?php get_header(); ?>
<?php 
    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<!-- <div id="header2" class="col-md-12" style="background-image: url(<?php echo $url; ?>);"> -->
<div id="header2" class="col-md-12 parallax-window" data-parallax="scroll" data-image-src="<?php echo $url; ?>" data-position-Y="-10px">
    <?php include('inc/header-topo.php'); ?>
</div><!-- /#header -->


<div id="hostelList" class="contenedorInterno">
    <?php 
        $args = array(
            'post_type'         => 'privado', 
            'posts_per_page'    => 30,
            'meta_key'          => 'destacado',
            'orderby'           => 'meta_value_num',
            'order'             => 'DESC'
        );
        $the_query = new WP_Query( $args );
        $loop = 0;
        $count_posts = 0;
        $classes = array('col-md-4 hostel uno-privado', 'col-md-4 hostel dos-privado', 'col-md-4 hostel tres-privado' );
    ?>
      
    <?php if ( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <?php 
                $loop++;
                $count_posts++;
                // Extra post classes
                if ( 3 == $loop ){
                    $class = $classes[2];
                } elseif ( 2 == $loop ){
                    $class = $classes[1];
                } else {
                    $class = $classes[0];
                    echo '<div class="row-fluid">';
                }
            ?>
            <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                <div class="<?php echo $class ?>">
                    <?php $corhostel = get_post_meta($post->ID, 'cor_do_hostel', true); ?>
                    <div class="hostelHeader hostelHeader-privado">
                    <img src="<?php echo $url; ?>"  class="hostel-list-header-hostel-image" />
                      <div class="trip">
                        <?php 
                            $trip_advisor = str_replace("selfserveprop", "socialButtonBubbles", get_field('trip_advisor'));
                            $trip_advisor = str_replace("150_logo-11900-2.png", "socialWidget/20x28_white-21693-2.png", $trip_advisor);
                            $trip_advisor = str_replace("nreviews=1", "color=white", $trip_advisor);
                            echo $trip_advisor;
                        ?>
                      </div><!-- /#trip -->
                      <?php $hostel=get_field('link'); ?>
                      <a href="<?php echo get_permalink($hostel[0]->ID); ?>" class="hostelPhotoLink"></a>
                    </div><!-- /#hostelHeader -->
                    <?php 
                        $url2 = (get_field('imagen_2') != '' ? get_field('imagen_2') : "http://placehold.it/171x120");
                        $url3 = (get_field('imagen_3') != '' ? get_field('imagen_3') : "http://placehold.it/171x120");
                    ?>
                    <div class="row col-md-12 segundaLinea">
                    <div class="img-privado-wrapper col-md-6 primera">
                        <a href="<?php echo get_permalink($hostel[0]->ID); ?>" class="hostelPhotoLink">
                            <img class="img-privado" src="<?php echo $url2; ?>" />
                        </a>
                    </div>
                    <div class="img-privado-wrapper col-md-6">
                        <a href="<?php echo get_permalink($hostel[0]->ID); ?>" class="hostelPhotoLink">
                            <img class="img-privado" src="<?php echo $url3; ?>" />
                        </a>
                    </div>
                    </div>
                    <div class="detalles">
                      <div class="col-md-8 datos">
                        <h1 class="nombreHostel">
                            <svg version="1.1"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                                 x="0px" y="0px" width="27.6px" height="27.6px" viewBox="0 0 27.6 27.6" enable-background="new 0 0 27.6 27.6"
                                 xml:space="preserve">
                            <defs>
                            </defs>
                            <circle fill="<?php echo $corhostel; ?>" cx="13.8" cy="13.8" r="13.8"/>
                            <path fill="none" stroke="#FFFFFF" stroke-miterlimit="10" d="M13.8,12.8c0-2-1.6-3.6-3.6-3.6c-2,0-3.6,1.6-3.6,3.6
                                c0,0-0.7,5.8,7.3,8.5c0,0,7.3-1.2,7.3-8.5c0-2-1.6-3.6-3.6-3.6C15.4,9.2,13.8,10.8,13.8,12.8"/>
                            </svg>
                            <a href="<?php echo get_permalink($hostel[0]->ID); ?>" style="color:<?php echo $corhostel; ?>;"><?php the_title(); ?></a>
                        </h1>
                        <p class="descripcion">
                            <a href="<?php echo get_permalink($hostel[0]->ID); ?>">
                               <?php 
                                    //echo custom_field_excerpt(get_the_content());
                                    $conteudo_side_bar = strip_tags ( get_the_content()) ;
                                    echo tokenTruncate($conteudo_side_bar, 125) . "...";
                                ?> 
                            </a>
                            <a href="<?php echo get_permalink($hostel[0]->ID); ?>">
                                <img src="<?php bloginfo('template_url') ?>/img/plus.svg">
                            </a>
                        </p>
                      </div><!-- /#datos -->
                      <div class="col-md-4 reservas">
                        <?php the_field('search'); ?>
                        <?php $url_tipo_cama = get_bloginfo('template_url')."/img/dosplazas.svg"; ?>
                        <img src="<?php echo $url_tipo_cama ?>" />
                        <div class="bedsprice">
                          <span class="beds"><?php _e('Rooms from','El-Misti'); ?> </span>
                          <span class="price">R$ 
                          <?= get_field('precio_minimo')?>
                          <!-- <?php include($_SERVER['DOCUMENT_ROOT'].'/mini-hotel/precio_min_priv.php'); ?> -->
                          </span>
                        </div><!-- /#bedsprice -->
                      </div><!-- /#reservas -->

                    </div><!-- /#detalles -->
                </div><!-- /#hostel -->
                <?php if ( 3 == $loop || $the_query->found_posts == $count_posts ): ?>
                    <?php for ($i=$loop; $i < 3; $i++): ?>
                        <div class="<?php echo $classes[$i]; ?>">
                            <img src="http://placehold.it/345x230">
                        </div>
                    <?php endfor; ?>
                    <?php 
                        echo '</div>';
                        $loop = 0;
                    ?>
                <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>

</div><!-- /#hostelList -->

<?php get_footer(); ?>