<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php the_content(); ?>
<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'BigCity' ), 'after' => '</div>' ) ); ?>

<div class="entry-utility entry-utility-single">
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
<?php endif; ?>
<?php edit_post_link( __( 'Edit', 'BigCity' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
</div><!-- .entry-utility -->

<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
<div id="authorarea">
<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'bigcity_author_bio_avatar_size', 80 ) ); ?>
 <div class="authorinfo">
 <h3><?php printf( esc_attr__( 'About %s', 'BigCity' ), get_the_author() ); ?></h3>
 <p><?php the_author_meta( 'description' ); ?></p>
 </div>
 </div>
 <?php endif; ?>

</div><!-- #post-## -->

<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>