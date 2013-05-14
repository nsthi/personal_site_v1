<?php { ?>
    <style type="text/css">
        body {
            background-color: <?php get_option_tree('bg_color', '', true); ?>;
            background-image: url('<?php get_option_tree('bg_image', '', true); ?>');
			background-repeat: <?php get_option_tree('bg_repeat', '', true); ?>;
			color: <?php get_option_tree('body_text_color', '', true); ?>;
        }
		#background_pattern {
			background: url('<?php get_option_tree('sec_bg', '', true); ?>');
		}
		.entry-content, #map_frame, #slider_home, .widget-container, .portfolio-item, .portfolio-item-two-container, .portfolio-item-three-container, .portfolio-item-four-container, #recent_post_slider{
			background: <?php get_option_tree('content_bg', '', true); ?>;
		}
		.entry-content, #map_frame, #slider_home, .widget-container, .portfolio-item, .portfolio-item-two-container, .portfolio-item-three-container, .portfolio-item-four-container, #recent_post_slider{
			<?php
			$content_image = get_option_tree('content_image', '');
			if($content_image){
			?>
			background-image: url('<?php get_option_tree('content_image', '', true); ?>');
			background-repeat: <?php get_option_tree('content_bg_repeat', '', true); ?>;
			<?php } else {?>
			background-image: url("images/css/entry_bg.jpg") repeat scroll 0 0 #F6F6F6;
			<?php }?>
		}
		#recent_post_slider, .entry-content, #slider_home, .widget-container, #map_frame, .portfolio-item, .portfolio-item-two-container, .portfolio-item-three-container, .portfolio-item-four-container{
			<?php
			$content_border = get_option_tree('content_border', '');
			if($content_border){
			?>
			border: 1px solid <?php get_option_tree('content_border', '', true) ?>;
			<?php } else {?>
			border: 1px solid #f6f6f6;
			<?php }?>
		}
		.widget-area ul li ul li{
			<?php
			$content_border = get_option_tree('content_border', '');
			if($content_border){
			?>
			border-bottom: 1px solid <?php get_option_tree('content_border', '', true) ?>;
			<?php } else {?>
			border-bottom: 1px solid #FOFOFO;
			<?php }?>
		}
		.widget-area ul li ul li:hover, .widget_recent_comments .recentcomments:hover{
			background-color:<?php get_option_tree('sidebar_widget', '', true); ?>;
		}
		
		h1.entry-title, h1.post-entry-title, .reply a:hover, .reply_b a:hover, #navigation-block ul li.current-menu-item  a, #header-widget-area .widget_nav_menu  ul li.current-menu-item  a, .more-link, .nav-next a:hover, .nav-previous a:hover, input[type="submit"]:hover, .button-nav li a:hover, .generic-button a:hover, input[type='button']:hover, .su-fancy-link-white{
			background-color: <?php get_option_tree('heading_background', '', true); ?>;
		}
		
		#primary .xoxo li .widget-title, .entry-utility, #navigation-block ul li a:hover, #header-widget-area .widget_nav_menu ul li a:hover, #header-widget-area .widget_nav_menu ul li.current-menu-item  ul li a:hover, .more-link:hover, .nav-next a, .nav-previous a, input[type="submit"], input[type='button'], .su-fancy-link-white:hover, .portfolio-item-text h3, .portfolio-item-text-two h3, .portfolio-item-text-three h3, .portfolio-item-text-four h3, #navigation-block ul li.current-menu-item  ul li a:hover, ul.button-nav li.current a {
		background-color: <?php get_option_tree('widget_color', '', true); ?>;
		}
		
		#authorarea{
		<?php
			$widget_color = get_option_tree('widget_color', '');
			if($widget_color){
			?> border-top: 3px solid <?php get_option_tree('widget_color', '', true); ?>; 
			<?php } else {?>
			border-top: 3px solid #000; 
			<?php }?>		
		}
		
		.pagerbox a:hover{
			background:<?php get_option_tree('widget_color', '', true); ?>; 
			<?php
			$widget_color = get_option_tree('widget_color', '');
			if($widget_color){
			?> border: 1px solid <?php get_option_tree('widget_color', '', true); ?>; 
			<?php } else {?>
			border: 1px solid #000; 
			<?php }?>
		}
			
		.pagerbox .current{
			background:<?php get_option_tree('heading_background', '', true); ?>; 
			<?php
			$heading_background = get_option_tree('heading_background', '');
			if($heading_background){
			?> border: 1px solid <?php get_option_tree('heading_background', '', true); ?>; 
			<?php } else {?>
			border: 1px solid #940000; 
			<?php }?>		
		}
		
		a{ color: <?php get_option_tree('link_color', '', true); ?>;}
		a:hover { color: <?php get_option_tree('link_hover', '', true); ?>; }

        h1 { font-size: <?php get_option_tree('h1', '', true); ?>; }
        h2 { font-size: <?php get_option_tree('h2', '', true); ?>; }
        h3 { font-size: <?php get_option_tree('h3', '', true); ?>; }
        h4 { font-size: <?php get_option_tree('h4', '', true); ?>; }
        h5 { font-size: <?php get_option_tree('h5', '', true); ?>; }
        h6 { font-size: <?php get_option_tree('h6', '', true); ?>; }
		
		h1.post-entry-title a, #primary .xoxo li .widget-title, .entry-utility, .entry-utility a, #navigation-block .current-menu-item a, h1.entry-title, .portfolio-item-text h3 a, .portfolio-item-text-two h3 a, .portfolio-item-text-three h3 a, .portfolio-item-text-four h3 a, .more-link, .more-link:hover, input[type="submit"], input[type="submit"]:hover{
		color: <?php get_option_tree('content_heading', '', true); ?>;
		
		}
		#container h1,#container h2,#container h3,#container h4,#container h5,#container h6, .su-service-title, 
		h1 a,h2 a,h3 a,h4 a,h5 a,h6 a,.recent_post-title a,.details{
		color: <?php get_option_tree('heading_color', '', true); ?>;
		}
		
		#navigation-block ul li ul{background-color:<?php get_option_tree('sub_bg', '', true); ?>; }
        #content, #sidebar, .widget-area { font-size: <?php get_option_tree('main_f', '', true); ?>; }
		
		#navigation-block ul li { font-size:<?php get_option_tree('nav_size', '', true); ?>; line-height:<?php get_option_tree('nav_size', '', true); ?>}
		#navigation-block ul li a,#navigation-block ul li ul li a, #header-widget-area .widget_nav_menu ul li a, #navigation-block ul li.current-menu-item  ul li a, #header-widget-area .widget_nav_menu ul li.current-menu-item  ul li a, .widget-area  .widget_nav_menu ul li a { color: <?php get_option_tree('nav_color', '', true); ?>;}
		#navigation-block ul li a:hover,#navigation-block ul li ul li a:hover, #header-widget-area .widget_nav_menu ul li a:hover, #header-widget-area .widget_nav_menu ul li.current-menu-item  ul li a:hover, #header-widget-area .widget_nav_menu ul li ul li a:hover, #navigation-block ul li.current-menu-item  ul li a:hover  { color: <?php get_option_tree('nav_hover', '', true); ?>; }
		
        #footer-widget-area .widget-area { width: <?php get_option_tree('footer_col', '', true); ?>;}

        #copyrights-area p, #logo_small {
        color: <?php get_option_tree('footer_copy_color', '', true); ?>;
        }
        #copyrights-area p a {
        color: <?php get_option_tree('footer_copy_a_color', '', true); ?>;
        }
		#footer-widget-area, #footer-widget-area .widget-area ul li ul li a {
			color: <?php get_option_tree('footer_content_color', '', true); ?>;
		}
		#footer-widget-area .widget-area ul li ul li a:hover{
			color: <?php get_option_tree('footer_hover', '', true); ?>;
		}
		#footer-widget-area .widget-area ul h3{
			color: <?php get_option_tree('footer_heading_color', '', true); ?>;
		}
		#footer-widget-area .widget-area ul li ul li {
			<?php
				$footer_bottom = get_option_tree('footer_bottom', '');
				if($footer_bottom){
			?>
			border-bottom: 1px solid <?php get_option_tree('footer_bottom', '', true) ?>;
			<?php } else {?>
			border-bottom: 1px solid #444;
			<?php }?>
		}
		
		#footer_copy {
		margin-left: <?php get_option_tree('footer_position', '', true); ?>;
		}
		#footer_content,#footer {
		background-color: <?php get_option_tree('footer_color', '', true); ?>;
		}
		cufon canvas{
		margin-top:<?php get_option_tree('cufon_pos', '', true); ?>; 
		}
		#header-widget-area .widget_search input{
		background: <?php get_option_tree('search_bg', '', true); ?>;
		color:<?php get_option_tree('search_text', '', true); ?>;
		}
		
    </style>

<?php } ?>