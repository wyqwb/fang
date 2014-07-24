/* 倒计时 */
$.nameSpace('YY','CountDown');
$.extend(YY.CountDown,{
    /**
     *自动关闭页面
     */
    closefartherJump : function(container)
    {
        //倒计时容器
        var timer = $.packing(container),
            mytime = setInterval(function(){
                var now = parseInt(timer.text());
                if(now == 1)
                {
                    clearInterval(mytime);
                    parent.YY.LightBox.close();
                    setTimeout(function(){
                        parent.window.location.reload();
                    },800);
                }
                else
                {
                    $(timer).empty();
                    $(timer).append(--now);
                }
            },1000);
    }
});