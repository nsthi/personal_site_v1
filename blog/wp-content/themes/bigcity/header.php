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
<?php include 'var.php'; ?>  
  
</head>  
  
<body <?php body_class(); ?>>  
<div id="background_pattern">  
<div id="background_light"></div>  
<div id="aligner">  
  
<!-- *******************************Leftcolumn********************************** -->  
<?php get_sidebar('header');	?>  
<div id="logo">  
<a href="<?php bloginfo('url'); ?>"><img src="<?php get_option_tree('logo', '', 'true'); ?>" alt=""/></a>  
</div><!--#logo-->  
<div id="navigation-block">  
<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>  
</div><!--#navigation_block-->  
  
<!-- *******************************Wrapper********************************** -->  
<div id="wrapper" class="hfeed">  
	<?php if (get_post_meta($post->ID, 'myCustomImage', true)) { ?>  
	<div id="image_header">  
	<img src="<?php echo wp_get_attachment_url(get_post_meta($post->ID, 'myCustomImage', true)); ?> " alt="<?php bloginfo('name'); ?>" />  
	</div><!--#image_header-->  
	<?php } else { ?>  
	  
	<div id="slider_home">  
	<?php if (function_exists("easing_slider")){ easing_slider(); }; ?>   
	</div> <!--#slider_home-->  
	<?php } ?>   
  
	<div id="slider_box_shadow"></div>   
	  
  
<div id="main">  
