<div class="row contenedorInterno center">
	<div id="idiomas" class="col-md-12">
      	<?php do_action('icl_language_selector'); ?>
		<div id="traductorHeader">
			<div id="google_translate_element"></div>
			<p class="viewInYourLanguageTxt">View this site in your language


				<script type="text/javascript">
				function googleTranslateElementInit() {
				  new google.translate.TranslateElement({pageLanguage: 'pt', layout: google.translate.TranslateElement.InlineLayout.SIMPLE,  autoDisplay: false, multilanguagePage: true}, 'google_translate_element');
				}
				</script>

				<script>
				    if ($(window).width() >= 630) {
				        document.write("<script type=\"text/javascript\" src=\"//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit\"><\/script>");
				    }
				</script>






				<div id="google_translate_elementTWO"></div>

				<script type="text/javascript">
				function googleTranslateElementInitTWO() {
				  new google.translate.TranslateElement({pageLanguage: 'pt', layout: google.translate.TranslateElement.InlineLayout.LIST,  autoDisplay: false, multilanguagePage: true}, 'google_translate_elementTWO');
				}
				</script>

				<script>
				if ($(window).width() < 630) {
				        document.write("<script type=\"text/javascript\" src=\"//translate.google.com/translate_a/element.js?cb=googleTranslateElementInitTWO\"><\/script>");
				    }
				</script>


		</div>
	</div><!-- /#idiomas -->

  <div class="row" id="primeraLinea">
    <div id="logo" class="col-md-2">
      <a href="/" style="display: block;">
      <?php
      $logoOpt = $_GET["logo"];
      if($logoOpt == "svg" ){
      	$urlLogo = "logoX.svg";
      ?>

      	<object data="<?php bloginfo('template_url')?>/img/<?php print $urlLogo ?>" type="image/svg+xml" style="pointer-events: none;"></object>

      <?php
      }else if($logoOpt == "png"){
      	$urlLogo = "logoX.png";
      ?>
      	<img src="<?php bloginfo('template_url')?>/img/<?php print $urlLogo ?>" />
      <?php
      }else if($logoOpt == "186"){
      	$urlLogo = "logo186.svg";
      ?>
      	<object data="<?php bloginfo('template_url')?>/img/<?php print $urlLogo ?>" type="image/svg+xml" style="pointer-events: none;"></object>
      <?php
      }else{
      	$urlLogo = "logo1.svg";
      ?>
 		<object data="<?php bloginfo('template_url')?>/img/<?php print $urlLogo ?>" type="image/svg+xml" style="pointer-events: none;"></object>
      <?php	
      }
      ?>
      <!--
      <img src="<?php bloginfo('template_url') ?>/img/logo.svg" alt="<?php bloginfo('name'); ?>" tittle="<?php bloginfo('name'); ?>"/>
      -->
     
      </a>
    </div><!-- /#log -->





	<!-- MOBILE MENU -->
