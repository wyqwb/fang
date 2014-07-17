/*
 <div class='lightbg' id='jsLightBg'></div>
 <div class='lightwin groundround10' id='jsLight'>
 <div class='wintop'><span class='title'>创建新闻</span><div class='close'></div></div>
 <div class='wincenter'><iframe src="./iframe1.html" width="100%" height="100%"></iframe></div>
 <div class='winfoot'>
 <div class='note groundround5'>NOTE</div>
 <div class='explain'>当前可再写长度80字节，最多80字节。</div>
 </div>
 </div>
 */
$.nameSpace('YY','LightBox');
var light = YY.LightBox = function(){};
$.extend(light,{
    options:{
        'width':'970'
    },
    //默认距离顶部的距离
    defaulttop:30,
    pageheight:0,
    winheight:0,
    top:0,
    lighthtml :"<div class='wintop'><span class='title'></span><div class='close'></div></div>"+
        "<div class='wincenter'><iframe src='' id='jsLightFrame' width='100%' height='100%'></iframe></div>"+
        "<div class='winfoot'>"+
        "<div class='note groundround5'>NOTE</div>"+
        "<div class='explain'></div>"+
        "</div>",
    close : function()
    {
        var odiv1 = document.getElementById('jsLightBg'),
            odiv2 = document.getElementById('jsLight'),
            page = $.getPageSize(),
            scrolltop,top,lightheight;
        scrolltop = document.documentElement.scrollTop || document.body.scrollTop;
        // lightbox 实际距离顶部的位置
        top = scrolltop + light.defaulttop;
        if(light.options.height)
        {
            if(light.pageheight < top+parseInt(light.options.height))
            {
                lightbgheight = top+parseInt(light.options.height)+20;
            }
            else
            {
                lightbgheight = light.pageheight;
            }
        }
        // 在没有指定LIGHTBOX高度的情况下，自适应
        else
        {
            lightheight = page.windowHeight - 50-20;
            lightbgheight = light.pageheight;
        }
        $(odiv2).animate({
            'opacity':'0',
            'top':-lightheight,
        },'100','easeOutQuint',function(){
            $(odiv1).css('display','none');
        });
    }

});
$.extend(light.prototype,{
    //这里默认的2个ID是 jsLightBg,jsLight
    create : function(options)
    {
        var page = $.getPageSize(),
            body = document.getElementsByTagName('body')[0],
            lighthtml = light.lighthtml,
            scrolltop,lightbgheight,top,marginleft,lightwidth,lightheight,odiv1,odiv2,close;
        $.extend(light.options,options);
        scrolltop = document.documentElement.scrollTop || document.body.scrollTop;
        // lightbox 实际距离顶部的位置
        top = scrolltop + light.defaulttop;
        // lightbox 左偏移
        marginleft = -parseInt(parseInt(light.options.width)/2)+'px';
        light.pageheight = page.pageHeight;
        light.winheight = page.windowHeight;
        // LIGHTBOX的宽度
        lightwidth = light.options.width;
        // 这里是指定了 LIGHTBOX的高度
        if(light.options.height)
        {
            if(light.pageheight < top+parseInt(light.options.height))
            {
                lightbgheight = top+parseInt(light.options.height)+20;
            }
            else
            {
                lightbgheight = light.pageheight;
            }
        }
        // 在没有指定LIGHTBOX高度的情况下，自适应
        else
        {
            lightheight = page.windowHeight - 50-20;
            lightbgheight = light.pageheight;
        }
        //这里判断已经创建过 LIGHTBOX了
        if(document.getElementById('jsLight'))
        {
            odiv1 = document.getElementById('jsLightBg');
            odiv2 = document.getElementById('jsLight');
            $(odiv2).css({
                'top':-lightheight,
                'margin-left':marginleft,
                'width':lightwidth,
                'height':lightheight,
                'opacity':'0'
            });
            $(odiv1).css({
                'display':'block',
                'height':lightbgheight
            });
            $(odiv2).animate({
                'opacity':'1',
                'top':top
            },'300','easeOutExpo');
        }
        //第一次创建
        else
        {
            odiv1 = document.createElement('div');
            odiv2 = document.createElement('div');
            odiv1.id = 'jsLightBg';
            odiv2.id = 'jsLight';
            $(odiv1).addClass('lightbg');
            $(odiv2).css({
                'top':-lightheight,
                'margin-left':marginleft,
                'width':lightwidth,
                'height':lightheight,
                'opacity':'0'
            });
            $(odiv1).css({
                'height':lightbgheight
            });
            $(odiv2).addClass('lightwin groundround10');
            $(odiv2).append(lighthtml);
            $(body).append(odiv1);
            $(body).append(odiv2);
            close = $(odiv2).find('div.close');
            close.hover(function(){
                $(this).css('background-position','0px -20px');
            },function(){
                $(this).css('background-position','0px 0px');
            });
            $(odiv2).animate({
                'opacity':'1',
                'top':top
            },'300','easeOutExpo');
            close.click(function(e){
                e.stopPropagation();
                $(odiv2).animate({
                    'opacity':'0',
                    'top':-lightheight,
                },'100','easeOutQuint',function(){
                    $(odiv1).css('display','none');
                });

            });
        }
        $(odiv2).find('span.title').empty().append(light.options.title);
        $(odiv2).find('iframe#jsLightFrame').attr('src',light.options.href);
        $(odiv2).find('div.explain').empty().append(light.options.foot);
    }
});