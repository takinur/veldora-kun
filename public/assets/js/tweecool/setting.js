(function($) {
	'use strict';	
	$('#tweecool').tweecool({
		//settings
        username : 'envato', 
		limit : 5,
		profile_image : false,
		show_time : false,
		show_media : false,
		show_media_size: 'thumb'  //values: small, large, thumb, medium 
	})
	
	$('.twitter-feed').list_ticker({
        speed:5000,
        effect:'fade'
    });	
})(jQuery);