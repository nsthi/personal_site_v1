<?php  
/**  
* Template Name: Header + Left sidebar  
**/  
?>  
  
<?php get_header(); ?>  
<div id="container">  <div id="sidebar_left">  <?php get_sidebar(); ?>  </div><!--#sidebar_left-->  
<div id="content" >  
<?php get_template_part( 'loop', 'page' ); ?>  
<div id="content_box_shadow_small"></div>  
</div><!-- #content -->  
 
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