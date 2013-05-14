</div><!-- #main -->  
</div><!-- #wrapper -->  
</div><!-- #aligner -->  
<div id="sliding_footer">  
<div id="footer_button"></div>  
<div id="footer_content" class="stretch">  
	<div id="footer_all">  
					<div id="colophon">  
						<?php get_sidebar( 'footer');?>  
					</div><!-- #colophon -->  
					<div id="footer_info">  
						<div id="footer_info_content">  
							<div id="footer_copy">  
								<div id="copyrights-area">  
									<p><?php $copy = get_option_tree('footer_copyright_text', '');   if ( $copy ) { echo $copy; } else { echo 'Copyright &copy; 2011'; } ?> <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a><?php $all = get_option_tree('footer_all', '');   if ( $all ) { echo '&nbsp; '.$all.''; } else { echo '. All rights reserved.'; } ?></p>  
								</div>  
							</div>  
							<div id="logo_small">  
							  <a href="<?php bloginfo('url'); ?>"><img src="<?php get_option_tree('small_logo', '', 'true'); ?>" alt="" /></a>  
							</div><!-- #logo_small-->  
						</div><!-- #footer_info_content-->  
					</div><!-- #foote_info-->  
	</div><!-- #footer_all-->  
</div><!-- #footer -->  
</div><!--#sliding_footer-->  
<?php wp_footer();?>
  
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/cufon/<?php get_option_tree('fontc', '', true); ?>.js"></script>  
<script type="text/javascript">  
Cufon.replace('h1,h2,h3,h4,h5,h6,caption,.dropcap,.su-service-title, .portfolio_title, p.recent_post-title,li.menu-item a, #footer h3, 	.su-divider3 span', {hover: true  
});  
</script>  
<script type="text/javascript"> Cufon.now(); </script>  
  
</div><!-- #background_pattern-->  
</body>  
</html>