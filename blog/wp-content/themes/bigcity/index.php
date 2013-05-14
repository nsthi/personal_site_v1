<?php include (TEMPLATEPATH . '/header_blog.php'); ?>  
<div id="container">  
<div id="content" class="left">  
  
<?php get_template_part( 'loop', 'index' ); ?>  
</div><!-- #content -->  
<div id="sidebar_right">  
<?php get_sidebar(); ?>  
</div>  
<?php SEO_pager() ?>  
</div><!-- #container -->  
  
<?php  
if (get_option_tree('footer_slide', ''))   
{  get_footer();}  
else{include (TEMPLATEPATH . '/footer2.php'); }  
?>  
