<?php
/*
Template Name: PAGE GRUPOS
*/
?>
<!-- Template Name: page-index -->
<?php get_header(); ?>
<?php 
$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$form = get_field('formulario_topo',$post->ID, false);
?>
<!-- <div id="header2" class="col-md-12" style="background-image: url(<?php echo $url; ?>);"> -->
<div id="header2" class="col-md-12 parallax-window" data-parallax="scroll" data-image-src="<?php echo $url; ?>" data-position-Y="-10px">
    <?php include('inc/header-topo.php'); ?>
</div><!-- /#header -->


<div id="grupos" class="contenedorInterno">
    <div class="row content">
        <div class="col-md-12">
            <div class="box-gris">
                <form id="grupos">
                    <div class="col-md-4 uno">
                        <div class="fila">
                            <input type="text" class="misti-form" placeholder="<?php _e('form-nombre','El-Misti'); ?>">
                        </div>
                        <div class="fila">
                            <input type="text" class="misti-form" placeholder="<?php _e('form-apellido','El-Misti'); ?>">
                        </div>
                        <div class="fila">
                            <input type="text" class="misti-form" placeholder="E-mail">
                        </div>
                        <div class="fila">
                            <input type="text" class="misti-form" placeholder="<?php _e('form-telefono','El-Misti'); ?>">
                        </div>
                        <div class="fila">
                            <input type="text" class="misti-form" placeholder="<?php _e('form-nacionalidad','El-Misti'); ?>">
                        </div>
                    </div>
                    <div class="col-md-4 dos">
                        <div class="fila">
                            <select class="misti-form">
                                <option value="" disabled="" selected=""><?php _e('form-destino','El-Misti'); ?></option>
                                <option value="Copacabana">Copacabana</option>
                                <option value="Bahia">Bahia</option>
                                <option value="Botafogo">Botafogo</option>
                                <option value="Búzios">Búzios</option>
                                <option value="Ilha Grande">Ilha Grande</option>
                                <option value="São Paulo">São Paulo</option>
                            </select>
                        </div>
                        <div class="fila">
                            <input type="text" id="form-llegada" class="misti-form" placeholder="<?php _e('form-llegada','El-Misti'); ?>">
                        </div>
                        <div class="fila">
                            <input type="text" id="form-partida" class="misti-form" placeholder="<?php _e('form-partida','El-Misti'); ?>">
                        </div>
                        <div class="fila">
                            <select class="misti-form">
                                <option value="" disabled="" selected=""><?php _e('form-tipogrupo','El-Misti'); ?></option>
                                <option value="<?php _e('form-tipo1','El-Misti'); ?>"><?php _e('form-tipo1','El-Misti'); ?></option>
                                <option value="<?php _e('form-tipo2','El-Misti'); ?>"><?php _e('form-tipo2','El-Misti'); ?></option>
                                <option value="<?php _e('form-tipo3','El-Misti'); ?>"><?php _e('form-tipo3','El-Misti'); ?></option>
                                <option value="<?php _e('form-tipo4','El-Misti'); ?>"><?php _e('form-tipo4','El-Misti'); ?></option>
                                <option value="<?php _e('form-tipo5','El-Misti'); ?>"><?php _e('form-tipo5','El-Misti'); ?></option>
                                <option value="<?php _e('form-tipo6','El-Misti'); ?>"><?php _e('form-tipo6','El-Misti'); ?></option>
                                <option value="<?php _e('form-tipo7','El-Misti'); ?>"><?php _e('form-tipo7','El-Misti'); ?></option>
                                <option value="<?php _e('form-tipo8','El-Misti'); ?>"><?php _e('form-tipo8','El-Misti'); ?></option>
                            </select>
                        </div>
                        <div class="fila">
                            <input type="number" class="misti-form" placeholder="<?php _e('form-tamanio','El-Misti'); ?>">
                        </div>
                    </div>
                    <div class="col-md-4 tres">
                        <div class="fila">
                            <textarea class="misti-form textarea" placeholder="<?php _e('form-comentarios','El-Misti'); ?>"></textarea>
                        </div>
                        <div class="fila">
                            <input type="submit" class="btn btn-custom boton-submit" value="<?php _e('form-enviar','El-Misti'); ?>">
                        </div>
                    </div>
                </form>
            </div>
            <h1><?php echo get_field('titulo',$post->ID, false); ?></h1>
        </div>
        <div class="col-md-4 first">
            <?php echo get_field('primera_columna',$post->ID, true); ?>
            <h3 class="recuadro"><?php echo get_field('hostels_label',$post->ID, false); ?></h3>
            <?php echo get_field('contenido_nuestros_hoteles',$post->ID, true); ?>
        </div>
        <div class="col-md-8 grupos">
            <h3 class="recuadro"><?php echo get_field('titulo_grupos',$post->ID, false); ?></h3>
            <div class="row">
                <div class="col-md-6">
                    <?php echo get_field('primera_columna_grupos',$post->ID, true); ?>
                </div>
                <div class="col-md-6">
                    <?php echo get_field('segunda_columna_grupos',$post->ID, true);
                    $img = wp_get_attachment_url(get_field('imagen_grupos',$post->ID, false)); ?>
                    <img class="banner" src="<?php echo $img; ?>" />
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="alojamiento">
                <h2><?php echo get_field('titulo_alojamiento',$post->ID, false); ?></h2>
                <div class="row">
                    <div class="col-md-8">
                        <?php
                        $loop = new WP_Query( array( 'post_type' => 'alojamientoboxes', 'posts_per_page' => -1, 'orderby' => 'date', 'order' => 'ASC' ) );
                        while ( $loop->have_posts() ) : $loop->the_post();
                        $img = wp_get_attachment_url(get_field('imagen-alojammiento',$post->ID, false)); 
                        ?>
                        <div class="col-md-6 box">
                            <div class="txt">
                                <img src="<?php echo $img; ?>" alt="" />
                                <h4><?php the_title(); ?></h4>
                                <?php echo the_content(); ?>
                            </div>
                        </div>
                        <?php endwhile; wp_reset_query(); ?>
                    </div>
                    <div class="col-md-4">
                        <?php $img = wp_get_attachment_url(get_field('banner_alojamiento',$post->ID, false)); ?>
                        <img class="banner" src="<?php echo $img; ?>" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <?php echo get_field('cita',$post->ID, true); ?>
        </div>
    </div>
</div><!-- /#grupos -->

<script>
$(document).ready(function() {
	$('#form-llegada').datepicker({
        format: "dd/mm/yyyy"
    });
	$('#form-llegada').on('changeDate', function(ev){
	    $(this).datepicker('hide');
	});
	$('#form-partida').datepicker({
        format: "dd/mm/yyyy"
    });
	$('#form-partida').on('changeDate', function(ev){
	    $(this).datepicker('hide');
	});
});
</script>

<?php get_footer(); ?>