/**
 * Created by apple on 14-6-18.
 */
var MY_dragDrop = OS.Libraries.MY_dragDrop = function()
{
    if(this.__construct && $.isFunction(this.__construct))
    {
        this.__construct();
    }
};
$.extend(MY_dragDrop,{
    xx:33
});
$.extend(dragDrop.prototype,{
    test : function()
    {
        alert(1111);
    }
});