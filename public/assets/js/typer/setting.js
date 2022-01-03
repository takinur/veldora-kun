(function($) {
	'use strict';
            var win = $(window),
                foo = $('#typer');

            foo.typer([
				'Moscow Couerier in Russia',
				'More than 1 million packages we sent',
				'We are faster, better, and cheaper',
			]);

            // unneeded...
            win.resize(function(){
                var fontSize = Math.max(Math.min(win.width() / (1 * 10), parseFloat(Number.POSITIVE_INFINITY)), parseFloat(Number.NEGATIVE_INFINITY));
            }).resize();
})(jQuery);
