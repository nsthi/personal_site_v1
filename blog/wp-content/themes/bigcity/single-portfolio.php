<?php include (TEMPLATEPATH . '/header2.php'); ?>  
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>  
<h1 class="entry-title"><?php the_title(); ?></h1>  
<div class="title_box_shadow"></div>  
  
<?php endwhile; // end of the loop. ?>  
<div id="container" >  
<div id="content_full">  
<?php if (have_posts ()) : ?>  
<?php while (have_posts ()) : the_post(); ?>  
<div class="entry-content">  
<div <?php post_class(); ?>>  
<?php if (has_post_thumbnail ()) : ?>  
<div class="portfolio_img">  
<?php the_post_thumbnail('portfolio-single', array('title' => "")); ?>  
</div><!--#portfolio_img-->  
<?php endif; ?>  
<div class="portfolio_details">  
<div class="portfolio-dsc">  
<div class="details portfolio_title">  
<?php $portfolio_desc = get_option_tree('port_desc', '');   if ( $portfolio_desc ) { echo $portfolio_desc; } else { echo 'Description'; } ?>  
</div>  
  
<?php the_content(); echo get_option_tree('posts', '', true);?>  
</div><!--#portfolio-dsc-->  
<?php  
$custom = get_post_custom($post->ID);  
$customer = $custom["client"][0];  
$website_url = $custom["website_url"][0];  
?>  
<?php endwhile; ?>  
<?php endif; ?>  
<div class="portfolio-dsc">  
<div class="details portfolio_title">  
<?php $portfolio_det = get_option_tree('port_det', '');   if ( $portfolio_det ) { echo $portfolio_det; } else { echo 'Details'; }?>  
</div>  
<div class="client"><b style="font-size:10px"> <?php $portfolio_client = get_option_tree('port_client', '');   if ( $portfolio_client ) { echo $portfolio_client; }else { echo 'Client'; } ?> </b> <span><?php echo $customer ?></span></div>  
<div class="portfolio-link"><b style="font-size:10px">  
<?php $portfolio_url = get_option_tree('port_url', '');   if ( $portfolio_url ) { echo $portfolio_url; } else { echo 'URL'; }?></b> <span><a href="<?php echo $website_url ?>"><?php echo $website_url ?></a></span></div>  
</div><!--#portfolio-dsc 2-->  
<div class="portfolio-dsc">  
<?php  
$portfolio_cat = get_option_tree('port_cat', '');     
if ( $portfolio_cat ) {   
echo get_the_term_list($post->ID, 'services_rendered', '' . ' <div class="details portfolio_title">' . $portfolio_cat . '</div>' . ' <span>',  '</span>');   
}  
else{  
	echo get_the_term_list($post->ID, 'services_rendered', '' . ' <div class="details portfolio_title">' . 'Category:' . '</div>' . ' <span>',  '</span>');   
	}  
?>  
</div><!--#portfolio-dsc 3-->  
</div>  
<br/>  
<div class="back_to_portfolio"><input type="submit" value="<?php $portfolio_back = get_option_tree('port_back', ''); if ( $portfolio_back ) { echo $portfolio_back; } else { echo 'BACK'; } ?>" onClick="history.go(-1)"></div>	  
<div style="clear:both"> </div>  
</div><!--#portfolio_details-->  
<?php comments_template( '', true ); ?>  
  
</div><!--.entry-content-->  
<div id="content_box_shadow"></div>  
</div><!--#content_full-->  
</div>	<!--#container-->  
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
