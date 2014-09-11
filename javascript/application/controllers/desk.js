/**
 * Created by apple on 14-6-18.
 */
$.createController('Desk');
$.extend(Desk,{
    deskIndex:1,
    //当ELEMENT属性中没有指定INDEX层级关系的时候，默认调用此数据
    undefinedIndex:9999999,
    deskCon:null,
    //活动窗口的容器
    activeWinCon:null,
    iframeIdPre:'activeWin',
    iframeIdCon:'activeWinCon',
    //拖拽对象
    dragDrop:null,
    //model对象
    mdesk:null,
    __constructor:function()
    {
        this.dragDrop = this.load.library('dragDrop');
        this.mdesk    = this.load.model('desk');
        //初始化 HOME 事件
        this.focusEvent('activeWin');
    },
    _deskInit:function()
    {
        this.deskCon = $('#jsiframcon');
        this.activeWinCon = $('#jsactivewincon');
    },
    closeEvent : function(id)
    {
        var target = $('#'+id).attr('target');
        $('#'+id).find('.closed').click(function(e){
            e.stopPropagation();
            $('#'+id).remove();
            $('#'+target).remove();
        });
    },
    focusEvent :function(id)
    {
        var _this = this,
            target = $('#'+id).attr('target');
        $('#'+id).click(function(){
            var deskindex = $(this).attr('deskindex');
            if(deskindex == _this.deskIndex)
            {
                return;
            }
            else
            {
                _this.deskIndex++;
                $('#'+id).attr('deskindex',_this.deskIndex);
                $('#'+target).attr('deskindex',_this.deskIndex);
                _this.deskFocus(target,id);
            }
        });
    },
    deskFocus:function(winId,activeId)
    {
        this.deskCon.find('div.item').each(function(){
            var deskindex = $(this).attr('deskindex');
            $(this).css('z-index',deskindex);
        });
        this.activeWinCon.find('.item').each(function(){
            var deskindex = $(this).attr('deskindex');
            $(this).css('z-index',deskindex);
        });
    },
    openIframe:function(ele)
    {
        var undefined,
            index     = $(ele).attr('index'),
            action    = $(ele).attr('action'),
            title     = $(ele).attr('title'),
            index     = (index == undefined)?index:'md_'+hex_md5(action),
            activeId  = this.iframeIdPre+index,
            winId     = this.iframeIdCon+index,
            winHtml   = '',
            activeHtml= '';
        //不存在
        if(document.getElementById(activeId) == null)
        {
            this.deskIndex++;
            winHtml = "<div class='item iframe' deskindex='"+this.deskIndex+"' target='"+activeId+"' id='"+winId+"'><iframe src='"+action+"'></iframe></div>";
            activeHtml = "<li class='item' target='"+winId+"' deskindex='"+this.deskIndex+"' id='"+activeId+"'><a>"+title+"</a><div class='closed'></div></li>";
            this.activeWinCon.append(activeHtml);
            this.deskCon.append(winHtml);
            this.focusEvent(activeId);
            this.closeEvent(activeId);
            this.deskFocus(winId,activeId);
        }
        else
        {
            if($('#'+activeId).attr('deskindex') == this.deskIndex)
            {
                return;
            }
            else{
                this.deskIndex++;
                $('#'+activeId).attr('deskindex',this.deskIndex);
                $('#'+winId).attr('deskindex',this.deskIndex);
                this.deskFocus(winId,activeId);
            }
        }
        //this.deskChoose(winId,activeId);
    },
    deskEventCon:function()
    {
        var _this = this;
        $('#jsmodelcon li').each(function(){
            $(this).click(function(){
                var type = $(this).attr('type');
                switch(type)
                {
                    case 'iframe':_this.openIframe(this);
                        break;
                }
            });
        });
    },
    //创建桌面的快捷窗口
    C_createDeskModel : function()
    {
        this._deskInit();
        var html = this.mdesk.getDeskModelData();
        $('#jsmodelcon').append(html);
        this.deskEventCon();
    },
    C_createDashboard:function()
    {
        $('#jsdashboard').highcharts({
            title: {
                text: 'Monthly Average Temperature',
                x: -20 //center
            },
            exporting :{
                //url:'export/index.php',
                width:800
            },
            subtitle: {
                text: 'Source: WorldClimate.com',
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Temperature (°C)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: '°C'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'test',
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
            }, {
                name: 'test2',
                data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
            }]
        });
    }
});
$.doController('Desk',true);