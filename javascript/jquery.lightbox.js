/**
 * Created with JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-2-13
 * Time: 上午1:42
 * To change this template use File | Settings | File Templates.
 */
/**
 <div class="SPop_mark"></div>
 <div class="SPop_popup">
 <h2>查询筛选<span class="SPop_close jsSpopclose"></span></h2>
 <div class="SPop_con">您确认删除吗？<div class="SPon_color">如果是请点击确认按钮，否则取消。</div></div>
 <div class="SPop_but"><a href="#" class="lfloat SPop_qd">确定</a><a href="#" class="lfloat SPop_qx">取消</a></div>
 </div>
 **/
jQuery.LightBox = {};
$.extend(jQuery.LightBox,{
    confirmHtml :   '<div class="SPop_mark" id="jsConfirmMask"></div>'+
                    '<div class="SPop_popup" id="jsConfirm">'+
                        '<h2><span class="title">确认操作</span><span class="SPop_close jsSpopclose"></span></h2>'+
                        '<div class="SPop_con">您确认删除吗？<div class="SPon_color">如果是请点击确认按钮，否则取消。</div></div>'+
                        '<div class="SPop_but"><a class="lfloat SPop_qd">确定</a></div>'+
                    '</div>',
    confirmInit:function()
    {
        var body = document.getElementsByTagName('body')[0];
        var _this = this;
        $(body).append(this.confirmHtml);
        $('#jsConfirm').find('span.jsSpopclose').click(function(){
            _this.cancelConfirm();
        });
        $('#jsConfirm').find('a.SPop_qd').click(function(){
            var action = $(this).attr('action');
            if(action)
            {
                window.location.href = action;
            }
        });
    },
    cancelConfirm:function()
    {
        $('#jsConfirmMask').css('display','none');
        $('#jsConfirm').css('display','none');
    },
    openConfirm:function()
    {
        $('#jsConfirmMask').css('display','block');
        $('#jsConfirm').css('display','block');
    }
});
$.extend(jQuery.fn,{
    confirm:function(){
        this.each(function(){
            $(this).click(function(){
                if(document.getElementById('jsConfirm')==null)
                {
                    $.LightBox.confirmInit();
                }
                else
                {
                    $.LightBox.openConfirm();
                }
                var action = $(this).attr('action');
                $('#jsConfirm').find('a.SPop_qd').attr('action',action);
            });
        });
    }
});
