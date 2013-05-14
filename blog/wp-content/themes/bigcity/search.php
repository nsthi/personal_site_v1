<?php include (TEMPLATEPATH . '/header2.php'); ?><h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'BigCity' ), '<span>' . get_search_query() . '</span>' ); ?></h1><div class="title_box_shadow"></div>
<div id="container"><div id="content" class="left" >
<?php if ( have_posts() ) : ?><?php get_template_part( 'loop', 'search' ); ?><?php else : ?>
<div id="post-0" class="post no-results not-found hentry"><?php $search = get_option_tree('search'); ?> <div class="entry-content"><h1 class="pot-entry-title"><?php _e( $search, 'BigCity' ); ?></h1><p><?php get_option_tree('search_message', '', true); ?></p><?php get_search_form(); ?></div><!-- .entry-content --></div><!-- #post-0 --><?php endif; ?>
</div><!-- #content --><div id="sidebar_right"><?php get_sidebar(); ?></div><!--#sidebar_right-->
<?php SEO_pager() ?></div><!-- #container -->

<?php if (get_option_tree('footer_slide', '')) {  	get_footer();}else{
include (TEMPLATEPATH . '/footer2.php'); }
?>