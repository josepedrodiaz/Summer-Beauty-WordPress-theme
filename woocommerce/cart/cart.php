<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

$preco_mini_hotel ="";
?>


<style type="text/css">

	.cart-custom { border: 1px solid #555555 !important; border-radius: 0 !important; margin-bottom: 5px !important;}
	.cart-custom thead{	background-color: #555555 !important; }

	#carrinho .woocommerce form table a.remove {
		float: left;
		margin-top: -2px;	
	}

	.title1 {
   			font-size: 24px;
   			color: #D10A11;
   			font-weight: 600;
			border-top: 4px; 
			border-bottom: 4px;
			border-style: solid; 
			border-color: #D10A11; 
			margin-top: 20px; 
			padding-top: 5px;
			padding-bottom: 2px;
			font-family: helvetica;
		   }

	.left_frame {
		   			float: left;
					margin-top: 20px; 
					margin-right: 10px;
		   		}

	.right_frame { 
					margin-top: 20px; 
					padding-left: 345px;
				 }
	.right_frame input[type="submit"] { background: #D10A11 !important;	border: 0px; border-radius: 5px;}

	#cart-buttons {
					text-align: right;
				  }





	.container_table{
		width: 100%;
		margin-top: 15px;
		font-family: Arial;
		font-weight: bold;
		font-size: 12px;
	}

	.container_left{
		width: 28%;
		float: left;
		padding: 20px;
		background: none repeat scroll 0 0 #D10A11; /* color de fondo */
	    overflow: hidden;
	    position: relative;
	}

	.container_left:before {
	    background: none repeat scroll 0 0 #840812; /* color de esquina */
	    border-color: #FFFFFF #FFFFFF #840812 #840812; /* color de borde */
	    border-style: solid;
	    border-width: 0 25px 25px 0;
	    content: "";
	    display: block;
	    position: absolute;
	    right: 0;
	    top: 0;
	    width: 0;
	}

	.box{
		width: 100%;
	}

	.box_header h1{
		font-family: nexa_boldregular;
		font-size: 2.3em;
		color: #fff;
		margin: 0 0 15px 0;
	}
	.box_container{
		width: 100%;
		height: 80px;
		border-top: 1px #fff solid;
		border-bottom: 2px #fff solid;
		padding-top: 15px;
	}
	.box_container_left{
		width: 50%;
		float: left;
		font-family: Arial;
	}
	.box_container_left p{
		color: #fff;
		font-weight: normal;
		font-size: 11px;
		line-height: 2px;
	}
	.box_container_left h2{
		color: #FFCB00;
		font-weight: normal;
		font-size: 14px;
		line-height: 1px;
	}

	.box_container_right{
		width: 50%;
		float: left;
		font-family: Arial;
		border-left: 1px solid #fff;
		padding-left: 10px;
	}
	.box_container_right p{
		color: #fff;
		font-weight: normal;
		font-size: 11px;
		line-height: 2px;
	}
	.box_container_right h2{
		color: #FFCB00;
		font-weight: normal;
		font-size: 14px;
		line-height: 1px;
	}

	.box_footer {padding-top: 15px;}
	.box_footer p{
		font-family: Arial;
		font-size: 11px;
		color: #fff;
		font-weight: normal;
		line-height: 3px;
	}

	.container_left img{
		width: 100%;
		height: auto;
	}

	.container_right{
		width: 72%;
		height: 100%;
		padding-left: 2%;
		float: left;
	}

	.container_right p{
		font-weight: normal;
		font-style: italic;
		color: red;
		margin-top: 5px;
	}

	.cart {
		width: 100%;
	}

	.cart thead{
		border: 1px #666666 solid;
		border-bottom: 0px;
		background-color: #666666 !important;
		color: #fff;
		font-family: nexa_boldregular;
	}

	.cart thead th{
		padding: 8px;
		text-align: center;
	}

	.cart thead th:first-child{
		text-align: left;
	}	

	.cart tbody tr td{
		border: 1px #666666 solid;
		padding: 8px;
		color: #666666;
		text-align: center;
	}

	.cart tbody tr td:first-child{
		text-align: left;
	}

	#cart-buttons .button{
		margin-top: 10px;
		background: #D10A11 !important; 
		font-family: nexa_boldregular, Arial;
		font-weight: normal;
		border: 0;
		border-radius: 3px;
		text-shadow: none !important;
	}

	.btn{
		margin-top: 10px;
	}

	.cart button:hover{
		color: red;
	}


	@media screen and (max-width:960px){
		.container_left{display: none;}
		.container_right{width: 100%;}
	}

	@media screen and (max-width:1220px){
		.box_container_left h2{font-size: 10px;}
		.box_container_right h2{font-size: 10px;}
	}

	@media screen and (max-width:1008px){
		.box_header h1{font-size: 1.3em;}
		.box_container_left p{font-size: 9px;}
		.box_container_right p{font-size: 9px;}
		.box_container_right h2{font-size: 8px;}
		.box_container_left h2{font-size: 8px;}
		.box_footer p{font-size: 8px;}
	}


	.overlay-loading{ opacity: 0.3; pointer-events: none;}
	.msg_processando{ position: absolute; padding: 0 15px; width: 60%; height: 20%;} 
	.gif-loader{ width: 50px; position: absolute; top: 50%; left: 45%;}


