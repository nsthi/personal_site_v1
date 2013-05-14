$(function() {

	// Cache all of the elements on the page first, keeps things speedy.
	
	// Main Navigation
	var mainNav = $('nav');
	var mainNavHidden = mainNav.find('.overflow');
	var mainNavLinks = mainNav.find('a');
	var mainNavSymbol = mainNav.find('.symbol');
	var navClicker = mainNav.find('.symbol,.nav-title');
	
	// Mobile Navigation
	var mobileNav = $('div.mobile-nav');
	var mobileNavHidden = mobileNav.find('.links');
	var mobileNavLinks = mobileNavHidden.find('a');
	var mobileNavClicker = mobileNav.find('.nav-title');
	var mobileNavSymbol = mobileNavClicker.find('span');
	
	// Both Navigation
	var navLinks = $('nav a, div.mobile-nav a');
	
	// Portfolio
	var portfolioItems = $('#portfolio-items');
	var portfolioWrapper = $('#portfolio');
	var portfolioFilter = $('#filters');
	
	// Check for hash first
	if(window.location.hash) { var hash_value = window.location.hash; } else { var hash_value = '#profile'; }

	// Then, load the appropriate page
	$(hash_value).delay(300).slideDown(500,function(){
	
		if (hash_value == '#portfolio'){
			portfolioItems.animate({'opacity':1},500);
		}
	
		// Hide the address bar on iPhone & iPod Touch
		window.scrollTo(0, 1);
		
	});
	
	
	
	// Main Navigation
	navClicker.click(function(){
		
		mainNav.toggleClass('active');
		var totalWidth = 0;
		
		if (mainNav.hasClass('active')){
		
			mainNavLinks.each(function(){
				linkWidth = $(this).width() + 21;
				totalWidth = totalWidth + linkWidth;
			});
			
			mainNavHidden.width(totalWidth);
			mainNavSymbol.html('x');
			
		} else {
		
			mainNavHidden.width(32);
			mainNavSymbol.html('+');
			
		}
		
	});
	
	
	
	// Mobile Navigation
	mobileNavClicker.click(function(){
		
		mobileNav.toggleClass('active');
		
		if (mobileNav.hasClass('active')){
		
			var mobileNavHeight = mobileNavHidden.height();
			mobileNavHeight = mobileNavHeight + 32;
			mobileNav.height(mobileNavHeight);
			
			mobileNavSymbol.html('x');
			
		} else {
		
			mobileNav.height(33);
			mobileNavSymbol.html('+');
			
		}
		
	});
	
	
	
	// Navigation Click Function
	navLinks.click(function(){
	
		var toLoad = $(this).attr('href');
		
		if (toLoad.substring(0, 1) == "#") {
	
			mobileNav.removeClass('active');
			mobileNav.height(33);
			mobileNavSymbol.html('+');
		
			$('.window').slideUp(350);
			$(toLoad).delay(750).slideDown(500,function(){
				if (toLoad == '#portfolio'){
					portfolioItems.animate({'opacity':1},500);
				}
			});

		}
		
	});
	
	
	
	// Portfolio Filters
	portfolioFilter.find('span').click(function(){
	
		var filterID = this.id;
		portfolioFilter.find('span').removeClass('active');
		$(this).addClass('active');
			
		if (!filterID){
			// Display All Items	
			portfolioItems.animate({'opacity':0},300,function(){
				portfolioItems.find('.item').removeClass('hidden');
				portfolioItems.animate({'opacity':1},300);
			});
		} else {
			// Display Filtered Items
			portfolioItems.animate({'opacity':0},300,function(){
				portfolioItems.find('.item').addClass('hidden');
				portfolioItems.find('.'+filterID).removeClass('hidden');
				portfolioItems.animate({'opacity':1},300);
			});
		}
	
	});
	
	
	
	
	// Ajax Contact form validation and submit
	
	$('form#contactForm').submit(function() {
		$(this).find('.error').remove();
		var hasError = false;
		$(this).find('.requiredField').removeClass('input-error').parent().removeClass('input-error');
		$(this).find('.requiredField').each(function() {
			if(jQuery.trim($(this).val()) == '') {
				if ($(this).is('textarea')){
					$(this).parent().addClass('input-error');
				} else {
					$(this).addClass('input-error');
				}
				hasError = true;
			} else if($(this).hasClass('email')) {
				var emailReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
				if(!emailReg.test(jQuery.trim($(this).val()))) {
					$(this).addClass('input-error');
					hasError = true;
				}
			}

			
			
		});
		if(!hasError) {
			
			$(this).find('#born-submit').fadeOut('normal', function() {
				$(this).parent().parent().find('.sending-message').show('normal');
			});
			
			var formInput = $(this).serialize();
			var contactForm = $(this);
			var formAction = $(this).attr('action');
			
			jQuery.ajax({	
				type: "POST",
				url: formAction,
				data: formInput,
				success: function(data){
					contactForm.parent().slideUp("normal", function() { // Hide Form
						$(this).prev().prev().slideDown('normal'); // Show success message
					});
				},
				error: function(data){	
					$(this).prev().show('normal');  // Show error message
				}
			});
		}
		
		return false;
		
	});
	
	
	
	// Portfolio Pretty Photo Lightbox
	$("a[rel^='prettyPhoto']").prettyPhoto({
		deeplinking: false
	});
	
	$(".rating, #portfolio-items img, header #socials a, header, .profile-photo").retina({"retina-background":true});
	

});