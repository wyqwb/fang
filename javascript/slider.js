(function($) {
	$.fn.scrollimg = function(options) {
		var defaults = {
			leftBtn: ".btn-left2",
			rightBtn: ".btn-right2",
			itembox:".img-box"
		};
		var options = $.extend(defaults, options);
		var els=$(this).find(options.itembox);
		var len=els.length;
		i=0;
		$(options.leftBtn).click(function() {
			$(els[i]).hide();
			if (i == 0) {
				$(els[i]).insertAfter($(els[len - 1]));
			} else {
				$(els[i]).insertAfter($(els[i - 1]));
			}
			$(els[i]).show();
			i++;
			if (i == len) {
				i = 0;
			}
		})
		$(options.rightBtn).click(function() {
			if (i == -1) {
				i = len-1;
			}
			$(els[i]).hide();
			if (i == len-1) {
				$(els[i]).insertBefore($(els[0]));
			} else {
				$(els[i]).insertBefore($(els[i + 1]));
			}
			$(els[i]).show();
			i--;
		})
	}
})(jQuery)