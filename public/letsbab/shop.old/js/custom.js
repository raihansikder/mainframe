jQuery(document).ready(function() {
	var $toggleButton = jQuery('.toggle-button'),
		$menuWrap = jQuery('.menu-wrap, .sidebar-menu'),
		$sidebarArrow = jQuery('.sidebar-menu-arrow');
	// Hamburger button
	$toggleButton.on('click', function() {
		jQuery(this).toggleClass('button-open');
		$menuWrap.toggleClass('menu-show');
	});
	// Sidebar navigation arrows
	$sidebarArrow.click(function() {
		jQuery(this).next().slideToggle(300);
	});
	jQuery('.button-second').click(function(){
		$toggleButton.removeClass('button-open');
		jQuery(this).addClass('button-open');
	});
	
	
	
// Select all links with hashes
jQuery('a.clickdown[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
	  jQuery('.primary-menu a').removeClass('active');
	 jQuery(this).addClass('active');
	// On-page links
	if (
	  location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
	  && 
	  location.hostname == this.hostname
	) {
	  // Figure out element to scroll to
	  var target = jQuery(this.hash);
	  target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
	  // Does a scroll target exist?
	  if (target.length) {
		// Only prevent default if animation is actually gonna happen
		event.preventDefault();
		jQuery('html, body').animate({
		  scrollTop: target.offset().top-0
		}, 1000, function() {
		  // Callback after animation
		  // Must change focus!
		
		});
	  }
	}
  });
  
  
  
 $('.category-listSlider').slick({
	  autoSlidesToShow: true,
	   variableWidth: true,
	  infinite: false,
	  dots: false,
	   autoplay: false,
	   lazyLoad: 'ondemand',
		arrows: true,
	  });
	 
});

$('*').each(function(){
		if($(this).attr('data-animation')) {
			var $animationName = $(this).attr('data-animation'),
				$animationDelay = "delay-"+$(this).attr('data-animation-delay');
			$(this).appear(function() {
				$(this).addClass('animated').addClass($animationName);
				$(this).addClass('animated').addClass($animationDelay);
			});
		}
	});



 $(window).on('load',function(){
		$('#letsbab-modal').modal('show');
	setTimeout(function(){
	  $('#letsbab-modal').modal('hide')
	}, 3000);	
		
	});



 $( ".searchbtn" ).click( function() {
	  $( '.headersearchbox' ).toggleClass( "show-search-box" );
	});
	$( ".searchbtn" ).click( function() {
	  $( '.search-overlay' ).toggleClass( "overlay-show" );
	});
	$( ".searchbtn" ).click( function() {
	  $( '.site-header .logo' ).toggleClass( "hidelogo" );
	});


$('.headersearchbox .dropdown-menu').click(function(e) {
	e.stopPropagation();
});
  
  
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})