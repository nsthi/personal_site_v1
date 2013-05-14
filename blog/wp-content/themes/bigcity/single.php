<?php include (TEMPLATEPATH . '/header2.php'); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<h1 class="entry-title"><?php the_title(); ?></h1>
<div class="title_box_shadow"></div>
<?php endwhile; // end of the loop. ?>

<div id="container">
<div id="sidebar_right">
<?php get_sidebar(); ?>
</div>
<div id="content" class="left" >
<div class="entry-content">
<?php get_template_part( 'loop', 'single' ); ?>
<div style="clear:both"> </div>
</div>
</div><!-- #content -->
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
