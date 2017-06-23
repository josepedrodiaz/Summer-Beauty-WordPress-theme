<?php 
/*
author: ANDRÉ VALLE - Web Developer Full Stack
agency: http://b4w.com.br

description document: HEAD SETUP INITIAL 

*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-5N8L9S');</script>
	<!-- End Google Tag Manager -->


	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
	<!-- Meta tags -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="El Misti Hostels" />

	<!-- Mobile viewport optimized: viewport -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	
	<!-- Favicon -->
    <link rel="shortcut icon" href="<?php bloginfo('template_url') ?>/favicon.png?v=2016">
  
   <!-- Disable phone detection links blue -->
    <meta name = "format-detection" content = "telephone=no">

    
	<!-- C S S -->
	    <!-- Bootstrap -->
	    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" media="screen">	    
	    <!-- Video.js -->
	    <link href="//vjs.zencdn.net/4.12/video-js.css" rel="stylesheet">
		<!-- Datepicker -->
	    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/datepicker.css">
	    
		<!-- El Misti -->
	    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/style.css?v2015">
	    <!-- El Misti md -->
	    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/md.css?v20170131"> 
	    <!-- El Misti xs -->
	    <link rel="stylesheet" media="(max-width: 768px)" href="<?php bloginfo('template_url') ?>/css/xs.css?v20170131" /> 	    <!-- El Misti lg -->
	    <link rel="stylesheet" media="(min-width: 1400px)" href="<?php bloginfo('template_url') ?>/css/lg.css" />
	    
	<!-- / C S S -->

    <!-- FB Open Graph -->
    <meta property="fb:app_id" content="1755838434699958">
	<meta property="og:url" content="http://www.elmistihostels.com/">
	<meta property="og:type" content="website">
	<meta property="og:title" content="El Misti Hostels">
	<meta property="og:image" content="http://www.elmistihostels.com/img/fb-og.png">
	<meta property="og:description" content="Enjoy, meet, explore.">
	<meta property="og:site_name" content="elmistihostels.com">
	<meta property="og:locale" content="pt_BR">
	<!-- Facebook: https://developers.facebook.com/docs/sharing/webmasters#markup -->
	<!-- Open Graph: http://ogp.me/ -->


	<title>
	<?php 
	    if( is_product() ){
	    	$title = get_post_meta($post->ID, 'page_title', true);
	        if( $title != ""){
	        	print get_post_meta($post->ID, 'page_title', true);
	        }else{
	        	print get_the_title ();
	        }
	    }else if ( is_front_page() ){
	    	print "El Misti Pousadas – Hostels Rio De Janeiro Buzios Ilha Grande";
	    }
	    else{
	        //bloginfo('name'); // this is the name of your website.
	        // use your code to display title in all other pages.
	  		wp_title('-', true, 'right'); 
	    }
    ?>
	</title>

	<?php 
	if( is_product() ){

	}

	wp_head(); 
	?>

</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5N8L9S"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->



<!-- formulario affix -->
<?php
    //include form de reserva affix scrolleable
    include("inc/formAffix.php");
?>

<?php
    //include Best Price Banner
    include("inc/bestPrice.php");
?>

<!-- Starts content -->	
	<div class="container-fluid">