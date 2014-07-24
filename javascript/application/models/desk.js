/**
 * Created by apple on 14-6-24.
 */
var mdesk = $.createModel('desk');
$.extend(mdesk,{
    'deskModelData':[
        {
            'index' :0,
            'title' :'合同管理',
            'icon'  :'',
            'class' :'icon mod1',
            'action':'../pages/RentalInfo.htm',
            'type'  :'iframe'
        },
        {
            'index' :1,
            'title' :'订单查询',
            'icon'  :'',
            'class' :'icon mod2',
            'action':'../pages/OrderQueryr.htm',
            'type'  :'iframe'
        },
        {
            'index' :2,
            'title' :'已预付NoShow',
            'icon'  :'',
            'class' :'icon mod3',
            'action':'../pages/PrepaidNoshow.htm',
            'type'  :'iframe'
        },
        {
            'index' :3,
            'title' :'Noshow费管理',
            'icon'  :'',
            'class' :'icon mod4',
            'action':'../pages/NoshowList.htm',
            'type'  :'iframe'
        },
        {
            'index' :4,
            'title' :'对账单',
            'icon'  :'',
            'class' :'icon mod5',
            'action': '../pages/BillInquiry.htm',
            'type'  :'iframe'
        },
        {
            'index' :5,
            'title' :'POS维护',
            'icon'  :'',
            'class' :'icon mod6',
            'action':'../pages/Poslist.htm',
            'type'  :'iframe'
        },
        {
            'index' :6,
            'title' :'银行维护',
            'icon'  :'',
            'class' :'icon mod1',
            'action':'../pages/banklist.htm',
            'type'  :'iframe'
        },
        {
            'index' :7,
            'title' :'会计期间',
            'icon'  :'',
            'class' :'icon mod2',
            'action':'../pages/fiscallist.htm',
            'type'  :'iframe'
        },
        {
            'index' :8,
            'title' :'科目维护',
            'icon'  :'',
            'class' :'icon mod3',
            'action':'../pages/businesstypelist.htm',
            'type'  :'iframe'
        },
        {
            'index' :9,
            'title' :'结算账户',
            'icon'  :'',
            'class' :'icon mod4',
            'action':'../pages/accountlist.htm',
            'type'  :'iframe'
        },
        {
            'index' :10,
            'title' :'发票号码',
            'icon'  :'',
            'class' :'icon mod5',
            'action':'../pages/InvNumList.htm',
            'type'  :'iframe'
        }
    ],
    //'<li><div class="icon"></div></li>'
    'getDeskModelData':function(){
        var data = this.deskModelData,
            html = '';
        $(data).each(function(){
            html += '<li title="'+this.title+'"  index="'+this.index+'" action="'+this.action+'"type="'+this.type+'"><div class="'+this.class+'"></div>'+this.title+'</li>';
        });
        return html;
    }
});
