<?php
/*
Single Post Template: GALERIA HOTEL
*/
?>
<?php 

get_header(); 

$idhostel =  get_post_meta($post->ID, 'idhostel', true);

$menu_url1 = get_post_meta($idhostel, 'menu-url1', true);
$menu_url2 = get_post_meta($idhostel, 'menu-url2', true);
$menu_url3 = get_post_meta($idhostel, 'menu-url3', true);
$menu_url4 = get_post_meta($idhostel, 'menu-url4', true);

$corhostel = get_post_meta($idhostel, 'cor_do_hostel', true);

?>
<style type="text/css">
    ::selection { background: <?php echo $corhostel; ?>;}
    .content-aside h1{ color: <?php echo $corhostel; ?> !important;}
    .content-aside h2{ color: <?php echo $corhostel; ?> !important;}
    .content-article-box2 h1 { color: <?php echo $corhostel; ?> !important;}
    .content-article-box2 h2 { color: <?php echo $corhostel; ?> !important;}
    .content-article-box1 h1 { color: <?php echo $corhostel; ?> !important;}
    .content-article-box1 h2 { color: <?php echo $corhostel; ?> !important;}
</style>
<section class="container container-hotel">
	<div class="col-lg-12 hotel-box" style="background: <?php echo $corhostel; ?>">

        <div class="logohotel-conteiner">
            <?php echo get_the_post_thumbnail($idhostel); ?>
        </div>

		<!-- FORM RESERVA RESPONSIVE -->
		<a class="button-modal-reserva" href="#signup" data-toggle="modal" data-target=".bs-modal-sm"><?php _e('Reserve online ou por telefone','El-Misti'); ?></a>
		<?php include('inc/boxreserva-hotel-single.php'); ?> 
		
	<div class="col-lg-8 col-sm-8 col-md-8 col-lg-offset-4 content-boxhotel">

		<div class="col-md-12 tabs_wrapper"> 

            <div id="original_tabs">
                <ul>
                    <li class="division-menu-hostel"><a href="<?php echo $menu_url1; ?>"><?php _e('Bem-Vindo','El-Misti'); ?></a></li>
                    <li class="division-menu-hostel active"><a href="<?php echo $menu_url2; ?>">Galeria de Fotos</a></li>
                    <li class="division-menu-hostel"><a href="<?php echo $menu_url3; ?>" target="_blank">Dicas de Viagem</a></li>
                    <li class="division-menu-hostel"><a href="<?php echo $menu_url4; ?>"><?php _e('Quartos','El-Misti'); ?></a></li>
                </ul>
            </div>

            <div id="original_tabs_content">

                <div id="tab2" class="tab_content tab2-galeria" style="display: block;">
                    <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                    
                    <h1 class="title-gallery-hostel">
                        <?php the_title(); ?>
                    </h1>

                    <img src="<?php echo $url ?>" alt="image-galeria">
                </div>

            </div>

        </div>

	</div>

	</div>
</section>

<div class="clear"></div>

<div class="container container-section2-hotel">

    <aside class="col-lg-4 col-sm-4 col-md-4 aside-hotel">
        
        <div class="content-aside">
            <?php echo get_post_meta($idhostel, 'conteudo_side_bar', true); ?>
        </div>

        <div class="clear"></div>

        <div class="col-sm-12 col-md-12 col-xs-12">
            <div class="logo-sidebar">
                <img class="img-responsive" src="<?php the_field('imagem_side_bar', $idhostel); ?>">
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

    <section class="col-lg-8 col-sm-8 col-md-8 galeria-hotel">
           <?php echo do_shortcode( get_post_meta($post->ID, "galeria_hotel", true) ); ?>
    </section>
   
</div>

<br><br><br>

<?php get_footer(); ?>



