<?php
/*
Template Name: PAGE check_availability
*/
?>

<?php


get_header();  

?>

<style type="text/css">

	.filterable {
	    margin-top: 15px;
	}
	.filterable .panel-heading .pull-right {
	    margin-top: -20px;
	}
	.filterable .filters input[disabled] {
	    background-color: transparent;
	    border: none;
	    cursor: auto;
	    box-shadow: none;
	    padding: 0;
	    height: auto;
	}
	.filterable .filters input[disabled]::-webkit-input-placeholder {
	    color: #333;
	}
	.filterable .filters input[disabled]::-moz-placeholder {
	    color: #333;
	}
	.filterable .filters input[disabled]:-ms-input-placeholder {
	    color: #333;
	}

	.panel-custom {
		border: 1px #666 solid;
		border-radius: 0;
		margin-bottom: 5px;
	}
	.panel-custom > .panel-heading{
		background-color: #555555;
		color: #fff;
		border-radius: 0;
	}
	.overlay-loading{ opacity: 0.3; pointer-events: none;}
	.msg_processando{ position: absolute; padding: 0 15px; width: 100%; height: 100%;} 
	.gif-loader{ width: 50px; position: absolute; top: 50%; left: 45%;}

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

	.title2{
			font-size: 14px;
   			font-weight: 600;
   			color: #666;
   			font-family: helvetica;
   		}

   		.descricao_search_reserva {
								border-width: 1px; 
								border-style: double; 
								border-color: #666; 
								padding: 5px;
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
		height: 100%;
		float: left;
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

	.table2 {
		width: 100%;
		margin-top: 10px;
	}

	.table2 thead{
		border: 1px #666666 solid;
		border-bottom: 0px;
		background-color: #666666;
		color: #fff;
		font-family: nexa_boldregular;
	}

	.table2 thead th{
		padding: 8px;
		text-align: center;
	}

	.table2 thead th:first-child{
		text-align: left;
	}	

	.table2 tbody tr td{
		border: 1px #666666 solid;
		padding: 8px;
		color: #666666;
		text-align: center;
	}

	.table2 tbody tr td:first-child{
		text-align: left;
	}

	.table2 button{
		/*background-color: transparent;
		font-weight: normal;
		font-style: italic;*/
	}

	.table2 button:hover{
		color: red;
	}


	@media screen and (max-width:960px){
		.container_left{display: none;}
		.container_right{width: 100%;}
	}


</style>

<script type="text/javascript">
	

	function processa(){

		$("#overlay").addClass("overlay-loading");
		$("#msg_processando").show();
	}

	function processa_cielo(){

		$("#overlay").addClass("overlay-loading");
		$("#msg_processando").show();

		//window.location.href = 'https://www.elmistihostels.com/carrinho';
		window.location.href = 'carrinho';

		return false;
	}

</script>

<?php

	
header('Content-Type: text/html; charset=UTF-8');

	global $woocommerce;


	if ( sizeof( $woocommerce->cart->cart_contents ) > 10 ) {
			?>
			
			<div class="clear"></div>
			<br><br><br>
			<div class="container">
				<div class="col-lg-5 col-custom-check">
					<h4><?php _e('Prezado cliente.','El-Misti'); ?>
                    	<br>
                        <?php _e('Existe uma pré reserva no carrinho.','El-Misti'); ?>
                        <br>
                        <?php _e('Por favor confirme ou cancele antes de realizar nova reserva.','El-Misti'); ?>
                        </h4>
					<a href="http://www.elmistihostels.com/carrinho">
						<input class="checkout-button button alt wc-forward" type="button" value="Ver Carrinho" name="proceed">
					</a>
				</div>
			</div>
			<br><br><br>
			<?php
        }else{

	
			require_once("model/book.php");
			require_once("model/room_type.php");
			require_once("model/room.php");


			// ============= formatação da data ============================
			$data_temp = explode('/', $_POST["data_ini"]);
			$data_temp = $data_temp[2].'-'.$data_temp[1].'-'.$data_temp[0];

			$data_ini = $data_temp;

			$data_temp = explode('/', $_POST["data_fim"]);
			$data_temp = $data_temp[2].'-'.$data_temp[1].'-'.$data_temp[0];

			$data_fim = $data_temp;
			//==============================================================

			
			error_reporting(E_ALL);
			ini_set('display_errors', '0');

			$hotel_id = get_post_meta($_POST["product_id"], 'id_mini_hotel',true);
			$username = get_post_meta($_POST["product_id"], 'usuario',true);
			$password = get_post_meta($_POST["product_id"], 'senha',true);
			$titulo = get_the_title($_POST["product_id"]);
			$teste_cielo = false;
			$woocommerce->session->set("teste_cielo", "false");


					// Rotina de teste para homologação da CIELO
					// Remover esta rotina após a homologação
					// 879 ==> LEME // 1246 ==> Copacabana // 877 = HOUSE // 1388 => Botafogo // 3481 
					if($_POST["product_id"] == '3481'){

						$teste_cielo = true;
						$woocommerce->session->set("teste_cielo", "true");
					}
					if($teste_cielo == true){
						//$teste_cielo = true;

						/////////////////////////////////////////////////////////////////////////
						// TESTE CIELO
						// /////////////////////////////////////////////////////////////////////


							$output='<?xml version="1.0" encoding="UTF-8"?>';
							$output.='	<AvailRaters>';
							$output.='		<Hotel id="mistitest" Name_h="" Name_e="" Currency="USD" /> ';
							$output.='			<DateRange from="'.$data_ini.'" to="'.$data_fim.'" />';
							$output.='			<Guests adults="'.$_POST["adults"].'" child="0" babies="0" /> ';
							// $output.='			<RoomType id="Dorm3" Name_h="Dormitorio 3" Name_e="Dormitorio 3">';
							// $output.='				<Inventory Allocation="8" maxavail="8" />';
							// $output.='				<price board="BB" boardDesc="Bed &amp; breakfast" value="2" /> ';
							// $output.='				<price board="RO" boardDesc="Room only" value="1" /> ';
							// $output.='			</RoomType>';
							$output.='			<RoomType id="Bbl" Name_h="Quarto doble" Name_e="">';
							$output.='				<Inventory Allocation="4" maxavail="4" />';
							$output.='				<price board="BB" boardDesc="Bed &amp; breakfast" value="1" /> ';
							$output.='			</RoomType>';
							$output.='	</AvailRaters>';

							$xml=simplexml_load_string($output);

							
							  // o Campo preco_mini_hotel = não
							  // preco do produto = R$ 1,00
							  $cielo_afiliacao = get_post_meta($_POST["product_id"], 'cielo_afiliacao',true);
							  $woocommerce->session->set("cielo_afiliacao",$cielo_afiliacao);
							  $cielo_chave     = get_post_meta($_POST["product_id"], 'cielo_chave',true);
							  $woocommerce->session->set("cielo_chave",$cielo_chave);

							  $woocommerce->session->set("adults",      $_POST["adults"]);
							  $woocommerce->session->set("arrival",     $_POST["data_ini"]);
                    		  $woocommerce->session->set("departure",   $_POST["data_fim"]);

							  

                    		  $woocommerce->cart->add_to_cart($_POST["product_id"],1);
							  if ( !sizeof( $woocommerce->cart->cart_contents ) > 0 ) {

							    //Adiciona ao carrinho
							    $woocommerce->cart->add_to_cart($_POST["product_id"],1);

							  }  


							/////////////////////////////////////////////////////////////////////////
							// FIM TESTE CIELO
							// /////////////////////////////////////////////////////////////////////


					}else{

						$input_xml = '<?xml version="1.0" encoding="UTF-8"?>
									<!-- Mini Hotel - Availability and Rates - Request -->
									<AvailRaterq xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
									<Authentication username="' . $username . '" password="'.$password.'" />
									<Hotel id="' . $hotel_id . '" Currency="USD"/>
									<DateRange from="' . $data_ini . '" to="'. $data_fim .'"/>
									<Guests adults="' . $_POST["adults"] . '" child="0" babies="0"/>
									<Prices rateCode="ALL">
									</Prices>
									</AvailRaterq>';
								
				

						$url = "http://api.minihotelpms.com/GDS";

						//echo htmlentities($input_xml);

						$fp = fopen('logs/xml_check_availability.txt', 'a');
				        fwrite($fp, $input_xml);

				        fwrite($fp, PHP_EOL);
				        fwrite($fp, PHP_EOL);

						fclose($fp);

								
						// create your curl handler     
						$ch = curl_init($url);

						// set your options     
						curl_setopt($ch, CURLOPT_MUTE, 1);
						curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); //ssl stuff
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml; charset=utf-8'));
						curl_setopt($ch, CURLOPT_POSTFIELDS, $input_xml);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

						// your return response
						$output = curl_exec($ch); 

						//print_r($output);

						$xml=simplexml_load_string($output);

					}


					if(!$xml){

						if(substr($output, 0,7) == "ERR 104"){

					?>

								<div class="clear"></div>
								<br><br><br>
								<div class="container">
									<div class="col-lg-5 col-custom-check">
										<h4><?php _e('Prezado cliente.','El-Misti'); ?><br> <?php echo $output  ?>.<br></h4>
										<?php //_e($output); ?>
										<center>
											<a class="button wc-backward btn-errorr" href="<?php bloginfo('home'); ?>"><?php _e('Por favor, tente novamente.','El-Misti'); ?></a>
										</center>
									</div>
								</div>
								<br><br><br>

							

						<?php }else{  ?>
						
						
						<div class="clear"></div>
						<br><br><br>
						<div class="container">
							<div class="col-lg-5 col-custom-check">
								<h4>
									<?php _e('Desculpe, Ocorreu um erro inesperado,','El-Misti'); ?> 															<br />
									<?php _e('mas você pode fazer sua reserva diretamente com nossa Central de Reservas.','El-Misti'); ?>
								</h4>
								<?php echo '<script>console.log("Erro mini hotel: ' . $output . '") </script>'; ?>
								<h4>
									<?php _e('Telefones:','El-Misti'); ?> 											<br />
									<?php _e('0800 020 2661  Gratuito no Brasil','El-Misti'); ?> 					<br />
									<?php _e('+55 (21) 2547 2661','El-Misti'); ?> 									<br />
									<?php _e('+55 (21) 2246 1070','El-Misti'); ?> 									<br />
									<?php _e('Email: info@elmistihostels.com','El-Misti'); ?> 						<br />
									<?php _e('WhatsApp: +55 21 9848 55 138','El-Misti'); ?> 						<br />
									<a href="http://elmistibookings.com/lz/chat.php" target="_blank">
										<?php _e('Chat online: http://elmistibookings.com/lz/chat.php','El-Misti') ?> 
									</a>
								</h4>
								<center>
									<a class="button wc-backward btn-errorr" href="#" onclick="history.go(-1);event.preventDefault();">
										<?php _e('Por favor, Tente outras datas ou outros locais.','El-Misti'); ?>
									</a>
								</center>
							</div>
						</div>
						<br><br><br>

						<?php

									
						}

					}else{

							
							$book = new Book();
							$room_types = array();
							$rooms = array();
							$rooms2 = array();
					
							foreach($xml->children() as $child){

								if($child->getName() == "Hotel") {

								  	$book->setHotel_id($child["id"]);
								  	$book->setHotel_name_h($child["Name_h"]);
								  	$book->setHotel_name_e($child["Name_e"]);
								  	$book->setHotel_currency($child["Currency"]);
								  	
								}
								if($child->getName() == "DateRange") {

								  	$book->setDate_range_from($child["from"]);
								  	$book->setDate_range_to($child["to"]);

								}
								if($child->getName() == "Guests"){

								  	$book->setAdults($child["adults"]);
								  	$book->setChild($child["child"]);
								  	$book->setBabies($child["babies"]);


								}
							  	
								if($child->getName() == "RoomType"){
									

								  	$room_type = new RoomType();

								  	$room_type->setRoom_id($child["id"]);
								  	$room_type->setRoom_name_h($child["Name_h"]);
								  	$room_type->setRoom_name_e($child["Name_e"]);

								  	foreach($child->children() as $child2){


									  	if($child2->getName() == "Inventory"){

									  		$room_type->setAllocation($child2["Allocation"]);
									  		$room_type->setMaxavail($child2["maxavail"]);
									  	}
									  	if($child2->getName() == "price"){

									  		$room = new Room();

									  		$room->setRoom_id($room_type->getRoom_id());
									  		$room->setBoard($child2["board"]);
									  		$room->setBoard_desc($child2["boardDesc"]);
									  		$room->setValue($child2["value"]);

									  		array_push($rooms,$room);
									  		
									  	}

									  		

									    //$room_type->setRooms($rooms);
									}
									
									 			  
									  array_push($room_types,$room_type);


								}
								//coloco o array de rooms no objeto book;
								$book->setRoom_type($room_types);
							}
						
						
					
							?>

							<div class="container" style="position: relative;">
						
						<div id="msg_processando" class="msg_processando" style="display: none;">
							<img src="<?php bloginfo('template_url') ?>/images/ajax-loader.gif" alt="Loading" title="Processando..." class="gif-loader">
			        	</div>

			        	<div class="title1"><?php _e('FAÇA SUA RESERVA','El-Misti'); ?></div>

			        	<!-- CONTAINER TABLE [INI] -->
			        	<div class="container_table">
							
							<!-- CONTAINER LEFT [INI] -->
							<div class="container_left">
								<?php

				      //   			$loop = new WP_Query( array( 
										//  'post_type' => 'banner_checkout',
										//  'meta_query' => array(array (
	 								// 		 						  'key' => 'banner_checkout_local', 'value'=>'Página Check Availability' 
										// 	 						 ) 
										//                        ) 
										// ) 
			       //             	 	);

								$loop = new WP_Query( array( 
										 'post_type' => 'banner_checkout',
										 'meta_query' => array(array (
	 										 						  'key' => 'banner_checkout_local', 'value'=>'pag_check_avail' 
											 						 ) 
										                       ) 
										) 
			                   	 	);

									while ( $loop->have_posts() ) : $loop->the_post();
									 
									  the_post_thumbnail();

									endwhile;

				        		?>
				        		
				        		
							</div>
							<!-- CONTAINER LEFT [FIM] -->

							<!-- CONTAINER RIGHT [INI] -->
							<div class="container_right">

								<!-- DESCRIPTION SEARCH [INI] -->
								<div class="descricao_search_reserva">
					        		<span class="title2"><?php echo strtoupper( $titulo ); ?> - <?php echo $_POST["data_ini"] . ' a ' . $_POST["data_fim"] ?> - 
					        			<?php echo $book->getAdults(); if($book->getAdults() == "1"){ echo " Hóspede";}else echo " Hóspedes"; ?> 
					        		</span>
					        	</div>
					        	<!-- DESCRIPTION SEARCH [FIM] -->

					        	<!-- TABLE RESULT [INI] -->
					        	<table class="table2">
					                <thead>
					                    <tr>
					                        <th style="width: 70%"><?php _e('QUARTO','El-Misti'); ?></th>
					                        <th><?php _e('PREÇO','El-Misti'); ?></th>
					                        <th></th>
					                    </tr>
					                </thead>
					                <tbody>

					                	<?php

					                		//pego o array de room_types
											$arrRt = $book->getRoom_type();
											$arrlength=count($arrRt);

											if($arrlength == 0){

												?>

												<tr>
													<td colspan="5">
														<h4>
															<?php _e('Prezado Cliente.','El-Misti'); ?> 															<br />
															<?php _e('Não há lugares disponíveis para a data selecionada.','El-Misti');  ?> 						<br />
															<?php _e('É possível que o motor de buscas não inclua parte da disponibilidade,','El-Misti'); ?> 		<br />
															<?php _e('por este motivo sugerimos que você tente reservar para o período selecionado','El-Misti'); ?> <br /> 
															<?php _e('diretamente com nossa Central de Reservas.','El-Misti'); ?>
														</h4>
													</td>
												</tr>
												<tr>
													<td colspan="5">
														<h4>
															<?php _e('Telefones:','El-Misti'); ?> 											<br />
															<?php _e('0800 020 2661  Gratuito no Brasil','El-Misti'); ?> 					<br />
															<?php _e('+55 (21) 2547 2661','El-Misti'); ?> 									<br />
															<?php _e('+55 (21) 2246 1070','El-Misti'); ?> 									<br />
															<?php _e('Email: info@elmistihostels.com','El-Misti'); ?> 						<br />
															<?php _e('WhatsApp: +55 21 9848 55 138','El-Misti'); ?> 						<br />
															<a href="http://elmistibookings.com/lz/chat.php" target="_blank">
																<?php _e('Chat online: http://elmistibookings.com/lz/chat.php','El-Misti') ?> 
															</a>
																		
														</h4>
														<a class="button wc-backward btn-errorr" href="#" onclick="history.go(-1);event.preventDefault();">
															<?php _e('Por favor, Tente outras datas ou outros locais.','El-Misti'); ?> 
														</a>
													</td>
												</tr>

											<?php

											}

											for($i=0;$i<$arrlength;$i++){

												//$rt = new RoomType();
												$rt = $arrRt[$i];

												$arrRoomlength=count($rooms);
							
												$arrRomms = array();
												
												for($j=0;$j<$arrRoomlength;$j++)
												{

													$r=$rooms[$j];

													if($rt->getRoom_id() == $r->getRoom_id()){

														if($teste_cielo == false){

															echo '<form action="/booking-processa" method="POST">' ."\n";
														}

														echo '	<input type="hidden" name="product_id" 		value="' . $_POST["product_id"] 		. '">' . "\n";
														echo '	<input type="hidden" name="username" 		value="' . $username 					. '">' . "\n";
														echo '	<input type="hidden" name="password" 		value="' . $password 					. '">' . "\n";
														echo '	<input type="hidden" name="hotel_id" 		value="' . $book->getHotel_id() 		. '">' . "\n";
														echo '	<input type="hidden" name="adults" 			value="' . $book->getAdults() 			. '">' . "\n";
														echo '	<input type="hidden" name="child" 			value="' . $book->getChild() 			. '">' . "\n";
														echo '	<input type="hidden" name="babies" 			value="' . $book->getBabies() 			. '">' . "\n";
														echo '	<input type="hidden" name="arrival" 		value="' . $book->getDate_range_from() 	. '">' . "\n";
														echo '	<input type="hidden" name="departure" 		value="' . $book->getDate_range_to()  	. '">' . "\n";

														echo '	<input type="hidden" name="RoomTypeID" 		value="' . $rt->getRoom_id() 			. '">' . "\n";
														echo '	<input type="hidden" name="RoomName" 		value="' . $rt->getRoom_name_h() . ' - ' . $rt->getRoom_name_e() . '">' . "\n";

														echo '	<input type="hidden" name="RatePlanID" 		value="' . $r->getBoard(). '">' . "\n";
														echo '	<input type="hidden" name="RoomTypeName" 	value="' . $r->getBoard_desc() . '">' . "\n";
														echo '	<input type="hidden" name="amount" 			value="' . $r->getValue()*$book->getAdults()  . '">' . "\n";

														echo '<tr>'."\n";
														echo '	<td>';
														echo $rt->getRoom_id() . " - " . $rt->getRoom_name_h(); if(trim($rt->getRoom_name_h()) != trim($rt->getRoom_name_e())) { echo ' - ' . $rt->getRoom_name_e(); } echo " - " . $r->getBoard_desc() . '</td>'."\n";
														echo '	<td>'."\n";
															 		$value = $r->getValue()*$book->getAdults();
														echo 		"R$ " . number_format($value, 2, ',', '');
														echo "	</td>";
														
														if($teste_cielo){
																echo '			<td><button id="btn_cielo" onClick="processa_cielo()" class="btn btn-boxslide-custom">'.__( 'RESERVAR AGORA', 'El-Misti' ).'</button></td>'."\n";
															}else
																echo '			<td><button onClick="processa()" class="btn btn-boxslide-custom">'.__( 'RESERVAR AGORA', 'El-Misti' ).'</button></td>'."\n";
														
														echo '</tr>'."\n";

														if(!$teste_cielo){
															echo '</form>'."\n";
														}

														array_push($arrRomms, $r);

													}

													$rt->setRooms($arrRomms);
													$arrRt[$i] = $rt;
													

												}
												$book->setRoom_type($arrRt);

											}
					                	?>
					                </tbody>
					            </table>
								<!-- TABLE RESULT [FIM] -->
								<p>* all prices are per person</p>

							</div>
							<!-- CONTAINER RIGHT [FIM] -->

						</div>
						<!-- CONTAINER TABLE [FIM] -->



			        	
			        	

			        	<br><br>

			        	<div class="right_frame1">

			        		
				        
			        	</div>
				</div>




				<?php } //else ?>

					


<?php

	} //Else
	
get_footer(); 

?>