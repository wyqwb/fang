<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录</title>
	<link rel="stylesheet" href="/css/login.css">
</head>
<body>
	<!-- 头部 -->
	<div class="g-hd-wrap">
		<div class="g-hd g-wh">
			<div class="m-logo"><a href="/"><img src="<?php  echo WEB_IMAGES_PATH?>logo.png" alt="logo"></a></div>
			<div class="m-language"><a href="#">[English]</a></div>
		</div>
	</div>
	<!-- 主体 -->
	<div class="g-bd">
		<div class="g-bd-left"><img src="<?php  echo WEB_IMAGES_PATH?>left_img.jpg" alt=""></div>
		<div class="g-bd-right">
			<!-- 登录部分 -->
			
			<div class="m-login">
				<div class="m-item">邮箱/用户名/已验证手机</div>
				<!-- <form action="<?php echo base_url(); ?>login/act" method="post"> -->
				<div class="m-item2"><input type="text" name="user" class="input-user"></div>
				<div class="m-item">密码</div>
				<div class="m-item2"><input type="text" name="passwd" class="input-pwd"></div>
				<div class="m-item3"><input type="checkbox" style="vertical-align:middle;" >七天内自动登录<a>忘记密码？</a></div>
				<div class="m-item2"><a href="/login/act"><button class="u-btn btn-login"></button></a>
				<!-- </form> -->
				<div class="m-item3">使用合作帐号一键登录：</div>
				<div class="m-item2">
					<button class="u-btn btn-qq">使用QQ帐号登录</button>
					<button class="u-btn btn-bd">使用百度帐号登录</button>
					<button class="u-btn btn-wx">使用微信帐号登录</button>
					<button class="u-btn btn-wb">使用微博帐号登录</button>
				</div>
				<div class="m-item2"><a href="/reg/"><button class="u-btn btn-register"></button></a></div>
			</div>
		
		</div>
	</div>
	<div class="clear"></div>
	<!-- 底部 -->
	<div class="g-ft">
		<div class="m-connect">
			<ul>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">联系我们</a></li>
				<li><a href="#">人才招聘</a></li>
				<li><a href="#">商家入驻</a></li>
				<li><a href="#">广告服务</a></li>
			</ul>
		</div>
		<div class="m-coypright">Copyright@2014-2014 版权所有</div>
	</div>
</body>
</html>