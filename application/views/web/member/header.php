<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url();?>" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" href="<?php echo base_url(); ?>css/common.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo base_url(); ?>css/vipstyle.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" />
<script charset="utf-8" type="text/javascript" src="<?php echo base_url(); ?>/javascript/jquery-1.8.3.min.js" ></script>
<script charset="utf-8" type="text/javascript" src="<?php echo base_url(); ?>/javascript/Validform_v5.3.2_min.js" ></script>
<script charset="utf-8" type="text/javascript" src="<?php echo base_url(); ?>/javascript/jquery.form.min.js" ></script>
    <title>会员中心</title>
    
	<style type="text/css">
	/*==========以下部分是Validform必须的===========*/
.Validform_checktip{
	margin-left:8px;
	line-height:20px;
	height:20px;
	overflow:hidden;
	color:#999;
	font-size:12px;
}
.Validform_right{
	color:#71b83d;
	padding-left:20px;
	background:url(images/right.png) no-repeat left center;
}
.Validform_wrong{
	color:red;
	padding-left:20px;
	white-space:nowrap;
	background:url(images/error.png) no-repeat left center;
}
.Validform_loading{
	padding-left:20px;
	background:url(images/onLoad.gif) no-repeat left center;
}
.Validform_error{
	background-color:#ffe7e7;
}
#Validform_msg{color:#7d8289; font: 12px/1.5 tahoma, arial, \5b8b\4f53, sans-serif; width:280px; -webkit-box-shadow:2px 2px 3px #aaa; -moz-box-shadow:2px 2px 3px #aaa; background:#fff; position:absolute; top:0px; right:50px; z-index:99999; display:none;filter: progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#999999'); box-shadow: 2px 2px 0 rgba(0, 0, 0, 0.1);}
#Validform_msg .iframe{position:absolute; left:0px; top:-1px; z-index:-1;}
#Validform_msg .Validform_title{line-height:25px; height:25px; text-align:left; font-weight:bold; padding:0 8px; color:#fff; position:relative; background-color:#999;
background: -moz-linear-gradient(top, #999, #666 100%); background: -webkit-gradient(linear, 0 0, 0 100%, from(#999), to(#666)); filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#999999', endColorstr='#666666');}
#Validform_msg a.Validform_close:link,#Validform_msg a.Validform_close:visited{line-height:22px; position:absolute; right:8px; top:0px; color:#fff; text-decoration:none;}
#Validform_msg a.Validform_close:hover{color:#ccc;}
#Validform_msg .Validform_info{padding:8px;border:1px solid #bbb; border-top:none; text-align:left;}
.msg-block{color:red;}
	</style>
</head>

<body>
    <div id="header">
        <a href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>images/logo.jpg" width="200" height="79" alt="友山基金" /></a>
        <a href="<?php echo base_url(); ?>member"><img src="<?php echo base_url(); ?>images/jyh.jpg" alt="金友汇专区" /></a>
        <div class="fr">
            <div class="tel"> <img src="<?php echo base_url(); ?>images/tel.jpg" width="192" height="32" alt="联系方式" /></div>
            <div class="lxfs">
                <img src="<?php echo base_url(); ?>images/person.jpg" width="20" height="21" />&nbsp;您好，<span class="vipname"><?php echo $member['fullname']?></span> , 欢迎回到金友汇专区！
                <img src="<?php echo base_url(); ?>images/vipclass.jpg" width="17" height="16" /><span class="vipred"><?php echo $member['rank']?></span>
                <img src="<?php echo base_url(); ?>images/money.jpg" width="20" height="20" /><span class="vipjf">积分(<?php echo $member['point']?>)</span>
            </div>
        </div>
    </div>
    <div class="vipbanner clearfix"><img src="<?php echo base_url(); ?>images/banner_zxzx.jpg" /></div>
    <!-- by nonzar -->
    <!-- 主体 -->
    <div class="main layout mc clearfix">
