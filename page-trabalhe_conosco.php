<?php
/*
Template Name: PAGE TRABALHE CONOSCO
*/
?>

<?php get_header(); 

?>
<?php include('inc/modal.php'); ?>

<section class="container container-trabalheconosco">

<div class="col-lg-12 trabalheconosco-box">
    
    <div class="col-lg-12 col-sm-12 col-md-12 content-boxcontato">

        <div class="col-lg-12 col-sm-12 col-md-12 title-boxcontato">
            <h3><?php the_title(); ?></h3>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 contato-padding">
            <!--<?php echo do_shortcode( '[contact-form-7 id="1902" title="form-trabalhe-conosco"]' ); ?>-->
            <?php $val = get_post_meta($post->ID, 'formulario_topo', true);
			echo do_shortcode('['.$val.']'); ?> 
        </div>

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

    <section class="col-lg-8 col-sm-8 col-md-8 section-trabalheconosco">
        <div class="wrapper-trabalheconosco">
            <?php echo $post->post_content ?>
            <div class="clear"></div>
            <div class="content2-trabalheconosco">
                <?php echo get_post_meta($post->ID, 'texto_final_trabalheconosco', true); ?>
            </div>
        </div>
    </section>
</div>

</section>

<?php get_footer(); ?>



