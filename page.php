<?php get_header(); ?>
	<br>
	<div id="carrinho" class="container">

		<?php while ( have_posts() ) : the_post(); ?>
			
			<?php the_content(); ?>
			
		<?php endwhile; // end of the loop. ?>

	</div>


<?php get_footer(); ?>