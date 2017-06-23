<?php
/*
Single Post Template: mistiexperience
*/
?>
<?php 

get_header(); 

?>
<section class="container container-custompage">

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
    
    <section class="col-lg-8 col-sm-8 col-md-8 section-specials">
        
        <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
        <div class="wrapper-specials-box">
            <div class="col-lg-5 col-md-5 col-sm-5 specials-box1">
                <img src="<?php echo $url; ?>" alt="" class="img-responsive">    
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 specials-box2 single_content">
                <h2 class="title"><?php the_title(); ?></h2>
                <strong><?php echo get_post_meta($post->ID, 'dayweek_eventweek', true); ?></strong>
                <hr class="hr-box2-specials">
                <?php echo $post->post_content; ?>
            </div>
        </div>

    </section>
   
</div>



</section>

<?php get_footer(); ?>



