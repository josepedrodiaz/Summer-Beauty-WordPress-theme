<?php
/*
Template Name: PAGE CONTATO
*/
?>

<?php get_header(); 

?>

<section class="container container-contato">

<div class="col-lg-12 contato-box">

        <!-- FORM RESERVA RESPONSIVE -->
        <a class="button-modal-reserva" href="#signup" data-toggle="modal" data-target=".bs-modal-sm"><?php _e('Reserve online ou por telefone','El-Misti'); ?></a>
        <?php include('inc/boxreserva.php'); ?> 
        
    <div class="col-lg-8 col-sm-8 col-md-8 col-lg-offset-4 content-boxcontato">

        <div class="col-lg-12 col-sm-12 col-md-12 title-boxcontato">
            <h3>Os campos com (*) são obrigatórios<hr></h3>
        </div>

        <div class="col-lg-3 col-sm-3 col-md-3 contato-padding">
        <form role="form">

                <div class="col-xs-12 col-sm-12 col-md-12 contato-padding">
                    <div class="form-group">
                        <label>NOME:</label>
                        <input type="text" name="" id="" class="form-control input-sm" placeholder="Nome">
                    </div>
                </div>
                <div class="clear"></div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-codright">
                    <div class="form-group">
                        <label>COD.:</label>
                        <input type="text" name="" id="" class="form-control input-sm" placeholder="[XXX]">
                    </div>
                </div>
                <div class="col-xs-8 col-sm-8 col-md-8 contato-padding">
                    <div class="form-group">
                        <label>TELEFONE:</label>
                        <input type="tel" name="" id="" class="form-control input-sm" placeholder="Telefone">
                    </div>
                </div>
                <div class="clear"></div>
                <div class="col-xs-12 col-sm-12 col-md-12 contato-padding">
                    <div class="form-group">
                        <label>E-MAIL:</label>
                        <input type="email" name="" id="" class="form-control input-sm" placeholder="Email">
                    </div>
                </div>
                <div class="clear"></div>
                <div class="col-xs-12 col-sm-12 col-md-12 contato-padding">
                    <div class="form-group">
                        <label>CIDADE:</label>
                        <input type="text" name="" id="" class="form-control input-sm" placeholder="Cidade">
                    </div>
                </div>
            
        </div>

        <div class="col-lg-3 col-sm-3 col-md-3 contato-padding-right">
            <div class="col-xs-12 col-sm-12 col-md-12 contato-padding">
                <div class="form-group">
                    <label>CHEGADA:</label>
                    <select type="text" class="form-control multiselect multiselect-sm" role="multiselect">          
                      <option value="0" data-icon="glyphicon-camera" selected="selected">CHEGADA</option>          
                      <option value="1" data-icon="glyphicon-link">Link</option>
                      <option value="2" data-icon="glyphicon-pencil">Edit</option>
                      <option value="3" data-icon="glyphicon-shopping-cart">Cart</option>
                    </select> 
                </div>
            </div>
            <div class="clear"></div>
            <div class="col-xs-12 col-sm-12 col-md-12 contato-padding">
                <div class="form-group">
                    <label>PARTIDA:</label>
                    <select type="text" class="form-control multiselect multiselect-sm" role="multiselect">          
                      <option value="0" data-icon="glyphicon-camera" selected="selected">PARTIDA</option>          
                      <option value="1" data-icon="glyphicon-link">Link</option>
                      <option value="2" data-icon="glyphicon-pencil">Edit</option>
                      <option value="3" data-icon="glyphicon-shopping-cart">Cart</option>
                    </select> 
                </div>
            </div>
            <div class="clear"></div>
            <div class="col-xs-12 col-sm-12 col-md-12 contato-padding">
                <div class="form-group">
                    <label>QUARTO:</label>
                    <select type="text" class="form-control multiselect multiselect-sm" role="multiselect">          
                      <option value="0" data-icon="glyphicon-camera" selected="selected">TIPOS DE QUARTOS</option>          
                      <option value="1" data-icon="glyphicon-link">Link</option>
                      <option value="2" data-icon="glyphicon-pencil">Edit</option>
                      <option value="3" data-icon="glyphicon-shopping-cart">Cart</option>
                    </select> 
                </div>
            </div>
            <div class="clear"></div>
            <div class="col-xs-12 col-sm-12 col-md-12 contato-padding">
                <div class="form-group">
                    <label>HOSPEDES:</label>
                    <select type="text" class="form-control multiselect multiselect-sm" role="multiselect">          
                      <option value="0" data-icon="glyphicon-camera" selected="selected">HOSPEDES</option>          
                      <option value="1" data-icon="glyphicon-link">Link</option>
                      <option value="2" data-icon="glyphicon-pencil">Edit</option>
                      <option value="3" data-icon="glyphicon-shopping-cart">Cart</option>
                    </select> 
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-sm-5 col-md-5 contato-padding-right">
            <div class="col-xs-12 col-sm-12 col-md-12 textarea-contatopadding">
                <div class="form-group">
                    <label>MENSAGEM:</label>
                    <textarea class="form-control textarea-contato" id="" name="" placeholder="Mensagem" rows="5"></textarea>
                </div>
            </div>
            <div class="clear"></div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                   <button class="btn btn-default pull-left btn-custom" type="submit">ENVIAR</button>
                   <button class="btn btn-default pull-left btn-custom" type="submit">LIMPAR</button>
                </div>
            </div>
        </form>
        </div>


    </div>

