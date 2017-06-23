<?php

function service_1(){
  return ' <div class="col-lg-3 col-sm-3 col-md-3 col-icons-service"><i class="icon-onda"></i><h3>' . __('PRÓXIMO PRAIA','El-Misti') . '</h3></div>';
}
add_shortcode('service1', 'service_1');

// shortcode -> [service1]


function service_2(){
  return ' <div class="col-lg-3 col-sm-3 col-md-3 col-icons-service"><i class="icon-bus"></i><h3>' . __('TRANSPORTE','El-Misti') . '</h3></div>';
}
add_shortcode('service2', 'service_2');

// shortcode -> [service2]


function service_3(){
  return ' <div class="col-lg-2 col-sm-2 col-md-2 col-icons-service"><i class="icon-wifi"></i><h3>' . __('WI-FI','El-Misti') . '</h3></div>';
}
add_shortcode('service3', 'service_3');

// shortcode -> [service3]


function service_4(){
  return ' <div class="col-lg-2 col-sm-2 col-md-2 col-icons-service"><i class="icon-block"></i><h3>' . __('COFRES','El-Misti') . '</h3></div>';
}
add_shortcode('service4', 'service_4');

// shortcode -> [service4]

function service_5(){
  return ' <div class="col-lg-2 col-sm-2 col-md-2 col-icons-service"><i class="icon-piscina"></i><h3>' . __('PISCINA','El-Misti') . '</h3></div>';
}
add_shortcode('service5', 'service_5');

// shortcode -> [service5]

function service_6(){
  return ' <div class="col-lg-2 col-sm-2 col-md-2 col-icons-service"><i class="icon-ar"></i><h3>' . __('A/C','El-Misti') . '</h3></div>';
}
add_shortcode('service6', 'service_6');

// shortcode -> [service6]

function service_7(){
  return ' <div class="col-lg-2 col-sm-2 col-md-2 col-icons-service"><i class="icon-cena"></i><h3>' . __('JANTAR','El-Misti') . '</h3></div>';
}
add_shortcode('service7', 'service_7');

// shortcode -> [service7]

function service_8(){
  return ' <div class="col-lg-2 col-sm-2 col-md-2 col-icons-service"><i class="icon-pisc"></i><h3>' . __('PISCINA','El-Misti') . '</h3></div>';
}
add_shortcode('service8', 'service_8');

// shortcode -> [service8]

function service_9(){
  return ' <div class="col-lg-3 col-sm-3 col-md-3 col-icons-service"><i class="icon-cafe"></i><h3>' . __('CAFÉ DA MANHÃ','El-Misti') . '</h3></div>';
}
add_shortcode('service9', 'service_9');

// shortcode -> [service9]

add_action( 'init', 'register_shortcodes');


//ICONS QUARTOS PRIVADOS
function service_privado( $atts ) {

  // Attributes
  extract( shortcode_atts(
    array(
      'text' => 'default',
      'icon' => 'iconp1',
    ), $atts )
  );

  // Code
return '<li class="li-shortcodes tooltip-privado" title="'. $text .'"><i class="'. $icon .'"></i></li>';
                                        
}
add_shortcode( 'serviceprivado', 'service_privado' );


//////////////////////////////////////////////////////////////////
// Add buttons to tinyMCE
//////////////////////////////////////////////////////////////////
add_action('init', 'add_button');
function add_button() { 
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') ) 
   { 
     add_filter('mce_external_plugins', 'add_plugin'); 
     add_filter('mce_buttons_3', 'register_button'); 
   } 
} 
 
function register_button($buttons) { 
   array_push($buttons, "service1", "service2", "service3", "service4", "service5", "service6", "serviceprivado"); 
   return $buttons; 
} 

