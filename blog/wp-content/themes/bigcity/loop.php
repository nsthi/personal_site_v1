
<?php if ( ! have_posts() ) : ?>
<div id="post-0" class="post error404 not-found">
	<h1 class="post-entry-title"><?php _e( 'Not Found', 'BigCity' ); ?></h1>
	<div class="title_box_shadow_small"></div>
	<div class="entry-content">
		<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'BigCity' ); ?></p>
		<?php get_search_form(); ?>
	</div><!-- .entry-content -->
</div><!-- #post-0 -->
<?php endif; ?>

<?php	/* Start the Loop.	 */ ?>

 
<?php while ( have_posts() ) : the_post();?>

<?php /* How to display posts of the Gallery format. The gallery category is the old way. */ ?>

<?php if ( ( function_exists( 'get_post_format' ) && 'gallery' == get_post_format( $post->ID ) ) || in_category( _x( 'gallery', 'gallery category slug', 'BigCity' ) ) ) : ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h1 class="post-entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'BigCity' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
<div class="title_box_shadow_small"></div>

<div class="entry-content">
<?php if ( post_password_required() ) : ?>
<?php the_content(); ?>
<?php else : ?>
<?php
$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
if ( $images ) :
$total_images = count( $images );
$image = array_shift( $images );
$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
?>
<div class="gallery-thumb">
<a class="size-thumbnail" href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
</div><!-- .gallery-thumb -->
<p><em><?php printf( _n( 'This gallery contains <a %1$s>%2$s photo</a>.', 'This gallery contains <a %1$s>%2$s photos</a>.', $total_images, 'BigCity' ),
'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'BigCity' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
number_format_i18n( $total_images )
); ?></em></p>
<?php endif; ?>
<?php the_excerpt(); ?>
<?php endif; ?>
<div style="clear:both"> </div>

</div><!-- .entry-content -->

