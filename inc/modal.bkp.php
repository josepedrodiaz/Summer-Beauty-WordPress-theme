<!-- Modal -->
<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
    	<div class="modal-content">
    	
    		<div class="col-lg-4 box-reserva">

				<div class="reserva-slide2">
					<div class="col-lg-12">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h2><?php _e('Reserve online ou por telefone','El-Misti'); ?></h2>
					</div>

					<hr class="division-hr"><!--DIVISÂO -->
				
				<form action="/check_availability" method="post">
					<div class="col-lg-6 col-xs-6 col-lg-6-boxslidecustom"><!--caps1 -->
						<div class="col-lg-12 col-sm-12">
							<h3><?php _e('Lugar de Destino','El-Misti'); ?></h3>

							<?php wp_dropdown_categories( 'name=cat_modal&show_option_none=Local&taxonomy=product_cat&exclude=49&class= form-control multiselect multiselect-icon select-custom' ); ?> 

			                <select name="hotel_modal" id="hotel_modal" type="text" class="form-control multiselect multiselect-icon select-custom" role="multiselect">          
				              <option value="0" selected="selected">Hostel</option>          	              
				            </select>

				            <select name="adults" type="text" class="form-control multiselect multiselect-icon select-custom" role="multiselect">          
				              <option value="0" selected="selected"><?php _e('Adultos','El-Misti'); ?></option>          
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
					</div><!--caps1 end -->

					<div class="col-lg-6 col-xs-6 col-lg-6-boxslidecustom"><!--caps2 -->
						<div class="col-lg-12 col-sm-12">
							
							<h3><?php _e('Data de Partida','El-Misti'); ?></h3>

				            <div class='input-group date'>
			                    <input type='text' name="data_ini" id="checkindate2" class="form-control" data-date-format="dd/mm/yyyy" placeholder="Check-In" required>
			                </div>
			                <div class='input-group date'>
			                    <input type='text' name="data_fim" id="checkoutdate2" class="form-control dpd2a" data-date-format="dd/mm/yyyy" placeholder="Check-Out" required>
			                </div>
				            <input type="submit" class="btn btn-boxslide-custom" value="<?php _e('RESERVAR','El-Misti'); ?>"></input>

						</div>  
					</div><!--caps2 END -->
					<input type="hidden" name="titulo" 			 id="titulo_modal"				value="">
		        	<input type="hidden" name="product_id" 		 id="product_id_modal" 			value="">
		        	<input type="hidden" name="hotel_id" 		 id="hotel_id_modal" 			value="">
		        	<input type="hidden" name="username" 		 id="username_modal" 			value="">
		        	<input type="hidden" name="password" 		 id="password_modal" 			value="">
		        	<input type="hidden" name="preco_mini_hotel" id="preco_mini_hotel_modal"  	value="">
				</form>
				
					<hr class="division-hr2"><!--DIVISÃO -->

					<div class="col-lg-6 col-sm-6 col-xs-6 col-lg-6-boxslidecustom nums-box1">

						<h3><?php _e('Ligação do Brasil','El-Misti'); ?></h3>
						<div class="col-lg-12 num-boxr">
				            <p>+55 21 2246-1070</p>
				            <p>+55 21 2547-2661</p>
			        	</div>  

					</div>
					<div class="col-lg-6 col-sm-6 col-xs-6 col-lg-6-boxslidecustom nums-box2 filet">

						<h3><?php _e('Ligação do Brasil','El-Misti'); ?></h3>
						<div class="col-lg-12">
				            <p class="p-fontbig">0800 020 2661</p>
				            <a href="mailto:info@elmistihostels.com" class="mail-boxreserva"><?php _e('CONTACTO E-MAIL','El-Misti'); ?></a>
			        	</div> 

					</div>

					<hr class="division-hr2"><!-- DIVISÃO -->

					<div class="col-lg-12 col-lg-12-boxslidecustom">
						<div class="col-lg-9">
							<p class="p-boxslide-footer"><?php _e('Mais números / Números Internacionais','El-Misti'); ?>
				<?php _e('De segunda à sexta de 10 às 20 hs.','El-Misti'); ?>
                <?php _e('Sábados e Domingos de 10 às 18 hs.','El-Misti'); ?></p>
						</div> 
					</div>

				</div><!-- RESERVA2 END -->
		
			</div>		
		</div>
	</div>
</div>
<!-- End Modal -->

<script type="text/javascript">
	<!--
		
var dropdown_categories_modal = document.getElementById("cat_modal");

function onCatChangeModal() {

	if ( dropdown_categories_modal.options[dropdown_categories_modal.selectedIndex].value > 0 ) {

		var categoria = dropdown_categories_modal.options[dropdown_categories_modal.selectedIndex].text;

		if (categoria === "Búzios"){ categoria = "buzios"; }

		var dados = { categoria: categoria, acao: "categoria" };

		$.ajax({
			type: 'POST',
			dataType: 'json',
			//url: 'http://www.elmistihostels.com/ajax-home',	
			url: 'ajax-home',	
			async: true,
			data: dados,
			success: function(response){

				$('#hotel_modal').empty(); 

				$('#hotel_modal').append('<option value="0">Hostel</option>');
                             
                  $.each(response, function (index, item) {

                  	$('#hotel_modal').append( $('<option></option>').val(response[index].id).html(response[index].title) );
			        
			     });
                             
			}
		});
	}
}

dropdown_categories_modal.onchange = onCatChangeModal;



var dropdown_hotel_modal = document.getElementById("hotel_modal");

function onHotelChangeModal() {

	
	if ( dropdown_hotel_modal.options[dropdown_hotel_modal.selectedIndex].value > 0 ) {


		var post_id = dropdown_hotel_modal.options[dropdown_hotel_modal.selectedIndex].value;

		var dados = { post_id: post_id, acao: "hotel" };

		
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: 'ajax-home',	
			async: true,
			data: dados,
			success: function(response){



				$('#product_id_modal').val(response.post_id);
				$('#titulo_modal').val(response.title);
				$('#hotel_id_modal').val(response.id_mini_hotel);
				$('#username_modal').val(response.username);
				$('#password_modal').val(response.password);
				$('#preco_mini_hotel_modal').val(response.preco_mini_hotel);
				             
			}
		});

	}

}

dropdown_hotel_modal.onchange = onHotelChangeModal;


-->
</script>