(function($) {
  'use strict';    
	// Content Slide
	$('.content-slide').each(function(){
		var getId = "#" + $(this).attr("id");
		$(getId).owlCarousel({
			loop:true,
			margin:10,
			nav:true,
			navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:2
				},
				1000:{
					items:4
				}
			}
		});
	});
	
	// Content Slide
	$('.client-slide').owlCarousel({
		loop:true,
		margin:10,
		nav:true,
		navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		responsive:{
			0:{
				items:1
			},
			600:{
				items:3
			},
			1000:{
				items:5
			}
		}
	});
	
	// Single Slide
	$(".single-slide").owlCarousel({
		margin:0,
		nav:false,
		items:1,
		autoplay:true,
		dots:true,
		loop:true,
		animateOut: 'slideOutDown',
		animateIn: 'flipInX',
	});
})(jQuery);