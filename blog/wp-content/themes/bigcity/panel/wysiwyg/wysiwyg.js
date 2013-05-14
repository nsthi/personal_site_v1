function embedshortcode() {
	
	var shortcodetext;
	var style = document.getElementById('shortcode_panel');
	

	if (style.className.indexOf('current') != -1) {
		var selected_shortcode = document.getElementById('style_shortcode').value;
		
	
		
// -----------------------------
// 	COLUMN SHORTCODES
// -----------------------------		
if (selected_shortcode == 'two_columns'){
	shortcodetext = "[column size=\"1-2\"]<br />Content...<br />[/column]<br /><br />[column size=\"1-2\" last=\"1\"]<br />Content...<br />[/column]<br />";	
}
if (selected_shortcode == 'three_columns'){
	shortcodetext = "[column size=\"1-3\"]<br />Content...<br />[/column]<br /><br />[column size=\"1-3\"]<br />Content...<br />[/column]<br /><br />[column size=\"1-3\" last=\"1\"]<br />Content...<br />[/column]<br />";		
}

if (selected_shortcode == 'four_columns'){
	shortcodetext = "[column size=\"1-4\"]<br />Content...<br />[/column]<br /><br />[column size=\"1-4\"]<br />Content...<br />[/column]<br /><br />[column size=\"1-4\"]<br />Content...<br />[/column]<br /><br />[column size=\"1-4\" last=\"1\"]<br />Content...<br />[/column]<br />";		
}

if (selected_shortcode == 'five_columns'){
	shortcodetext = "[column size=\"1-5\"]<br />Content...<br />[/column]<br /><br />[column size=\"1-5\"]<br />Content...<br />[/column]<br /><br />[column size=\"1-5\"]<br />Content...<br />[/column]<br /><br />[column size=\"1-5\"]<br />Content...<br />[/column]<br /><br />[column size=\"1-5\" last=\"1\"]<br />Content...<br />[/column]<br />";		
	
}

if (selected_shortcode == 'six_columns'){
	shortcodetext = "[column size=\"1-6\"]<br />Content...<br />[/column]<br /><br />[column size=\"1-6\"]<br />Content...<br />[/column]<br /><br />[column size=\"1-6\"]<br />Content...<br />[/column]<br /><br />[column size=\"1-6\"]<br />Content...<br />[/column]<br /><br />[column size=\"1-6\"]<br />Content...<br />[/column]<br /><br />[column size=\"1-6\" last=\"1\"]<br />Content...<br />[/column]<br />";	
}

if (selected_shortcode == 'Custom Columns'){
	shortcodetext = "[column size=\"5-6\"]<br />Content...<br />[/column]<br /><br />[column size=\"1-6\" last=\"1\"]<br />Content...<br />[/column]<br />";	
}

// -----------------------------
// 	FRAMES
// -----------------------------	
if (selected_shortcode == 'frame'){
	shortcodetext = "[frame align=\"left\"] <img src=\"image.jpg\" alt=\"\" /> [/frame]";
}

// -----------------------------
// 	TABS
// -----------------------------	
if (selected_shortcode == 'tabs'){
	shortcodetext = "[tabs] [tab title=\"Tab name\"] Tab content [/tab] [/tabs]";
}

// -----------------------------
// 	SPOILER
// -----------------------------	
if (selected_shortcode == 'spoiler'){
	shortcodetext = "[spoiler title=\"Spoiler title\"] Hidden text [/spoiler]";
}

// -----------------------------
// 	DIVIDERS
// -----------------------------	
if (selected_shortcode == 'divider'){
	shortcodetext = "[divider]";
}
if (selected_shortcode == 'divider2'){
	shortcodetext = "[divider2]";
}
if (selected_shortcode == 'divider3'){
	shortcodetext = "[divider3 text=\"Divider text (optional)\"]";
}


// -----------------------------
// 	SPACER
// -----------------------------	
if (selected_shortcode == 'spacer'){
	shortcodetext = "[spacer size=\"20\"]";
}

// -----------------------------
// 	QUOTES
// -----------------------------	
if (selected_shortcode == 'quote'){
	shortcodetext = "[quote]Content[/quote]";
}

// -----------------------------
// 	PULLQUOTES
// -----------------------------	
if (selected_shortcode == 'pullquote'){
	shortcodetext = "[pullquote align=\"left\"] Content [/pullquote]";
}

// -----------------------------
// 	BUTTONS
// -----------------------------	
if (selected_shortcode == 'buttons'){
	shortcodetext = "[button link=\"#\" color=\"#b00\" size=\"3\" style=\"1\" dark=\"0\" square=\"0\" icon=\"image.png\"] Button text [/button]";
}	

// -----------------------------
// 	LINKS
// -----------------------------	
if (selected_shortcode == 'link'){
	shortcodetext = "[fancy_link color=\"black\" link=\"http://example.com/\"] Read more [/fancy_link]";
}	
if (selected_shortcode == 'link_white'){
	shortcodetext = "[fancy_link color=\"white\" link=\"http://example.com/\"] Read more [/fancy_link]";
}	

// -----------------------------
// 	SERVICE
// -----------------------------	
if (selected_shortcode == 'service'){
	shortcodetext = "[service title=\"Service name\" icon=\"images/service-1.png\" size=\"32\"] Service description [/service]";
}

// -----------------------------
// 	BOX
// -----------------------------	
if (selected_shortcode == 'box'){
	shortcodetext = "[box title=\"Box title\" color=\"#f00\"] Content [/box]";
}	

// -----------------------------
// 	NOTES
// -----------------------------	
if (selected_shortcode == 'note'){
	shortcodetext = "[note color=\"#D1F26D\"] Content [/note]";
}	

// -----------------------------
// 	LISTS
// -----------------------------	
if (selected_shortcode == 'arrow'){
	shortcodetext = "[list style=\"arrow\"] <ul><br /><li>List item</li><br/></ul> [/list]";
}	
if (selected_shortcode == 'star'){
	shortcodetext = "[list style=\"star\"] <ul><br /><li>List item</li><br/></ul> [/list]";
}	
if (selected_shortcode == 'check'){
	shortcodetext = "[list style=\"check\"] <ul><br /><li>List item</li><br/></ul> [/list]";
}	
if (selected_shortcode == 'cross'){
	shortcodetext = "[list style=\"cross\"] <ul><br /><li>List item</li><br/></ul> [/list]";
}	
if (selected_shortcode == 'black'){
	shortcodetext = "[list style=\"black\"] <ul><br /><li>List item</li><br/></ul> [/list]";
}	
if (selected_shortcode == 'blue'){
	shortcodetext = "[list style=\"blue\"] <ul><br /><li>List item</li><br/></ul> [/list]";
}	
if (selected_shortcode == 'green'){
	shortcodetext = "[list style=\"green\"] <ul><br /><li>List item</li><br/></ul> [/list]";
}	
if (selected_shortcode == 'orange'){
	shortcodetext = "[list style=\"orange\"] <ul><br /><li>List item</li><br/></ul> [/list]";
}	
if (selected_shortcode == 'purple'){
	shortcodetext = "[list style=\"purple\"] <ul><br /><li>List item</li><br/></ul> [/list]";
}	
if (selected_shortcode == 'red'){
	shortcodetext = "[list style=\"red\"] <ul><br /><li>List item</li><br/></ul> [/list]";
}	
if (selected_shortcode == 'white'){
	shortcodetext = "[list style=\"white\"] <ul><br /><li>List item</li><br/></ul> [/list]";
}	
if (selected_shortcode == 'yellow'){
	shortcodetext = "[list style=\"yellow\"] <ul><br /><li>List item</li><br/></ul> [/list]";
}	

// -----------------------------
// 	MEDIA
// -----------------------------	
if (selected_shortcode == 'vimeo'){
	shortcodetext = "[media url=\"Vimeo video URL\"]";
}	
if (selected_shortcode == 'youtube'){
	shortcodetext = "[media url=\"YouTube video URL\"]";
}	

// -----------------------------
// 	Content Slider
// -----------------------------	
if (selected_shortcode == 'slider'){
	shortcodetext = "[wpcodaslider id=myslider cat=1 show=5 args=autoSlide:true, autoSlide:true]";
}	

// -----------------------------
// 	POSTS
// -----------------------------	
if (selected_shortcode == 'featured_posts'){
	shortcodetext = "[featured_posts order=\"DESC\" num=\"number of posts\" cat=\"category ID, comma-separated\"]";
}	
if (selected_shortcode == 'featured_posts2'){
	shortcodetext = "[featured_posts2 order=\"DESC\" num=\"number of posts\" cat=\"category ID, comma-separated\"]";
}

if (selected_shortcode == 'featured_posts3'){
	shortcodetext = "[featured_posts3 order=\"DESC\" num=\"number of posts\" cat=\"category ID, comma-separated\"]";
}

if (selected_shortcode == 'write_posts'){
	shortcodetext = "[wp_insert_post exclude=\"category ID to exclude, comma-separated\" status=\"publish, pending, draft, private - Leave one\"]";
}

	if ( selected_shortcode == 0 ){tinyMCEPopup.close();}}
	if(window.tinyMCE) {
		window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, shortcodetext);
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();
	}return;
}