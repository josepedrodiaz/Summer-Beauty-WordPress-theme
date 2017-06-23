<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Template Name: PAGE HOME AJAX
 *
 */

	//header("Access-Control-Allow-Origin: *");
	$http_origin = $_SERVER['HTTP_ORIGIN'];

	if ($http_origin == "https://test.elmistihostels.com/" || 
		$http_origin == "http://test.elmistihostels.com/" || 
		$http_origin == "https://www.elmistihostels.com/" || 
		$http_origin == "http://www.elmistihostels.com/" || 
		$http_origin == "https://hostels.elmistihostels.com/" ||
		$http_origin == "http://hostels.elmistihostels.com/"||
		$http_origin == "https://hostel.elmistihostels.com/" ||
		$http_origin == "http://hostel.elmistihostels.com/"||
		$http_origin == "https://auberges.elmistihostels.com/" ||
		$http_origin == "http://auberges.elmistihostels.com/"||
		$http_origin == "http://herberge.elmistihostels.com/"||
		$http_origin == "http://herberge.elmistihostels.com/")
	{  
	    header("Access-Control-Allow-Origin: $http_origin");
	}

		$acao = $_POST['acao'];


		switch ($acao) {
			case 'categoria':
			//////////////////////////////////////////////////////////////////////////////////////////////////
				$categoria = $_POST['categoria'];

				$args=array('post_type' => 'product', 'product_cat' => "$categoria");

				//print_r($args);

				$my_query = new WP_Query($args);

				$my_array = array();
				
				if ($my_query->have_posts()) : 
				    while ($my_query->have_posts()) : $my_query->the_post(); 
				        array_push( $my_array, array("id" => get_the_ID(), "title" => get_the_title(get_the_ID()) ) );
				    endwhile;
				endif;

				echo json_encode($my_array);
				break;
			//////////////////////////////////////////////////////////////////////////////////////////////////

			case 'hotel':

				$post_id = $_POST['post_id'];				

				$title = get_the_title($post_id);
				$id_mini_hotel = get_post_meta($post_id, 'id_mini_hotel',true);
				$username = get_post_meta($post_id, 'usuario',true);
				$password = get_post_meta($post_id, 'senha',true);
				$preco_mini_hotel = get_post_meta($post_id, 'preco_mini_hotel',true);

				$my_array = array(
									"post_id" 			=> $post_id,
									"title"				=> $title,
									"id_mini_hotel" 	=> $id_mini_hotel,
									"username" 			=> $username,
									"password" 			=> $password,
									"preco_mini_hotel" 	=> $preco_mini_hotel
								);
				
				echo json_encode($my_array);
				

				break;
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////
			default:
				echo "default";
				break;
		}

		
	

?>