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
		<div class="col-lg-6 col-lg-6-boxslidecustom box1-reservahostel">
		<form action="http://www.elmistihostels.com/check_availability" method="post">
			<h3><?php _e('Data de Chegada','El-Misti'); ?></h3>
			<div class="col-lg-12">
	            
                <div class='input-group date'>
                    <input type='text' name="data_ini" id="checkindate" class="form-control" data-date-format="dd/mm/yyyy" placeholder="Check-In" required>
                </div>
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

		</div>

		<div class="col-lg-6 col-lg-6-boxslidecustom box2-reservahostel">
			<h3><?php _e('Data de Saída','El-Misti'); ?></h3>
			<div class="col-lg-12">
	            
                <div class='input-group date'>
                    <input type='text' name="data_fim" id="checkoutdate" class="form-control dpd2a" data-date-format="dd/mm/yyyy" placeholder="Check-Out" required>
                </div>
	            <input type="submit" class="btn btn-boxslide-custom" value="<?php _e('RESERVAR','El-Misti'); ?>"></input>
        	</div>
        	<input type="hidden" name="product_id" value="<?php echo $idhostel; ?>">
        	<input type="hidden" name="hotel_id" value="<?php echo get_post_meta($idhostel, 'id_mini_hotel',true) ?>">
        	<input type="hidden" name="username" value="<?php echo get_post_meta($idhostel, 'usuario',true) ?>">
        	
        	<input type="hidden" name="preco_mini_hotel" value="<?php echo get_post_meta($idhostel, 'preco_mini_hotel',true) ?>">

        	<input type="hidden" name="titulo" value="<?php the_title(); ?>">
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
	            <p class="p-boxslide-footer"><?php _e('Mais números / Números Internacionais','El-Misti'); ?>
				<?php _e('De segunda à sexta de 10 às 20 hs.','El-Misti'); ?>
                <?php _e('Sábados e Domingos de 10 às 18 hs.','El-Misti'); ?></p>
        	</div> 

		</div>
		
	</div>
</div>
<!-- end form slide -->