<?php  
/**  
* Template Name: Right sidebar  
**/  
?>  
  
<?php include (TEMPLATEPATH . '/header2.php'); ?>  
<h1 class="entry-title"><?php the_title(); ?></h1>  
<div class="title_box_shadow"></div>  
  
<div id="container">  
<div id="content" class="left" >  
<?php get_template_part( 'loop', 'page' ); ?>  
<div id="content_box_shadow_small"></div>  
</div><!-- #content -->  
<div id="sidebar_right">  
<?php get_sidebar(); ?>  
</div><!--#sidebar_right-->  
  
<div style="clear:both"> </div>  
</div><!-- #container -->  
  
<?php  
if (get_option_tree('footer_slide', ''))   
{    
	get_footer();  
}  
else  
{  
	include (TEMPLATEPATH . '/footer2.php');   
}  
?>