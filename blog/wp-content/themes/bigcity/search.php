<?php include (TEMPLATEPATH . '/header2.php'); ?>
<div id="container">
<?php if ( have_posts() ) : ?>
<div id="post-0" class="post no-results not-found hentry">
</div><!-- #content -->
<?php SEO_pager() ?>

<?php if (get_option_tree('footer_slide', '')) 
include (TEMPLATEPATH . '/footer2.php'); 
?>