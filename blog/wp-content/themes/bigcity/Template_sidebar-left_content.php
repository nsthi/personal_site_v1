<?php  
/**  
* Template Name: Left sidebar   
**/  
?>  
  
<?php include (TEMPLATEPATH . '/header2.php'); ?>  
<h1 class="entry-title"><?php the_title(); ?></h1>  
<div class="title_box_shadow"></div>  
  
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