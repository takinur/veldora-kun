(function($) {
	'use strict'; 
	
    /*
	prettyPhoto
    =========================== */	
    $(".img-wrapper:first a[data-pretty^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'pp_default',slideshow:3000, autoplay_slideshow: false});
	$(".img-wrapper:gt(0) a[data-pretty^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
	$(".video-player").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
	
})(jQuery);



