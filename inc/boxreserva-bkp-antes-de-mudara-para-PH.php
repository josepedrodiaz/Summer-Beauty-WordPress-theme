<style type="text/css">
div > .date > input.form-control { border-radius: 0px; height: 30px; font-size: 13px; font-style: italic; height: 23px; padding: 3px 15px;}
div > .date > span.input-group-addon { background: #fff; padding: 0 3px; border-radius: 0;}
</style>
<div class="col-lg-4 box-reserva">
	<div class="reserva-slide">
		<div class="col-lg-12">
			<h2><?php _e('Reserve online ou por telefone','El-Misti'); ?> </h2>
		</div>
		<hr class="division-hr">
		
		<div class="col-lg-6 col-lg-6-boxslidecustom">
		<form action="http://www.elmistihostels.com/check_availability" method="post" onsubmit="manda()">
			<div class="col-lg-12">
				
				<h3><?php _e('Lugar de Destino','El-Misti'); ?></h3>

				<?php wp_dropdown_categories( 'show_option_none=Local&taxonomy=product_cat&exclude=49&class= form-control multiselect multiselect-icon select-custom' ); ?> 

                <select name="hotel" id="hotel" class="form-control multiselect multiselect-icon select-custom" role="multiselect" disabled="disabled" required>          
	              <option value="" selected="selected">Hostel</option>          	              
	            </select>

	            <select name="adults" type="text" class="form-control multiselect multiselect-icon select-custom" role="multiselect" required>          
	              <option value=""><?php _e('Adultos','El-Misti'); ?></option>          
	              <option value="1">1</option>
	              <option value="2">2</option>
	              <option value="3">3</option>
	              <option value="4">4</option>
	              <option value="5">5</option>
	              <option value="6">6</option>
	              <option value="7">7</option>
	              <option value="8">8</option>
	              <option value="9">9</option>
	              <option value="10">10</option>
	            </select>

        	</div>

		</div>

		<div class="col-lg-6 col-lg-6-boxslidecustom">
			<div class="col-lg-12">
	            
	            <h3><?php _e('Data de Partida','El-Misti'); ?></h3>

	            <div class='input-group date'>
                    <input type='text' name="data_ini" id="checkindate" class="form-control" data-date-format="dd/mm/yyyy" placeholder="Check-In" required>
                </div>
                <div class='input-group date'>
                    <input type='text' name="data_fim" id="checkoutdate" class="form-control dpd2a" data-date-format="dd/mm/yyyy" placeholder="Check-Out" required>
                </div>
	            <input type="submit" class="btn btn-boxslide-custom" value="<?php _e('RESERVAR','El-Misti'); ?>"></input>
        	</div>
        	

        	<input type="hidden" name="titulo" 			 id="titulo"			value="">
        	<input type="hidden" name="product_id" 		 id="product_id" 		value="">
        	<input type="hidden" name="hotel_id" 		 id="hotel_id" 			value="">
        	<input type="hidden" name="username" 		 id="username" 			value="">
        	<input type="hidden" name="password" 		 id="password" 			value="">
        	<input type="hidden" name="preco_mini_hotel" id="preco_mini_hotel"  value="">

        </form>

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

			<h3><?php _e('WhatsApp','El-Misti'); ?></h3>
			<div class="col-lg-12 num-boxr">
	            <p>+55 21 984855138</p>
	            <a href="mailto:info@elmistihostels.com" class="mail-boxreserva"><?php _e('Contacto E-mail','El-Misti'); ?></a>
        	</div> 

		</div>
		<hr class="division-hr2">

		<div class="col-lg-12 col-lg-12-boxslidecustom">

			<div class="col-lg-9">
	            <p class="p-boxslide-footer">
	            <a href="/contato/">
	            <?php _e('Mais números / Números Internacionais','El-Misti'); ?>
	            </a>
				<?php _e('De segunda à sexta de 10 às 20 hs.','El-Misti'); ?>
                <?php _e('Sábados e Domingos de 10 às 18 hs.','El-Misti'); ?></p>
        	</div> 

		</div>
		
	</div>
</div><script type="text/javascript">
	<!--
		
		var dropdown_categories = document.getElementById("cat");

		function onCatChange() {

				
			if ( dropdown_categories.options[dropdown_categories.selectedIndex].value > 0 ) {

				var categoria = dropdown_categories.options[dropdown_categories.selectedIndex].text;

				categoria = removeAcento(categoria); 

				var dados = { categoria: categoria, acao: "categoria" };


				//block submit
	            $("input.btn.btn-boxslide-custom").prop('disabled', true); 
	            $("input.btn.btn-boxslide-custom").val(" <?php _e('wait...','El-Misti'); ?> "); 

				$('#hotel').css("cursor", "progress")
				
				$.ajax({
					type: 'POST',
					dataType: 'json',
					url: window.location.protocol + '//www.elmistihostels.com/ajax-home',	
					async: true,
					data: dados,
					success: function(response){
						
						$('#hotel').empty(); 

						$('#hotel').append('<option value="">Hostel</option>');


	                    	$.each(response, function (index, item) {

	                      	$('#hotel').append( $('<option></option>').val(response[index].id).html(response[index].title) );
					        
					     });
                       $('#hotel').css("cursor", "pointer");
	                   $('#hotel').removeAttr('disabled');



						//unblock submit
	                   $("input.btn.btn-boxslide-custom").prop('disabled', false); 
	                   $("input.btn.btn-boxslide-custom").val("<?php _e('RESERVAR','El-Misti'); ?>"); 
					}
				});
			}
		}

		dropdown_categories.onchange = onCatChange;


		var dropdown_categories_modal = document.getElementById("cat_modal");

		function onCatChangeModal() {

				
			if ( dropdown_categories_modal.options[dropdown_categories_modal.selectedIndex].value > 0 ) {

				var categoria = dropdown_categories_modal.options[dropdown_categories_modal.selectedIndex].text;

				//if (categoria === "Búzios"){ categoria = "buzios"; }
				categoria = removeAcento(categoria);

				var dados = { categoria: categoria, acao: "categoria" };

				$('#hotel_modal').css("cursor", "progress");
				
				$.ajax({
					type: 'POST',
					dataType: 'json',
					url: window.location.protocol + '//www.elmistihostels.com/ajax-home',	
					async: true,
					data: dados,
					success: function(response){
						
						$('#hotel_modal').empty(); 

						$('#hotel_modal').append('<option value="0">Hostel</option>');


	                    	$.each(response, function (index, item) {

	                      	$('#hotel_modal').append( $('<option></option>').val(response[index].id).html(response[index].title) );
					        
					     });
                       $('#hotel_modal').css("cursor", "pointer");
	                   $('#hotel_modal').removeAttr('disabled');
					}
				});
			}
		}

		dropdown_categories_modal.onchange = onCatChangeModal;



		var dropdown_hotel = document.getElementById("hotel");

		function onHotelChange() {

			
			if ( dropdown_hotel.options[dropdown_hotel.selectedIndex].value > 0 ) {


				var post_id = dropdown_hotel.options[dropdown_hotel.selectedIndex].value;

				var dados = { post_id: post_id, acao: "hotel" };


				//block submit
	            $("input.btn.btn-boxslide-custom").prop('disabled', true); 
	            $("input.btn.btn-boxslide-custom").val(" <?php _e('wait...','El-Misti'); ?>  "); 
				
				$.ajax({
					type: 'POST',
					dataType: 'json',
					url: window.location.protocol + '//www.elmistihostels.com/ajax-home',	
					async: true,
					data: dados,
					success: function(response){



						$('#product_id').val(response.post_id);
						// $('#titulo').val(response.title);
						// $('#hotel_id').val(response.id_mini_hotel);
						// $('#username').val(response.username);
						// $('#password').val(response.password);
						// $('#preco_mini_hotel').val(response.preco_mini_hotel);


						//unblock submit
	                   $("input.btn.btn-boxslide-custom").prop('disabled', false); 
	                   $("input.btn.btn-boxslide-custom").val("<?php _e('RESERVAR','El-Misti'); ?>"); 
						             
					}
				});

			}

		}

		dropdown_hotel.onchange = onHotelChange;



		var dropdown_hotel_modal = document.getElementById("hotel_modal");

		function onHotelChangeModal() {

			
			if ( dropdown_hotel_modal.options[dropdown_hotel_modal.selectedIndex].value > 0 ) {


				var post_id = dropdown_hotel_modal.options[dropdown_hotel_modal.selectedIndex].value;

				var dados = { post_id: post_id, acao: "hotel" };

				
				$.ajax({
					type: 'POST',
					dataType: 'json',
					url: window.location.protocol + '//www.elmistihostels.com/ajax-home',	
					async: true,
					data: dados,
					success: function(response){



						$('#product_id_modal').val(response.post_id);
						// $('#titulo').val(response.title);
						// $('#hotel_id').val(response.id_mini_hotel);
						// $('#username').val(response.username);
						// $('#password').val(response.password);
						// $('#preco_mini_hotel').val(response.preco_mini_hotel);

						             
					}
				});

			}

		}

		dropdown_hotel_modal.onchange = onHotelChangeModal;


		-->

		function removeAcento(strToReplace) {
			str_acento= "áàãâäéèêëíìîïóòõôöúùûüçÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜÇ";
			str_sem_acento = "aaaaaeeeeiiiiooooouuuucAAAAAEEEEIIIIOOOOOUUUUC";
			var nova="";
			for (var i = 0; i < strToReplace.length; i++) {
				if (str_acento.indexOf(strToReplace.charAt(i)) != -1) {
				nova+=str_sem_acento.substr(str_acento.search(strToReplace.substr(i,1)),1);
				} else {
						nova+=strToReplace.substr(i,1);
					   }
			}
			return nova;
		}


		function manda(){
			//block submit
	            $("input.btn.btn-boxslide-custom").prop('disabled', true); 
	            $("input.btn.btn-boxslide-custom").val(" <?php _e(' sending... ','El-Misti'); ?> "); 
		}

	</script>