<nav class="navbar navbar-default">
  <div class="">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topMenu" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->

    <?php 
		wp_nav_menu(array(
			'theme_location'  	=> 		'header-menu',
			'container'			=>		'div',
			'container_id'		=>		'topMenu',
			'container_class'	=>		'col-md-8 collapse navbar-collapse',
			'menu_id'	 		=>		'',
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
    
    <!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->


		  <!-- RRSS Menu -->
		  <div id="rrss" class="col-md-2 hidden-xs">
		      <ul class="list-inline">
		        <li id="Facebook"><a href="https://www.facebook.com/MistiHostels?fref=ts" target="_blank"> </a> </li>
		        <li id="Twitter"><a href="https://twitter.com/MistiHostels" target="_blank"> </a></li>
		        <li id="GooglePlus"><a href="#"> </a></li>
		        <li id="Instagram"><a href="https://instagram.com/elmistihostels" target="_blank"> </a></li>
		        <li id="Youtube"><a href="https://www.youtube.com/user/ElMistiHostels" target="_blank"> </a></li>
		      </ul>
		    </div><!-- /#rrss -->
</nav>

    <?php 
    /* MENU ORGINAL
		wp_nav_menu(array(
			'theme_location'  	=> 		'header-menu',
			'container'			=>		'div',
			'container_id'		=>		'topMenu',
			'container_class'	=>		'col-md-8 hidden-xs',
			'menu_id'	 		=>		'',
			'menu_class' 		=>		'list-inline',
			'echo'			 	=>		true,
			'before'			=>		'',
			'after'			 	=>		'',
			'link_before'		=>		'',
			'link_after'		=>		'',
			'depth'			 	=>		'0',
			'walker'	 		=>		 new themeslug_walker_nav_menu

		));
		*/
	?>


	


    
  </div><!-- /row -->
</div><!-- /row superior-->

<div id="fijo">
    <div id="formReservas" class="center"></div><!-- /#formReservas -->
<form action="/bookings/booking.php" method="post" id="formreservas1" onsubmit="return checkeaForm('<?php _e('LANG','El-Misti'); ?>','<?php _e('Complete o form','El-Misti'); ?>','<?php _e('Data errada','El-Misti'); ?>');">
<input type="hidden" name="lang" value="<?php echo ICL_LANGUAGE_CODE; ?>">
    <!--Formulario -->
    <div id="formContainer" class="center">
	    <div id="destinosWrapper">
	      <select id="destinos" name="destino"> 
					<option selected="" disabled="" value=""> Hostels </option> 
					<optgroup label="Rio de Janeiro"> 
						<option value="copa">El Misti Hostel Copacabana</option> 
						<option value="ipa">El Misti Ipanema</option> 
						<option value="rooms">El Misti Rooms Copacabana</option> 
						<option value="house">El Misti House Copacabana</option> 
						<option value="rio">El Misti Rio Copacabana</option> 
						<option value="bota">El Misti Botafogo</option>
						<option value="suites">El Misti Suites Copacabana</option> 
					</optgroup>  
					<optgroup label="Ilha Grande"> 
						<option value="ilha">Beira Mar Hostels (partner)</option> 
					</optgroup> 
					<optgroup label="São Paulo"> 
						<option value="cafe">Café Hostel (partner)</option> 
					</optgroup> 

				</select> 
	    </div>



	    <input type="text" id="llegada" name="llegada" placeholder="<?php _e('Data de Chegada','El-Misti'); ?>" readonly="readonly">	    
	    <button class="btn btn-default visible-xs-inline" id="calendarButton" type="button">
               <i class="fa fa-calendar"></i>
        </button>


		<input type="text" id="partida" name="partida" placeholder="<?php _e('Saída','El-Misti'); ?>" readonly="readonly">
		 <button class="btn btn-default visible-xs-inline" id="calendarCheckoutButton" type="button">
               <i class="fa fa-calendar"></i>
        </button>

	    <button onClick="ga('send', 'event', 'RESERVAS', 'Click-btn-RESERVE-AGORA', 'Hostel-');" type="submit"  id="hb247button" form="formreservas1" value="<?php _e('Search','El-Misti'); ?>"><?php _e('Search','El-Misti'); ?></button>
	    </form>
	    <hr id="separadorFormReservas" class="hidden-xs" />
	    <div class="text-align-center">
	      <span class="formreservasBold"><?php _e('RESERVATION CENTER','El-Misti'); ?>: <br class="visible-xs-inline" />  <img src="<?php bloginfo('template_url') ?>/img/WA.svg" /> WHATSAPP</span> 
	      <span class="formreservasLight">+55 21 984855138 - +55 21 984792746</span> <span class="hidden-xs">/</span> <br class="visible-xs-inline" /> 
	      <a href="tel:+552125476419"><span class="formreservasBold">+55.21. 2547.6419</span></a>
	      <?php _e('_2015-cero800','El-Misti'); ?>
	    </div>
    </div><!-- /#formContainer -->
    <!-- / Formulario de reservas -->
</div>