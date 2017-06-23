<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Template Name: PAGE TESTE
 *
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php 

				while ( have_posts() ) : the_post(); 
				
				 the_content(); 
				
			 	endwhile; // end of the loop.

			
			/*

				global $woocommerce;

				print_r($woocommerce->cart->cart_contents);

		if ( sizeof( $woocommerce->cart->cart_contents ) > 0 ) {

            echo "<div>";
            echo "  Existe uma pré reserva no carrinho. <br> \n";
            echo "  Por favor confirme ou cancele antes de realizar nova reserva. <br>";
            echo '  <a href="http://www.elmistihostels.com/carrinho">Ver Carrinho</a> ';
            echo "<div>";

        }

        */

			?>

		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>