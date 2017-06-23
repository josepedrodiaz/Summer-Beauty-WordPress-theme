<?php get_header(); ?>

<?php 
// INCLUDE DO SLIDE
include('inc/modal.php');
include('inc/slide.php'); ?>

<?php
	// if (ICL_LANGUAGE_CODE=="pt-br") {
	// 	echo do_shortcode('[corner-ad id=1]');
	// }
	// if (ICL_LANGUAGE_CODE=="es") {
	// 	echo do_shortcode('[corner-ad id=2]');
	// }
	// if (ICL_LANGUAGE_CODE=="en") {
	// 	echo do_shortcode('[corner-ad id=3]');
	// } 
?>

<section class="container container-lista">
	
	<article class="col-lg-6 col-lg-lista">
		<div class="hostels">
			
				
				<?php 

				// IMAGE MENU
				wp_nav_menu(array(
					'theme_location'  	=> 		'image-menu',
					'container'			=>		'nav',
					'container_id'		=>		'content_1',
					'container_class'	=>		'content',
					'menu_id'	 		=>		'hostelsRio',
					'menu_class' 		=>		'hostelsRio',
					'echo'			 	=>		true,
					'before'			=>		'',
					'after'			 	=>		'',
					'link_before'		=>		'',
					'link_after'		=>		'',
					'depth'			 	=>		'0',
					'walker'	 		=>		 new themeslug_walker_nav_menu

				));
		

				?>
				<h2 class="h2-hostelslist">Explore, meet, enjoy...</h2>
			
		</div>
	</article>

	<article class="col-lg-6 col-lg-lista">
		<div id="myCarousel" class="carousel slide slide2" data-ride="carousel" data-interval="8000">
			
			<div class="carousel-inner image-slide2">


			<?php

			// BANNER TWO - .JS BOOTSTRAP QUERY
				$i = 0;
				
				if(is_front_page()){
				$banner2 = new WP_Query(array('post_type'=>'banner2', 'order' => 'DESC'));
				
				if($banner2->have_posts()):while($banner2->have_posts()): $banner2->the_post();

				$src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),"full");
				$thumbnail = $src[0];
				$url = get_post_custom_values('url');
				$url = $url[0];
			?>

			<?php if($url!=""): ?>
		
			<?php endif; ?>

				<?php
					if($i==0){
				?>
				<div class="item active">
				<?php
					}else{
				?>
				<div class="item">

				<?php } 

				$url_promo = get_post_meta($post->ID, 'url_promocao', true); 

					if(strlen($url_promo) > 0){ ?>

						<a href="<?php echo $url_promo ?>">
							<img src="<?php echo $thumbnail; ?>">
						</a>
					
				<?php }else{ ?>
						
						<a href="<?php bloginfo('home') ?>/promocoes/">	
							<img src="<?php echo $thumbnail; ?>">
						</a>

				<?php } ?>			

				</div>

				<?php $i++; ?>

			<?php
				endwhile;
				endif;
				wp_reset_query();
				}
			?>


		  </div>

		  <a class="carousel-control left prev-slide2" href="#myCarousel" data-slide="prev"></a>
		  <a class="carousel-control right next-slide2" href="#myCarousel" data-slide="next"></a>

		</div>
	</article>

</section>

<div class="clear"></div>

<section class="container section-home">
	<?php
		$text_home = new WP_Query(array('post_type' => 'text_home'));
		if($text_home->have_posts()): $text_home->the_post();
			the_content();
		endif;
		wp_reset_query();
	?>
</section>

<div class="clear"></div>

<section class="container">

	  <div class="col-lg-4 col-lg-4-custom col-sm-3 boxs margin-box">
	  	<div class="list-boxs"><?php _e('DICAS DE VIAGEM','El-Misti'); ?></div>
	  	<ul class="ul-boxs">
	  		<li class="border-li-boxs"><a href="<?php echo $_SERVER["REQUEST_URI"] ?>travel-news"><?php _e('GUIAS DAS CIDADES','El-Misti'); ?></a></li>
	  		<li class="border-li-boxs"><a href="<?php echo $_SERVER["REQUEST_URI"] ?>maps"><?php _e('MAPAS','El-Misti'); ?></a><br/><span style="color:#FFF">.</span></li>
	  		<li class=""><a href="<?php echo $_SERVER["REQUEST_URI"] ?>travel-tips-city-guide"><?php _e('SEMANA NO RIO','El-Misti'); ?></a></li>
	  	</ul>
	  </div>

	  <div class="col-lg-4 col-lg-4-custom col-sm-3 boxs margin-box">
	  	<div class="list-boxs"><?php _e('SOMOS SOCIAIS','El-Misti'); ?></div>
		  	<ul class="ul-boxs">
		  		<li class="border-li-boxs"><a href="<?php echo $_SERVER["REQUEST_URI"] ?>news/media-gallery"><?php _e('GALERIA DE <br>MIDIAS','El-Misti'); ?></a></li>
		  		<li class="border-li-boxs"><a href="<?php echo $_SERVER["REQUEST_URI"] ?>charity-activities"><?php _e('ATIVIDADE <br>SOCIAL','El-Misti'); ?></a></li>
		  		<li class=""><a href="<?php echo $_SERVER["REQUEST_URI"] ?>el-misti-tours/"><?php _e('EL MISTI <br>TOURS','El-Misti'); ?></a></li>
		  	</ul>
	  </div>

	  <div class="col-lg-4 col-lg-4-custom col-sm-3 boxs">
	  	<div class="list-boxs"><?php _e('YOUR MISTI DAY','El-Misti'); ?></div>
			<ul class="ul-boxs">
		  		<li class="border-li-boxs"><a href="<?php echo $_SERVER["REQUEST_URI"] ?>especial/next-destination/"><?php _e('NEXT DESTINATION','El-Misti'); ?></a></li>
		  		<li class="border-li-boxs"><a href="<?php echo $_SERVER["REQUEST_URI"] ?>el-misti-travel/"><?php _e('El MISTI TRAVEL','El-Misti'); ?></a></li>
		  		<li class=""><a href="<?php echo $_SERVER["REQUEST_URI"] ?>el-misti-week/"><?php _e('EL MISTI <br> WEEK','El-Misti'); ?></a></li>
		  	</ul>	  
	  </div>

</section>

<div class="clear"></div>

<?php get_footer(); ?>
