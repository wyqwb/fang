/**
 * ------------------------------------------
 * tab插件
 * @update  2014-6-05
 * @author zhangyp
 * ------------------------------------------
*/
(function($){
		$.fn.tab = function(options) { 

			//默认配置defaults
			var defaults = {
				events: "mouseover", //默认事件
				currentClass: "on", //选中后的class
				btnEl: ".tab_btns span",
				unEl: ".tab_un",
				defaultNum: 0, //默认第几个样式
				index: -1
			};
			//初始化配置 
			var options = $.extend(defaults, options);
			//为每个jquery选择器绑定事件
			return this.each(function() {
				var el_tab = $(this), 
					num = options.defaultNum,
					contents = el_tab.children(),
					currentClass=options.currentClass; 
				$(contents[0]).children().each(function(i) { 

					$(this).bind(options.events, function() {
						var that = $(this);
						that.addClass(currentClass).siblings().removeClass(currentClass);
						el_tab.find(options.unEl).hide();
						$($(contents[1]).children()[i]).show();
						var child_ct = $(contents[1]).find(options.unEl).eq(i);
						child_ct.find(options.btnEl).eq(0).addClass(currentClass).siblings().removeClass(currentClass);
						child_ct.find(options.unEl).eq(0).show();
						return false;
					});

				});
				$(this).find(options.btnEl).eq(options.defaultNum).addClass(currentClass);
				$(contents[1]).find(options.unEl).eq(0).show();
			});
		}

})(jQuery)

	