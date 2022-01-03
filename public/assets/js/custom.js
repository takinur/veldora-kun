(function ($) {
	"use strict";

    var core = {
        initialize: function() {
            this.event();
            this.layout();
            this.initMap();
        },
        event : function(){
			// ------------------------------------------------------------------------------ //
			// Section 
			// ------------------------------------------------------------------------------ //
			$(".section").each(function(){				
				$(".triangle", this).append("<span class='left'></span>");
				$(".triangle", this).append("<span class='right'></span>");
			});
			
			// ------------------------------------------------------------------------------ //
			// Table
			// ------------------------------------------------------------------------------ //
			$(".table-price").each(function(){
				$("td", this).prepend("<span class='table-child'></span>");
				$("th", this).prepend("<span class='table-child'></span>");
			});
			
			// ------------------------------------------------------------------------------ //
			// Team Item
			// ------------------------------------------------------------------------------ //
			$(".team-item").each(function(){
				$(".option", this).addClass("animated");
				$(this).on("mouseenter", function(){
					$(".option", this).removeClass("flipOutY");
					$(".option", this).addClass("flipInY");
				});
				$(this).on("mouseleave", function(){
					$(".option", this).addClass("flipOutY");
					$(".option", this).removeClass("flipInY");
				});
			});
			
			// ------------------------------------------------------------------------------ //
			// Scroll to top
			// ------------------------------------------------------------------------------ //
            $(window).scroll(function(){
                var scrollTop2 = $(window).scrollTop();
                if(scrollTop2 >= 34){
                    $(".toTop").stop().fadeIn();
                } else {
                    $(".toTop").stop().fadeOut();
                }
            });
            $(".toTop").on("click", function(e){
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: 0
                }, 1500);
            });
			
			// ------------------------------------------------------------------------------ //
			// Accordions
			// ------------------------------------------------------------------------------ //
            $(".panel-collapse").each(function(){
                if( $(this).hasClass("in") ){
                    $(this).closest(".panel").addClass("on");
                }
                
                var getId = $(this).attr("id");
                $("#" + getId).on('shown.bs.collapse', function () {
                    $(this).closest(".panel").addClass("on");
                });	
                
                $("#" + getId).on('hidden.bs.collapse', function () {
                    $(this).closest(".panel").removeClass("on");
                });	
            });
			
			// ------------------------------------------------------------------------------ //
			// Image hover
			// ------------------------------------------------------------------------------ //
			$(".img-wrapper").each(function(){
				var capZoomIn = $(".capZoomIn", this),
					capZoomInDown = $(".capZoomInDown", this),
					capRollIn = $(".capRollIn", this),
					capRotateIn = $(".capRotateIn", this),
					capBounceOut = $(".capBounceOut", this);
					
					$(".img-caption").addClass("animated");
					capZoomIn.addClass("zoomOut");
					capZoomInDown.addClass("zoomOutDown");
					capRollIn.addClass("rollOut");
					capRotateIn.addClass("rotateOut");
					capBounceOut.addClass("bounceOut");
				$(this).on("mouseenter", function() {
					capZoomIn.addClass("zoomIn");
					capZoomIn.removeClass("zoomOut");
					capZoomInDown.addClass("zoomInDown");
					capZoomInDown.removeClass("zoomOutDown");
					capRollIn.addClass("rollIn");
					capRollIn.removeClass("rollOut");
					capRotateIn.addClass("rotateIn");
					capRotateIn.removeClass("rotateOut");
					capBounceOut.addClass("bounceIn");
					capBounceOut.removeClass("bounceOut");
                    $(this).addClass("on");
					return false;
				});
				$(this).on("mouseleave", function() {
					capZoomIn.addClass("zoomOut");
					capZoomIn.removeClass("zoomIn");
					capZoomInDown.addClass("zoomOutDown");
					capZoomInDown.removeClass("zoomInDown");
					capRollIn.addClass("rollOut");
					capRollIn.removeClass("rollIn");
					capRotateIn.addClass("rotateOut");
					capRotateIn.removeClass("rotateIn");
					capBounceOut.addClass("bounceOut");
					capBounceOut.removeClass("bounceIn");
                    $(this).removeClass("on");
					return false;
				});
			});	
			
        },
		layout : function(){
			// ------------------------------------------------------------------------------ //
			// Section
			// ------------------------------------------------------------------------------ //
			$(".triangle").each(function(){
				var getHeight = $(this).data("height"),
					getWidth = $(this).width() * 0.5 + 1, 
					getColorBottom = $(this).data("color-bottom"),
					getColorTop = $(this).data("color-top");

				
				$(this).css("height", getHeight + "px");
				$(".left", this).css("border-top","solid " + getHeight +"px "+ getColorTop );
				$(".left", this).css("border-left","solid " + getWidth +"px "+ getColorBottom );
				
				$(".right", this).css("border-top","solid " + getHeight +"px "+ getColorTop );
				$(".right", this).css("border-right","solid " + getWidth +"px "+ getColorBottom);
			});
        },
		
		// ------------------------------------------------------------------------------ //
		// Google Map
		// ------------------------------------------------------------------------------ //
		initMap : function(){
			if( $("#map").length ){
				var center = {lat: -6.921167, lng: 107.610467};
				var locations = [
				  ['Jl. Asia Afrika, Kota Bandung, Jawa Barat, Indonesia', -6.921167, 107.610467],
				];
				
				var styles = [
					{
					  stylers: [
						{ lightness: 10 },
						{ saturation: -100 }
					  ]
					},{
					  featureType: "road",
					  elementType: "geometry",
					  stylers: [
						{ lightness: 50 },
						{ visibility: "simplified" }
					  ]
					},{
					  featureType: "road",
					  elementType: "labels",
					  stylers: [
						{ visibility: "off" }
					  ]
					}
				];
				var styledMap = new google.maps.StyledMapType(styles,{name: "Styled Map"});
				var map = new google.maps.Map(document.getElementById('map'), {
					zoom: 10,
					center: center,
					scrollwheel: false,
					mapTypeControlOptions: {
						mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
					}
				});
				map.mapTypes.set('map_style', styledMap);
				map.setMapTypeId('map_style');
				
				var infowindow = new google.maps.InfoWindow();

				var marker, i;

				for (i = 0; i < locations.length; i++) {  
				  marker = new google.maps.Marker({
					position: new google.maps.LatLng(locations[i][1], locations[i][2]),
					map: map,
					icon: 'images/map-icon.png'  
				  });

				  google.maps.event.addListener(marker, 'click', (function(marker, i) {
					return function() {
					  infowindow.setContent(locations[i][0]);
					  infowindow.open(map, marker);
					}
				  })(marker, i));
				}
			}
		}
		
    };

	// ------------------------------------------------------------------------------ //
    // Initaial on Load
	// ------------------------------------------------------------------------------ //
    $(window).on("load", function(){
        core.initialize();
    });
	
	// ------------------------------------------------------------------------------ //
	// Resize Action
	// ------------------------------------------------------------------------------ //
    $(window).on("resize", function(){
		core.initMap();
		
		setTimeout(function(){
			core.layout();
		}, 500);
    });
}(jQuery));
