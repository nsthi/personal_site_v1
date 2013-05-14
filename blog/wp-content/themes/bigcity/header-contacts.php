<!DOCTYPE html>  
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>  
<head>  
<?php $theme_options = get_option('option_tree'); ?>  
<!--[if ie]><meta content='IE=edge' http-equiv='X-UA-Compatible'/><![endif]-->  
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />  
  
<title><?php global $page, $paged; wp_title( '|', true, 'right' );  
	// Add the blog name.  
	bloginfo( 'name' );  
	// Add the blog description for the home/front page.  
	$site_description = get_bloginfo( 'description', 'display' );  
	if ( $site_description && ( is_home() || is_front_page() ) )  
		echo " | $site_description";  
	// Add a page number if necessary:  
	if ( $paged >= 2 || $page >= 2 )  
		echo ' | ' . sprintf( __( 'Page %s', 'meteor' ), max( $paged, $page ) );  
?></title>  
  
<link rel="profile" href="http://gmpg.org/xfn/11" />  
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />  
<!--[if IE 8]>  
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/ie8.css" media="screen" type="text/css" />  
<![endif]-->  
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />  
  
<?php  
		if ( is_singular() && get_option( 'thread_comments' ) )  
		wp_enqueue_script( 'comment-reply' );  
		wp_enqueue_script('custom_header', get_bloginfo('template_url') . '/scripts/header.js', array('jquery'));  
		wp_head();  
?>  
  
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"> </script>  
  
<script type="text/javascript">  
  var stockholm = new google.maps.LatLng(<?php get_option_tree('latitudes', '', true); ?>, <?php get_option_tree('longitudes', '', true); ?>);  
  var parliament = new google.maps.LatLng(<?php get_option_tree('latitudes', '', true); ?>, <?php get_option_tree('longitudes', '', true); ?>);  
  var marker;  
  var map;  
  
  function initialize() {  
    var mapOptions = {  
      zoom: <?php get_option_tree('zoom', '', true); ?>,  
      mapTypeId: google.maps.MapTypeId.<?php get_option_tree('map_type', '', true); ?>,  
      center: stockholm  
    };  
  
    map = new google.maps.Map(document.getElementById("map_canvas"),  
            mapOptions);  
            
    marker = new google.maps.Marker({  
      map:map,  
      draggable:true,  
      animation: google.maps.Animation.DROP,  
      position: parliament  
    });  
    google.maps.event.addListener(marker, 'click', toggleBounce);  
  }  
  
  function toggleBounce() {  
  
    if (marker.getAnimation() != null) {  
      marker.setAnimation(null);  
    } else {  
      marker.setAnimation(google.maps.Animation.BOUNCE);  
    }  
  }  
  
</script>  
<?php include 'var.php'; ?>  
  
  
</head>  
  
<body <?php body_class(); ?> onload="initialize()">  
<div id="background_pattern">  
<div id="background_light"></div>  
<div id="aligner">  
<!-- *******************************Leftcolumn********************************** -->  
<?php get_sidebar( 'header');	?>  
<div id="logo">  
<a href="<?php bloginfo('url'); ?>"><img src="<?php get_option_tree('logo', '', 'true'); ?>" alt=""/></a>  
</div><!--#logo-->  
<div id="navigation-block">  
<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>  
</div><!--#navigation_block-->  
<!-- *******************************Wrapper********************************** -->  
<div id="wrapper" class="hfeed">  
  
<div id="main">  
