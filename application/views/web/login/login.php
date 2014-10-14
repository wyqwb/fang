<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>fang</title>
    <link rel="stylesheet" type="text/css" href="/css/login.css">
    <link rel="stylesheet" href="/css/login.css">
    <script type="text/javascript" src="/javascript/jquery.js"></script>
    <script type="text/javascript" src="/javascript/json2.js"></script>
    <script type="text/javascript" src="/javascript/store.js"></script>
</head>

<body>
	<!-- 头部 -->
	<div class="g-hd-wrap">
		<div class="g-hd g-wh">
			<div class="m-logo"><a href="/"><img src="<?php  echo WEB_IMAGES_PATH?>logo_login.png" alt="logo"></a></div>
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
				<div class="m-item2"><input type="text" id="username" class="input-user"></div>
				<div class="m-item">密码</div>
				<div class="m-item2"><input type="password" id="password" class="input-pwd"></div>
				<div class="m-item3"><input type="checkbox" style="vertical-align:middle;" >七天内自动登录<a>忘记密码？</a></div>
				<div class="m-item2"><button class="u-btn btn-login"  onclick="dologin()"></button>
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
	<script type="text/javascript">
	function dologin() {
            var username = $("#username").val();
            var password = $("#password").val();

            if (username == "") {
            alert("请输入邮箱/用户名/验证手机");
            $("#username").focus();
            //$("#user").html("用户名不能为空!");
            return false;
        	}

            if (password == "") {
            alert("请输入密码");
            $("#password").focus();
            //$("#user").html("用户名不能为空!");
            return false;
        	}


            var resault = $.ajax({
                url: "/login/act/",
                data: {
                    'username': username,
                    'password': password
                },
                async: false,
                type: 'post'
            });
            if (resault.responseText == "-1") {
            	alert("账号和密码错误");
                //$("#check").html("验证码错误或过期!");
                //window.location.reload();
                return false;
            }
            if (resault.responseText == "1") {
                window.location.href = '/member/';
                return false;
            }
        }

	</script>
</body>
</html>