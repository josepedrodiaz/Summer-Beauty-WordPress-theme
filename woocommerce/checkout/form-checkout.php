<script type="text/javascript">
	
	// $(document).ready(function() {
	// 	$('#billing_company_field').remove();	
	// });

</script>

<style type="text/css">

	.checkout {
		background: #ffffff !important;
	}

	#checkout .woocommerce form.checkout .col-lg-12 {
		background: #ffffff;
	}

	.input-text { 
		border:1px solid #555555 !important;
		border-radius: 0px !important;
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

	.showlogin {
		color: #fff;
		font-weight: 100;
		font-family: arial;
		text-shadow: 0 0 0;
		font-size: 11px;
	}

	.lg4 {
		padding-left: 0 !important;
		background-color: transparent !important;
	}

	.lg8 {
		padding-right: 0 !important;
	}

	.lg12 {
		padding-left: 0 !important;
		padding-right: 0 !important;
	}

	#payment{background-color: transparent !important;}

	.container_left{
		width: 100%;
		background: none repeat scroll 0 0 #EFEFEF; /* color de fondo */
	    overflow: hidden;
	    position: relative;
	    float: left;
	    padding: 0 20px 0 20px;
	    margin-bottom: 20px;

	}

	.container_left:before {
	    background: none repeat scroll 0 0 #666666; /* color de esquina */
	    border-color: #FFFFFF #FFFFFF #666666 #666666; /* color de borde */
	    border-style: solid;
	    border-width: 0 25px 25px 0;
	    content: "";
	    display: block;
	    position: absolute;
	    right: 0;
	    top: 0;
	    width: 0;
	}

	.container_left p{
		width: 100%;
		border-top: 1px solid rgba(0,0,0,.1);
		padding-top: 10px;
		color: #666666;
		font-family: Arial;
	}

	.container_left2{
		width: 100%;
		background: none repeat scroll 0 0 #EFEFEF; /* color de fondo */
	    overflow: hidden;
	    position: relative;
	    float: left;
	    padding: 0 20px 0 20px;
	    margin-bottom: 20px;

	}

	.container_left2:before {
	    background: none repeat scroll 0 0 #666666; /* color de esquina */
	    border-color: #FFFFFF #FFFFFF #666666 #666666; /* color de borde */
	    border-style: solid;
	    border-width: 0 25px 25px 0;
	    content: "";
	    display: block;
	    position: absolute;
	    right: 0;
	    top: 0;
	    width: 0;
	}
	/*
	.container_left2 p{
		width: 100%;
		border-top: 1px solid rgba(0,0,0,.1);
		padding-top: 10px;
		color: #666666;
		font-family: Arial;
	}
	*/

	#order_review_heading{
		font-family: nexa_lightregular;
		color: #666666;
		text-transform: uppercase;
	}

	#order_review{
		background-color: transparent !important;
		margin-top: 0 !important;
		padding-top: 0 !important;
		padding-left: 0 !important;
		color: #666666;
	}

	.shop_table tfoot .cart-subtotal th, td{
		font-family: Arial;
		font-weight: normal !important;
	}

	.order-total{
		font-family: Arial;
		border-bottom: 1px solid rgba(0,0,0,.1) !important;
	}
	.order-total th{
		text-transform: uppercase !important;
	}

	.shop_table thead{display: none !important;}

	/*.cart_item{display: none !important;}*/

	.shop_table thead tr th{
		padding-left: 0 !important;
	}

	.shop_table tbody tr td{
		padding-left: 0 !important;
	}

	.shop_table tfoot tr th, td{
		padding-left: 0 !important;
	}

	#payment ul li label{
		color: #666666;
		font-family: Arial;
		font-weight: normal;
	}

	.woocommerce-billing-fields h3{display: none !important;}

	.woocommerce-billing-fields p label{
		text-transform: uppercase !important;
		color: #666666;
	}

	.woocommerce-billing-fields input{
		border: 1px #aaaaaa solid !important;
	}

	#order_comments{border: 1px #aaaaaa solid !important;}

	/*#place_order{
		background-image: none !important;
		background-color: #666666 !important;
		width: 280px !important;
		margin-right: 0 !important;
		text-shadow: none !important;
	}*/

	.woocommerce .woocommerce-info {
		background: #D1D1D2;
		border-top: 0px !important;
		border-radius: 0px;
		background-color: #D10A11 !important;
		color: #ffffff !important;
		font-size: 14px !important;
		font-weight: 100 !important;
		font-family: arial !important;
		text-shadow: none !important;
		margin-left: 0 !important;
		padding-left: 15px !important;
	}

	.woocommerce .woocommerce-info a{
		padding-left: 0px !important;
		font-weight: normal !important;
		font-style: italic !important;
		font-size: 14px !important;
		font-family: arial !important;
		text-shadow: none !important;
	}

	.woocommerce .woocommerce-info a:hover{
		text-decoration: underline;
	}

	.overlay-loading{ opacity: 0.3; pointer-events: none;}
	.msg_processando{ position: absolute; padding: 0 15px; width: 60%; height: 50%;} 
	.gif-loader{ width: 50px; position: absolute; top: 50%; left: 45%;}
	

</style>

