<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
	 $corhostel = get_post_meta($post->ID, 'cor_do_hostel', true);

	$menu_url1 = get_post_meta($post->ID, 'menu-url1', true);
	$menu_url2 = get_post_meta($post->ID, 'menu-url2', true);
	$menu_url3 = get_post_meta($post->ID, 'menu-url3', true);
	$menu_url4 = get_post_meta($post->ID, 'menu-url4', true);
?>

<div id="contenidoCentral" class="col-md-12 contenedorInterno">
	<div class="row tituloTop">
      <div class="col-md-6">
      	<?php 
      		$pattern = "/(?s)\<h1\>(.*?)\<\/h1\>/";
      		$conteudo_side_bar = get_post_meta($post->ID, 'conteudo_side_bar', true);
		    preg_match($pattern, $conteudo_side_bar, $matches);
		    $titulo = $matches[1];
      	?>
        <h1 class="nombreHostel" style="color:<?php echo $corhostel; ?>;"><?php echo $titulo ?></h1>
		<?php 
			$n = get_field('estrellas');
			$whole = floor($n); 
			$fraction = $n - $whole;
			for ($i=0; $i < $whole; $i++) { ?>
				<img src="<?php bloginfo('template_url') ?>/img/estrellas/estrella.svg" class="stars" />		
		<?php 
			}
			if ($fraction != 0) { ?>
				<img src="<?php bloginfo('template_url') ?>/img/estrellas/media-estrella.svg" class="stars" />
		<?php } ?>        
      </div>
      <div class="col-md-6 opinionsContainer">
        <?php
        $cucarda = get_field("cucarda_posicion_trip_advisor");
        if($cucarda != ""){
          print "<img src=\"$cucarda\" class=\"cucardaTrip\" />";      
        }
        ?>
        <h2 class="percent" style="color:<?php echo $corhostel; ?>;"><?php the_field('porcentaje_de_evaluacion') ?></h2>
        <p class="opinions" style="color:<?php echo $corhostel; ?>;"><?php the_field('cantidad_de_opiniones') ?></p>
      </div>
    </div><!-- /.row tituloTop-->

    <div class="row contenidoTop">
      <div class="col-md-4 hostel-description-container">
        <div class="hostel-description" style="background-color:<?php echo $corhostel; ?>;">
        	<?php
            $conteudo_side_bar = str_replace($matches[0], '', $conteudo_side_bar);
            $conteudo_side_bar = apply_filters('the_content', $conteudo_side_bar); 
        		echo $conteudo_side_bar;
        	?>
        </div>
      </div>

      <div class="col-md-8" id="mapContainer">
        <div id="map">
          
        </div>
        <div id="mapTxt">
          <p id="nombreHostel"><?php echo strtoupper($post->post_title); ?></p>
           <p id="descHostel">
           <?php the_field('endereco') ?><br />
           <?php the_field('telefone') ?><br />
           <?php the_field('email') ?><br />
           <?php the_field('cep') ?>
           </p>
        </div>
      </div>
    </div><!-- /.row -->

	<?php  
		$box_servicos = str_replace("[[el_color_del_hostel]]", $corhostel, get_field('box_servicos'));
		$box_servicos = str_replace("[[LA_RUTA]]", get_bloginfo('template_url'), $box_servicos);

		$box_informacao_geral = str_replace("[[el_color_del_hostel]]", $corhostel, get_field('box_informacao_geral'));
		$box_informacao_geral = str_replace("[[LA_RUTA]]", get_bloginfo('template_url'), $box_informacao_geral);
	?>
    <div class="row contenidoMedio">
      <div class="col-md-4">
        <?php echo $box_servicos; ?>
      </div>
      <div class="col-md-8" id="lineaPunteada">
        <div class="col-md-6 gralInfoContainer">
          <?php echo $box_informacao_geral; ?>
        </div>




        <div class="col-md-6">
          <div id="effect-6" class="effects">
          	<?php 
              $banner_home_hostel_1 = str_replace("[[LA_RUTA]]", get_bloginfo('template_url'), get_field('banner_home_hostel_1'));
      				echo $banner_home_hostel_1;
            ?>
          </div>  
       
        <div class="col-md-12">
        	<?php  
    				$book_a_bed = str_replace("[[LA_RUTA]]", get_bloginfo('template_url'), get_field('book_a_bed'));
    				echo $book_a_bed;
    			?>
        </div>

        </div>
      </div><!-- /#lineaPunteada -->
    </div><!-- /.row  /#contenidoMedio-->

    <div class="row lineaTres">
      <div id="banner2" class="col-md-4">
        <div id="effect-7" class="effects">
        	<?php 
        		$banner_home_hostel_2 = str_replace("[[LA_RUTA]]", get_bloginfo('template_url'), get_field('banner_home_hostel_2'));
				echo $banner_home_hostel_2;
        	?>
        </div> 
      </div><!-- /#banner2-->
      
      <div id="sliderContainer" class="col-md-8">
      <!-- SLIDER -->
        <div class="gallery-wrap" style="display:none">
          <div class="gallery clearfix">
            <?php 
              $post_content = get_post_meta($post->ID, 'carousel', true);
              preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
              $array_id = explode(",", $ids[1]);
              foreach( $array_id as $attachment_id ){
                $image_attributes = wp_get_attachment_image_src( $attachment_id, "full" );
                if( $image_attributes ) {
                  $src = isset($image_attributes[0])? $image_attributes[0] : '';
                  if(!empty($src)) { ?>
                    <div class="gallery__item">
                      <img src="<?php echo $src; ?>" class="gallery__img" alt="" />
                    </div>
                  <?php }
                }
              }

              // $pattern = get_shortcode_regex();
              // preg_match_all("/$pattern/",$post_content,$matches);
              // print_r($matches);
              // $lm_shortcode = array_keys($matches[2],'gallery');
              // if (!empty($lm_shortcode)) {
              //     foreach($lm_shortcode as $sc) {
              //       $captions[] = $matches[3][$sc];
              //       echo $matches[3][$sc];
              //     }
              // }

              // $pattern = get_shortcode_regex();
              // if (   preg_match_all( '/'. $pattern .'/s', $post_content, $matches )
              //     && array_key_exists( 2, $matches )
              //     && in_array( 'gallery', $matches[2] ) )
              // {
              //     // shortcode is being used
              //   echo "sisas";
              // }else{
              //   echo "nonas";
              // }
            ?>
          </div>
          
          <div class="gallery__controls clearfix">
            <div href="#" class="gallery__controls-prev">
              <img src="<?php bloginfo('template_url') ?>/img/slides/home-hostels/prev.png" alt="" />
            </div>
            <div href="#" class="gallery__controls-next">
              <img src="<?php bloginfo('template_url') ?>/img/slides/home-hostels/next.png" alt="" />
            </div>
          </div>
        </div>
        <!-- /SLIDER -->
      </div><!-- /#sliderContainer-->
    
    </div><!-- /.row .lineaTres --> 
