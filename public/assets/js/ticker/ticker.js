/* List Ticker by Alex Fish 
// www.alexefish.com
//
// options:
//
// effect: fade/slide
// speed: milliseconds
*/
/*
Wrap Vertical
=========================== */
function verticalMiddle(){
    if( $(window).width() > 641 ){
        $(".wrap-area").each(function(){
            var getHeight = $(".set-height", this).outerHeight(),
                offset = $(".container", this).offset().left + 16;
            $(".wrap-offset", this).css("width", offset + "px"); 
            $(".vertical", this).css("height", getHeight + "px");
        });
    }
}

(function($){
  $.fn.list_ticker = function(options){
    
    var defaults = {
      speed:4000,
	  effect:'fade'
    };
    
    var options = $.extend(defaults, options);
    
    return this.each(function(){
      
      var obj = $(this);
      var list = obj.children();
      list.not(':first').hide();
      
      setInterval(function(){
          
        list = obj.children();
        list.not(':first').hide();
        
        var first_li = list.eq(0)
        var second_li = list.eq(1)
		
		if(options.effect == 'slide'){
			first_li.slideUp();
			second_li.slideDown(function(){
				first_li.remove().appendTo(obj);
                verticalMiddle();
			});
		} else if(options.effect == 'fade'){
			first_li.fadeOut(function(){
				second_li.fadeIn();
				first_li.remove().appendTo(obj);
                verticalMiddle();
			});
		}
      }, options.speed)
    });
  };
})(jQuery);