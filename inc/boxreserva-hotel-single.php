<?php $idhostel =  get_post_meta($post->ID, 'idhostel', true); ?>

<style type="text/css">
div > .date > input.form-control { border-radius: 0px; height: 30px;}
div > .date > span.input-group-addon { background: #fff; padding: 0 3px;}
.col-lg-6.col-lg-6-boxslidecustom.filet:before { content: " "; position: absolute; border: 1px solid #D10A11; left: -4px; top: 9px; height: 55px; opacity: .8;}
.hostel > div.reserva-slide > .col-lg-6 > form > .col-lg-12 > div.input-group.date > input{ height: 24px;}
.hostel > div.reserva-slide > .col-lg-6 > .col-lg-12 > div.input-group.date > input{ height: 24px;}
.box1-reservahostel{ margin: 9px 0;}
.box2-reservahostel{ margin: 9px 0;}
</style>

<div class="col-lg-4 box-reserva hostel">
	<div class="reserva-slide">
		<div class="col-lg-12">
			<h2 style="color: #D10A11;"><?php _e('Reserve no','El-Misti'); ?> <?php echo get_post_meta($idhostel, 'titulo', true); ?></h2>
		</div>
		<hr class="division-hr">
		<div class="col-lg-12 col-lg-6-boxslidecustom" id="boxPHform">
	  
			<!-- FORM RESERVA Hb - P DIAZ -->
			<script>
			$( document ).ready(function() {

				//preselecciona el hostel
				preSelectHostel("<?php echo get_post_meta($idhostel, 'titulo', true); ?>");

				//datepicker init
				$('#llegada').datepicker({
		                    format: "dd/mm/yyyy"
		                });

				//send button
			    $( "#hb247button" ).click(function() {
			    	checkeaForm("<?php _e('LANG','El-Misti'); ?>",
			    				"<?php _e('Complete o form','El-Misti'); ?>",
			    				"<?php _e('Data errada','El-Misti'); ?>");
				});

				//close datepicker after select
				$('#llegada').on('changeDate', function(ev){
				    $(this).datepicker('hide');
				});
			});
			</script>
			

			
			<div class="col-md-12">
				<select id="destinos">
			   		<option value="" disabled selected> - <?php _e('Lugar de Destino','El-Misti'); ?> - </option>
					  <optgroup label="Rio de Janeiro"> 
						<option value="copa">El Misti Hostel Copacabana</option> 
						<option value="ipa">El Misti Ipanema</option> 
						<option value="rooms">El Misti Rooms Copacabana</option> 
						<option value="house">El Misti House Copacabana</option> 
						<option value="rio">El Misti Rio Copacabana</option> 
						<option value="bota">El Misti Botafogo</option> 
						<!-- <option value="leme">El Misti Leme</option> -->
					</optgroup>  
				  	 <optgroup label="Ilha Grande"> 
						<option value="ilha">Beira Mar Hostels (partner)</option> 
					</optgroup> 
					
					<optgroup label="São Paulo"> 
						<option value="cafe">Café Hostel (partner)</option> 
					</optgroup> 
				</select>
			</div>
		
		
			<div class="col-md-6">
				<input type="text" id="llegada" placeholder="<?php _e('Data de Chegada','El-Misti'); ?>">
			</div>

			<div class="col-md-6">
				<select id="noches">
				    <option value="" disabled selected> - <?php _e('Noches','El-Misti'); ?> - </option>
				    <script type="text/javascript">
				    	for (i = 1; i < 31; i++) { 
						    document.write('<option value="'+i+'">'+i+'</option>');
						}
				    </script>
				</select>
			</div>

			<div class="col-md-12">
				<div id="btnReservaContainer">
				<a href="#" id="hb247button"><?php _e('RESERVAR','El-Misti'); ?></a>
				</div>
			</div>
			<!-- / FORM RESERVA Hb - P DIAZ -->

		</div>




		<hr class="division-hr2">
		<div class="col-lg-6 col-lg-6-boxslidecustom">

			<h3><?php _e('Ligação do Brasil','El-Misti'); ?></h3>
			<div class="col-lg-12 num-boxr">
	            <p>+55 21 2246-1070</p>
	            <p>+55 21 2547-2661</p>
        	</div>  

		</div>
		<div class="col-lg-6 col-lg-6-boxslidecustom filet">

			<img src="<?php bloginfo('template_url') ?>/images/whatsapp-footer.png" class="img-wa" title="Reserve pelo WhatsApp" alt="img-whatsapp">
			<div class="col-lg-12 num-boxr">
	            <p>+55 21 984855138</p>
	            <a href="mailto:info@elmistihostels.com" class="mail-boxreserva"><?php _e('Contacto E-mail','El-Misti'); ?></a>
        	</div> 

		</div>
		<hr class="division-hr2">

		<div class="col-lg-12 col-lg-12-boxslidecustom">

			<div class="col-lg-9">
	            <p class="p-boxslide-footer"><?php _e('Mais números / Números Internacionais','El-Misti'); ?>
				<?php _e('De segunda à sexta de 10 às 20 hs.','El-Misti'); ?>
                <?php _e('Sábados e Domingos de 10 às 18 hs.','El-Misti'); ?></p>
        	</div> 

		</div>
		
	</div>
</div>
<!-- end form slide -->