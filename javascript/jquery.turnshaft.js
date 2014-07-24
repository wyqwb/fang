/**
 * Created with JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-2-20
 * Time: 下午5:43
 * To change this template use File | Settings | File Templates.
 */

//创建JQ的拖拽事件
jQuery.myDragDrop={};
$.extend(jQuery.myDragDrop,{
    dragers : [],
    // this == 拖拽的 ELEMENT 对象
    dragConstruct : function(ele,e)
    {
        var left = parseInt($(ele).css('left')),
            top = parseInt($(ele).css('top')),
            len = this.dragers.length,
            myPos = $.getMousePosition(e);
        ele.dragIndex = len;
        this.dragers.push({
            start:true,
            drager:ele,
            left:left,
            top:top,
            mouseStartX:myPos.x,
            mouseStartY:myPos.y
        });
        $.closeSelect(document.getElementsByTagName('body')[0]);
    },
    dragDestruct:function(ele,e)
    {
        var index = ele.dragIndex;
        if(typeof index == 'undefined')
        {
            return;
        }
        else
        {
            this.dragers[index].start = false;
            $.openSelect(document.getElementsByTagName('body')[0]);
            $('#jsCustomScroll2').mCustomScrollbar('update');
        }
    },
    lateralMove:function(ele,e,leftinfi,rightinfi,callback)
    {
        var index = ele.dragIndex;
        if(typeof index == 'undefined')
        {
            return;
        }
        else
        {
            var obj = this.dragers[index];
            if(obj.start == true)
            {
                var myPos = $.getMousePosition(e),
                    move = myPos.x - obj.mouseStartX,
                    newLeft = obj.left + move;
                if(leftinfi)
                {
                    if(newLeft <= leftinfi)
                    {
                        newLeft = leftinfi;
                    }
                }
                if(rightinfi)
                {
                    if(newLeft >= rightinfi)
                    {
                        newLeft = rightinfi;
                    }
                }
                //alert(leftinfi+'***'+rightinfi+'***'+newLeft);
                $(ele).css('left',newLeft);
                if($.isFunction(callback))
                {
                    callback.call({
                        drager:obj,
                        pos : myPos,
                        leftinfi:leftinfi,
                        rightinfi:rightinfi
                    });
                }
            }
        }
    }
});
$.extend(jQuery.fn,{
    //本身拖拽
    selfDrag:function()
    {
        this.each(function(){

        });
    },
    //横向拖拽 leftinfi,rightinfi 左右拖拽的极限位置
    lateralDrag:function(leftinfi,rightinfi,callback,mousedownCallback)
    {
        this.each(function(){
            var _this = this;
            $(this).mousedown(function(e){
                $.myDragDrop.dragConstruct(this,e);
                if($.isFunction(mousedownCallback))
                {
                    mousedownCallback();
                }
            });
            $(document).mousemove(function(e){
                //横向移动动画
                $.myDragDrop.lateralMove(_this,e,leftinfi,rightinfi,callback);
            });
            $(document).mouseup(function(e){
                $.myDragDrop.dragDestruct(_this,e);
            });
        });
    }
});
$.nameSpace('CMS','TurnShaft');
CMS.TurnShaft = function(){};
$.extend(CMS.TurnShaft,{
    status:[]

});

