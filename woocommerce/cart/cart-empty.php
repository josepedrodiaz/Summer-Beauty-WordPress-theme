<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

wc_print_notices();

?>

<p class="cart-empty"><?php _e( 'Você ainda não tem reservas.', 'woocommerce' ) ?></p>

<?php do_action( 'woocommerce_cart_is_empty' ); ?>


<p class="return-to-shop"><a class="button wc-backward" href="#" onclick="history.go(-1);event.preventDefault();">Voltar</a></p>

<!-- <p class="return-to-shop"><a class="button wc-backward" href="<?php bloginfo('home'); ?>">Voltar</a></p> -->