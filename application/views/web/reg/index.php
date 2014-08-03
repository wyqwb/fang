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
                <span class="on" user-type="normal">个人用户</span>
                <span user-type="business">企业用户</span>
                 <input type="hidden" name="regtype" id="regtype" value="normal" />
                <div class="login-user">我已经注册，现在就<a href="/login/">登录</a><a href="">English</a></div>
            </div>
            <div class="contes">
                <div class="u-cnt">
                    <div class="m-login g-wh6">
                        <p>
                            <span class="left"><span class="red">*</span>账户名：</span>
                            <span class="right"><input type="text" class="input-user g-wh3" placeholder="邮箱/用户名/手机号" id="regName">
                                <span class='red' id="user"></span>
                            </span>
                        </p>
                        <p>
                            <span class="left"><span class="red">*</span>请设置密码：</span>
                            <span class="right"><input type="password" class="input-pwd g-wh3" id="password">
                            <span class='red' id="pwd"></span>
                            </span>
                        </p>
                        <p>
                            <span class="left"><span class="red">*</span>请确认密码：</span>
                            <span class="right"><input type="password" class="input-pwd g-wh3" id="repassword">
                            <span class='red' id="pwd2"></span>
                            </span>
                        </p>
                        <p>
                            <span class="left"><span class="red">*</span>验证码：</span>
                            <span class="right">
                                <input type="text" class="input-code" id="captcha"><?php echo $image?>
                                <span>看不清？<a href="">换一张</a>
                                <span class='red' id="check"></span>
                                </span>
                            </span>
                        </p>
                        <p>
                            <span class="left">&nbsp;</span>
                            <span class="right">
                                <input type="checkbox" id="protocal" name="protocal" checked="checked"  style="vertical-align:middle;">我已阅读并同意<a href="">《用户注册协议》<span class='red' id="admint"></span></a>
                            </span>
                        </p>
                        <p>
                            <span class="left">&nbsp;</span>
                            <span class="right"><button class="u-btn btn-register btn-bg2" onclick="doreg()"></button></span>
                        </p>
                    </div>
                </div>
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
    <script type="text/javascript" src="/javascript/json2.js"></script>
    <script type="text/javascript" src="/javascript/store.js"></script>
    <script type="text/javascript">
    $(function(){
        var tabIndex=store.get("index");
        if(tabIndex){
            var json = JSON.parse(tabIndex);
            $(".tab-btns").find("span").eq(json.tab).click();
        }
        //储存
        $(".tab-btns").find("span").each(function(i){
            $(this).click(function(){
                store.set("index",JSON.stringify({"tab":i}));
            })
        })

        $(".tab-btns").find("span").each(function(){
            $(this).click(function(){
                $(this).addClass("on").siblings().removeClass("on");
                $("input:hidden").val($(this).attr("user-type"))

            })
        })
    })
    function checkinput() {
        var username = $("#regName").val();
        if (username == "") {
            $("#regName").focus();
            $("#user").html("用户名不能为空!");
            return false;
        }else{
            $("#user").html("");
        }
        var repwd = $("#repassword").val();
        var pwd = $("#password").val();
        if ((pwd != "") || (repwd != "")) {
            if (pwd != repwd) {
                $("#pwd").html("");
                //alert("两次密码不一致!");
                $("#pwd2").html("两次密码不一致!");
                $("#repassword").focus();
                return false;
            }else{
            $("#pwd2").html("");
            }
        } else {
            //alert("密码不能为空，请输入正确的密码!");
            $("#pwd").html("密码不能为空，请输入正确的密码!");
            $("#password").focus();
            return false;
        }

        var captcha = $("#captcha").val();
        if (captcha == "") {
            //alert("验证码不能为空");
            $("#check").html("验证码不能为空!");
            $("#captcha").focus();
            return false;
        }else{
            $("#check").html("");
        }

        if ($("#protocal").attr("checked") != "checked") {
            //alert("请同意协议");
            $("#admint").html("请同意协议!");
            return false;
        }else{
            $("#admint").html("");
        }
        return true;
    }

    function doreg() {
        if (checkinput()) {
            var captcha = $("#captcha").val();
            var username = $("#regName").val();
            var pwd = $("#password").val();
            var accountype = $("input:hidden").val();
            //alert(accountype);
            var resault = $.ajax({
                url: "/reg/act/",
                data: {
                    'captcha': captcha,
                    'username': username,
                    'password': pwd,
                    'accountype': accountype
                },
                async: false,
                type: 'post'
                // success : function(data) 
                // {
                //    //  if(data=="-1"){ 
                //    //  alert("验证码错误或过期");
                //    //  window.location.reload();
                //    //  return false;
                //    // }                                                 
                // },
                // error : function() 
                // {      
                //     alert('There was a problem');
                //     return false;
                // }
            });
            //alert(resault.responseText);
            if (resault.responseText == "-1") {
            //  alert("验证码错误或过期");
                $("#check").html("验证码错误或过期!");
                window.location.reload();
                return false;
            }
            if (resault.responseText == "-2") {
            //  alert("此帐号已注册");
                $("#user").html("此帐号已注册!");
                $("#regName").focus();
                return false;
            }
            if (resault.responseText == "-3") {
                alert("注册失败,请稍候重试!");
                window.location.reload();
                return false;
            }
            if (resault.responseText == "1") {
                window.location.href = '/reg/docomplete/'+accountype;
                return false;
            }
        }
    }
    </script>
</body>
</html>