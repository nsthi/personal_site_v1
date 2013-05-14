<?php  
/**  
* Template Name: Header + Full width   
**/  
  
get_header(); ?>  
<div id="container" class="one-column">  
<div id="content_full" >  
  
<?php get_template_part( 'loop', 'page' ); ?>  
  
</div><!-- #content -->  
<div id="content_box_shadow"></div>  
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
