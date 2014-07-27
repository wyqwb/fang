<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
    <link rel="stylesheet" type="text/css" href="/css/login.css">
</head>
<body>
    <!-- 头部 -->
    <div class="g-hd-wrap">
        <div class="g-hd g-wh g-ht">
            <div class="m-logo"><a href="/"><img src="<?php  echo WEB_IMAGES_PATH?>logo.png" alt="logo"></a></div>
        </div>
    </div>
    <div class="g-bd">
        <div class="m-tab">
            <div class="tab-btns">
                <span class="on">个人用户</span>
                <span>企业用户</span>
                <div class="login-user">我已经注册，现在就<a href="">登录</a><a href="">English</a></div>
            </div>
            <div class="contes">
                <div class="u-cnt">
                    <div class="m-login g-wh6">
                        <p>
                            <span class="left"><span class="red">*</span>账户名：</span>
                            <span class="right"><input type="text" class="input-user g-wh3"></span>
                        </p>
                        <p>
                            <span class="left"><span class="red">*</span>请设置密码：</span>
                            <span class="right"><input type="password" class="input-pwd g-wh3"></span>
                        </p>
                        <p>
                            <span class="left"><span class="red">*</span>请确认密码：</span>
                            <span class="right"><input type="password" class="input-pwd g-wh3"></span>
                        </p>
                        <p>
                            <span class="left"><span class="red">*</span>验证码：</span>
                            <span class="right">
                                <input type="text" class="input-code"><img src="<?php  echo WEB_IMAGES_PATH?>code.jpg" alt="">
                                <span>看不清？<a href="">换一张</a></span>
                            </span>
                        </p>
                        <p>
                            <span class="left">&nbsp;</span>
                            <span class="right">
                                <input type="checkbox" style="vertical-align:middle;">我已阅读并同意<a href="">《用户注册协议》</a>
                            </span>
                        </p>
                        <p>
                            <span class="left">&nbsp;</span>
                            <span class="right"><button class="u-btn btn-register btn-bg2"></button></span>
                        </p>
                    </div>
                </div>
                <div class="u-cnt"></div>
            </div>
        </div>
    </div>
    <!-- 底部 -->
    <div class="g-ft g-ht3">
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
    <script type="text/javascript" src="/javascript/jquery.js"></script>
    <script type="text/javascript" src="/javascript/tab.js"></script>
    <script type="text/javascript">
    $(function(){
        $(".u-cnt").hide();
        $(".m-tab").tab({
            events:"click",
            btnEl:".tab-btns span",
            unEl:".u-cnt"
        });
    })
    </script>
</body>
</html>