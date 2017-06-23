<?php
/*
Single Post Template: galeria
*/
?>
<?php get_header(); ?>

<style type="text/css">
    .container-hotel .division-menu-hostel:after{ display: none;}
</style>

<section class="container container-hotel">
    <div class="col-lg-12 hotel-box">

        <div class="logohotel-conteiner">
            <?php the_post_thumbnail(); ?>
        </div>

        <!-- FORM RESERVA RESPONSIVE -->
        <a class="button-modal-reserva" href="#signup" data-toggle="modal" data-target=".bs-modal-sm"><?php _e('Reserve online ou por telefone','El-Misti'); ?></a>
        <?php include('inc/boxreserva.php'); ?> 
        
    <div class="col-lg-8 col-sm-8 col-md-8 col-lg-offset-4 content-boxhotel">

        <div class="col-md-12">
            <!-- Nav tabs category -->
            <ul class="nav nav-tabs faq-cat-tabs">
                <li class="division-menu-hostel"><a href="#box1" data-toggle="tab"><?php _e('Bem-Vindo','El-Misti'); ?></a></li>
                <li class="division-menu-hostel active"><a href="<?php echo get_post_meta($post->ID, 'aba_2_url', true); ?>" data-toggle="tab">aba2</a></li>
                <li class="division-menu-hostel"><a href="#box3" data-toggle="tab"><?php _e('Travel Tips','El-Misti'); ?></a></li>
                <li class="division-menu-hostel"><a href="#box4" data-toggle="tab"><?php _e('Quartos','El-Misti'); ?></a></li>
            </ul>
    
            <!-- Tab panes -->
            <div class="tab-content faq-cat-content">
                
                <div class="tab-pane active in fade" id="box1">
                   
                   <?php the_title(); ?>
                    
                </div>

                <div class="tab-pane fade" id="box2">
                    <center>TESTE 2</center>
                </div>

                <div class="tab-pane fade" id="box3">
                    <center>TESTE 3</center>
                </div>

                <div class="tab-pane fade" id="box4">
                    <center>TESTE 4</center>
                </div>

                <div class="tab-pane fade" id="box5">
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
        
        <h1><?php echo get_post_meta($post->ID, 'titulo_side_bar', true); ?></h1>

        <p><?php echo get_post_meta($post->ID, 'conteudo_side_bar', true); ?></p>

        <div class="clear"></div>

        <div class="col-sm-12 col-md-12 col-xs-12">
            <div class="logo-sidebar">
                <img class="img-responsive" src="<?php the_field('imagem_side_bar'); ?>">
            </div>
        </div>

    </aside>

    <div class="col-lg-8 col-sm-8 col-md-8 icons-services-hotel">

        <?php the_content(); ?>

    </div>
   
</div>

<br><br><br>

<?php get_footer(); ?>



