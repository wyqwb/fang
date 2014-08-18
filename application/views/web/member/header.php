<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url();?>" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" href="/css/common.css" rel="stylesheet" />
    <link type="text/css" href="/css/vipstyle.css" rel="stylesheet" />
    <link type="text/css" href="/css/style.css" rel="stylesheet" />
   
<script charset="utf-8" type="text/javascript" src="/javascript/jquery-1.8.3.min.js" ></script>
<script charset="utf-8" type="text/javascript" src="/javascript/Validform_v5.3.2_min.js" ></script>
<script charset="utf-8" type="text/javascript" src="/javascript/jquery.form.min.js" ></script>
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

/* foot part*/
.g-ft {
  height: 50px;
}
.g-ft .g-ft-wrap {
  position: relative;
  margin: 0 auto;
  color: #fff;
  line-height: 50px;
}
.g-ft .connects {
  position: absolute;
  right: 0;
  top: 0;
}
.g-bg1 {
  background: #28a7e1;
}

	</style>
</head>

<body>
<div id="header_bg">
    <div id="header">
        <a href="/"><img src="/images/logo.jpg" width="140" height="59" style="margin-top:10px" alt="用户中心" /></a>
        <div class="fr">
            <div class="tel">
             <!-- <img src="/images/tel.jpg" width="192" height="32" alt="联系方式" /> -->
             </div>
            <div class="lxfs">
                <!-- <img src="/images/person.jpg" width="20" height="21" />&nbsp; -->
                您好：<span class="vipname"><?php echo $account;?></span> , 欢迎来到本站！
                <!-- <img src="/images/money.jpg" width="20" height="20" /> -->
                <span class="vipjf">积分(0)</span>
                <span class="vipred"><a href="/member/outlogin">[退出]</a></span>
            </div>
        </div>
    </div>
</div>    
    <div class="vipbanner clearfix"><img src="/images/banner_zxzx.jpg" /></div>
    <!-- by nonzar -->
    <!-- 主体 -->
    <div class="main layout mc clearfix">
