<?php


	// pego o array com os dados da reserva para gerar o xml de alteração dos dados do cliente
     	$dados_xml = $woocommerce->session->get("booking_data");

if( isset($order->id) && isset($dados_xml["hotel_id"]) && isset($dados_xml["arrival"]) && isset($dados_xml["departure"]) ){


		// inicio do log
		$fp = fopen('logs/book/'.$order->id."-".date("Y-m-d").'.txt', 'a');
	        fwrite($fp, "Iniciando montagem do XML para reserva no mini hotel.");

	        fwrite($fp, PHP_EOL);

			fclose($fp);


		//ignora as mensagens de erro deconfiguração do curl
		
		ini_set('display_errors', '1');


	      	// Adiciona notas ao pedido

	      	$data_ini = explode("-", $dados_xml["arrival"]);
	      	$data_ini = $data_ini[2]."-".$data_ini[1]."-".$data_ini[0];

	      	$data_fim = explode("-", $dados_xml["departure"]);
	      	$data_fim = $data_fim[2]."-".$data_fim[1]."-".$data_fim[0];

	  //     	$order_notes = "Período: " . $data_ini . " a " . $data_fim;
			// $order_notes .= " Hóspedes: " . $dados_xml["adults"] . " - " . $dados_xml["RoomTypeID"];
			// $order->add_order_note("Dados da hospedagem:" . PHP_EOL . $order_notes);

			// update_post_meta( $order->id, '_cf_arrival', 	$data_ini);
			// update_post_meta( $order->id, '_cf_departure', 	$data_fim);
			// update_post_meta( $order->id, '_cf_guests', 	$dados_xml["adults"]);
			// update_post_meta( $order->id, '_cf_room_type', 	$dados_xml["RoomTypeID"]);

	      	$booking_id = time();
	      	$createDateTime = date('d/m/Y', time()); 

	      	// MONTAGEM DO XML COM OS DADOS DO CLIENTE 
	      	// PARA ATUALIZAR O SISTEMA MINI-HOTEL 

	      	$xml = '<?xml version="1.0" encoding="UTF-8"?> ' . PHP_EOL;
	        $xml = $xml . '<Bookings>'. PHP_EOL;
	        
	          $xml = $xml . '<Authentication userName="ilantestuser" password="ilanpass" /> '. PHP_EOL;
	          $xml = $xml . '<Hotel id="'. $dados_xml["hotel_id"] . '" />';
	          $xml = $xml . '<Booking id="'.$booking_id .'" type="BOOK" createDateTime="' . $createDateTime .'" source="EM" >'. PHP_EOL;

	          if($dados_xml["PrivateRoom"] == "true"){

	          	$xml = $xml . '   <RoomStay roomTypeID="' .  $dados_xml["RoomTypeID"] . '" ratePlanID="'. $dados_xml["RatePlanID"] . '" roomTypeName="" >'. PHP_EOL;
	          	$xml = $xml . '     <StayDate arrival="' . $dados_xml["arrival"] . '"  departure="' . $dados_xml["departure"] . '" />'. PHP_EOL;
	          	$xml = $xml . '     <RoomCount NumberOfUnits="1" />'. PHP_EOL;
	          	$xml = $xml . '     <GuestCount adult="' . $dados_xml["adults"] . '" child="'. $dados_xml["child"]  .'" baby="' . $dados_xml["babies"]  .'" />'. PHP_EOL;
	          	$xml = $xml . '     <PerDayRates CurrencyCode="ILS">'. PHP_EOL;
	          	$xml = $xml . '       <PerDayRate stayDate="" baseRate="" /> '. PHP_EOL;
	          	$xml = $xml . '       <PerDayRate stayDate="" baseRate="" /> '. PHP_EOL;
	          	$xml = $xml . '       <PerDayRate stayDate="" baseRate="" /> '. PHP_EOL;
	          	$xml = $xml . '     </PerDayRates>'. PHP_EOL;
	          	$xml = $xml . '     <Total AmountAfterTaxes="' .$dados_xml["amount"] .'" CurrencyCode="BRL" />'. PHP_EOL;
	          	$xml = $xml . '     <GuestNames>'. PHP_EOL;
	          	$xml = $xml . '       <Name givenName="' . $order->billing_first_name  .'" surname="'. $order->billing_last_name .'" />'. PHP_EOL;
	          	$xml = $xml . '     </GuestNames>'. PHP_EOL; 
	          	$xml = $xml . '   </RoomStay>'. PHP_EOL;

	          }else{

	          	$valor_unitario = $dados_xml["amount"]*1;
	          	$valor_unitario = $valor_unitario / $dados_xml["adults"];

	          	for ($i=1; $i<=$dados_xml["adults"]; $i++) {

		          	$xml = $xml . '   <RoomStay roomTypeID="' .  $dados_xml["RoomTypeID"] . '" ratePlanID="'. $dados_xml["RatePlanID"] . '" roomTypeName="" >'. PHP_EOL;
		          	$xml = $xml . '     <StayDate arrival="' . $dados_xml["arrival"] . '"  departure="' . $dados_xml["departure"] . '" />'. PHP_EOL;
		          	$xml = $xml . '     <RoomCount NumberOfUnits="1" />'. PHP_EOL;
		          	$xml = $xml . '     <GuestCount adult="1" child="'. $dados_xml["child"]  .'" baby="' . $dados_xml["babies"]  .'" />'. PHP_EOL;
		          	$xml = $xml . '     <PerDayRates CurrencyCode="ILS">'. PHP_EOL;
		          	$xml = $xml . '       <PerDayRate stayDate="" baseRate="" /> '. PHP_EOL;
		          	$xml = $xml . '       <PerDayRate stayDate="" baseRate="" /> '. PHP_EOL;
		          	$xml = $xml . '       <PerDayRate stayDate="" baseRate="" /> '. PHP_EOL;
		          	$xml = $xml . '     </PerDayRates>'. PHP_EOL;
		          	$xml = $xml . '     <Total AmountAfterTaxes="' .$valor_unitario .'" CurrencyCode="BRL" />'. PHP_EOL;
		          	$xml = $xml . '     <GuestNames>'. PHP_EOL;
		          	$xml = $xml . '       <Name givenName="' . $order->billing_first_name  .'" surname="'. $order->billing_last_name .'" />'. PHP_EOL;
		          	$xml = $xml . '     </GuestNames>'. PHP_EOL; 
		          	$xml = $xml . '   </RoomStay>'. PHP_EOL;
		         }

	          }

	          $xml = $xml . '   <PrimaryGuest>'. PHP_EOL;
	          $xml = $xml . '     <Name givenName="'. $order->billing_first_name .'" surname="' . $order->billing_last_name .'" />'. PHP_EOL;
	          //$xml = $xml . '     <Address Street="" Zip="" City="" />';
	          $xml = $xml . '     <Address Street="'. $order->billing_address_1 .'" Zip="'. $order->billing_postcode .'" City="'. $order->billing_city .'" />'. PHP_EOL;
	          $xml = $xml . '     <Country CountryName="'. $dados_xml["country_name"] .'" iso2="" iso3="" />'. PHP_EOL;
	          $xml = $xml . '     <Language iso2="" />'. PHP_EOL;
	          $xml = $xml . '     <Email>' . $order->billing_email . ' </Email>'. PHP_EOL;
	          $xml = $xml . '     <Phone>' . $order->billing_phone . ' </Phone>'. PHP_EOL;
	          $xml = $xml . '     <Fax></Fax>'. PHP_EOL;
	          $xml = $xml . '     <CreditCard Type="" Number="" NameOnCard="" Expirationdate="" />'. PHP_EOL;
	          $xml = $xml . '   </PrimaryGuest>'. PHP_EOL;

	          $xml = $xml . '   <Remarks>' . $dados_xml["remarks"] . " www.elmistihostels.com \n" . $order->payment_method_title .  '</Remarks>'. PHP_EOL;

	          $xml = $xml . '   <ResGlobalInfo>'. PHP_EOL;
	          $xml = $xml . '     <Timespan arrival="" departure="" />'. PHP_EOL;
	          $xml = $xml . '     <Total AmountAfterTaxes="' .$dados_xml["amount"] .'" CurrencyCode="ILS" />'. PHP_EOL;
	          $xml = $xml . '   </ResGlobalInfo>'. PHP_EOL;

	          $xml = $xml . '</Booking>'. PHP_EOL;

	        $xml = $xml . '</Bookings>';


	        $fp = fopen('logs/book/'.$order->id."-".date("Y-m-d").'.txt', 'a');
	        fwrite($fp, $xml);

	        fwrite($fp, PHP_EOL);

			fclose($fp);


	       
	       $url = "http://api.minihotelpms.com/GDS";

	        

		$ch = curl_init($url);

		// set your options     
		curl_setopt($ch, CURLOPT_MUTE, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); //ssl stuff
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml; charset=utf-8'));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		// your return response
		$output = curl_exec($ch); 

		$fp = fopen('logs/orders.txt', 'a');
		$data = date("Y-m-d H:i:s") .";" . $order->id . ":" . $dados_xml["hotel_id"] . ";" . $dados_xml["arrival"] . ";" . $dados_xml["departure"];

		echo " <script>console.log('" . $data ."');</script>  ";

		fwrite($fp, $data. PHP_EOL);
		fclose($fp);

		$fp = fopen('logs/mini-hotel-log.txt', 'a');

		fwrite($fp, "ORDER_ID: " . $order->id . PHP_EOL);
		fwrite($fp, $output);
		fwrite($fp, PHP_EOL);

		fclose($fp);

		
		//Verifica se houve erro na reserva 
		$strpos = strpos($output, "ERR");
		if(strlen($strpos) > 0){


			add_filter( 'wp_mail_content_type', 'set_html_content_type' );

			$admin_email = get_option( 'admin_email' );

			$headers = 'From: El Misti Hostels <info@elmistihostels.com>' . "\r\n";
			$message = "Ocorreu um error ao realizar a reserva no mini-hotel <br>";
			$message .= "ORDER ID: " . $order->id;
			$message .= "<br>Error code: $output";

			wp_mail( $admin_email, 'Erro ao realizar reserva no mini-hotel', $message, $headers );

			// Reset content-type to avoid conflicts -- http://core.trac.wordpress.org/ticket/23578
			remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

		}else{

			// pausa de 2 segundos
		    sleep(2);  		
				 
		 	$xml=simplexml_load_string($output);

		    $booking_id;
		    $resnumber;

		 	foreach($xml->children() as $child){

		          if($child->getName() == "BookingConfirmNumbers") {

		            foreach($child->children() as $child2){


		                if($child2->getName() == "BookingConfirmNumber"){

		                  //Fazer um cast para string para não dar erro na sessao
		                  $booking_id = (String)$child2["bookingID"];
		                  $resnumber = (String)$child2["resnumber"];

		                  //echo'BookingID: ' . $booking_id;
		                  //echo "<br>";
		                  //echo 'ResNumber: ' . $resnumber;
		                }
		              
		          }
		        }

		      }


			$tamanho = strlen($resnumber);

			switch($tamanho){

				case "1":
					$resnumber = "07000000".$resnumber;
					break;

				case "2":
					$resnumber = "0700000".$resnumber;
					break;

				case "3":
					$resnumber = "070000".$resnumber;
					break;

				case "4":
					$resnumber = "07000".$resnumber;
					break;

				case "5":
					$resnumber = "0700".$resnumber;
					break;

				case "6":
					$resnumber = "070".$resnumber;
					break;

				case "7":
					$resnumber = "07".$resnumber;
					break;

			}


			$xml = '<?xml version="1.0" encoding="UTF-8"?> ';

			$xml .= '<UpdateBookingInfoRQ TimeStamp="2014-04-19T21:51:15" Version="1.1" Target="Production" EchoToken="ok">';
			$xml .= '	<Authentication Username="ilantestuser" Password="ilanpass" /> ';
			$xml .= '	<Hotel id="' . $dados_xml["hotel_id"] . '" /> ';
			$xml .= '	<Bookings> ';
			$xml .= '		<Booking MiniHotelBookingID="' . $resnumber .'" PortalBookingID="' . $order->id . '" /> ';
			$xml .= '	</Bookings> ';
			$xml .= '</UpdateBookingInfoRQ> ';

			$fp = fopen('logs/mini-hotel-update-log.txt', 'a');

			fwrite($fp, "ORDER_ID: " . $order->id . PHP_EOL);
			fwrite($fp, "XML: " . $xml);
			fwrite($fp, PHP_EOL);

			fclose($fp);

			
			//create your curl handler     
			$ch = curl_init($url);

			// set your options     
			curl_setopt($ch, CURLOPT_MUTE, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); //ssl stuff
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml; charset=utf-8'));
			curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);



			// your return response
			$output = curl_exec($ch); 

			$fp = fopen('logs/mini-hotel-update-log.txt', 'a');

			fwrite($fp, "Mini hotel Response: " . $output);
			fwrite($fp, PHP_EOL);

			fclose($fp);

			// echo "<br><br>RETURN XML BookingID: ";
			// print_r($output);

			

		}



}else{

			$fp = fopen('logs/error-log.txt', 'a');

			fwrite($fp, date("Y-m-d H:i:s") . " Falha na verificação de dados (inc-update-booking.php)");
			fwrite($fp, PHP_EOL);

			fclose($fp);

}


	

	function set_html_content_type() {
		return 'text/html';
	}


?>