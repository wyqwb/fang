<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-1-21
 * Time: 下午5:56
 * To change this template use File | Settings | File Templates.
 */
//数组中的 type=>default表示默认的超链接
// type=>js 表示执行JS的AJAX请求
// type='_blank'表示打开新页面
// type='target'表示打开IFRAME页面
$config['admin_menu']=array();
$config['admin_menu']['cn']['header'][]=array('title'=>'信息中心','action'=>'admin/article','icon'=>'nav2.png','type'=>'default');
$config['admin_menu']['cn']['header'][]=array('title'=>'订单中心','action'=>'admin/orders','icon'=>'nav2.png','type'=>'default');
$config['admin_menu']['cn']['header'][]=array('title'=>'广告中心','action'=>'admin/ad','icon'=>'nav2.png','type'=>'default');
$config['admin_menu']['cn']['header'][]=array('title'=>'会员中心','action'=>'admin/member','icon'=>'nav1.png','type'=>'default');
$config['admin_menu']['cn']['header'][]=array('title'=>'管理员中心','action'=>'admin/administrator','icon'=>'nav1.png','type'=>'default');
    
$config['admin_menu']['cn']['left']['article'][]=array('title'=>'信息中心','type'=>'default',
    'child'=>array(
        array('title'=>'信息分类','action'=>'admin/article/article_sort','type'=>'default','icon'=>'icon_articlelist.png'),
        array('title'=>'创建分类','action'=>'admin/article/article_sort_create','type'=>'default','icon'=>'icon_articlecreate.png'),
        array('title'=>'信息列表','action'=>'admin/article/article_lists','type'=>'default','icon'=>'icon_articlelist.png'),
        array('title'=>'创建信息','action'=>'admin/article/article_create','type'=>'default','icon'=>'icon_articlecreate.png'),
        array('title'=>'评论列表','action'=>'admin/article/reviewlist','type'=>'default','icon'=>'icon_articlelist.png')
    ));

$config['admin_menu']['cn']['left']['ad'][]=array('title'=>'广告中心','type'=>'default',
    'child'=>array(
        array('title'=>'创建广告','action'=>'admin/ad/ad_create','type'=>'default','icon'=>'icon_articlecreate.png'),
        array('title'=>'广告列表','action'=>'admin/ad/adlist','type'=>'default','icon'=>'icon_articlelist.png'),
        array('title'=>'添加友情链接','action'=>'admin/ad/links_create','type'=>'default','icon'=>'icon_articlecreate.png'),
        array('title'=>'友情链接列表','action'=>'admin/ad/linkslist','type'=>'default','icon'=>'icon_articlelist.png')
    ));


$config['admin_menu']['cn']['left']['article'][]=array('title'=>'房产中心','type'=>'default',
    'child'=>array(
        array('title'=>'看房团列表','action'=>'admin/fangtuan/lists','type'=>'default','icon'=>'icon_articlelist.png'),
        array('title'=>'房源信息列表','action'=>'admin/fang/lists','type'=>'default','icon'=>'icon_articlelist.png'),
    ));


$config['admin_menu']['cn']['left']['orders'][]=array('title'=>'订单中心','type'=>'default',
    'child'=>array(
        array('title'=>'订单列表','action'=>'admin/orders/orderlist','type'=>'default','icon'=>'icon_articlelist.png')
    ));


// $config['admin_menu']['cn']['left']['track'][]=array('title'=>'访客信息','type'=>'default',
//     'child'=>array(
//         array('title'=>'访问记录','action'=>'admin/track/track_list','type'=>'default','icon'=>'icon_articlelist.png')
//     ));
    
    
$config['admin_menu']['cn']['left']['administrator'][]=array('title'=>'管理员中心','action'=>'admin/administrator/home','type'=>'default',
		'child'=>array(
				array('title'=>'管理员模块','action'=>'admin/administrator/lists','type'=>'default')

		));

$config['admin_menu']['cn']['left']['member'][]=array('title'=>'会员中心','type'=>'default',
    'child'=>array(
        array('title'=>'普通会员','action'=>'admin/member/normal_member_lists','type'=>'default','icon'=>'icon_articlelist.png'),
        array('title'=>'商户会员','action'=>'admin/member/business_member_lists','type'=>'default','icon'=>'icon_articlelist.png'),
        array('title'=>'积分管理','action'=>'admin/member/point_lists','type'=>'default','icon'=>'icon_articlelist.png'),
        // array('title'=>'意见反馈','action'=>'admin/question/lists','type'=>'default','icon'=>'icon_articlelist.png'),
    ));

$config['tools']['cn']['images']= "<div id='jsUploadPhoto'><a  class='hoverabg'><i class='modletip'></i>上传图片</a></div>";
//admin/article/article_create
$config['tools']['cn']['article']= "<div ><a  class='hoverabg' href='./admin/article/article_create'><i class='modletip'></i>添加文章</a></div>";
// $config['tools']['cn']['point']= "<div ><a  class='hoverabg' href='./admin/member/pointcal'><i class='modletip'></i>计算积分</a></div>";
// $config['tools']['cn']['price']= "<div ><a  class='hoverabg' href='./admin/price/price_create'><i class='modletip'></i>新增净值</a></div>";
// $config['tools']['cn']['createquestion']= "<div ><a  class='hoverabg ' href='./admin/questionbank/createquestion'><i class='modletip'></i>创建试题</a></div>";
// $config['tools']['cn']['createcourse']= "<div ><a  class='hoverabg ' href='./admin/edu/createcourse'><i class='modletip'></i>创建课程</a></div>";


$config['accountype_normal']=1;
$config['accountype_business']=2;
