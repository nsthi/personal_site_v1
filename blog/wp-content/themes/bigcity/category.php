<?php include (TEMPLATEPATH . '/header_blog.php'); ?>
<div id="container">
<?php
if (get_option_tree('footer_slide', '')) 
{  
	get_footer();
else
?>