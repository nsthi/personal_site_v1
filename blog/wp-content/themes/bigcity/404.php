<?php include (TEMPLATEPATH . '/header2.php'); ?>
<?php $title_404 = get_option_tree('title_404'); ?> 
<h1 class="entry-title" style="font-size:59px;"><?php _e( $title_404, 'meteor' ); ?></h1>
<div class="title_box_shadow"></div>

<div id="container">
<div id="content_full" >

<div id="post-0" class="post error404 not-found hentry">
<div class="entry-content">
<p><?php get_option_tree('message_404', '', true); ?></p>
<?php get_search_form(); ?>
</div><!-- .entry-content -->
</div><!-- #post-0 -->

</div><!-- #content -->

<div style="clear:both"> </div>
<div id="content_box_shadow"></div>

</div><!-- #container -->
<script type="text/javascript">
// focus on search field after it has loaded
document.getElementById('s') && document.getElementById('s').focus();
</script>
<?php get_footer(); ?>