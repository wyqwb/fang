<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>
    <link rel="stylesheet" type="text/css" href="/css/index.css">
    <link rel="stylesheet" type="text/css" href="/css/layout.css">
    <script type="text/javascript" src="/javascript/jquery.js"></script>
	<script type="text/javascript" src="/javascript/slider.js"></script>
	<script type="text/javascript" src="/javascript/unslider.min.js"></script>
</head>
<body>
	<!-- 广告 -->
<!-- 	<div class="g-banner-wrap">
		<div class="g-banner">
			
		</div>
	</div> -->
	<!-- 头部 -->
	<div class="g-hd">
		<div class="g-item g-bg1">
			<div class="g-info">
				<div class="m-logo"><a href="/">
				<img src="<?php  echo WEB_IMAGES_PATH?>logo_new.png" alt="">
				</a>
				</div>
				<div class="m-search">
					<a href=""><img src="<?php  echo WEB_IMAGES_PATH?>search.gif" alt=""></a>
					<input type="text" name="content" class="search-input">
					<span>热门关键词：
						<a href="">投资</a>
						<a href="">移民</a>
						<a href="">马来西亚</a>
						<a href="">云顶</a>
					</span>
				</div>
				<div class="m-login">
					<?php  if(isset($islogin)&&($islogin)) { ?>
					    <div class="lxfs">
               			 	<!-- <img src="/images/person.jpg" width="20" height="21" />&nbsp; -->
                			您好：<span class="vipname"><a href="/member/"><?php echo $member['account'];?></a></span> , 欢迎来到本站！
                 			<!-- <span class="vipjf">积分(0)</span> -->
               		 		<span class="vipred"><a href="/member/outlogin">[退出]</a></span>
            			</div>
	                <?php } else{ ?>
		                <a href="/reg/">注册</a> 
		                <a href="/login/">登陆</a>
		                <a href=""><img src="<?php  echo WEB_IMAGES_PATH?>qqicon.gif" alt=""></a>
						<a href=""><img src="<?php  echo WEB_IMAGES_PATH?>wxicon.gif" alt=""></a>     
	                <?php }?>
				</div>
			</div>
		</div>
	</div>