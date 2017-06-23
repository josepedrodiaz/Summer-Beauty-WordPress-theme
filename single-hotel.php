<?php
/*
Single Post Template: hotel
*/
?>
<?php get_header(); ?>

<section class="container container-hotel">
	<div class="col-lg-12 hotel-box">

        <div class="logohotel-conteiner">
            <?php the_post_thumbnail(); ?>
        </div>

		<!-- FORM RESERVA RESPONSIVE -->
		<a class="button-modal-reserva" href="#signup" data-toggle="modal" data-target=".bs-modal-sm"><?php _e('Reserve online ou por telefone','El-Misti'); ?></a>
		<?php include('inc/boxreserva.php'); ?> 
		
	<div class="col-lg-8 col-sm-8 col-md-8 col-lg-offset-4 content-boxhotel">

		<div class="col-md-12 tabs_wrapper"> 

            <div id="original_tabs">
                <ul>
                    <li class="division-menu-hostel active"><a href="#tab1" rel="tab1"><?php _e('Bem-Vindo','El-Misti'); ?></a></li>
                    <li class="division-menu-hostel"><a href="#tab2" rel="tab2"><?php _e('Galeria de Fotos','El-Misti'); ?></a></li>
                    <li class="division-menu-hostel"><a href="#tab3" rel="tab3"><?php _e('Dicas de Viagem','El-Misti'); ?></a></li>
                    <li class="division-menu-hostel"><a href="#tab4" rel="tab4"><?php _e('Quartos','El-Misti'); ?></a></li>
                </ul>
            </div>

            <div id="original_tabs_content">

                <div id="tab1" class="tab_content" style="display: block;">
                    
                    <div class="col-lg-12 col-sm-12 col-md-12 content-box1-hotelbox">
                        <h1><?php echo get_post_meta($post->ID, 'titulo', true); ?></h1>
                    </div>
                    <div class="clear"></div>

                    <div class="col-lg-6 col-sm-6 col-md-6 map-box1-hotelbox">
                        <a href="<?php echo get_post_meta($post->ID, 'link_google', true); ?>" target="_BLANK"><img src="<?php the_field('mapa'); ?>"></a>
                    </div>

                    <div class="col-lg-5 col-sm-5 col-md-5 end-box1-hotelbox">
                        <div class="col-lg-12 col-sm-12 col-md-12 end1-box1-hotelbox"><i class="icon-location"></i>
                            <p><?php echo get_post_meta($post->ID, 'endereco', true); ?></p>
                            <hr>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12 phone1-box1-hotelbox"><i class="icon-mobile"></i>
                            <p><?php echo get_post_meta($post->ID, 'telefone', true); ?></p>
                            <hr>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12 mail1-box1-hotelbox"><i class="icon-envelope"></i>
                            <p><?php echo get_post_meta($post->ID, 'email', true); ?></p>
                            <hr>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12 face1-box1-hotelbox">
                            <a href="<?php echo get_post_meta($post->ID, 'facebook_link', true); ?>" target="_BLANK">
                                <i class="icon-facebook"></i>
                                <p><?php echo get_post_meta($post->ID, 'facebook', true); ?></p>
                                <hr>
                            </a>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12 skype1-box1-hotelbox"><i class="icon-skype"></i>
                            <p><?php echo get_post_meta($post->ID, 'skype', true); ?></p>
                        </div>
                    </div>

                </div>

                <div id="tab2" class="tab_content">
                    <center>TESTE 2</center>
                </div>
                <div id="tab3" class="tab_content">
                    <center>TESTE 3</center>
                </div>
                <div id="tab4" class="tab_content">
                    <center>TESTE 4</center>
                </div>
                <div id="tab5" class="tab_content">
                    <center>TESTE 5</center>
                </div>

            </div>

        </div>

	</div>

	</div>
</section>

<div class="clear"></div>

<div class="container container-section2-hotel">

    <aside class="col-lg-4 col-sm-4 col-md-4 aside-hotel">
        
        <p><?php echo get_post_meta($post->ID, 'conteudo_side_bar', true); ?></p>

        <div class="clear"></div>

        <div class="col-sm-12 col-md-12 col-xs-12">
            <div class="logo-sidebar">
                <img class="img-responsive" src="<?php the_field('imagem_side_bar'); ?>">
            </div>
        </div>

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

        <div class="col-lg-12 col-md-12 col-sm-12 col-sm-12-instagram" style="padding:0;">
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

    <div class="col-lg-8 col-sm-8 col-md-8 icons-services-hotel">

        <?php echo do_shortcode( get_post_meta($post->ID, "shortcodes-hotel", true) ); ?>
        
    </div>

    <section class="col-lg-8 col-sm-8 col-md-8 slide-hotel">
          <div class="span8 carousel-container">
                  
                <div id="carousel" class="carousel slide carousel-fade">
                <!-- Carousel items -->
                <div class="carousel-inner">
                  
                  <div data-slide-no="0" class="item carousel-item active">
                    <img src="<?php the_field('imagem_slide'); ?>" alt="" class="imagem-slidehotel">
                    <div class="carousel-caption">
                      <p><?php echo get_post_meta($post->ID, 'texto_slide_1', true); ?></p>
                    </div>
                  </div>
                  <div data-slide-no="1" class="item carousel-item">
                    <img src="<?php the_field('imagem_slide2'); ?>" alt="" class="imagem-slidehotel">
                    <div class="carousel-caption">
                      <p><?php echo get_post_meta($post->ID, 'texto_slide_2', true); ?></p>
                    </div>
                  </div>
                  <div data-slide-no="2" class="item carousel-item">
                    <img src="<?php the_field('imagem_slide3'); ?>" alt="" class="imagem-slidehotel">
                    <div class="carousel-caption">
                      <p><?php echo get_post_meta($post->ID, 'texto_slide_3', true); ?></p>
                    </div>
                  </div>
                  <div data-slide-no="3" class="item carousel-item">
                    <img src="<?php the_field('imagem_slide4'); ?>" alt="" class="imagem-slidehotel">
                    <div class="carousel-caption">
                      <p><?php echo get_post_meta($post->ID, 'texto_slide_4', true); ?></p>
                    </div>
                  </div>

                </div>
                <!-- Carousel nav -->
                <a class="carousel-control left" href="#carousel" data-slide="prev">‹</a>
                <a class="carousel-control right" href="#carousel" data-slide="next">›</a>
              </div>

          </div>
    </section>

    <section class="col-lg-8 col-sm-8 col-md-8 content-hotel-box">
        <article class="col-lg-6 content-article-box">
            <?php echo get_post_meta($post->ID, 'box_servicos', true); ?>
        </article>
        <article class="col-lg-6 content-article-box">
            <?php echo get_post_meta($post->ID, 'box_informacao_geral', true); ?>
        </article>
    </section>

    <section class="col-lg-8 col-sm-8 col-md-8 content-hotel-box2">
        <hr class="hr-hotel-box2">
        <article class="col-lg-4 col-sm-12 col-md-4">
            <h4 class="h4-avaliacao">Avaliação de nossos clientes</h4>
            <div class="">
                 <?php echo get_post_meta($post->ID, 'box_avaliacao', true); ?>
            </div>
        </article>
        <article class="col-lg-8 col-sm-12 col-md-8">
            <?php comments_template( '', true ); ?>
        </article>
    </section>
   
</div>

<br><br><br>

<?php get_footer(); ?>