function add_plugin($plugin_array) { 

   $plugin_array['service1'] = get_template_directory_uri().'/functions/sc/custom_buttons.js';
   $plugin_array['service2'] = get_template_directory_uri().'/functions/sc/custom_buttons.js';
   $plugin_array['service3'] = get_template_directory_uri().'/functions/sc/custom_buttons.js';
   $plugin_array['service4'] = get_template_directory_uri().'/functions/sc/custom_buttons.js';
   $plugin_array['service5'] = get_template_directory_uri().'/functions/sc/custom_buttons.js';
   $plugin_array['service6'] = get_template_directory_uri().'/functions/sc/custom_buttons.js';
   $plugin_array['serviceprivado'] = get_template_directory_uri().'/functions/sc/custom_buttons.js';
 
   return $plugin_array; 
}


/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Register a shortcode that creates a product categories dropdown list
 *
 * Use: [product_categories_dropdown orderby="title" count="0" hierarchical="0"]
 *
 */
//add_shortcode( 'product_categories_dropdown', 'woo_product_categories_dropdown' );
 
function woo_product_categories_dropdown( $atts ) {



    extract(shortcode_atts(array(
      'count'         => '0',
      'hierarchical'  => '0',
      'orderby'       => ''
      ), $atts));
    
    ob_start();
    
    $c = $count;
    $h = $hierarchical;
    $o = ( isset( $orderby ) && $orderby != '' ) ? $orderby : 'order';
      
    // Stuck with this until a fix for http://core.trac.wordpress.org/ticket/13258
    woocommerce_product_dropdown_categories( $c, $h, 0, $o );
   
    ?>
   <script type='text/javascript'>
    /* <![CDATA[ */
      $( "select.dropdown_product_cat" ).change(function() {
          var link = "<?php echo home_url(); ?>/?product_cat=" + $( ".dropdown_product_cat" ).val();
          window.location.href = link;
          //alert($( ".dropdown_product_cat" ).val());
      });
      $(".dropdown_product_cat option[value=0]").remove();

    /* ]]> */
    </script>
    <?php
    
    return ob_end_flush();
    
  }


  /* Exclude Category from Shop*/

  add_filter( 'get_terms', 'get_subcategory_terms', 10, 3 );

  function get_subcategory_terms( $terms, $taxonomies, $args ) {

    $new_terms = array();

    // if a product category and on the shop page
    if ( in_array( 'product_cat', $taxonomies ) && ! is_admin() && is_shop() || is_product_category() ) {

   // if ( in_array( 'product_cat', $taxonomies ) ){

      foreach ( $terms as $key => $term ) {


        // remove a categoria seguro do loop
        if ( ! in_array( $term->slug, array( 'seguro') ) ) {
          $new_terms[] = $term;
        }

      }

      $terms = $new_terms;
    }

    return $terms;
  }

     

//////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////
// FUNCOES DO MINI HOTEL
//////////////////////////////////////////////////////////////////////////////////////////////////


  // Campos personalizados para o woocommerce

/**
* Add the field to the checkout
**/


add_action('woocommerce_after_order_notes', 'my_custom_checkout_field');

function my_custom_checkout_field( $checkout ) {

  global $woocommerce;



  $dados_xml = $woocommerce->session->get("booking_data");

  $arrival = explode("-", $dados_xml["arrival"]);
  $arrival = $arrival[2]."-".$arrival[1]."-".$arrival[0];

  $departure = explode("-", $dados_xml["departure"]);
  $departure = $departure[2]."-".$departure[1]."-".$departure[0];


  echo '<div id="cf_arrival" style="display: none">';

  woocommerce_form_field( 'cf_arrival', array(
  'type' => 'text',
  'class' => array('my-field-class form-row-wide'),
  'placeholder' => __('Enter your Trade Account Number'),
  ), $arrival);

  echo '</div>';

  echo '<div id="cf_departure" style="display: none">';

  woocommerce_form_field( 'cf_departure', array(
  'type' => 'text',
  'class' => array('my-field-class form-row-wide'),
  ), $departure);

  echo '</div>';

  echo '<div id="cf_guests" style="display: none">';
  woocommerce_form_field( 'cf_guests', array(
  'type' => 'text',
  'class' => array('my-field-class form-row-wide'),
  ), $dados_xml["adults"]);

  echo '</div>';

  echo '<div id="cf_room_type" style="display: none">';

  woocommerce_form_field( 'cf_room_type', array(
  'type' => 'text',
  'class' => array('my-field-class form-row-wide'),
  ), $dados_xml["RoomTypeID"]);

  echo '</div>';



}