<?php
/**
 * Checkout Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

?>

<div class="title1"><?php _e('FAÇA SUA RESERVA','El-Misti'); ?></div>

<br>

<!-- <div id="msg_processando" class="msg_processando" >
	<img src="<?php bloginfo('template_url') ?>/images/ajax-loader.gif" alt="Loading" title="Processando..." class="gif-loader">
</div> -->

<!-- JÁ É CADASTRADO [INI] -->
<!-- <div class="link_cadastro"> -->
	<?php
		wc_print_notices();
		do_action( 'woocommerce_before_checkout_form', $checkout );

		// If checkout registration is disabled and not logged in, the user cannot checkout
		if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
			echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
			return;
		}

		// filter hook for include new pages inside the payment method
		$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() );
	?>
<!-- </div> -->
<!-- JÁ É CADASTRADO [FIM] -->

<form name="checkout" method="post" class="checkout" action="<?php echo esc_url( $get_checkout_url ); ?>">

	<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>


		<!-- CONTAINER MAIN [INI] -->
		<div class="col2-set col-lg-12 lg12" id="customer_details">

			<!-- BOX LEFT [INI] -->
			<div class="col-lg-4 lg4 col-md-12 youorderbox">

				<!-- BOX SEU PEDIDO [INI] -->
				<div class="container_left">
					<?php do_action( 'woocommerce_checkout_after_customer_details' );?>
					<h3 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>
					<!-- <p>EL MIST Rio / 2 hospedes<br>de 05/11/2014 a 06/11/2014</p> -->
					<?php do_action( 'woocommerce_checkout_order_review' ); ?>
				</div>
				<!-- BOX SEU PEDIDO [FIM] -->

				<!-- BOX FORMA DE PGTO [INI] -->
				<div class="container_left2">

					<h3 id="order_review_heading"><?php _e('COMO GOSTARIA <br> DE PAGAR?','El-Misti'); ?></h3>

					<?php do_action( 'woocommerce_review_order_before_payment' ); ?>

					<div id="payment">
						<?php if ( WC()->cart->needs_payment() ) : ?>
						<ul class="payment_methods methods">
							<?php
								$available_gateways = WC()->payment_gateways->get_available_payment_gateways();
								if ( ! empty( $available_gateways ) ) {

									// Chosen Method
									if ( isset( WC()->session->chosen_payment_method ) && isset( $available_gateways[ WC()->session->chosen_payment_method ] ) ) {
										$available_gateways[ WC()->session->chosen_payment_method ]->set_current();
									} elseif ( isset( $available_gateways[ get_option( 'woocommerce_default_gateway' ) ] ) ) {
										$available_gateways[ get_option( 'woocommerce_default_gateway' ) ]->set_current();
									} else {
										current( $available_gateways )->set_current();
									}

									foreach ( $available_gateways as $gateway ) {
										?>
										<li class="payment_method_<?php echo $gateway->id; ?>">
											<input id="payment_method_<?php echo $gateway->id; ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $gateway->chosen, true ); ?> data-order_button_text="<?php echo esc_attr( $gateway->order_button_text ); ?>" />
											<label for="payment_method_<?php echo $gateway->id; ?>"><?php echo $gateway->get_title(); ?> <?php echo $gateway->get_icon(); ?></label>
											<?php
												if ( $gateway->has_fields() || $gateway->get_description() ) :
													echo '<div class="payment_box payment_method_' . $gateway->id . '" ' . ( $gateway->chosen ? '' : 'style="display:none;"' ) . '>';
													$gateway->payment_fields();
													echo '</div>';
												endif;
											?>
										</li>
										<?php
									}
								} else {

									if ( ! WC()->customer->get_country() )
										$no_gateways_message = __( 'Please fill in your details above to see available payment methods.', 'woocommerce' );
									else
										$no_gateways_message = __( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' );

									echo '<p>' . apply_filters( 'woocommerce_no_available_payment_methods_message', $no_gateways_message ) . '</p>';

								}
							?>
						</ul>
						<?php endif; ?>
						<div class="clear"></div>

					</div>

					<?php do_action( 'woocommerce_review_order_after_payment' ); ?>

				</div>
				<!-- BOX FORMA DE PGTO [FIM] -->

			</div>
			<!-- BOX LEFT [FIM] -->



			<!-- <div class="col-lg-5 col-md-12 payment">

			</div> -->

			<!-- BOX RIGHT [INI] -->
			<div class="col-lg-8 lg8 col-md-12 dtcobranca">

				<?php do_action( 'woocommerce_checkout_billing' ); ?>

				<?php do_action( 'woocommerce_checkout_shipping' ); ?>

				<div class="form-row place-order">

					<noscript><?php _e( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ); ?><br/><input type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php _e( 'Update totals', 'woocommerce' ); ?>" /></noscript>

					<?php wp_nonce_field( 'woocommerce-process_checkout' ); ?>

					<?php do_action( 'woocommerce_review_order_before_submit' ); ?>

					<?php
					$order_button_text = apply_filters( 'woocommerce_order_button_text', __( 'RESERVAR AGORA', 'El-Misti' ) );

					echo apply_filters( 'woocommerce_order_button_html', '<input type="submit" class="btn btn-boxslide-custom" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '" />' );
					?>

					<?php if ( wc_get_page_id( 'terms' ) > 0 && apply_filters( 'woocommerce_checkout_show_terms', true ) ) { 
						$terms_is_checked = apply_filters( 'woocommerce_terms_is_checked_default', isset( $_POST['terms'] ) );
						?>
						<p class="form-row terms">
							<label for="terms" class="checkbox"><?php printf( __( 'I&rsquo;ve read and accept the <a href="%s" target="_blank">terms &amp; conditions</a>', 'woocommerce' ), esc_url( get_permalink( wc_get_page_id( 'terms' ) ) ) ); ?></label>
							<input type="checkbox" class="input-checkbox" name="terms" <?php checked( $terms_is_checked, true ); ?> id="terms" />
						</p>
					<?php } ?>

					<?php do_action( 'woocommerce_review_order_after_submit' ); ?>

				</div>

			</div>

			<div class="col-lg-12 col-md-12 infadic">
				<?php //do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
		
		</div>
		<!-- CONTAINER MAIN [FIM] -->

	<?php endif; ?>
	
	
		
</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

