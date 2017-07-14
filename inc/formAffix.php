<!--Formulario scrolleable -->
	<div id="formScrolleableContainer" class="hidden-xs" style="display:hidden">
	    <div class="center formScrolleable">
	    <form action="/bookings/booking.php" method="post" id="formreservas2" onsubmit="return checkeaFormScroll('<?php _e('LANG','El-Misti'); ?>','<?php _e('Complete o form','El-Misti'); ?>','<?php _e('Data errada','El-Misti'); ?>');">
	    <input type="hidden" name="lang" value="<?php echo ICL_LANGUAGE_CODE; ?>">
	    <div class="row formu">
		    <div id="destinosWrapper">
		      <select id="destinos-scroll" name="destino">
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

		    <input type="text" id="llegada-scroll" name="llegada" placeholder="<?php _e('Data de Chegada','El-Misti'); ?>" readonly="readonly">

		    <input type="text" id="partida-scroll" name="partida" placeholder="<?php _e('Saída','El-Misti'); ?>" readonly="readonly">

		     <button type="submit" onClick="ga('send', 'event', 'RESERVAS', 'Click-btn-RESERVE-AGORA', 'Hostel-');"  id="hb247button-scroll" form="formreservas2" value="<?php _e('Search','El-Misti'); ?>"><?php _e('Search','El-Misti'); ?></button>
		    </div>
		    </form>
		    <div class="row">
		    <div class="text-align-center contactInfo">
		      <span class="formreservasBold">RESERVATION CENTER: <img src="<?php bloginfo('template_url') ?>/img/WA.svg" /> WHATSAPP</span> 
		      <span class="formreservasLight">+55 21 984855138</span> / 
		      <span class="formreservasBold">+55.21. 2547.6419</span>
		      <?php _e('_2015-cero800','El-Misti'); ?> 
		    </div>
		    </div>
	    </div><!-- /.formScrolleable -->
	 </div><!-- /#formContainer -->
    <!-- / Formulario de reservas -->
	
    <script>
	$('#formScrolleableContainer').hide();
    $(function() {

    	var element = $( "#formContainer" );
		var offset = element.offset();
		var getOffsetTopMenu = offset.top+element.height()+5;


        $(window).scroll(function() {
            if($(window).scrollTop() >= getOffsetTopMenu) {  
            	$('#formScrolleableContainer').css("position","fixed");
            	$('#formScrolleableContainer').css("z-index","9996");
            	$('#formScrolleableContainer').css("top","0");
            	$('#formScrolleableContainer').css("left","0");
                $('#formScrolleableContainer').fadeIn('low');
            }else{
                $('#formScrolleableContainer').fadeOut('fast');
            }
        });
    });
 </script>