/**
* Process the checkout
**/
add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');

function my_custom_checkout_field_process() {
global $woocommerce;
}

/**
* Update the order meta with field value
**/
add_action('woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta', 10, 2);
function my_custom_checkout_field_update_order_meta( $order_id, $posted ) {
    if ( $_POST['cf_arrival'] ) {
        update_post_meta( $order_id, '_cf_arrival', esc_attr($_POST['cf_arrival']));
    }

    if ( $_POST['cf_departure'] ) {
        update_post_meta( $order_id, '_cf_departure', esc_attr($_POST['cf_departure']));
    }
    if ( $_POST['cf_guests'] ) {
        update_post_meta( $order_id, '_cf_guests', esc_attr($_POST['cf_guests']));
    }
    if ( $_POST['cf_room_type'] ) {
        update_post_meta( $order_id, '_cf_room_type', esc_attr($_POST['cf_room_type']));
    }
}


/**
* Display field value on the order edition page
**/
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 ); 

function my_custom_checkout_field_display_admin_order_meta($order){
  echo '<p><strong>'.__('Arrival').':</strong> <br>' . $order->cf_arrival. '</p>';
  echo '<p><strong>'.__('Departure').':</strong><br> ' . $order->cf_departure. '</p>';
  echo '<p><strong>'.__('Guests').':</strong><br> ' . $order->cf_guests. '</p>';
  echo '<p><strong>'.__('Room Type').':</strong> <br>' . $order->cf_room_type. '</p>';
}



// Campos adicionados no email do WooCommerce
add_filter('woocommerce_email_order_meta_keys', 'my_woocommerce_email_order_meta_keys');

function my_woocommerce_email_order_meta_keys( $keys ) {

  
  $keys['Arrival']   = '_cf_arrival';
  $keys['Departure'] = '_cf_departure';
  $keys['Guests']    = '_cf_guests';
  $keys['Room Type'] = '_cf_room_type';
  return $keys;
}




