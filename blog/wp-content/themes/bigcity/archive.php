<?php include (TEMPLATEPATH . '/header2.php'); ?>  
<h1 class="entry-title">   
<?php if ( is_day() ) : ?>  
<?php printf( __( 'Daily Archives: <span>%s</span>', 'BigCity' ), get_the_date() ); ?>  
<?php elseif ( is_month() ) : ?>  
<?php printf( __( 'Monthly Archives: <span>%s</span>', 'BigCity' ), get_the_date( 'F Y' ) ); ?>  
<?php elseif ( is_year() ) : ?>  
<?php printf( __( 'Yearly Archives: <span>%s</span>', 'BigCity' ), get_the_date( 'Y' ) ); ?>  
<?php else : ?>  
<?php wp_title(); ?>  
<?php endif; ?>  
</h1>  
<div class="title_box_shadow"></div>  
  
<div id="container">  
<div id="content" class="left" >  
  
<?php while ( have_posts() ) : the_post();?>  
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>  
<h1 class="post-entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'BigCity' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>  
  
  
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
  
<div class="entry-content">  
<?php the_excerpt(); ?>  
<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'BigCity' ), 'after' => '</div>' ) ); ?>  
<div style="clear:both"> </div>  
</div><!-- .entry-content -->  
</div><!-- #post-## -->  
<div class="content_box_shadow_small"></div>  
  
<?php endwhile; // End the loop. Whew. ?>  
  
</div><!-- #content -->  
<div id="sidebar_right">  
<?php get_sidebar(); ?>  
</div><!--#sidebar_right-->  
  
<?php SEO_pager() ?>  
  
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
