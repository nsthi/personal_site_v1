<?php
/**
* Template Name: Portfolio three
**/
?>
<?php include (TEMPLATEPATH . '/header2.php'); ?>
<h1 class="entry-title portfolio-title"><?php the_title(); ?></h1>
<div class="title_box_shadow"></div>

<div id="portfolio3" >
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
<div class="portfolio-item-three">
<div class="portfolio-item-three-container">

<?php if (has_post_thumbnail ()) : ?>
<div class="thumbnail-three">

<a href="<?php the_permalink() ?>" > </a> 
<?php the_post_thumbnail('portfolio_three', array('title' => "")); ?> 

								<?php
								$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
								
								echo '<a href="'.$url.'" rel="" class="fancybox"></a>';
								      
								?>   
								
</div><!--#thumbnail-->
<?php endif; ?>
<!-- end portfolio-item -->
<div class="portfolio-item-text-three">
<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

</div> <!-- end portfolio-item text-->	
</div> <!-- end portfolio-item-container-->
</div> <!-- end portfolio-item-->


<?php endwhile; ?>
<div style="clear:both;"></div>		

</div><!--#portfolio-->
<?php
if (get_option_tree('footer_slide', '')) {  	get_footer(); }		else{			include (TEMPLATEPATH . '/footer2.php'); }
?>