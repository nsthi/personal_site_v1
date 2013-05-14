<?php
/**
* Template Name: Portfolio two
**/
?>
<?php include (TEMPLATEPATH . '/header2.php'); ?>
<h1 class="entry-title portfolio-title"><?php the_title(); ?></h1>
<div class="title_box_shadow"></div>

<div id="portfolio2">

<?php
    $custom = get_post_custom($post->ID);
    $client2 = $custom["client2"][0];
?>

<?php

  $args=array(
    'post_type' => 'portfolio', 
	'posts_per_page' => -1,
	'services_rendered' => $client2
   );
  $loop = new WP_Query($args); ?>

<?php while ($loop->have_posts()) : $loop->the_post(); 	?>
<div class="portfolio-item-two">
<div class="portfolio-item-two-container">

<?php if (has_post_thumbnail ()) : ?>
<div class="thumbnail-two">
<a href="<?php the_permalink() ?>" > </a> 
<?php the_post_thumbnail('portfolio_two', array('title' => "")); ?> 
								<?php
								$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
								echo '<a href="'.$url.'" rel="" class="fancybox"></a>';
								      
								?>   

</div><!--#thumbnail-->
<?php endif; ?>
<!-- end portfolio-item -->
<div class="portfolio-item-text-two">
<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
<div class="excerpt">
<?php the_excerpt(); ?>
</div><!--#excerpt-->	
</div> <!-- end portfolio-item text-->	
</div> <!-- end portfolio-item-container-->
</div> <!-- end portfolio-item-->
<?php endwhile; ?>
<div style="clear:both;"></div>		
</div><!--#portfolio2-->
<?php
if (get_option_tree('footer_slide', '')) {  	get_footer(); }		else{ include (TEMPLATEPATH . '/footer2.php'); }
?>