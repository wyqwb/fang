<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- <link href="css/base.css" rel="stylesheet" type="text/css" /> -->
<link rel="stylesheet" href="/css/style_edu.css" type="text/css" media="screen"> 
<link rel="stylesheet" type="text/css" href="/css/style_edu.css" media="all" />
<link rel="stylesheet" href="/css/lrtk.css" type="text/css" media="screen" />
<script type="text/javascript" src="/javascript/jquery-1.4.2.js"></script>
<script type="text/javascript" src="/javascript/lrtk.js"></script>
<script type="text/javascript" src="/javascript/mosaic.1.0.1.js"></script>

<script type="text/javascript">
$(function(){	
	$('.tabPanel ul li').click(function(){
		$(this).addClass('hit').siblings().removeClass('hit');
		$('.panes>div:eq('+$(this).index()+')').show().siblings().hide();	
	})
		$('.tabPanel2 ul li').click(function(){
		$(this).addClass('hit').siblings().removeClass('hit');
		$('.panes2>div:eq('+$(this).index()+')').show().siblings().hide();	
	})
	$li1 = $(".apply_nav .apply_array");
	$window1 = $(".apply .apply_w");
	$left1 = $(".apply .img_l");
	$right1 = $(".apply .img_r");
	
	$window1.css("width", $li1.length*237);

	var lc1 = 0;
	var rc1 = $li1.length-5;
	
	$left1.click(function(){
		if (lc1 < 1) {

			$(".img_l").addClass('hit')
			return;
		}
		lc1--;
		rc1++;
		$window1.animate({left:'+=237px'}, 500);
	});

	$right1.click(function(){
		if (rc1 < 1){
			return;
		}
		lc1++;
		rc1--;
		$window1.animate({left:'-=237px'}, 500);
	});

})


</script>
<title>首页</title>
</head>
<body>
<div class="ad_midd"><a href="####" target="_blank"><img src="/images/ad_01.jpg"></a></div>

<div class="header">
<div class="header_c">

	<a href="/"><div class="logo"><img src="/<?php echo WEB_IMAGES_PATH?>logo.gif" width="194" height="41"  alt=""/></div></a>
    <div class="daohang">
    <ul>
        <a href="/teachcenter/"><li>课程中心</li></a>
        <a href="/exam/"><li> 水平测试</li></a>
        <a href="/coopteacher/"> <li>合作导师</li></a>
        <a href="/cooporgnization/"> <li>合作机构</li></a>
        <a href="/industryinfo/"><li> 行业资讯</li></a>
    </ul>
    </div>
    <div class="huiyuan">
    	<ul>
        <li class="tx"><img src="/<?php echo WEB_IMAGES_PATH?>toux.jpg"  alt=""/></li>
        <li class="fx"><img src="/<?php echo WEB_IMAGES_PATH?>fenxiang.gif"  alt=""/></li>
        </ul>
    </div>
    <div style="clear:both;"></div>
</div></div>