<?php  
/**  
* Template Name: Header + Right sidebar  
**/  
?>  
  
<?php get_header(); ?>  
  
<div id="container">  
<div id="content" class="left" >  
<?php get_template_part( 'loop', 'page' ); ?>  
<div id="content_box_shadow_small"></div>  
</div><!-- #content -->  
<div id="sidebar_right">  
<?php get_sidebar(); ?>  
</div>  
  
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