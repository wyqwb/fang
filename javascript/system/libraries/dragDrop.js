/**
 * Created by apple on 14-6-18.
 */
var dragDrop = OS.Libraries.dragDrop = function()
{
    this.__construct();
};
$.extend(dragDrop,{
    dragMsg:{
        start:false,
        startX:0,
        startY:0
    },
    uper:null,
    beyondStop:'false'
});
$.extend(dragDrop.prototype,{
    constructor:dragDrop,
    __constructed:function()
    {
        dragDrop.uper = document.getElementsByTagName('body')[0];
    },
    test2:function()
    {
        alert(22222);
    },
    // 初始化拖拽方式
    // way == 'false' 超出无限制
    // way == 'true'  禁止超出
    // way == 'rollback' 超出回滚
    initDragWay:function(way)
    {
        dragDrop.beyondStop = way;
    },
    /**
     * drager   拖拽对象
     * mover    移动对象
     * movcon   移动容器
     * callback 回调函数
     */
    startDrag:function(drager,mover,movcon,callback)
    {
        //拖拽对象非element元素
        if(!drager.nodeType || !mover.nodeType)
        {
            return;
        }
        //此时arguments2 为element元素
        if(arguments[2].nodeType)
        {

        }
        $(drager).mousedown(function(e){
            var pos = OS.Helpers.getMousePosition(e);
            dragDrop.dragMsg.startX = pos.x;
            dragDrop.dragMsg.startY = pos.y;
        });
        $(uper).mousemove(function(e){

        });

    }
});