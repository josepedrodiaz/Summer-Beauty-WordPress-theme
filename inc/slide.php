<section class="container container-slide">
	<div class="col-lg-12 slide-box">
<!-- form slide -->
<!-- FORM RESERVA RESPONSIVE -->

<style type="text/css">
	div > .date > input.form-control { border-radius: 0px; height: 30px; font-size: 13px; font-style: italic; height: 23px; padding: 3px 15px;}
	div > .date > span.input-group-addon { background: #fff; padding: 0 3px; border-radius: 0;}
</style>

<?php include('boxreserva.php'); ?> 

<!-- slide -->

		<section class="col-lg-12 col-lg-slide1">
			<div id="myCarousel1" class="carousel slide" data-ride="carousel" data-interval="5000">
				
				<div class="carousel-inner">

				<?php

				// BANNER TWO - .JS BOOTSTRAP QUERY
					$i = 0;
					
					if(is_front_page()){
					$banner = new WP_Query(array('post_type'=>'banner'));
					
					if($banner->have_posts()):while($banner->have_posts()): $banner->the_post();

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

					<?php } ?>
						<img src="<?php echo $thumbnail; ?>">
					</div>

					<?php $i++; ?>

				<?php
					endwhile;
					endif;
					wp_reset_query();
					}
				?>


			  </div>

			  <a class="carousel-control carousel-control2 left prev-slide3" href="#myCarousel1" data-slide="prev"></a>
			  <a class="carousel-control carousel-control2 right next-slide3" href="#myCarousel1" data-slide="next" id="click-auto"></a>

			</div>
		</section>

		<div class="clear"></div>
			<div class="container" style="overflow: hidden; z-index: 9999;">
				<div class="row">

					<a class="button-modal-reserva" href="#signup" data-toggle="modal" data-target=".bs-modal-sm"><?php _e('Reserve online ou por telefone','El-Misti'); ?></a>

				</div>
			</div>
		<div class="clear"></div>

	</div>
</section>

<div class='clear'></div>






