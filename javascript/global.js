/**
 * @author Administrator
 */
jQuery.easing['jswing'] = jQuery.easing['swing'];
jQuery.extend( jQuery.easing,
{
	def: 'easeOutQuad',
	swing: function (x, t, b, c, d) {
		return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
	},
	easeInQuad: function (x, t, b, c, d) {
		return c*(t/=d)*t + b;
	},
	easeOutQuad: function (x, t, b, c, d) {
		return -c *(t/=d)*(t-2) + b;
	},
	easeInOutQuad: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t + b;
		return -c/2 * ((--t)*(t-2) - 1) + b;
	},
	easeInCubic: function (x, t, b, c, d) {
		return c*(t/=d)*t*t + b;
	},
	easeOutCubic: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t + 1) + b;
	},
	easeInOutCubic: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t + b;
		return c/2*((t-=2)*t*t + 2) + b;
	},
	easeInQuart: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t + b;
	},
	easeOutQuart: function (x, t, b, c, d) {
		return -c * ((t=t/d-1)*t*t*t - 1) + b;
	},
	easeInOutQuart: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
		return -c/2 * ((t-=2)*t*t*t - 2) + b;
	},
	easeInQuint: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t*t + b;
	},
	easeOutQuint: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t*t*t + 1) + b;
	},
	easeInOutQuint: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
		return c/2*((t-=2)*t*t*t*t + 2) + b;
	},
	easeInSine: function (x, t, b, c, d) {
		return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
	},
	easeOutSine: function (x, t, b, c, d) {
		return c * Math.sin(t/d * (Math.PI/2)) + b;
	},
	easeInOutSine: function (x, t, b, c, d) {
		return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
	},
	easeInExpo: function (x, t, b, c, d) {
		return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
	},
	easeOutExpo: function (x, t, b, c, d) {
		return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
	},
	easeInOutExpo: function (x, t, b, c, d) {
		if (t==0) return b;
		if (t==d) return b+c;
		if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
		return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
	},
	easeInCirc: function (x, t, b, c, d) {
		return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
	},
	easeOutCirc: function (x, t, b, c, d) {
		return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
	},
	easeInOutCirc: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
		return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
	},
	easeInElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
	},
	easeOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
	},
	easeInOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
		return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;
	},
	easeInBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*(t/=d)*t*((s+1)*t - s) + b;
	},
	easeOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
	},
	easeInOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158; 
		if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
		return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
	},
	easeInBounce: function (x, t, b, c, d) {
		return c - jQuery.easing.easeOutBounce (x, d-t, 0, c, d) + b;
	},
	easeOutBounce: function (x, t, b, c, d) {
		if ((t/=d) < (1/2.75)) {
			return c*(7.5625*t*t) + b;
		} else if (t < (2/2.75)) {
			return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
		} else if (t < (2.5/2.75)) {
			return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
		} else {
			return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
		}
	},
	easeInOutBounce: function (x, t, b, c, d) {
		if (t < d/2) return jQuery.easing.easeInBounce (x, t*2, 0, c, d) * .5 + b;
		return jQuery.easing.easeOutBounce (x, t*2-d, 0, c, d) * .5 + c*.5 + b;
	}
});
var objectPrototype = Object.prototype;
$.extend($,{
	isArray : function(value)
	{
		return objectPrototype.toString.apply(value) === '[object Array]';
	},
	isString : function(value)
	{
		return typeof value === 'string';
	},
	/**
	 * @explain 鍒ゆ柇鏄惁涓虹┖,鍖呮嫭绌烘暟缁�,NULL,UNDEFINED绛夊€�
	 * @explain 绫讳技浠呬粎鏄被浼糚HP涓殑 empty(),娉ㄦ剰鍖哄垎is_set()
	 * @param {object} value
	 * @return boolean
	 */
	isEmpty : function(value)
	{
		return (value === null) || (value === undefined) || ((core.isArray(value) && !value.length));
    },
    isFunction: function(value) {
        return objectPrototype.toString.apply(value) === '[object Function]';
    },
    isObject: function(value) {
        return !!value && !value.tagName && objectPrototype.toString.call(value) === '[object Object]';
    },
	/**
	 * JQ瑁呯鎿嶄綔
	 * 1 濡傛灉elems = 鏁扮粍 鎴栬€呬粬鏄痚lement DOM鍏冪礌锛屽垯鐩存帴璋冪敤$()瑁呯锛岃繑鍥濲QUERY瀵硅薄
	 * 2 濡傛灉elems instanceof JQ瀵硅薄锛屽垯鐩存帴杩斿洖elems鏈韩
	 */
	packing : function(elems)
	{
		if(elems instanceof $)
		{
			return elems;
		}
		else if($.isArray(elems) || elems.nodeType)
		{
			return $(elems);		
		}
		else if($.isString(elems))
		{
			if(elems.indexOf('#')>=0 || elems.indexOf('.')>0)
			{
				return $(elems);
			}
			else
			{
				return $('#'+elems);
			}
		}
		else
		{
			return $([]);
		}
	},
	/**
	 * @param {string} arguments[0] 闇€瑕佸垱寤虹殑鍏ㄥ眬瀵硅薄鐨勫悕绉�
	 * @param {string} arguments[1-...]闇€瑕佹坊鍔犵殑瀵硅薄
	 */
	nameSpace : function()
	{
		var a = arguments,
			o = null,
			globalObj,
			i = 1,
			j,
			d,
			arg;
		if(window[arguments[0]])
		{
			globalObj = window[arguments[0]];
		}
		else
		{
			window[arguments[0]] = {};
		}
		for(;i<a.length;i++)
		{
			o   = window[arguments[0]];
			arg = arguments[i];
			if(arg.indexOf('.'))
			{
				d = arg.split('.');
				for(j=0;j<d.length;j++)
				{
					o[d[j]] = o[d[j]] || {};
					o       = o[d[j]];
				}
			}
			else
			{
				o[arg] = o[arg] || {};
			}			
		}
		return; 
	}
});
$.extend(jQuery, {
    getWinSize: function() {
        var width, height;
        if (document.all) {
            width = document.documentElement.clientWidth;
            height = document.documentElement.clientHeight;
        }
        else {
            width = window.innerWidth;
            height = window.innerHeight;
        }
        return {
            'x': parseInt(width),
            'y': parseInt(height)
        }
    },
    getWebSize: function() {
        var width, height, winwidth, winheight;
        width = document.body.clientWidth;
        height = document.body.clientHeight;
        if (document.all) {
            winwidth = document.documentElement.clientWidth;
            winheight = document.documentElement.clientHeight;
        }
        else {
            winwidth = window.innerWidth;
            winheight = window.innerHeight;
        }
        height = (height >= winheight) ? height : winheight;
        return {
            'x': parseInt(width),
            'y': parseInt(height)
        }
    },
    getScrollSize: function() {
        var width, height;
        if (document.all) {
            width = document.documentElement.clientWidth;
            height = document.documentElement.clientHeight;
        }
        else {
            width = window.innerWidth;
            height = window.innerHeight;
        }
        scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
        return {
            'x': parseInt(width),
            'y': parseInt(height) + scrollTop * 2
        }
    },
    getRealSize: function() {
        var width, height;
        if (document.all) {
            width = document.documentElement.clientWidth;
            height = document.documentElement.clientHeight;
        }
        else {
            width = window.innerWidth;
            height = window.innerHeight;
        }
        return {
            'x': parseInt(width),
            'y': parseInt(document.body.scrollHeight)
        }
    },
    getPageSize: function() {
        var xScroll, yScroll, windowWidth, windowHeight;
        if (window.innerHeight && window.scrollMaxY) {
            xScroll = window.innerWidth + window.scrollMaxX;
            yScroll = window.innerHeight + window.scrollMaxY;
        }
        else if (document.body.scrollHeight > document.body.offsetHeight) {
            // all but Explorer Mac  
            xScroll = document.body.scrollWidth;
            yScroll = document.body.scrollHeight;
        }
        else {
            // Explorer Mac...would also work in Explorer 6 Strict, Mozilla and Safari  
            xScroll = document.body.offsetWidth;
            yScroll = document.body.offsetHeight;
        }
        if (self.innerHeight) {
            // all except Explorer  
            if (document.documentElement.clientWidth) {
                windowWidth = document.documentElement.clientWidth;
            }
            else {
                windowWidth = self.innerWidth;
            }
            windowHeight = self.innerHeight;
        }
        else if (document.documentElement && document.documentElement.clientHeight) {
            // Explorer 6 Strict Mode  
            windowWidth = document.documentElement.clientWidth;
            windowHeight = document.documentElement.clientHeight;
        }
        else if (document.body) {
            // other Explorers  
            windowWidth = document.body.clientWidth;
            windowHeight = document.body.clientHeight;
        }
        // for small pages with total height less then height of the viewport  
        if (yScroll < windowHeight) {
            pageHeight = windowHeight;
        }
        else {
            pageHeight = yScroll;
        }
        // for small pages with total width less then width of the viewport  
        if (xScroll < windowWidth) {
            pageWidth = xScroll;
        }
        else {
            pageWidth = windowWidth;
        }
        return {
            'pageWidth': pageWidth,
            'pageHeight': pageHeight,
            'windowWidth': windowWidth,
            'windowHeight': windowHeight
        }
    },
	getElementPosLeft : function(element)
	{
		var actualLeft = element.offsetLeft,
			current = element.offsetParent;
        while(current !==null)
        {
            actualLeft += current.offsetLeft;
            current = current.offsetParent;
        }
        if(document.compatMode == 'BackCompat')
        {
            var elementScrollLeft = document.body.scrollLeft;
        }
        else
        {
            var elementScrollLeft = document.documentElement.scrollLeft;
        }
        return actualLeft - elementScrollLeft ;
	},
    getElementPostTop : function(element)
    {
        var actualTop = element.offsetTop,
            current = element.offsetParent;
        while(current !== null)
        {
            actualTop += current.offsetTop;
            current = current.offsetParent;
        }
        if(document.compatMode == 'BackCompat')
        {
            var elementScrollTop = document.body.scrollTop;
        }
        else
        {
            var elementScrollTop = document.documentElement.scrollTop;
        }
        return actualTop - elementScrollTop;
    },
    getMousePosition: function(e) {
        var posX, posY;
        if (e.pageX || e.pageY) {
            posX = e.pageX;
            posY = e.pageY;
        }
        else {
            posX = e.clientX + document.documentElement.scrollLeft;
            posY = e.clientY + document.documentElement.scrollTop;
        }
        return {
            'x': posX,
            'y': posY
        }
    },
    cutStr: function(str, len) {
        var strlen = str.length;
        str = str.replace(/<[^>]*>/g, "");
        if (strlen <= len) {
            return str;
        }
        else {
            return str.substr(0, len) + '...';
        }

    },
    gHGetData: function(options) {
        var url = '../WebService/ServiceForWebPage.aspx',
            datas = options.data,
            name, i = 0;
        if ($.isObject(datas)) {
            for (name in datas) {
                if (i == 0) {
                    url += '?' + name + '=' + datas[name];
                }
                else {
                    url += '&' + name + '=' + datas[name];
                }
                i++;
            }
        }
        $.get(url, function(json) {
            json = $.isString(json) ? eval('('+json+')')  : json;
            $.isFunction(options.callback) ? options.callback.call(json) : true;
        });
    },
	getXmlData:function(options){
		var url = options.url,
			callback = options.callback;
		$.ajax({
			type:'GET',
			url:url,
			dataType:'xml',
			success:function(xhr){
				$.isFunction(callback)?callback.call(xhr):true;
			}
		});
	},
    gHAddModule: function(url, container) {
        var url = '../Module/' + url;
        $.get(url, function(data) {
            $.packing(container).append(data);
        });
    },
    urlData: function() {
        var href = window.location.href,
            thisdata,
            data = {};
        href = href.split('?')[1];
        if (href) {
            href = href.split('&');
            $.packing(href).each(function() {
                thisdata = this.split('=');
                data[thisdata[0]] = thisdata[1];
            });
            return data;
        }
        else {
            return data;
        }
    },
    closeSelect:function(obj)
    {
        obj.onselectstart = function()
        {
            return false;
        }
    },
    openSelect : function(obj)
    {
        obj.onselectstart = function()
        {
            return true;
        }
    }
});
$.extend(jQuery.fn, {
    gHAddModule: function(url) {
        this.each(function() {
            $.gHAddModule(url, this);
        });
    }
});