<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
    <link rel="stylesheet" type="text/css" href="/css/login.css">
  <!--  <script type="text/javascript" src="/javascript/jquery-1.8.2.min.js"></script> -->
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
                    <form id="pform"  method="post">
                    <input type="hidden" name="type" value="personal" />
                    <div class="m-login g-wh6">
                        <p>
                            <span class="left"><span class="red">*</span>账户名：</span>
                            <span class="right">
<input type="text" id="pregName" name="regName" class="input-user g-wh3" tabindex="1" autocomplete="off" onpaste="return false;" value="邮箱/用户名/手机号" onfocus="if(this.value=='邮箱/用户名/手机号') this.value='';this.style.color='#333'" onblur="if(this.value=='') {this.value='邮箱/用户名/手机号';this.style.color='#999999'}" style="color: rgb(153, 153, 153);">
                            <!-- <input type="text" id="pname" name="username" class="input-user g-wh3"> -->
                            </span>
                        </p>
                        <p>
                            <span class="left"><span class="red">*</span>请设置密码：</span>
                            <span class="right"><input type="password" id="ppwd" name="password" class="input-pwd g-wh3"></span>
                        </p>
                        <p>
                            <span class="left"><span class="red">*</span>请确认密码：</span>
                            <span class="right"><input type="password" id="prpwd" name="repassword"  onblur="checkperonal(this)" class="input-pwd g-wh3"></span>
                        </p>
                        <p>
                            <span class="left"><span class="red">*</span>验证码：</span>
                            <span class="right">
                                <input type="text" name="captcha" id="pcap" class="input-code"><?php echo $image?>
                                <span>看不清？<a href="">换一张</a></span>
                            </span>
                        </p>
                        <p>
                            <span class="left">&nbsp;</span>
                            <span class="right">
                                <input type="checkbox" name="protocal" checked="checked" style="vertical-align:middle;">我已阅读并同意<a href="">《用户注册协议》</a>
                            </span>
                        </p>
                        <p>
                            <span class="left">&nbsp;</span>
                            <span class="right"><button class="u-btn btn-register btn-bg2" onclick="doreg()" /></button></span>
                        </p>
                    </div>
                </form>
                </div>
                <div class="u-cnt">
                        <form action="/reg/act/"  method="post">
                        <input type="hidden" name="type" value="Enterprise" />
                        <div class="m-login g-wh6">
                        <p>
                            <span class="left"><span class="red">*</span>账户名：</span>
                            <span class="right"><input type="text" id="ename" name="username" c class="input-user g-wh3"></span>
                        </p>
                        <p>
                            <span class="left"><span class="red">*</span>请设置密码：</span>
                            <span class="right"><input type="password" id="epwd" name="password"  class="input-pwd g-wh3"></span>
                        </p>
                        <p>
                            <span class="left"><span class="red">*</span>请确认密码：</span>
                            <span class="right"><input type="password" id="erepwd" name="repassword"  class="input-pwd g-wh3"></span>
                        </p>
                        <p>
                            <span class="left"><span class="red">*</span>验证码：</span>
                            <span class="right">
                                <input type="text"  name="captcha" id="ecap" class="input-code"><?php echo $image?>
                                <span>看不清？<a href="">换一张</a></span>
                            </span>
                        </p>
                        <p>
                            <span class="left">&nbsp;</span>
                            <span class="right">
                                <input type="checkbox" checked="checked"  style="vertical-align:middle;">我已阅读并同意<a href="">《用户注册协议》</a>
                            </span>
                        </p>
                        <p>
                            <span class="left">&nbsp;</span>
                            <span class="right"><button class="u-btn btn-register btn-bg2"></button></span>
                        </p>
                    </div>
                    </form>


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

    function checkperonal(obj){
        var pwd = $("#ppwd").val();
        if((pwd!="")||(obj.value!=""))
        {
            if(pwd!=obj.value){
            alert("两次密码不一致!"); 
            $("#ppwd").focus();   
            return;   
            }
        }else{
            alert("密码不能为空，请输入正确的密码!");   
            return;
        }
    }


    function doreg(){
                url: "/reg/act/",
                var captcha = $("#pcap").val();
                alert(captcha);
                $.post(url,{"captcha":captcha},function(data){    
                    if(data==-1){ 
                    alert("验证码错误或过期");
                    }
                });
                // $('#pform').form('submit',{
                //     url:"/reg/act/",
                //     onSubmit: function(){
                //         return $(this).form('validate');
                //     },
                //     success: function(result){
                //         var result = eval('('+result+')');
                //         alert(result);
                //     }
                // )};
    }  




    </script>
</body>
</html>