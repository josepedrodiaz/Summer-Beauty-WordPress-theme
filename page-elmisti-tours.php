<?php
/*
Template Name: PAGE EL MISTI TOURS
*/
?>

<?php get_header(); 

$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

include('inc/modal.php'); 

?>
<section class="container container-custompage">

<div class="col-lg-12 contato-box-custompage" style="background: url(<?php echo $url; ?>) no-repeat; background-size: cover;">

    <!-- FORM RESERVA RESPONSIVE -->
    
    <a class="button-modal-reserva" href="#signup" data-toggle="modal" data-target=".bs-modal-sm"><?php _e('Reserve online ou por telefone','El-Misti'); ?></a>
    <?php include('inc/boxreserva.php'); ?> 
        
    <div class="col-lg-8 col-sm-8 col-md-8 col-lg-offset-4 content-custompage">
    
        <h1 style="margin: 0;">
            <?php the_title(); ?>
        </h1>
       
    </div>

</div>

<div class="clear"></div>

<div class="container container-section2-custompage">

    <aside class="col-lg-4 col-sm-4 col-md-4 aside-custompage">
        
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-like-box" data-href="https://www.facebook.com/MistiHostels?fref=ts" data-width="345px" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>

        <div class="clear"></div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-sm-12-instagram">
            <div class="row">
                <i class="img">
                    <img class="img-responsive" src="<?php bloginfo('template_url') ?>/images/instagram-box.jpg">
                </i>
                <div class="instagram-box" style=" width: 100%;">
                    <div id="instafeed" class="instafeed"></div>
                </div>
            </div>
        </div>

    </aside>

    <script>
        $(function() {
            // $( ".accordion" ).accordion({
            //     collapsible: true
            // });
            $('.accordion').find('.accordion-toggle').click(function(){
                //Expand or collapse this panel
                $(this).next().slideToggle('fast');
                //Hide the other panels
                $(".accordion-content").not($(this).next()).slideUp('fast');
            });
        });
    </script>
    
    <div class="col-lg-8 col-sm-8 col-md-8 section-tours accordion">
        
        <?php while ( have_posts() ) : the_post(); ?> <!--  the Loop -->
            <h2 class="accordion-toggle">
                TOURS RIO DE JANEIRO
                <!-- <input type="submit" class="btn btn-boxslide-custom" value="DESCARGAR PDF"> -->
                <a href="https://www.elmistihostels.com/wp-content/uploads/2015/02/POSTERS-RIO-DIGITAL-1.pdf" class="btn btn-boxslide-custom" style="padding-top: 2px;" download>DOWNLOAD PDF</a>
            </h2>
            <ul class="lista-tours accordion-content">
            <?php 
            //cojo los resultados de Rio
            $pattern = "/(?s)\[Rio\](.*?)\[\/Rio\]/";
            preg_match($pattern, get_the_content(), $matches);
            //luego todos los toures
            $pattern = "/(?s)\[tour\](.*?)\[\/tour\]/";
            preg_match_all($pattern, $matches[1], $toures_rio);
            //print_r($toures_rio); 
            $limite_tours = count($toures_rio[1]);
            for ($i=0; $i < $limite_tours ; $i++) :
                $pattern = "/(?s)\[color\](.*?)\[\/color\]/";
                preg_match($pattern, $toures_rio[1][$i], $color); ?>
                <li class="col-lg-4 col-sm-6 col-md-4 item-tour" style="background-color: <?php echo $color[1]; ?>">
                    <?php 
                        $pattern = "/(?s)\[imagen\](.*?)\[\/imagen\]/";
                        preg_match($pattern, $toures_rio[1][$i], $imagen); 
                        echo $imagen[1];
                        $estilo_de_pa_arriba="";
                        if (!(strpos($imagen[1],'113') !== false)) {
                            $estilo_de_pa_arriba='style="margin-top: -5px;"';
                        }
                    ?>
                    <!-- <img src="" alt="" class="img-responsive"> -->
                    <hr <?php echo $estilo_de_pa_arriba; ?>>
                    <h3>
                        <?php 
                            $pattern = "/(?s)\[titulo\](.*?)\[\/titulo\]/";
                            preg_match($pattern, $toures_rio[1][$i], $titulos); 
                            echo $titulos[1];
                        ?>
                    </h3>
                    <hr>
                    <?php 
                        $pattern = "/(?s)\[texto1\](.*?)\[\/texto1\]/";
                        preg_match($pattern, $toures_rio[1][$i], $texto1); 
                        echo $texto1[1];
                    ?>
                    <div class="pie-info">
                        <?php 
                            $pattern = "/(?s)\[texto4\](.*?)\[\/texto4\]/";
                            $si_texto4 = preg_match($pattern, $toures_rio[1][$i], $texto4); 
                            if ($si_texto4) {
                                echo '<hr class="hr-apos-texto">';
                                echo $texto4[1];
                            }
                        ?>
                        <hr class="hr-apos-texto">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-izq-tour">
                            <?php 
                                $pattern = "/(?s)\[texto2\](.*?)\[\/texto2\]/";
                                preg_match($pattern, $toures_rio[1][$i], $texto2); 
                                echo $texto2[1];
                            ?>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-der-tour">
                            <?php 
                                $pattern = "/(?s)\[texto3\](.*?)\[\/texto3\]/";
                                preg_match($pattern, $toures_rio[1][$i], $texto3); 
                                echo $texto3[1];
                            ?>
                        </div>
                    </div>
                </li>
            <?php endfor;//End Tours Rios ?>
            </ul>


            
            <h2 class="accordion-toggle">
                TOURS ILHA GRANDE
                <a href="https://www.elmistihostels.com/wp-content/uploads/2015/02/Poste-Ilha-grande-web.pdf" class="btn btn-boxslide-custom" style="padding-top: 2px;" download>DOWNLOAD PDF</a>
            </h2>
            <ul class="lista-tours accordion-content" style="display: none;">
            <?php 
            //cojo los resultados de Ilha
            $pattern = "/(?s)\[Ilha\](.*?)\[\/Ilha\]/";
            preg_match($pattern, get_the_content(), $matches);
            //luego todos los toures
            $pattern = "/(?s)\[tour\](.*?)\[\/tour\]/";
            preg_match_all($pattern, $matches[1], $toures_ilha);
            $limite_tours = count($toures_ilha[1]);
            for ($i=0; $i < $limite_tours ; $i++) :
                $pattern = "/(?s)\[color\](.*?)\[\/color\]/";
                preg_match($pattern, $toures_ilha[1][$i], $color); ?>
                <li class="col-lg-4 col-sm-6 col-md-4 item-tour" style="background-color: <?php echo $color[1]; ?>">
                    <?php 
                        $pattern = "/(?s)\[imagen\](.*?)\[\/imagen\]/";
                        preg_match($pattern, $toures_ilha[1][$i], $imagen); 
                        echo $imagen[1];
                        $estilo_de_pa_arriba="";
                        if (!(strpos($imagen[1],'113') !== false)) {
                            $estilo_de_pa_arriba='style="margin-top: -5px;"';
                        }
                    ?>
                    <hr <?php echo $estilo_de_pa_arriba; ?>>
                    <h3>
                        <?php 
                            $pattern = "/(?s)\[titulo\](.*?)\[\/titulo\]/";
                            preg_match($pattern, $toures_ilha[1][$i], $titulos); 
                            echo $titulos[1];
                        ?>
                    </h3>
                    <hr>
                    <?php 
                        $pattern = "/(?s)\[texto1\](.*?)\[\/texto1\]/";
                        preg_match($pattern, $toures_ilha[1][$i], $texto1); 
                        echo $texto1[1];
                    ?>
                    <div class="pie-info">
                        <?php 
                            $pattern = "/(?s)\[texto4\](.*?)\[\/texto4\]/";
                            $si_texto4 = preg_match($pattern, $toures_ilha[1][$i], $texto4); 
                            if ($si_texto4) {
                                echo '<hr class="hr-apos-texto">';
                                echo $texto4[1];
                            }
                        ?>
                        <hr class="hr-apos-texto">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-izq-tour">
                            <?php 
                                $pattern = "/(?s)\[texto2\](.*?)\[\/texto2\]/";
                                preg_match($pattern, $toures_ilha[1][$i], $texto2); 
                                echo $texto2[1];
                            ?>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-der-tour">
                            <?php 
                                $pattern = "/(?s)\[texto3\](.*?)\[\/texto3\]/";
                                preg_match($pattern, $toures_ilha[1][$i], $texto3); 
                                echo $texto3[1];
                            ?>
                        </div>
                    </div>
                </li>
            <?php endfor;//End Tours Ilha ?>
            </ul>



            <h2 class="accordion-toggle">
                TOURS BÚZIOS
                <a href="https://www.elmistihostels.com/wp-content/uploads/2015/02/poster-buzios-web.pdf" class="btn btn-boxslide-custom" style="padding-top: 2px;" download> DOWNLOAD PDF </a>
            </h2> 
            <ul class="lista-tours accordion-content" style="display: none;">
            <?php 
            //cojo los resultados de Buzios
            $pattern = "/(?s)\[Buzios\](.*?)\[\/Buzios\]/";
            preg_match($pattern, get_the_content(), $matches);
            //luego todos los toures
            $pattern = "/(?s)\[tour\](.*?)\[\/tour\]/";
            preg_match_all($pattern, $matches[1], $toures_Buzios);
            $limite_tours = count($toures_Buzios[1]);
            for ($i=0; $i < $limite_tours ; $i++) :
                $pattern = "/(?s)\[color\](.*?)\[\/color\]/";
                preg_match($pattern, $toures_Buzios[1][$i], $color); ?>
                <li class="col-lg-4 col-sm-6 col-md-4 item-tour" style="background-color: <?php echo $color[1]; ?>">
                    <?php 
                        $pattern = "/(?s)\[imagen\](.*?)\[\/imagen\]/";
                        preg_match($pattern, $toures_Buzios[1][$i], $imagen); 
                        echo $imagen[1];
                        $estilo_de_pa_arriba="";
                        if (!(strpos($imagen[1],'113') !== false)) {
                            $estilo_de_pa_arriba='style="margin-top: -5px;"';
                        }
                    ?>
                    <hr <?php echo $estilo_de_pa_arriba; ?>>
                    <h3>
                        <?php 
                            $pattern = "/(?s)\[titulo\](.*?)\[\/titulo\]/";
                            preg_match($pattern, $toures_Buzios[1][$i], $titulos); 
                            echo $titulos[1];
                        ?>
                    </h3>
                    <hr>
                    <?php 
                        $pattern = "/(?s)\[texto1\](.*?)\[\/texto1\]/";
                        preg_match($pattern, $toures_Buzios[1][$i], $texto1); 
                        echo $texto1[1];
                    ?>
                    <div class="pie-info">
                        <?php 
                            $pattern = "/(?s)\[texto4\](.*?)\[\/texto4\]/";
                            $si_texto4 = preg_match($pattern, $toures_Buzios[1][$i], $texto4); 
                            if ($si_texto4) {
                                echo '<hr class="hr-apos-texto">';
                                echo $texto4[1];
                            }
                        ?>
                        <hr class="hr-apos-texto">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-izq-tour">
                            <?php 
                                $pattern = "/(?s)\[texto2\](.*?)\[\/texto2\]/";
                                preg_match($pattern, $toures_Buzios[1][$i], $texto2); 
                                echo $texto2[1];
                            ?>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-der-tour">
                            <?php 
                                $pattern = "/(?s)\[texto3\](.*?)\[\/texto3\]/";
                                preg_match($pattern, $toures_Buzios[1][$i], $texto3); 
                                echo $texto3[1];
                            ?>
                        </div>
                    </div>
                </li>
            <?php endfor;//End Tours Buzios ?>
            </ul>

            

            <h2 class="accordion-toggle">
                TOURS SALVADOR
                <a href="https://www.elmistihostels.com/wp-content/uploads/2015/02/poster-salvador-web.pdf" class="btn btn-boxslide-custom" style="padding-top: 2px;" download>DOWNLOAD PDF</a>
            </h2>
            <ul class="lista-tours accordion-content" style="display: none;">
            <?php 
            //cojo los resultados de Salvador
            $pattern = "/(?s)\[Salvador\](.*?)\[\/Salvador\]/";
            preg_match($pattern, get_the_content(), $matches);
            //luego todos los toures
            $pattern = "/(?s)\[tour\](.*?)\[\/tour\]/";
            preg_match_all($pattern, $matches[1], $toures_Salvador);
            $limite_tours = count($toures_Salvador[1]);
            for ($i=0; $i < $limite_tours ; $i++) :
                $pattern = "/(?s)\[color\](.*?)\[\/color\]/";
                preg_match($pattern, $toures_Salvador[1][$i], $color); ?>
                <li class="col-lg-4 col-sm-6 col-md-4 item-tour" style="background-color: <?php echo $color[1]; ?>">
                    <?php 
                        $pattern = "/(?s)\[imagen\](.*?)\[\/imagen\]/";
                        preg_match($pattern, $toures_Salvador[1][$i], $imagen); 
                        echo $imagen[1];
                        $estilo_de_pa_arriba="";
                        if (!(strpos($imagen[1],'113') !== false)) {
                            $estilo_de_pa_arriba='style="margin-top: -5px;"';
                        }
                    ?>
                    <hr <?php echo $estilo_de_pa_arriba; ?>>
                    <h3>
                        <?php 
                            $pattern = "/(?s)\[titulo\](.*?)\[\/titulo\]/";
                            preg_match($pattern, $toures_Salvador[1][$i], $titulos); 
                            echo $titulos[1];
                        ?>
                    </h3>
                    <hr>
                    <?php 
                        $pattern = "/(?s)\[texto1\](.*?)\[\/texto1\]/";
                        preg_match($pattern, $toures_Salvador[1][$i], $texto1); 
                        echo $texto1[1];
                    ?>
                    <div class="pie-info">
                        <?php 
                            $pattern = "/(?s)\[texto4\](.*?)\[\/texto4\]/";
                            $si_texto4 = preg_match($pattern, $toures_Salvador[1][$i], $texto4); 
                            if ($si_texto4) {
                                echo '<hr class="hr-apos-texto">';
                                echo $texto4[1];
                            }
                        ?>
                        <hr class="hr-apos-texto">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-izq-tour">
                            <?php 
                                $pattern = "/(?s)\[texto2\](.*?)\[\/texto2\]/";
                                preg_match($pattern, $toures_Salvador[1][$i], $texto2); 
                                echo $texto2[1];
                            ?>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-der-tour">
                            <?php 
                                $pattern = "/(?s)\[texto3\](.*?)\[\/texto3\]/";
                                preg_match($pattern, $toures_Salvador[1][$i], $texto3); 
                                echo $texto3[1];
                            ?>
                        </div>
                    </div>
                </li>
            <?php endfor;//End Tours Salvador ?>
            </ul>


        
        <?php endwhile; ?><!--  End the Loop -->

    </div>
   
</div>



</section>

<?php get_footer(); ?>