<div class="entry-utility">
<?php bigcity_posted_on(); ?>		
<?php if ( function_exists( 'get_post_format' ) && 'gallery' == get_post_format( $post->ID ) ) : ?>
<a href="<?php echo get_post_format_link( 'gallery' ); ?>" title="<?php esc_attr_e( 'View Galleries', 'BigCity' ); ?>"><?php _e( 'More Galleries', 'BigCity' ); ?></a>
<span class="meta-sep">|</span>
<?php elseif ( in_category( _x( 'gallery', 'gallery category slug', 'BigCity' ) ) ) : ?>
<a href="<?php echo get_term_link( _x( 'gallery', 'gallery category slug', 'BigCity' ), 'category' ); ?>" title="<?php esc_attr_e( 'View posts in the Gallery category', 'BigCity' ); ?>"><?php _e( 'More Galleries', 'BigCity' ); ?></a>
<span class="meta-sep">|</span>
<?php endif; ?>
<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'BigCity' ), __( '1 Comment', 'BigCity' ), __( '% Comments', 'BigCity' ) ); ?></span>
<?php edit_post_link( __( 'Edit', 'BigCity' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
</div><!-- .entry-utility -->
</div><!-- #post-## -->

<?php /* How to display posts of the Aside format. The asides category is the old way. */ ?>

<?php elseif ( ( function_exists( 'get_post_format' ) && 'aside' == get_post_format( $post->ID ) ) || in_category( _x( 'asides', 'asides category slug', 'BigCity' ) )  ) : ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if ( is_archive() || is_search() ) : // Display excerpts for archives and search. ?>

<div class="entry-content">
<?php the_excerpt(); ?>
<?php else : ?>
<?php
$read_more = get_option_tree('blog_read', ''); 
if ($read_more){ the_content( __( $read_more , 'BigCity' ) ); }
else{ the_content( __( 'Read more', 'BigCity' ) ); }?>
<div style="clear:both"> </div>

</div><!-- .entry-content -->
<?php endif; ?>

<div class="entry-utility">
<?php bigcity_posted_on(); ?>
<span class="meta-sep">|</span>
<span class="comments-link"> 

<?php
$comment = get_option_tree('blog_comment', ''); 
$comments = get_option_tree('blog_comments', ''); 
$leave_comments = get_option_tree('blog_leave', ''); 

if ($comment || $comments || $leave_comments ) { 
echo '<span class="comments-link">'; comments_popup_link( __( ''.$leave_comments.' &nbsp', 'BigCity' ), __( '1 '.$comment.' ', 'BigCity' ), __( '% '.$comments.' ', 'BigCity' ) );  echo'</span>'; 
}
else{
	echo '<span class="comments-link">'; comments_popup_link( __( 'Leave a comment', 'BigCity' ), __( '1 Comment', 'BigCity' ), __( '% Comments' , 'BigCity' ) );  echo'</span>';
}
?>


</span>
<?php edit_post_link( __( 'Edit', 'BigCity' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
</div><!-- .entry-utility -->
</div><!-- #post-## -->

<?php /* How to display all other posts. */ ?>

<?php else : ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h1 class="post-entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'BigCity' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

	<?php if (is_search() ) : // Only display excerpts for archives and search. ?>
	<div class="shadow_title_search"></div>
	<?php else : ?>
	<div class="title_box_shadow_small blog_title_shadow"></div>
	<?php endif; ?>

<div class="entry-utility">
<?php bigcity_posted_on(); ?>		
<?php if ( count( get_the_category() ) ) : ?>
<span class="cat-links">
<?php
$blog_in = get_option_tree('blog_in', '');   
if ( $blog_in ) { 
printf( __( '<span class="%1$s">'. $blog_in .'</span> %2$s', 'BigCity' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); 
}
else{
printf( __( '<span class="%1$s">Posted in</span> %2$s', 'BigCity' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); 
}
?>
</span>
<span class="meta-sep">|</span>
<?php endif; ?>
<?php
$comment = get_option_tree('blog_comment', ''); 
$comments = get_option_tree('blog_comments', ''); 
$leave_comments = get_option_tree('blog_leave', ''); 

if ($comment || $comments || $leave_comments ) { 
echo '<span class="comments-link">'; comments_popup_link( __( ''.$leave_comments.' &nbsp', 'BigCity' ), __( '1 '.$comment.' ', 'BigCity' ), __( '% '.$comments.' ', 'BigCity' ) );  echo'</span>'; 
}
else{
	echo '<span class="comments-link">'; comments_popup_link( __( 'Leave a comment', 'BigCity' ), __( '1 Comment', 'BigCity' ), __( '% Comments' , 'BigCity' ) );  echo'</span>';
}
?>
<?php edit_post_link( __( 'Edit', 'BigCity' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
</div><!-- .entry-utility -->
<div class="title_box_shadow_small"></div>

<?php if (is_search() ) : // Only display excerpts for archives and search. ?>
<div class="entry-content blog">
<div class="archive_thumbnail"><?php the_post_thumbnail(array(310,210, true)) ?> </div>
<?php the_excerpt(); ?>
<br style="clear:both;" />
</div><!-- .entry-summary -->
<?php else : ?>
<div class="entry-content">
<?php
$read_more = get_option_tree('blog_read', ''); 
if ($read_more){ the_content( __( $read_more , 'BigCity' ) ); }
else{ the_content( __( 'Read more', 'BigCity' ) ); }?>

<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'BigCity' ), 'after' => '</div>' ) ); ?>
<div style="clear:both"> </div>
</div><!-- .entry-content -->
<?php endif; ?>
</div><!-- #post-## -->
<div class="content_box_shadow_small"></div>
	

<?php comments_template( '', true ); ?>

<?php endif; // This was the if statement that broke the loop into three parts based on categories. ?>

<?php endwhile; // End the loop. Whew. ?>
<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 9999999 ) : ?>
<div id="nav-below" class="navigation">

<div class="nav-previous"><?php next_posts_link( __( 'Previous page', 'meteor' ) ); ?></div>
<div class="nav-next"><?php previous_posts_link( __( 'Next page', 'meteor' ) ); ?></div>
<div style="clear:both"> </div>
</div><!-- #nav-below -->
<?php endif; ?>

