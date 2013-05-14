jQuery(function($) 
{
var slide = false;
var height = $('#footer_content').height();
 $('#footer_button').click(function() 
 {
	 var docHeight = $(document).height();
	 var windowHeight = $(window).height();
	 	 var scrollPos = docHeight - windowHeight + height;

	 $('#footer_content').animate({ height: "toggle"}, 1000);
	 if(slide == false) 
	 {
		 if($.browser.opera) 
		 { //Fix opera double scroll bug by targeting only HTML.
		 $('html').animate(1000);
		 } else 
			 {
			 $('html, body').animate( 1000);
				$(this).css('backgroundPosition', 'bottom right');
				
			 }
		 slide = true;
	 } 
	 else 
	 {
			$('html, body').animate(1000);
			$(this).css('backgroundPosition', 'top left');
		
			slide = false;
	 }
	
 });
});