</div><!-- /#contenidoCentral -->






<?php  
  $sphoto = str_replace("[[LA_RUTA]]", get_bloginfo('template_url'), get_field('360'));
  if($sphoto != ""){
?>
<!-- spheric photo -->
<div id="sphoto" class="col-md-12">
  <?php echo html_entity_decode($sphoto); ?>
</div>
<?php  
}
?>



<?php  
	$video = str_replace("[[LA_RUTA]]", get_bloginfo('template_url'), get_field('video'));
?>
<div id="videoPie" class="col-md-12">
    <!-- Video.js Player -->
    <?php echo $video; ?>
</div><!-- /#videoPie -->










<div id="bannersFinales" class="col-md-12 contenedorInterno">
    <div class="col-md-6">
		<?php echo get_post_meta($post->ID, 'box_avaliacao', true); ?>
    </div>
    <div class="col-md-6">
      <div class="col-md-5">
        <div id="effect-6" class="effects">
        	<?php 
        		$banner_home_hostel_3 = str_replace("[[LA_RUTA]]", get_bloginfo('template_url'), get_field('banner_home_hostel_3'));
				echo $banner_home_hostel_3;
        	?>
        </div> 
      </div>
      <div class="col-md-7">
        <div id="effect-6" class="effects">
        	<?php 
        		$banner_home_hostel_4 = str_replace("[[LA_RUTA]]", get_bloginfo('template_url'), get_field('banner_home_hostel_4'));
				echo $banner_home_hostel_4;
        	?>
          </div> 
      </div>
    </div>
</div>



<script type="text/javascript">
$(function(){

  //Slider init
          $("#header").bgswitcher({
              images : images_switcher
          });
          
 //Video.js -  custom play
          videojs("videoBanner").ready(function(){
          var myPlayer = this;
          //Play video link
          $(".play").click(function(event) {
            event.preventDefault();
            $(".play").hide();
            myPlayer.play();
          });
        });


        //Videojs - poster at end
        var myPlayer = videojs("videoBanner");
        myPlayer.on('ended', function(){
            this.trigger('loadstart');
            $(".play").show();  
        });
        myPlayer.on('play', function(){
          $("#tituloVideo").hide();  
        });

        //Videojs - hover
        $( "#tituloVideo, #videoBanner" ).mouseover(function() {
          $( ".vjs-default-skin .vjs-big-play-button" ).css("background-color","rgba(240, 92, 96, 0.7)");
        });
        $( "#tituloVideo, #videoBanner" ).mouseout(function() {
          $( ".vjs-default-skin .vjs-big-play-button" ).css("background-color","rgba(240, 92, 96, 0)");
        });
    });
</script>







