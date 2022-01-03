(function($) {
	'use strict';	
	$('#bg-home').vegas({
        slides: [
            { src: "images/bg/slide01.jpg" },
            { src: "images/bg/slide02.jpg" },
            { src: "images/bg/slide03.jpg" }
        ],
        animation: [ 'fadeLeft', 'swirlRight2' ],
		transition: 'swirlRight',
        transitionDuration:5000,
        delay:10000,
		valign: 'top',
    });
	
	var heightBg = function(){
		var getHeightHome = $(".home").outerHeight();
		$(".bg-home").height(getHeightHome);
	}
	$(window).on("load", heightBg);
	$(window).on("resize", heightBg);
})(jQuery);