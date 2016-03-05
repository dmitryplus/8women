var Example = (function() {
    "use strict";


    var hideHandler,
		that = {},
		blockCSS = { 
			"position":"fixed", 
			"right":"0", 
			"opacity": "0.8",
			"margin-bottom":"0", 
			"font-size":"1.2em", 
			"padding":"1em 1.3em", 
			"z-index":"2000" 
		}

    that.show = function(text) {
        clearTimeout(hideHandler);
		var elem, message;
		var blockPosition = Math.floor(Math.random() * (60 - 20 + 1)) + 20;
		message = $("<span></span>").html(text);

		//	alert-warning
		//	alert-info
		//	alert-success
		//	alert-danger

		elem = $('<div class="alert alert-info"></div>').hide().append(message).css(blockCSS).css({"bottom": blockPosition+"%"});
		$("BODY").append(elem);
        elem.delay(200).fadeIn().delay(500).fadeOut("slow", function() { this.remove(); });
    };

    return that;
}());