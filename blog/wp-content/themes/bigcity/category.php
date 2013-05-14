<?php include (TEMPLATEPATH . '/header_blog.php'); ?><h1 class="entry-title"> <?php single_cat_title() ?></h1><div class="title_box_shadow"></div>
<div id="container"><div id="content" class="left" ><?php get_template_part( 'loop', 'index' ); ?></div><!-- #content --><div id="sidebar_right"><?php get_sidebar(); ?></div><!--#sidebar_right--><?php SEO_pager() ?></div><!-- #container -->
<?php
if (get_option_tree('footer_slide', '')) 
{  
	get_footer();}
else{	include (TEMPLATEPATH . '/footer2.php'); }
?>
