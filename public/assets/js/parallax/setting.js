(function($) {
  'use strict';    
	var parallaxSet = function(){
		$(".parallax").each(function(){
			var getBg = $(this).data("background"),
				getSpeed = $(this).data("speed"),
				getPosition = $(this).data("size");

			 $(this).jarallax({
				 imgSrc:getBg
			})
		});
	}
    $(window).on("load", parallaxSet);
    $(window).on("resize", parallaxSet);
})(jQuery);