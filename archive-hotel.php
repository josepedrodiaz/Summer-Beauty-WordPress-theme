<?php get_header(); ?>
            
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

    <section class="col-lg-8 col-sm-8 col-md-8 section-custompage section-hostels">
        <div class="col-lg-12 col-sm-12 col-md-12 box-one-section-custompage">
            
            <?php 

            query_posts(array( 
                'post_type' => 'product',
                'showposts' => 50 
            ) ); 

            if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix article-hostels' ); ?> role="article">

                <div class="thumb-box-hostel">
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                        <img class="thumb-img-hostel" src="<?php the_field('imagem_side_bar'); ?>">
                    </a>
                </div>

                <strong>
                    <?php echo  $category->name; ?>
                </strong>

                <header class="article-header">
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                        <h1>
                            <?php the_title(); ?>
                        </h1>
                    </a>
                </header>

                <section class="entry-content clearfix">
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                        <p>
                            <?php echo get_post_meta($post->ID, 'endereco', true); ?>
                        </p>
                        <p>
                            <?php echo get_post_meta($post->ID, 'email', true); ?>
                        </p>
                        <p>
                            <?php echo get_post_meta($post->ID, 'telefone', true); ?>
                        </p>
                    </a>
                </section>

            </article>


            <?php endwhile; ?>

        </div>
    </section>
   
</div>



</section>


    <?php if ( function_exists( 'b4w_page_navi' ) ) { ?>
    <?php b4w_page_navi(); ?>
    <?php } else { ?>
    <nav class="wp-prev-next">
        <ul class="clearfix">
            <li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'b4wtheme' )) ?></li>
            <li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'b4wtheme' )) ?></li>
        </ul>
    </nav>

<?php } ?>

<?php else : ?>

    <article id="post-not-found" class="hentry clearfix">

        <header class="article-header">
            <h1><?php _e( 'Oops, Post Not Found!', 'b4wtheme' ); ?></h1>
        </header>

        <section class="entry-content">
            <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'b4wtheme' ); ?></p>
        </section>

        <footer class="article-footer">
            <p><?php _e( 'This is the error message in the archive.php template.', 'b4wtheme' ); ?></p>
        </footer>
    </article>

<?php endif; ?>

<?php get_footer(); ?>



