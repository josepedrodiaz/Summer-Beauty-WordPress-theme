<?php

	//ignora as mensagens de erro deconfiguração do curl
	
	ini_set('display_errors', '0');
	
	
	// pego o array com os dados da reserva para gerar o xml de alteração dos dados do cliente
      	$dados_xml = $woocommerce->session->get("booking_data");

      	$booking_id = time();
      	$createDateTime = date('d/m/Y', time()); 

      	// MONTAGEM DO XML COM OS DADOS DO CLIENTE 
      	// PARA ATUALIZAR O SISTEMA MINI-HOTEL 

      	echo "Private: " . $dados_xml["PrivateRoom"];


      	$xml = '<?xml version="1.0" encoding="UTF-8"?> ';
        $xml = $xml . '<Bookings>';
        
          $xml = $xml . '<Authentication userName="ilantestuser" password="ilanpass" /> ';
          $xml = $xml . '<Hotel id="'. $dados_xml["hotel_id"] . '" />';
          $xml = $xml . '<Booking id="'.$booking_id .'" type="BOOK" createDateTime="' . $createDateTime .'" source="EM" >';

          for ($i=1; $i<=$dados_xml["adults"]; $i++) {

          	$xml = $xml . '   <RoomStay roomTypeID="' .  $dados_xml["RoomTypeID"] . '" ratePlanID="'. $dados_xml["RatePlanID"] . '" roomTypeName="" >';
          	$xml = $xml . '     <StayDate arrival="' . $dados_xml["arrival"] . '"  departure="' . $dados_xml["departure"] . '" />';
          	$xml = $xml . '     <RoomCount NumberOfUnits="1" />';
          	$xml = $xml . '     <GuestCount adult="1" child="'. $dados_xml["child"]  .'" baby="' . $dados_xml["babies"]  .'" />';
          	$xml = $xml . '     <PerDayRates CurrencyCode="ILS">';
          	$xml = $xml . '       <PerDayRate stayDate="" baseRate="" /> ';
          	$xml = $xml . '       <PerDayRate stayDate="" baseRate="" /> ';
          	$xml = $xml . '       <PerDayRate stayDate="" baseRate="" /> ';
          	$xml = $xml . '     </PerDayRates>';
          	$xml = $xml . '     <Total AmountAfterTaxes="' .$dados_xml["amount"] .'" CurrencyCode="BRL" />';
          	$xml = $xml . '     <GuestNames>';
          	$xml = $xml . '       <Name givenName="' . $order->billing_first_name  .'" surname="'. $order->billing_last_name .'" />';
          	$xml = $xml . '     </GuestNames>'; 
          	$xml = $xml . '   </RoomStay>';
          }


          $xml = $xml . '   <PrimaryGuest>';
          $xml = $xml . '     <Name givenName="'. $order->billing_first_name .'" surname="' . $order->billing_last_name .'" />';
          //$xml = $xml . '     <Address Street="" Zip="" City="" />';
          $xml = $xml . '     <Address Street="'. $order->billing_address_1 .'" Zip="'. $order->billing_postcode .'" City="'. $order->billing_city .'" />';
          $xml = $xml . '     <Country CountryName="'. $dados_xml["country_name"] .'" iso2="" iso3="" />';
          $xml = $xml . '     <Language iso2="" />';
          $xml = $xml . '     <Email>' . $order->billing_email . ' </Email>';
          $xml = $xml . '     <Phone>' . $order->billing_phone . ' </Phone>';
          $xml = $xml . '     <Fax></Fax>';
          $xml = $xml . '     <CreditCard Type="" Number="" NameOnCard="" Expirationdate="" />';
          $xml = $xml . '   </PrimaryGuest>';

          $xml = $xml . '   <Remarks>' . $dados_xml["remarks"] . " www.elmistihostels.com \n" . $order->payment_method_title .  '</Remarks>';

          $xml = $xml . '   <ResGlobalInfo>';
          $xml = $xml . '     <Timespan arrival="" departure="" />';
          $xml = $xml . '     <Total AmountAfterTaxes="' .$dados_xml["amount"] .'" CurrencyCode="ILS" />';
          $xml = $xml . '   </ResGlobalInfo>';

          $xml = $xml . '</Booking>';

        $xml = $xml . '</Bookings>';

        print_r($xml);

  //       $fp = fopen('logs/xml.txt', 'a');
  //       fwrite($fp, $xml);

  //       fwrite($fp, PHP_EOL);

		// fclose($fp);


       
 //       $url = "http://api.minihotelpms.com/GDS";

        

	// $ch = curl_init($url);

	// // set your options     
	// curl_setopt($ch, CURLOPT_MUTE, 1);
	// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); //ssl stuff
	// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	// curl_setopt($ch, CURLOPT_POST, 1);
	// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml; charset=utf-8'));
	// curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	// // your return response
	// $output = curl_exec($ch); 

	//echo "RETURN XML: ";

	// $fp = fopen('logs/orders.txt', 'a');
	// $data = date("Y-m-d H:i:s") .";" . $order->id . ":" . $dados_xml["hotel_id"] . ";" . $dados_xml["arrival"] . ";" . $dados_xml["departure"] . PHP_EOL;

	// fwrite($fp, $data);
	// fclose($fp);

	// $fp = fopen('logs/mini-hotel-log.txt', 'a');

	// fwrite($fp, "ORDER_ID: " . $order->id . PHP_EOL);
	// fwrite($fp, $output);
	// fwrite($fp, PHP_EOL);

	// fclose($fp);

	// //print_r($output);

	// echo '<script>';
	// echo "	console.log('Return XML: " . $output . "');";
	// echo '</script>';


	// // pausa de 2 segundos
 //    sleep(2);  
	

	/*
	echo $order->billing_first_name . "<br>";
	echo $order->billing_last_name . "<br>";
	echo $order->billing_email . "<br>";
	echo $order->billing_city . "<br>";
	echo $order->billing_postcode . "<br>";
	echo $order->billing_address_1 . "<br>";
	echo $order->billing_city . "<br>";
	echo $order->billing_phone . "<br>";

 	*/


 	// $xml=simplexml_load_string($output);
                        

  //   $booking_id;
  //   $resnumber;

 	// foreach($xml->children() as $child){

  //         if($child->getName() == "BookingConfirmNumbers") {

  //           foreach($child->children() as $child2){


  //               if($child2->getName() == "BookingConfirmNumber"){

  //                 //Fazer um cast para string para não dar erro na sessao
  //                 $booking_id = (String)$child2["bookingID"];
  //                 $resnumber = (String)$child2["resnumber"];

  //                 //echo'BookingID: ' . $booking_id;
  //                 //echo "<br>";
  //                 //echo 'ResNumber: ' . $resnumber;
  //               }

              
  //         }
  //       }

  //     }


	// $tamanho = strlen($resnumber);

	// switch($tamanho){

	// 	case "1":
	// 		$resnumber = "07000000".$resnumber;
	// 		break;

	// 	case "2":
	// 		$resnumber = "0700000".$resnumber;
	// 		break;

	// 	case "3":
	// 		$resnumber = "070000".$resnumber;
	// 		break;

	// 	case "4":
	// 		$resnumber = "07000".$resnumber;
	// 		break;

	// 	case "5":
	// 		$resnumber = "0700".$resnumber;
	// 		break;

	// 	case "6":
	// 		$resnumber = "070".$resnumber;
	// 		break;

	// 	case "7":
	// 		$resnumber = "07".$resnumber;
	// 		break;

	// }


	$xml = '<?xml version="1.0" encoding="UTF-8"?> ';

	// $xml .= '<UpdateBookingInfoRQ TimeStamp="2014-04-19T21:51:15" Version="1.1" Target="Production" EchoToken="ok">';
	// $xml .= '	<Authentication Username="ilantestuser" Password="ilanpass" /> ';
	// $xml .= '	<Hotel id="mistitest" /> ';
	// $xml .= '	<Bookings> ';
	// $xml .= '		<Booking MiniHotelBookingID="' . $resnumber .'" PortalBookingID="' . $order->id . '" /> ';
	// $xml .= '	</Bookings> ';
	// $xml .= '</UpdateBookingInfoRQ> ';

	
	// create your curl handler     
	// $ch = curl_init($url);

	// // set your options     
	// curl_setopt($ch, CURLOPT_MUTE, 1);
	// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); //ssl stuff
	// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	// curl_setopt($ch, CURLOPT_POST, 1);
	// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml; charset=utf-8'));
	// curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);



	// // your return response
	// $output = curl_exec($ch); 

	// echo "<br><br>RETURN XML BookingID: ";
	// print_r($output);

	
?>