</div>


<div class="clear"></div>

<hr class="hr-contato">

<div class="col-lg-12 col-sm-12 col-md-12 col-sectioncontato-tels">

    <div class="col-lg-4 col-sm-4 col-md-4 col-sectioncontato-tels2">
        <h2>CENTRAL DE RESERVAS</h2>
        <h3><b><?php echo get_post_meta($post->ID, 'numeroprincipal', true); ?></b><br><?php echo get_post_meta($post->ID, 'datasemanal', true); ?></h3>
    </div>

    <div class="col-lg-8 col-sm-8 col-md-8 col-sectioncontato-tels3">
        <ul>

            <?php 
            wp_reset_query();
            query_posts(array( 
                'post_type' => 'contatotel',
                'showposts' => 15 
            ) );  

            while ( have_posts() ) : the_post();
            ?>

            <li class="li-contato">
                <img src="<?php the_field('icon-bandeira'); ?>">
                <p class="p-cont"><?php echo get_post_meta($post->ID, 'numerotel', true); ?></p>
            </li>

            <?php

            endwhile;
            wp_reset_query();

            ?>
            
            
        </ul>
    </div>

</div>

<div class="clear"></div>

<hr class="hr-contato">

<div class="col-lg-12 col-sm-12 col-md-12 col-section-end">
    

    <?php

    wp_reset_query();

    query_posts(array(
        'post_type'  =>  'contatobox',
        'showposts'  =>  '10',
        ));

    while ( have_posts()) : the_post();

    ?>

        <div class="col-lg-2 col-sm-2 col-md-2 box-endcontato">
            <h4><?php echo get_post_meta($post->ID, 'titulo_box', true); ?></h4>
            <i class="icon-location"></i><p><?php echo get_post_meta($post->ID, 'endereco_box', true); ?></p>
            <hr>
            <i class="icon-mobile"></i><p><?php echo get_post_meta($post->ID, 'telefone_box', true); ?></p>
            <hr>
            <i class="icon-envelope"></i><p><a href="mailto:<?php echo get_post_meta($post->ID, 'email_box', true); ?>"><?php echo get_post_meta($post->ID, 'email_box', true); ?></a></p>
        </div>

    <?php

    endwhile;

    ?>

</div>

</section>

<?php get_footer(); ?>



