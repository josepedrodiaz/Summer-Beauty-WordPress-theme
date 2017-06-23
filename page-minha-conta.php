<?php
/*
Template Name: PAGE MINHA CONTA
*/
?>

<?php get_header(); ?>
    
    <section class="container my_account">                                                               
        <article>
            
            <header class="header-my_account">
                <h1><?php the_title(); ?></h1>
            </header>
            
            <section class="section2-my_account">
                <?php echo do_shortcode( '[woocommerce_my_account]' ); ?>
            </section>


        </article>      
    </section>

<?php get_footer(); ?>



