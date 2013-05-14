<?php require_once('config.php');
if ( !is_user_logged_in() || !current_user_can('edit_posts') ) wp_die(__("You are not allowed to be here")); ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Shortcodes</title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri() ?>/panel/wysiwyg/wysiwyg.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<base target="_self" />
</head>
<body onLoad="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';" style="display: none" id="link">
<form name="karma_shortcode_form" action="#">

	
<div style="height:100px;width:250px;margin:0 auto;padding-top:50px;text-align:center;" class="shortcode_wrap">
<div id="shortcode_panel" class="current" style="height:50px;">
<fieldset style="border:0;width:100%;text-align:center;">
<select id="style_shortcode" name="style_shortcode" style="width:250px">
<option value="0">Select a Shortcode</option>




<option value="0" style="font-weight:bold;font-style:italic;">**Column Shortcodes**</option>
     <option value="two_columns">2 Columns</option>
     <option value="three_columns">3 Columns</option>
     <option value="four_columns">4 Columns</option>
     <option value="five_columns">5 Columns</option>
     <option value="six_columns">6 Columns</option>
     <option value="custom">Custom Columns</option>

<option value="0"> </option>
<option value="0" style="font-weight:bold;font-style:italic;">**Posts**</option>
<option value="featured_posts">With excerpt</option>
<option value="featured_posts2">With full content</option>
<option value="featured_posts3">With full content & meta</option>

<option value="0"> </option>
<option value="0" style="font-weight:bold;font-style:italic;">**Guest Posts**</option>
<option value="write_posts">Insert Guest Post Form</option>


	 
<option value="0"> </option>
<option value="0" style="font-weight:bold;font-style:italic;">**Frames**</option>
     <option value="frame">Image Frame</option>
	 
<option value="0"> </option>
<option value="0" style="font-weight:bold;font-style:italic;">**Tabs**</option>
     <option value="tabs">Tabs</option>

<option value="0"> </option>
<option value="0" style="font-weight:bold;font-style:italic;">**Spoilers**</option>
     <option value="spoiler">Spoiler</option>

	 <option value="0"> </option>	 
<option value="0" style="font-weight:bold;font-style:italic;">**Dividers**</option>
     <option value="divider">Divider</option>	 
	 <option value="divider2">Shadow Divider</option>	
	 <option value="divider3">Decorative Divider</option>

<option value="0"> </option>
<option value="0" style="font-weight:bold;font-style:italic;">**Spacer**</option>
     <option value="spacer">Spacer</option>	 
<option value="0"> </option>	 
<option value="0" style="font-weight:bold;font-style:italic;">**Quotes**</option>
     <option value="quote">Quotes</option>

<option value="0"> </option>
<option value="0" style="font-weight:bold;font-style:italic;">**Pullquotes**</option>
     <option value="pullquote">Pullquote</option>	 	

<option value="0"> </option>
<option value="0" style="font-weight:bold;font-style:italic;">**Buttons**</option>
     <option value="buttons">Customizable Button</option>

<option value="0"> </option>
<option value="0" style="font-weight:bold;font-style:italic;">**Links**</option>
     <option value="link">White background link</option>	
     <option value="link_white">Black background link</option>	

<option value="0"> </option>
<option value="0" style="font-weight:bold;font-style:italic;">**Service**</option>
     <option value="service">Service with icon</option>	
    
<option value="0"> </option>
<option value="0" style="font-weight:bold;font-style:italic;">**Boxes**</option>
     <option value="box">Box</option>	

<option value="0"> </option>
<option value="0" style="font-weight:bold;font-style:italic;">**Notes**</option>
     <option value="note">Note</option>	
	 
<option value="0"> </option>
<option value="0" style="font-weight:bold;font-style:italic;">**Lists**</option>
     <option value="arrow">Arrow List</option>
     <option value="star">Star List</option>
     <option value="cross">Cross List</option>
     <option value="check">Check Mark List</option>
	 <option value="black">Black</option>
     <option value="blue">Blue</option>
	 <option value="green">Green</option>
	 <option value="orange">Orange</option>
	 <option value="purple">Purple</option>
	 <option value="red">Red</option>
	 <option value="white">White</option>
	 <option value="yellow">Yellow</option>

<option value="0"> </option>
<option value="0" style="font-weight:bold;font-style:italic;">**Media**</option>
     <option value="vimeo">Media Vimeo</option>	
	 <option value="youtube">Media YouTube</option>	

	 <option value="0"> </option>
<option value="0" style="font-weight:bold;font-style:italic;">**Content Slider**</option>
     <option value="slider">Content Slider</option>	

	 </select>
</fieldset>
</div><!-- end shortcode_panel -->

<div style="float:left"><input type="button" id="cancel" name="cancel" value="<?php echo "Close"; ?>" onClick="tinyMCEPopup.close();" /></div>
<div style="float:right"><input type="submit" id="insert" name="insert" value="<?php echo "Insert"; ?>" onClick="embedshortcode();" /></div>

</div><!-- end shortcode_wrap -->




</form>
</body>
</html>
