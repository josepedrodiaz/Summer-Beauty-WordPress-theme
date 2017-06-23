<?php
/*
Template Name: PAGE INDEX
*/
?>
<!-- Template Name: page-index -->
<?php get_header(); ?>


<div id="headervideo" class="col-md-12" style="visibility:hidden">

  <?php include('inc/header-topo.php'); ?>

  <!-- Video.js Player -->
  <video id="videoBanner2" class="video-js vjs-default-skin hidden-xs" width="100%" style="bottom:700px;"
  data-setup='{ "autoplay": true, "loop":true, "preload":true, "controls":false , "muted":true, "poster": "https://embed-ssl.wistia.com/deliveries/026a4c2f6f7908f3b8617a56a544d7befe75c18e.jpg" }'>
  <!-- video largo
  <source src="https://embed-ssl.wistia.com/deliveries/94d487d8290a9fd635e7ca09954a602f3d654bad/file.mp4" type='video/mp4' /> 
  -->
  <!-- video corto lq - Angel 
  <source src="https://embedwistia-a.akamaihd.net/deliveries/1ffe725f9e80acf39042752541eab03b41931760/file.mp4" type='video/mp4' />   -->  
  <!--  Video Liviano 5Mb -->
  <source src="https://embedwistia-a.akamaihd.net/deliveries/ae94c7036474574e1f913b1c136323c2f8f03edf/file.mp4" type='video/mp4' />
  <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that 
   <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
 </video>

 <script>
    //pa que arranque en safari & chrome
    var $video = $('#videoBanner2');
    $video.on('canplaythrough', function() {
     this.play();
   });
 </script>
 <!-- /Video.js Player -->
 <!-- Setup video w & h -->
 <script type="text/javascript">
  w = screen.width;
  $( ".video-js .vjs-tech " ).css("width",w);
</script>
</div><!-- /#header -->


<?php include('inc/header_mobile.php'); ?>


<!-- HTML5 Shiv | videojs -->
<script type="text/javascript">
  document.createElement('video');document.createElement('audio');document.createElement('track');
</script>


<script type="text/javascript">
  console.log("%cMade with %c♥ %cfrom El Misti --> %cWeb? joinUs(it at elmistihostels.com)",
   "color:#ce2039;font-size:18px;font-family:'Lucida Console', Monaco, monospace", 
   "color:#ce2184;font-size:30px;font-weight:bold;font-family:'Lucida Console', Monaco, monospace", 
   "color:#147f30;font-size:16px;font-family:'Lucida Console', Monaco, monospace", 
   "color:#228baf;font-size:16px;font-family:'Lucida Console', Monaco, monospace");




  $(function(){
    $("#headervideo").css("visibility","visible");
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


        //block footer menu links on ipad
        var isiPad = navigator.userAgent.match(/iPad/i) != null;
        //var isiPad = true;
        if(isiPad){
          $('#menuContainer a').attr("href", "javascript:void(0);");
        }
        //END block footer menu links on ipad

      });
    </script>

    <div id="contenidoCentral" class="col-md-12 contenedorInterno">

  

      <!-- <h1 class="topHostelsTitle" class="hidden-xs"><?php _e('NOSSOS HOSTELS','El-Misti'); ?></h1> -->

      <h1 class="center tituloCentral"><?php _e('BEM-VINDO AO EL MISTI HOSTELS','El-Misti'); ?></h1> 

      <br />

  <!-- BOLINHAS -->
      <ul class="list-inline" id="topHostelsMenu">
        <?php the_field("top_hostels") ?>
      </ul>

      <br />

