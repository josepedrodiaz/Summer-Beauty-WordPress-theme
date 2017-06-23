<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

$menu_url1 = get_post_meta($post->ID, 'menu-url1', true);
$menu_url2 = get_post_meta($post->ID, 'menu-url2', true);
$menu_url3 = get_post_meta($post->ID, 'menu-url3', true);
$menu_url4 = get_post_meta($post->ID, 'menu-url4', true);

$corhostel = get_post_meta($post->ID, 'cor_do_hostel', true);

?>
<style type="text/css">
    .icon-location:before{ color: <?php echo $corhostel; ?>;}
    .icon-mobile:before{ color: <?php echo $corhostel; ?>;}
    .icon-envelope:before{ color: <?php echo $corhostel; ?>;}
    .container-hotel .face1-box1-hotelbox .icon-facebook:before{ color: <?php echo $corhostel; ?>;}
    .icon-skype:before{ color: <?php echo $corhostel; ?>;}
    .slide-hotel .carousel-control{ color: <?php echo $corhostel; ?>;}
    ::selection { background: <?php echo $corhostel; ?>;}

    #map-canvas label { width: auto; display:inline; }
    #map-canvas img { max-width: none; max-height: none; }
    a[href^="http://maps.google.com/maps"]{display:none !important} a[href^="https://maps.google.com/maps"]{display:none !important} .gmnoprint a, .gmnoprint span, .gm-style-cc { display:none; } .gmnoprint div { background:none !important; }
</style>

<div class="topo-hostel-box-abas">

