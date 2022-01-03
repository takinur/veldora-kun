(function($) {
  'use strict';  

	var $signupForm = $( '#SignupForm' );
	$signupForm.validationEngine('attach', {promptPosition : "topRight", scroll: false});
	$signupForm.formToWizard({
		submitButton: 'SaveAccount',
		showProgress: true, //default value for showProgress is also true
		nextBtnName: 'Next process',
		prevBtnName: 'Back to your information',
		showStepNo: false,
		validateBeforeNext: function() {
			return $signupForm.validationEngine( 'validate' );
		}
	});  
	
	var heightBg = function(){
		var getHeightHome = $(".home").outerHeight();
		$(".bg-home").height(getHeightHome);
	}	
	$(".btn.prev").on("click", function(){
		heightBg();
	});
	$(".btn.next").on("click", function(){
		heightBg();
	});
})(jQuery);