<!-- BANNERS -->
      <div id="effect-zoom" class="effects clearfix">

        <?php
        $banner2 = new WP_Query(array('post_type' =>  'banner2',
          'meta_key'  =>  'superior',
          'orderby'   =>  'date',
          'order'     =>  'DESC'));
        $i_sup=0;
        $i_sec=0;
        ?>

        <div class="row" id="filaBannersSuperiores">
          <?php
          if($banner2->have_posts()):
            while($banner2->have_posts()): $banner2->the_post();
          $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),"full");
          $thumbnail = $src[0];
          $url_promo = get_post_meta($post->ID, 'url_promocao', true); 
          $superior = get_post_meta($post->ID, 'superior', true); 
          $get_url_hover = wp_get_attachment_image_src(get_post_meta($post->ID, 'imagen_hover', true),"full");
          $url_onhover = $get_url_hover[0]; 
          $texto_onhover = get_post_meta($post->ID, 'texto_hover', true); 
          //$url = get_post_custom_values('url');
          //$url = $url[0];

          if($superior): 
            ?>

          <div class="img bannersSuperiores"  id="superior<?php echo ++$i_sup; ?>">
            <img src="<?php echo $thumbnail; ?>" alt="">
            <div class="overlay">
              <a href="<?php echo $url_promo ?>" class="expand"> 
                <img src="<?php echo $url_onhover; ?>" alt="" width="200" height="200" /> + 
              </a>
              <a class="close-overlay hidden">x</a>
              <div class="textBannersHomeOverlay hidden-xs">
                <?php echo $texto_onhover; ?>
              </div>
            </div>
          </div>

          <?php 
          endif; 
          endwhile;
          ?>  
        </div>


        <div class="row" id="filaBannersSecundarios">
          <?
          while($banner2->have_posts()): $banner2->the_post();
          $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),"full");
          $thumbnail = $src[0];
          $url_promo = get_post_meta($post->ID, 'url_promocao', true); 
          $superior = get_post_meta($post->ID, 'superior', true); 
          $get_url_hover = wp_get_attachment_image_src(get_post_meta($post->ID, 'imagen_hover', true),"full");
          $url_onhover = $get_url_hover[0]; 
          $texto_onhover = get_post_meta($post->ID, 'texto_hover', true); 
        //$url = get_post_custom_values('url');
        //$url = $url[0];

          if(!$superior): ?>

          <div class="img bannersSecundarios" id="secundario<?php echo ++$i_sec; ?>">
            <img src="<?php echo $thumbnail; ?>" alt="">
            <div class="overlay banner<?php echo ++$i_sec; ?>">
              <a href="<?php echo $url_promo ?>" class="expand"> 
                <img src="<?php echo $url_onhover; ?>" alt=""> + 
              </a>
              <a class="close-overlay hidden">x</a>
              <div class="textOverlay hidden-xs">
                <?php echo $texto_onhover; ?>
              </div>
            </div>
          </div>

          <?php 
          endif; 
          endwhile;
          ?>

        </div>  
        
        <?php





        endif;
        wp_reset_query();
        ?>
      </div> <!-- /#effect-1 -->

    </div><!-- /#contenidoCentral -->

    <div id="videoPie" class="col-md-12">
      <!-- Video.js Player -->
      <?php
      //configure video values for languaje
      switch (ICL_LANGUAGE_CODE) {
        case 'pt-br':
          $videoSrc = "670923268325124c2d3794c053178d650dbee580.bin";
          break;
        case 'en':
          $videoSrc = "d0d76c9a2b86302b8b73cd84bebaf7af0145c2af.bin";
          break;
        case 'es':
        $videoSrc = "9e58ab1fcde5ab1279c3f13661c384ddd1c29893.bin";
          break;
        default:
          $videoSrc = "d0d76c9a2b86302b8b73cd84bebaf7af0145c2af.bin";
          break;
      }
      ?>
      <video id="videoBanner" class="video-js vjs-default-skin"
      controls preload="auto" width="100%" height="440px"
      poster="<?php bloginfo('template_url') ?>/img/home-video-pie-<?php echo ICL_LANGUAGE_CODE; ?>.jpg"
      data-setup='{"example_option":true}'>
      <!-- <source src="https://embed-ssl.wistia.com/deliveries/6de41c3f265d1d020749665b215479582539e13b/file.mp4" type='video/mp4' /> -->
      <source src="http://embed.wistia.com/deliveries/<?=$videoSrc?>" type='video/mp4' />
      <!-- <source src="<?php bloginfo('template_url') ?>/videos/Misti-Banner.webm" type='video/webm' /> -->
      <!-- <source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg' /> -->
      <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that 
       <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
     </video>
     <!-- /Video.js Player -->
     <div id="tituloVideo">
      <h1><a class="play" href="#">WELCOME TO EL MISTI HOSTELS</a></h1>
      <h2><a class="play" href="#">Enjoy, meet, explore.</a></h2>
      <a class="play" href="#"><img src="<?php bloginfo('template_url') ?>/img/play.svg" class="hidden-xs" /></a>
    </div>
  </div><!-- /#videoPie -->

  <div id="menusInferiores" class="col-md-12 hidden-xs">
    <div id="menuContainer" class="contenedorInterno">
      <div class="row">
        <div id="txtHome" class="col-md-3">
          <?php
          while ( have_posts() ) : the_post();
          the_content();
          endwhile;
          ?>
        </div><!-- /#txtHome -->
        <div id="menuPie1" class="col-md-3">
          <ul id="listaMenu1">
            <li class="menuTitle"><span>Travel Tips</span></li>
            <li class="menuItem"><a href="<?php echo strtok($_SERVER["REQUEST_URI"],'?') ?>travel-news">CITY GUIDES</a></li>
            <li class="menuItem"><a href="<?php echo strtok($_SERVER["REQUEST_URI"],'?') ?>maps">MAPS</a></li>
            <li class="menuItem last"><a href="<?php echo strtok($_SERVER["REQUEST_URI"],'?') ?>travel-tips-city-guide">A WEEK IN RIO</a></li>
          </ul>
        </div><!-- /#menuPie1 -->
        <div id="menuPie2" class="col-md-3">
          <ul id="listaMenu2">
            <li class="menuTitle"><span>We are social</span></li>
            <li class="menuItem"><a href="<?php echo strtok($_SERVER["REQUEST_URI"],'?') ?>media-gallery-el-misti-hostels">VIDEO GALLERY</a></li>
            <li class="menuItem"><a href="<?php echo strtok($_SERVER["REQUEST_URI"],'?') ?>charity-activities">SOCIAL ACTIVITY</a></li>
            <li class="menuItem last"><a href="<?php echo strtok($_SERVER["REQUEST_URI"],'?') ?>el-misti-tours/">EL MISTI TOURS</a></li>
          </ul>
        </div><!-- /#menuPie2 -->
        <div id="menuPie3" class="col-md-3">
          <ul id="listaMenu3">
            <li class="menuTitle"><span>Your Misti Day</span></li>
            <li class="menuItem"><a href="<?php echo strtok($_SERVER["REQUEST_URI"],'?') ?>especial/next-destination/">NEXT DESTINATION</a></li>
            <li class="menuItem"><a href="<?php echo strtok($_SERVER["REQUEST_URI"],'?') ?>el-misti-week/">EL MISTI WEEK</a></li>
            <li class="menuItem last"><a href="http://maresia.elmistihostels.com/" target="_blank">BLOG MAR E CIA</a></li>
          </ul>
        </div><!-- /#menuPie3 -->
      </div><!-- /row menus inferiores -->
    </div><!-- /#menusContainer -->
  </div><!-- /#menusInferiores -->


  <!-- Inc Promo Modal -->
  <?php 
  //if($_GET['blackfriday'] == 1){
    //include('inc/promo-modal.php'); 
  //}
  ?>
  <?php get_footer(); ?>