<section class="container-hotel">
	<div class="col-lg-12 hotel-box" style="background: <?php echo $corhostel; ?>">

        <div class="logohotel-conteiner">
            <?php the_post_thumbnail(); ?>
        </div>
        
        <?php include('modal-hotel.php'); ?> 
		<!-- FORM RESERVA RESPONSIVE -->
		<a class="button-modal-reserva" href="#signup" data-toggle="modal" data-target=".bs-modal-sm"><?php _e('Reserve online ou por telefone','El-Misti'); ?></a>
		<?php include('boxreserva-hotel.php'); ?> 
		
	<div class="col-lg-8 col-sm-8 col-md-8 content-boxhotel">

		<div class="col-md-12 tabs_wrapper"> 

            <div id="original_tabs">
                <ul>
                    <li class="division-menu-hostel active"><a href="<?php echo $menu_url1; ?>"><?php _e('Bem-Vindo','El-Misti'); ?></a></li>
                    <li class="division-menu-hostel"><a href="<?php echo $menu_url2; ?>"><?php _e('Galeria de Fotos','El-Misti'); ?></a></li>
                    <li class="division-menu-hostel"><a href="<?php echo $menu_url3; ?>" target="_blank"><?php _e('Dicas de Viagem','El-Misti'); ?></a></li>
                    <li class="division-menu-hostel"><a href="<?php echo $menu_url4; ?>"><?php _e('Quartos','El-Misti'); ?></a></li>
                </ul>
            </div>

            <div id="original_tabs_content">
                <div id="tab1" class="tab_content" style="display: block;">
                    
                    <div class="col-lg-12 col-sm-12 col-md-12 content-box1-hotelbox">
                        <h1><?php echo get_post_meta($post->ID, 'titulo', true); ?></h1>
                    </div>
                    <div class="clear"></div>
                    
                    <!-- <?php // $mapag = wp_get_attachment_url( get_post_meta($post->ID, 'mapa', true) ); ?> -->
                    <!-- <a href="<?php //echo get_post_meta($post->ID, 'link_google', true); ?>" target="_BLANK" class="col-lg-6 col-sm-6 col-md-6 map-box1-hotelbox" style="background: url(<?php //echo $mapag ?>) ;"></a> -->
                    <?php 
                        $slug = basename(get_permalink());
                        switch ($slug) {
                            case 'el-misti-rio':
                                $lat = -22.9677892;
                                $lng = -43.1870205;
                                $dif_lat = -0.0015;
                                $dif_lng = 0.003;
                                break;

                            case 'el-misti-rooms':
                                $lat = -22.9738541;
                                $lng = -43.19399079999999;
                                $dif_lat = -0.0015;
                                $dif_lng = 0.003;
                                break;
                            
                            case 'el-misti-house':
                                $lat = -22.9683457;
                                $lng = -43.1868153;
                                $dif_lat = -0.0015;
                                $dif_lng = 0.003;
                                break;
                            
                            case 'el-misti-copacabana':
                                $lat = -22.9723658;
                                $lng = -43.1924997;
                                $dif_lat = -0.0015;
                                $dif_lng = 0.003;
                                break;
                            
                            case 'el-misti-leme':
                                $lat = -22.9609276;
                                $lng = -43.1694951;
                                $dif_lat = -0.0015;
                                $dif_lng = 0.003;
                                break;
                            
                            case 'el-misti-botafogo':
                                $lat = -22.9498828;
                                $lng = -43.1826275;
                                $dif_lat = -0.0005;
                                $dif_lng = 0.003;
                                break;
                            
                            case 'el-misti-yellow-buzios':
                                $lat = -22.747446;
                                $lng = -41.882071;
                                $dif_lat = -0.0015;
                                $dif_lng = 0.003;
                                break;
                            
                            case 'el-misti-ilha-grande':
                                $lat = -23.140655;
                                $lng = -44.17006;
                                $dif_lat = 0.002;
                                $dif_lng = 0.003;
                                break;
                            
                            case 'el-misti-suites-ilha-grande':
                                $lat = -23.141655;
                                $lng = -44.17006;
                                $dif_lat = 0.002;
                                $dif_lng = 0.003;
                                break;
                            
                            default:
                                $lat = -22.9677892;
                                $lng = -43.1870205;
                                $dif_lat = -0.0015;
                                $dif_lng = 0.003;
                                break;
                        }
                    ?>
                    <div id="map-canvas" class="col-lg-6 col-sm-6 col-md-6 map-box1-hotelbox"></div>

                    <div class="col-lg-5 col-sm-5 col-md-5 end-box1-hotelbox">
                        <div class="col-lg-12 col-sm-12 col-md-12 end1-box1-hotelbox"><i class="icon-location"></i>
                            <p style="color: <?php echo $corhostel; ?>"><?php echo get_post_meta($post->ID, 'endereco', true); ?></p>
                            <hr  style="border-color: <?php echo $corhostel; ?>">
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12 phone1-box1-hotelbox"><i class="icon-mobile"></i>
                            <p style="color: <?php echo $corhostel; ?>"><?php echo get_post_meta($post->ID, 'telefone', true); ?></p>
                            <hr style="border-color: <?php echo $corhostel; ?>">
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12 mail1-box1-hotelbox"><i class="icon-envelope"></i>
                            <p style="color: <?php echo $corhostel; ?>"><?php echo get_post_meta($post->ID, 'email', true); ?></p>
                            <hr style="border-color: <?php echo $corhostel; ?>">
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12 face1-box1-hotelbox">
                            <a href="<?php echo get_post_meta($post->ID, 'facebook_link', true); ?>" target="_BLANK">
                                <i class="icon-facebook"></i>
                                <p style="color: <?php echo $corhostel; ?>"><?php echo get_post_meta($post->ID, 'facebook', true); ?></p>
                                <hr style="border-color: <?php echo $corhostel; ?>">
                            </a>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12 skype1-box1-hotelbox"><i class="icon-skype"></i>
                            <p style="color: <?php echo $corhostel; ?>"><?php echo get_post_meta($post->ID, 'skype', true); ?></p>
                        </div>
                    </div>

                </div>
            </div>

        </div>


	</div>

	</div>
</section>

<div class="clear"></div>

<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
    function dibujarMapa(lat, lng, dif_lat, dif_lng) {
      var mapCanvas = document.getElementById('map-canvas');
      var posMarker = new google.maps.LatLng(lat,lng);
      var pos = new google.maps.LatLng(lat + dif_lat,lng + dif_lng);
      var mapOptions = {
        center: pos,
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }                     
      var map = new google.maps.Map(mapCanvas,mapOptions);
      var marker = new google.maps.Marker({
                        position: posMarker,
                        map: map,
                        title: '<?php echo $post->post_title; ?>'
                    }); 
    }
    var lat=<?php echo $lat; ?>;
    var lng=<?php echo $lng; ?>;
    var dif_lat=<?php echo $dif_lat; ?>;
    var dif_lng=<?php echo $dif_lng; ?>;
    dibujarMapa(lat, lng, dif_lat, dif_lng);
</script>


</div>
