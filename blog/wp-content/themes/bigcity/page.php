<?php include (TEMPLATEPATH . '/header2.php'); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<h1 class="entry-title"><?php the_title(); ?></h1>
<div class="title_box_shadow"></div>
<?php endwhile; // end of the loop. ?>
<div id="container">
<div id="content_full" >

<div id="post-thumbnail">
<?php the_post_thumbnail('medium') ;?>
<?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?>
</div>
<?php get_template_part( 'loop', 'page' ); ?>
</div><!-- #content -->
<div id="content_box_shadow"></div>
</div><!-- #container -->

<?php
if (get_option_tree('footer_slide', '')) {get_footer();}
else {include (TEMPLATEPATH . '/footer2.php'); }
?>
