$(document).ready(function(){
    //这里是 加载 JS滚动轴事件
    $(window).load(function(){
        $("#jsLeft").mCustomScrollbar({
            autoHideScrollbar:true
        });
        $("#jsCustomScroll2").mCustomScrollbar({
            autoHideScrollbar:true
        });
        $("#jsCustomScroll3").mCustomScrollbar({
            autoHideScrollbar:true
        });
    });
    //左侧导航栏  打开与关闭事件
    $('#jsLeft').find('ul li ul').each(function(){
        $(this).click(function(e){
            e.stopPropagation();
        });
    });
    $('#jsLeftNav > li').each(function(zz){
        var sonul = $(this).find('ul'),
            jsopen = $(this).find('a.jsopen'),
            oi = $(this).find('i');
        if(($(this).attr('class')+'').indexOf('onfocus')>=0)
        {
            $(this).attr('toggle','true');
            sonul.css('display','block');
            jsopen.removeClass('modletip5');
            jsopen.addClass('modletip4');
            oi.removeClass('nav-list');
            oi.addClass('nav-list2');
            $(this).attr('toggle','true');
            $("#jsLeft").mCustomScrollbar('update');
        }
        else
        {
            $(this).attr('toggle','false');
        }
        $(this).click(function(){
            if($(this).attr('toggle') == 'false' || !$(this).attr('toggle'))
            {
                sonul.css('display','block');
                jsopen.removeClass('modletip5');
                jsopen.addClass('modletip4');
                oi.removeClass('nav-list');
                oi.addClass('nav-list2');
                $(this).attr('toggle','true');
                $("#jsLeft").mCustomScrollbar('update');
            }
            else
            {
                $(this).attr('toggle','false');
                sonul.css('display','none');
                jsopen.removeClass('modletip4');
                jsopen.addClass('modletip5');
                oi.addClass('nav-list');
                oi.removeClass('nav-list2');
                $("#jsLeft").mCustomScrollbar('update');
            }
        });
    });
    //左侧导航栏，关闭所有事件
    var leftsecnavs = $('ul.jstwonav');
    $('#jsLeftCloseAll').click(function(){
        leftsecnavs.css('display','none');
        $('#jsLeft').find('ul li').each(function(){
            $(this).attr('toggle','false');
            var jsopen = $(this).find('a.jsopen');
            var oi = $(this).find('i');
            jsopen.removeClass('modletip4');
            jsopen.addClass('modletip5');
            oi.addClass('nav-list');
            oi.removeClass('nav-list2');
        });
        $("#jsLeft").mCustomScrollbar('update');
    });
    //隐藏顶部导航栏
    var jsHeader = $('#jsHeader'),
        jsCenter = $('#jsCenter');
    $('#jsHiddenTop').click(function(){
        var classname = $(this).attr('class');
        //展开状态
        if(classname.indexOf('navtip5')>=0)
        {
            $(this).removeClass('navtip5');
            $(this).addClass('navtip6');
            jsHeader.css('display','none');
            jsCenter.css('top','0px');
        }
        //关闭状态
        else
        {
            $(this).removeClass('navtip6');
            $(this).addClass('navtip5');
            jsHeader.css('display','block');
            jsCenter.css('top','63px');
        }
    });

    //HTML5全屏操作
    var body = document.getElementsByTagName('body')[0];
    var beenscreen = false;
    function requestFullscreen( elem ) {
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        }
        else if (elem.webkitRequestFullScreen) {
            // 对 Chrome 特殊处理，
            // 参数 Element.ALLOW_KEYBOARD_INPUT 使全屏状态中可以键盘输入。
            if ( window.navigator.userAgent.toUpperCase().indexOf( 'CHROME' ) >= 0 ) {
                elem.webkitRequestFullScreen( Element.ALLOW_KEYBOARD_INPUT );
            }
            // Safari 浏览器中，如果方法内有参数，则 Fullscreen 功能不可用。
            else {
                elem.webkitRequestFullScreen();
            }
        }
        else if (elem.mozRequestFullScreen) {
            elem.mozRequestFullScreen();
        }
        else if(elem.msRequestFullscreen)
        {
            elem.msRequestFullscreen();
        }
        beenscreen = true;
    };
    function exitFullscreen() {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        }
        else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
        else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        }
        else if(document.msExitFullscreen)
        {
            document.msExitFullscreen();
        }
        beenscreen = false;
    }
    $('#jsFullScreen').click(function(){
        if(beenscreen == false)
        {
            requestFullscreen(body);
        }
        else
        {
            exitFullscreen(body);
        }
    });

    /////////////////打开  图片管理器
    $('#jsUploadPhoto').openImageManagement();


    /////////////// 删除确认按钮
    $('.jsdelete').confirm();

});