$.extend(CMS.TurnShaft.prototype,{
    init : function(obj)
    {
        var drager = obj.drager,
            leftDiv = obj.leftDiv,
            rightDiv = obj.rightDiv,
            container = obj.container,
            defaultW = obj.defaultW,
            leftW = $(leftDiv).width(),
            rightW = $(rightDiv).width(),
            dragerW = $(drager).width(),
            len = CMS.TurnShaft.status.length;
        $(drager).attr('index',len);
        CMS.TurnShaft.status.push({
            drager : drager,
            leftDiv : leftDiv,
            rightDiv :rightDiv,
            container : container,
            defaultW : defaultW,
            //这里的2是两边的border
            dragerW:dragerW+2,
            leftW : leftW,
            rightW : rightW
        });
        this.doubleControl(drager);
        this.openShaft(drager);
    },
    openShaft : function(drager)
    {
        var i = $(drager).attr('index'),
            obj = CMS.TurnShaft.status[i],
            defaultW = obj.defaultW,
            leftDiv = obj.leftDiv,
            rightDiv = obj.rightDiv,
            dragerW = obj.dragerW,
            container = obj.container,
            drager = obj.drager;
        $(drager).mousedown(function(){
            if($(this).attr('class').indexOf('lractionpoint') > 0)
            {
                var leftDivW = $(leftDiv).width(),
                    rightDivW = $(rightDiv).width(),
                    containerW = $(container).width();
                $(drager).css('left',leftDivW);
                $(leftDiv).css('left','0px');
                $(rightDiv).css({
                    'left':dragerW+leftDivW,
                    'width':containerW-leftDivW-dragerW
                });
                $(this).removeClass('lractionpoint');
            }

        });

    },
    closeShaft:function(i)
    {
        var obj = CMS.TurnShaft.status[i],
            leftDiv = obj.leftDiv,
            rightDiv = obj.rightDiv,
            leftDivW = parseInt($(leftDiv).width()),
            rightDivW = parseInt($(rightDiv).width()),
            dragerW = obj.dragerW,
            containerW = $(obj.container).width(),
            drager = obj.drager;
        $(drager).css('left','0px');
        $(drager).addClass('lractionpoint');
        $(drager).attr({
            'leftDivW':leftDivW,
            'rightDivW':rightDivW
        });
        $(leftDiv).css('left',-leftDivW);
        $(rightDiv).css('left',dragerW);
        $(rightDiv).css('width',containerW-dragerW);
    },
    //双击关闭
    doubleControl:function(drager)
    {
        var _this = this;
        $(drager).dblclick(function(){
            var left = parseInt($(this).css('left')),
                index = $(this).attr('index');
            if(left > 0)
            {
                _this.closeShaft(index);
            }
        });
    },
    //横向拖拽
    lateralDrag:function(ele,leftinfi,rightinfi)
    {
        var index,obj,containerW,rightLeft,dragerWidth,leftWidth,rightWidth;
        $.packing(ele).lateralDrag(leftinfi,rightinfi,function(){
            var drager = this.drager,
                mypos = this.pos,
                leftinfi = this.leftinfi,
                rightinfi = this.rightinfi,
                move = mypos.x - drager.mouseStartX;
            if(leftinfi && rightinfi)
            {
                var leftW,rightW,rightL;
                if((leftWidth+move) <= leftinfi)
                {
                    leftW = leftinfi;
                }
                else if((leftWidth+move)>=rightinfi)
                {
                    leftW = rightinfi;
                }
                else
                {
                    leftW = leftWidth+move;
                }

                if((rightLeft+move)<=leftinfi+dragerWidth)
                {
                    rightL =leftinfi+dragerWidth;
                }
                else if((rightLeft+move)>=rightinfi)
                {
                    rightL = rightinfi;
                }
                else
                {
                    rightL = rightLeft+move;
                }


                if((rightWidth-move)>= (containerW-leftinfi-dragerWidth))
                {
                    rightW = containerW-leftinfi-dragerWidth;
                }
                else if((rightWidth-move)<=(containerW-rightinfi))
                {
                    rightW = containerW-rightinfi;
                }
                else
                {
                    rightW = rightWidth-move;
                }
                $(obj.leftDiv).css('width',leftW);
                $(obj.rightDiv).css({
                    'left':rightL,
                    'width':rightW
                });
            }
            else
            {
                $(obj.leftDiv).css('width',leftWidth+move);
                $(obj.rightDiv).css({
                    'left':rightLeft+move,
                    'width':rightWidth - move
                });
            }

        },
        function()
        {
            index = $(ele).attr('index');
            obj = CMS.TurnShaft.status[index];
            containerW = parseInt($(obj.container).width());
            rightLeft = parseInt($(obj.rightDiv).css('left'));
            dragerWidth = parseInt($(obj.drager).width())+2;
            leftWidth = parseInt($(obj.leftDiv).width());
            rightWidth = parseInt($(obj.rightDiv).width());
        });
    }

});

$(document).ready(function(){
    var myTurnShaft = new CMS.TurnShaft(),
        leftDiv = document.getElementById('jsTurnLeft'),
        rightDiv = document.getElementById('jsTurnRight');
    myTurnShaft.init({
        'drager':document.getElementById('jsTurnShaft'),
        'leftDiv':leftDiv,
        'rightDiv':rightDiv,
        'container':document.getElementById('jsCenter'),
        //must be numberic
        'defaultW':220
    });
    myTurnShaft.lateralDrag(document.getElementById('jsTurnShaft'),170,400);
});