// Pega os dados do quarto e realiza a pre-reserva no mini-hotel
  function booking_processa(){    

        global $woocommerce;

        if ( sizeof( $woocommerce->cart->cart_contents ) > 0 ) {    ?>
            
            <div class="clear"></div>
            <br><br><br>
            <div class="container">
              <div class="col-lg-5 col-custom-check">
                <h4>Prezado cliente.<br> Existe uma pré reserva no carrinho.<br> Por favor confirme ou cancele antes de realizar nova reserva.</h4>
                <a href="http://www.elmistihostels.com/carrinho">
                  <input class="checkout-button button alt wc-forward" type="button" value="Ver Carrinho" name="proceed">
                </a>
              </div>
            </div>
            <br><br><br>
            
            <?php

            }else{

                    if(isset($_POST["product_id"])){

                       // Clear session variables
                        $woocommerce->session->set("adults",       "");
                        $woocommerce->session->set("product_id",   "");
                        $woocommerce->session->set("arrival",      "");
                        $woocommerce->session->set("departure",    "");
                        $woocommerce->session->set("booking_data", ""); 

                    // calculo a quantidade de dias de hospedagem 
                        $arrival = new DateTime($_POST["arrival"]);
                        $departure = new DateTime($_POST["departure"]);

                        $diarias = $arrival->diff($departure)->format("%a");
                        //=====================================================================


                        //calculo do preço da diaria
                        $valor_diaria = $_POST["amount"] / $diarias;

                        if($_POST["product_id"] == "3481"){

                            $valor_diaria = "1";

                        }

                        //jogo os valores no objeto session do woocommerce
                        $woocommerce->session->set("adults",      $_POST["adults"]);
                        $woocommerce->session->set("product_id",  $_POST["product_id"]);
                        $woocommerce->session->set("arrival",     $_POST["arrival"]);
                        $woocommerce->session->set("departure",   $_POST["departure"]);
                        $woocommerce->session->set("preco",       $valor_diaria);
                        // $woocommerce->session->set("booking_id",  $booking_id);
                        // $woocommerce->session->set("resnumber",   $resnumber);
                        // campos utilizados na página inc-update-booking.php
                        // para atualizar a reserva com os dados do cliente
                        $woocommerce->session->set("booking_data",$_POST); 


                        //pego o email de cadastro do PayPal
                        $email_paypal = get_post_meta($_POST["product_id"], 'email_paypal',true);
                        $woocommerce->session->set("email_paypal",$email_paypal);

                        //pego o email e token de cadastro do PagSeguro
                        $pag_seguro_email = get_post_meta($_POST["product_id"], 'pag_seguro_email',true);
                        $woocommerce->session->set("pag_seguro_email",$pag_seguro_email);
                        $pag_seguro_token = get_post_meta($_POST["product_id"], 'pag_seguro_token',true);
                        $woocommerce->session->set("pag_seguro_token",$pag_seguro_token);

                        //DADOS CIELO
                        //pego o email e token de cadastro do Cielo
                        $cielo_afiliacao = get_post_meta($_POST["product_id"], 'cielo_afiliacao',true);
                        $woocommerce->session->set("cielo_afiliacao",$cielo_afiliacao);
                        $cielo_chave = get_post_meta($_POST["product_id"], 'cielo_chave',true);
                        $woocommerce->session->set("cielo_chave",$cielo_chave);

                        //DADOS SHOPLINE
                        $shopline_cod_emp = get_post_meta($_POST["product_id"], 'shopline_cod_emp',true);
                        $woocommerce->session->set("shopline_cod_emp",$shopline_cod_emp);
                        $shopline_chave = get_post_meta($_POST["product_id"], 'shopline_chave',true);
                        $woocommerce->session->set("shopline_chave",$shopline_chave);

                        //Adiciona ao carrinho
                          $woocommerce->cart->add_to_cart($_POST["product_id"],$diarias);

                          //redireciona para o carrinho.
                          header("Location: carrinho");

                  }else{  ?>

                        <div class="clear"></div>
                        <br><br><br>
                        <div class="container">
                          <div class="col-lg-5 col-custom-check">
                            <h4>Prezado cliente.<br> Ocorreu um erro inesperado, por favor tente novamente.</h4>
                            <a class="button wc-backward btn-errorr" href="#" onclick="history.go(-1);event.preventDefault();">
                              <?php _e('Voltar.','El-Misti'); ?>
                            </a>
                          </div>
                        </div>
                        <br><br><br>

                <?php  }


                    

                }


              echo "<br>";

            echo "</div>";

}

      add_shortcode('booking_processa', 'booking_processa');
    //  booking_processa ///////////////////////////////////////////////



// Função criada para testar o pagamento pela cielo
function teste_cielo(){

?>

  <div class="container">
  <br />
   <div style="height: 373px; background-image: url('<?php echo bloginfo('template_url');?>/functions/sc/misti-rio.jpg');">
       
    </div>
    <div class="col-lg-5 col-custom-check">
        <h5>Preço: R$ 1,00 </h5>
          <a href="http://www.elmistihostels.com/carrinho">
            <input class="checkout-button button alt wc-forward" type="button" value="Adicionar e Ir para o Carrinho" name="proceed">
          </a>
         
      </div>
  </div>

<?php


  global $woocommerce;

  // 876 ==> misti rio
  // o Campo preco_mini_hotel = não
  // preco do produto = R$ 1,00
  $cielo_afiliacao = get_post_meta(876, 'cielo_afiliacao',true);
  $woocommerce->session->set("cielo_afiliacao",$cielo_afiliacao);
  $cielo_chave     = get_post_meta(876, 'cielo_chave',true);
  $woocommerce->session->set("cielo_chave",$cielo_chave);


  if ( !sizeof( $woocommerce->cart->cart_contents ) > 0 ) {

    //Adiciona ao carrinho
    $woocommerce->cart->add_to_cart(876,1);

  }  
  
      
  //redireciona para o carrinho.
  //header("Location: carrinho");
  

}

add_shortcode('teste_cielo', 'teste_cielo');
//  teste_cielo ///////////////////////////////////////////////

    
