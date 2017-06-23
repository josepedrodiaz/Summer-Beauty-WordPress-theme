<?php get_header(); ?>

<section class="container container-custompage">

<div class="col-lg-12 contato-box-custompage">

    <!-- FORM RESERVA RESPONSIVE -->
    
    <a class="button-modal-reserva" href="#signup" data-toggle="modal" data-target=".bs-modal-sm"><?php _e('Reserve online ou por telefone','El-Misti'); ?></a>
    <?php include('inc/boxreserva.php'); ?> 

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

    <section class="col-lg-8 col-sm-8 col-md-8 section-custompage section-hostels section2-category">
    	<div class="col-lg-12 col-sm-12 col-md-12 box-one-section-custompage">
			<header class="page-header header-category1">
				
				<h1 class="section-title">Hostels <?php echo $cat_name = get_category(get_query_var('cat'))->name; ?></h1>

				<nav class="dropdown">
					
					<a href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle btn btn-category" title="Menu de categorias"><i class="icon-menu"></i> Filtrar por categoria</a>

					<ul class="dropdown-menu ul-drop-category" role="menu" aria-labelledby="dLabel">

						<?php


						$categories = get_categories("taxonomy=product_cat");
							foreach($categories as $category){

								if($category->category_nicename == get_category(get_query_var('cat'))->category_nicename):
									$class = ' class="disabled"';
									$categoria_atual = get_category(get_query_var('cat'))->category_nicename;
								else:
									$class = NULL;
								endif;

						echo '<li'.$class.'><a href="'.get_bloginfo('home').'/category/'.$category->category_nicename.'" '.$disabled.' title="Link para a categoria '. $category->name. '.
						'.$category->count.' artigos">'. $category->name. ' ('.$category->count.')</a></li>';
						}

						?>
					</ul>

				</nav>

			</header>

			<div class="clear"></div>

			<?php

		            wp_reset_query();

		            $newsArgs = array( 'post_type' => 'product', 'category_name' => $categoria_atual, 'posts_per_page' => 50, 'orderby' => 'date', 'order' => 'ASC');
					$newsLoop = new WP_Query( $newsArgs );

		            while ( $newsLoop->have_posts() ) : $newsLoop->the_post();
	            ?>

	            <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix article-hostels' ); ?> role="article">

	                <div class="thumb-box-hostel">
	                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
	                        <img class="thumb-img-hostel" src="<?php the_field('imagem_side_bar'); ?>">
	                    </a>
	                </div>

	                <strong>
	                    <?php the_category(); ?>
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


	            <?php endwhile;
	            wp_reset_query();
	             ?>

			</div>
		</section>
   
</div>



</section>

		

<?php get_footer(); ?>