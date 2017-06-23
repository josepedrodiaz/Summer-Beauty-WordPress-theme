<?php 
/*
author: ANDRÉ VALLE - Web Developer Full Stack
agency: http://b4w.com.br

description document: INCLUDE DO FOOTER

*/

//include('inc/footer.php'); 
?>

		<div id="footer" class="col-md-12">
			<h1>FOLLOW US</h1>
			<ul id="rrss_bottom" class="list-inline">
				<li id="Facebook"><a href="https://www.facebook.com/MistiHostels?fref=ts"> </a></li>
				<li id="Twitter"><a href="https://twitter.com/MistiHostels"> </a></li>
				<li id="GooglePlus"><a href="https://plus.google.com/+Elmistihostels/"> </a></li>
				<li id="Instagram"><a href="https://instagram.com/elmistihostels"> </a></li>
				<li id="Youtube"><a href="https://www.youtube.com/user/ElMistiHostels"> </a></li>
			</ul>
			
			<?php 
				wp_nav_menu(array(
					'theme_location'  	=> 		'footer-menu',
					'container'			=>		'div',
					'container_id'		=>		'bottomMenu',
					'container_class'	=>		'contenedorInterno',
					'menu_id'	 		=>		'list-inline',
					'menu_class' 		=>		'list-inline',
					'echo'			 	=>		true,
					'before'			=>		'',
					'after'			 	=>		'',
					'link_before'		=>		'',
					'link_after'		=>		'',
					'depth'			 	=>		'0',
					'walker'	 		=>		 new themeslug_walker_nav_menu
				));
			?>

			<p>We accept <img src="<?php bloginfo('template_url') ?>/img/tarjetas.png" /> 
			<span>WhatsApp</span> +55.21.984855138 / 
			<span>TEL</span> +55.21..22461070 / 
			<span>E-MAIL</span> info@elmistihostels.com</p>
			<div class="col-md-12" id="pieFinal">
				<div class="row contenedorInterno center" id="lineaFinal">
					<div class="col-md-6" id="menuFinal">
						<ul class="list-inline">
						  <li><a href="<?php echo $_SERVER["REQUEST_URI"] ?>pagos"><?php _e('Pagos','El-Misti'); ?></a></li>
						  <li><a href="<?php echo $_SERVER["REQUEST_URI"] ?>termos-e-condicoes"><?php _e('Termos e Condições','El-Misti'); ?></a></li>
						  <li><a href="<?php echo $_SERVER["REQUEST_URI"] ?>guestbook/"><?php _e('Guestbook','El-Misti'); ?></a></li>
						  <li><a href="<?php echo $_SERVER["REQUEST_URI"] ?>trabalhe-conosco/"><?php _e('Trabalhe Conosco','El-Misti'); ?></a></li>
						  <li><a href="<?php echo $_SERVER["REQUEST_URI"] ?>seguro-viagem/"><?php _e('Seguro Viagem','El-Misti'); ?></a></li>
						</ul>
					</div>
					<div class="col-md-4" id="copy">
						© Copyright 2015 . El Misti Hostels & Pousadas
					</div>
					<div class="col-md-2" id="chat">
						<!-- LiveZilla Tracking Code (ALWAYS PLACE IN BODY ELEMENT) --><div id="livezilla_tracking" style="display:none"></div><script type="text/javascript">
						var script = document.createElement("script");script.async=true;script.type="text/javascript";var src = "https://elmistibookings.com/lz/server.php?a=125c3&rqst=track&output=jcrpt&ovlp=MjI_&ovlc=IzY2NjY2Ng__&ovlct=I2ZmZmZmZg__&ovlt=Q0hBVCBPTkxJTkU_&ovloo=MQ__&ovlapo=MQ__&eca=MQ__&ecw=Mjg1&ech=OTU_&ecmb=Mjk_&echm=MQ__&ecfs=I0YwRkZENQ__&ecfe=I0QzRjI5OQ__&echc=IzZFQTMwQw__&ecslw=Mg__&ecsgs=IzY1OUYyQQ__&ecsge=IzY1OUYyQQ__&nse="+Math.random();setTimeout("script.src=src;document.getElementById('livezilla_tracking').appendChild(script)",1);</script><noscript><img src="https://elmistibookings.com/lz/server.php?a=125c3&amp;rqst=track&amp;output=nojcrpt&ovlp=MjI_&ovlc=IzY2NjY2Ng__&ovlct=I2ZmZmZmZg__&ovlt=Q0hBVCBPTkxJTkU_&ovloo=MQ__&ovlapo=MQ__&eca=MQ__&ecw=Mjg1&ech=OTU_&ecmb=Mjk_&echm=MQ__&ecfs=I0YwRkZENQ__&ecfe=I0QzRjI5OQ__&echc=IzZFQTMwQw__&ecslw=Mg__&ecsgs=IzY1OUYyQQ__&ecsge=IzY1OUYyQQ__" width="0" height="0" style="visibility:hidden;" alt=""></noscript><!-- http://www.LiveZilla.net Tracking Code -->
					</div>
				</div>
			</div>
      	</div><!-- /#footer -->
    </div><!-- /#container-fluid -->

    <!-- Scripts -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- Form Reservas -->
    <script src="<?php bloginfo('template_url') ?>/js/scriptsReservas.js"></script>
    <!-- Datepicker -->
    <script src="<?php bloginfo('template_url') ?>/js/bootstrap-datepicker.js"></script>
    <!-- Slider -->
    <script src="<?php bloginfo('template_url') ?>/js/jquery.bgswitcher.js"></script>
    <!-- Video.js -->
    <script src="//vjs.zencdn.net/4.12/video.js"></script>
    <!-- checkout -->
    <script src="<?php bloginfo('template_url') ?>/js/checkout.js"></script>

    <script>
		$( document ).ready(function() {
			//Slider init
			$("#header").bgswitcher({
			    images : images_switcher
			});

			//datepicker init
			$('#llegada').datepicker({
                format: "dd/mm/yyyy"
            });

			//close datepicker after select
			$('#llegada').on('changeDate', function(ev){
			    $(this).datepicker('hide');
			});

			//send button event
			$( "#hb247button" ).click(function() {
			    checkeaForm("pt",
			          "Deve preencher todos os campos do formulário",
			          "Deve selecionar uma data futura");
			});
		});

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


		//Analytics -->

		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-22408272-1', 'elmistihostels.com');
		ga('send', 'pageview');

    </script>

    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
    n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
    document,'script','//connect.facebook.net/en_US/fbevents.js');

    fbq('init', '436040879888794');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=436040879888794&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
  </body>
</html>