$(document).ready(function () {	
	
	$('#navigation-block ul li').hover(
		function () {
			//show its submenu
			$('ul', this).fadeIn(200);

		}, 
		function () {
			//hide its submenu
			$('ul', this).fadeOut(200);			
		}
	);
	
		$('.widget_nav_menu ul li').hover(
		function () {
			//show its submenu
			$('ul', this).fadeIn(200);

		}, 
		function () {
			//hide its submenu
			$('ul', this).fadeOut(200);			
		}
	);
	
});