</style>

<script>
	
	
	function processa(){

		var control = document.getElementById("proceed");
		control.style.visibility = "hidden";

		//$("#proceed").attr("disabled", "disabled");
	}
</script>

<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

$adults       = $woocommerce->session->get("adults");
$room_type_id = $woocommerce->session->get("booking_data"); 

?>


<div class="title1"><?php _e('FAÇA SUA RESERVA','El-Misti'); ?></div>



<div class="container_table">
	<!-- CONTAINER LEFT [INI] -->
	<div class="container_left">
		<div class="box">
			<div class="box_header">
				<h1><?php _e('PRECISA DE AJUDA','El-Misti'); ?></h1>
			</div>
			<div class="box_container">
				<div class="box_container_left">
					<p><?php _e('Ligando do Brasil','El-Misti'); ?></p>
					<h2>+55.21. 2547.2661</h2>
					<h2>+55.21. 2246.1070</h2>
				</div>
				<div class="box_container_right">
					<p><?php _e('Ligação Grátis','El-Misti'); ?></p>
					<h2>0800.020.2661</h2>
					<h2>CONTATO E-MAIL</h2>
				</div>
			</div>
			<div class="box_footer">
				<p><?php _e('Outros números / Números Internacionais','El-Misti'); ?></p>
				<p><?php _e('De segunda à sexta de 10 às 20hs.','El-Misti'); ?></p>
				<p><?php _e('Sábados e Domingos de 10 às 18hs','El-Misti'); ?>.</p>
			</div>
		</div>
	</div>
	<!-- CONTAINER LEFT [FIM] -->

	<!-- CONTAINER RIGHT [INI] -->
	<div class="container_right">

		<div id="msg_processando" class="msg_processando" style="display: none;">
			<img src="<?php bloginfo('template_url') ?>/images/ajax-loader.gif" alt="Loading" title="Processando..." class="gif-loader">
    	</div>

		<?php
			wc_print_notices();
			do_action( 'woocommerce_before_cart' );
		?>

		<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post" >

		<?php
			$cart_url = $_SERVER['HTTP_HOST'];
			

		?>

		<!-- <form action="<?=$cart_url?>" method="post" > -->

			<input type="hidden" id="url" value="<?=$cart_url?>">
			<?php do_action( 'woocommerce_before_cart_table' );  ?>

			<table class="cart" cellspacing="0">
				<thead>
					<tr>
						<!--<th class="product-remove">&nbsp;</th>-->
						<!-- <th class="product-thumbnail">&nbsp;</th> -->
						<th class="product-name" style="width: 45%;"><?php _e( 'Product', 'woocommerce' ); ?></th>
						<th class="product-price"><?php _e( 'Price', 'woocommerce' ); ?></th>
						<th class="product-quantity"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
						<th class="product-subtotal"><?php _e( 'Total', 'woocommerce' ); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php do_action( 'woocommerce_before_cart_contents' ); ?>

					<?php
						foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
							$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

							if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
								?>
								<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?> cart-item-custom">
									<!--
									<td class="product-remove">
										<?php
											//echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">&times;</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );
										?>
									</td>
									-->
									

									<!-- <td class="product-thumbnail">
										<?php
											// $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

											// if ( ! $_product->is_visible() )
											// 	echo $thumbnail;
											// else
											// 	printf( '<a href="%s">%s</a>', $_product->get_permalink(), $thumbnail );
										?>
									</td> -->

									<td class="product-name">
										<?php
											echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">&times;</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );
											if ( ! $_product->is_visible() )
												echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
											else
												echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', $_product->get_permalink(), $_product->get_title() ), $cart_item, $cart_item_key );

											// caso o produto seja do tipo hostel, pego o periodo da reserva para colocar na descrição
											$preco_mini_hotel = get_post_meta($cart_item['product_id'], 'preco_mini_hotel',true);
											if($preco_mini_hotel == "sim"){
											
												$arrival = new DateTime($woocommerce->session->get("arrival"));
												$departure = new DateTime($woocommerce->session->get("departure"));
												echo " / " . $arrival->format('d.m.Y') . " a " . $departure->format('d.m.Y') . " ";
												echo " / $adults ";
												if($adults == "1"){
													echo "Hóspede - ";
												}else
													echo "Hóspedes - ";

												echo $room_type_id['RoomTypeID'];
											}

											// Meta data
											echo WC()->cart->get_item_data( $cart_item );

				               				// Backorder notification
				               				if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
				               					echo '<p class="backorder_notification">' . __( 'Available on backorder', 'woocommerce' ) . '</p>';

										?>
									</td>

									<td class="product-price">
										<?php
											echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
										?>
									</td>

									<td class="product-quantity">
										<?php
											// se for = sim, desabilito os botoes + e -    
											$preco_mini_hotel = "sim"; //RETIRAR ESSA LINHA
							   				if($preco_mini_hotel == "sim"){
							    
							   					$product_quantity = sprintf( $cart_item['quantity'] . ' <input type="hidden" name="cart[%s][qty]" value="' . $cart_item['quantity'] .'" />', $cart_item_key );
							  				
							    			}else		
												if ( $_product->is_sold_individually() ) {
													$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
												} else {
													$product_quantity = woocommerce_quantity_input( array(
														'input_name'  => "cart[{$cart_item_key}][qty]",
														'input_value' => $cart_item['quantity'],
														'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
													), $_product, false );
												}

											echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
											
											//mostra a palavra dias caso o tipo de produto seja hostel
											if($preco_mini_hotel == "sim"){
											
												if ($product_quantity > 1 ){ echo " noites"; } else echo " noite"; 
											}
										?>
									</td>

									<td class="product-subtotal">
										<?php
											echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
										?>
									</td>
								</tr>
								<?php
							}
						}

						do_action( 'woocommerce_cart_contents' );
					?>
					
					<?php do_action( 'woocommerce_after_cart_contents' ); ?>

				</tbody>
	
			</table>


			<div id="cart-buttons">
				<?php if ( WC()->cart->coupons_enabled() ) { ?>
					<div class="coupon">

						<label for="coupon_code"><?php _e( 'Coupon', 'woocommerce' ); ?>:</label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php _e( 'Coupon code', 'woocommerce' ); ?>" /> <input type="submit" class="button alt" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'woocommerce' ); ?>" />

						<?php do_action('woocommerce_cart_coupon'); ?>

					</div>
				<?php } ?>

				<!-- <input type="submit" class="button" name="update_cart" value="<?php //_e( 'Update Cart', 'woocommerce' ); ?>" /> --> <input type="submit" class="btn btn-boxslide-custom" name="proceed" id="proceed" value="<?php _e( 'RESERVAR AGORA', 'El-Misti' ); ?>"  />

				<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>

				<?php wp_nonce_field( 'woocommerce-cart' ); ?>
			</div>

			<?php do_action( 'woocommerce_after_cart_table' ); ?>

		</form>

	</div>
	<!-- CONTAINER RIGHT [FIM] -->
</div>




<div class="cart-collaterals">

	<?php //do_action( 'woocommerce_cart_collaterals' ); ?>

	<?php //woocommerce_cart_totals(); ?>

	<?php //woocommerce_shipping_calculator(); ?>

</div> 

<?php do_action( 'woocommerce_after_cart' ); ?>

<script>

$('#proceed').click(function(event) {
	/* Act on the event */
	
	$("#overlay").addClass("overlay-loading");
	$("#msg_processando").show();

});

</script>