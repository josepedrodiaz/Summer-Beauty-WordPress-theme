<?php
/**
 * Template Name: Motor de busca externo
 *
 */
 ?>


<?php 

 header("Access-Control-Allow-Origin: *");

$args = array(
	'type'                     => 'product',
	'child_of'                 => 0,
	'parent'                   => '',
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'product_cat',
	'pad_counts'               => false 

); 


	$categories = get_categories($args);
	$arr_categories = array();

	foreach ($categories as $value) {
		array_push($arr_categories, array("term_id" => $value->term_id, "name" => $value->name ));
		# code...
	}

	echo json_encode($arr_categories);


?>
