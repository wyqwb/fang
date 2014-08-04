<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>完善资料</title>
    <link rel="stylesheet" type="text/css" href="/css/login.css">
</head>
<body>
    <!-- 头部 -->
    <div class="g-hd-wrap">
        <div class="g-hd g-wh g-ht">
            <div class="m-logo"><h1><?php echo $accoutype?>：<?php echo $username ?>请完善注册资料</h1></div>
        </div>
    </div>
    <div class="g-bd">
        <div class="m-tab">
            <div class="tab-btns"></div>
            <div class="contes">
                <div class="u-cnt">
                    <!-- <form action="/member/"  method="post"> -->
                    <input type="hidden" name="type" value="personal" />
                    <div class="m-login g-wh6">
                        <p>
                            <span class="left">电话：</span>
                            <span class="right"><input type="text" id="phone" name="phone" class="input-pwd g-wh3"></span>
                        </p>
                        <p>
                            <span class="left">QQ：</span>
                            <span class="right"><input type="text" id="qq" name="qq"   class="input-pwd g-wh3"></span>
                        </p>
                        <p>
                            <span class="left">微博：</span>
                            <span class="right"><input type="text" id="weibo" name="weibo"   class="input-pwd g-wh3"></span>
                        </p>
                        <p>
                            <span class="left">学历：</span>
                            <span class="right"><input type="text" id="xueli" name="xueli"   class="input-pwd g-wh3"></span>
                        </p>
                        <p>
                            <span class="left">职业：</span>
                            <span class="right"><input type="text" id="creer" name="creer"   class="input-pwd g-wh3"></span>
                        </p>
                        <p>
                            <span class="left">地址：</span>
                            <span class="right"><input type="text" id="address" name="address"   class="input-pwd g-wh3"></span>
                        </p>
                        <p>
<!--                             <span class="left">所在地：</span>
                            <span class="right"> -->
                            <!-- <input type="text" id="city" name="city"  onblur="checkperonal(this)" class="input-pwd g-wh3"> -->
<!--                             <select id="province" name="province" onchange="cityName(this.value);">
                                        <option value="">
                                         请选择省名
                                        </option>
                            </select>
                            <select id="city" name="city">
                                        <option value="">
                                         请选择城市名
                                        </option>
                            </select>
                            </span> -->
                        </p>
                        <p>
                            <span class="left">&nbsp;</span>
                            <span class="right">
                            <button class="u-btn" style="background-color: #ccc;font-size:20px;width:270px;height:50px;border: 1px #ccc solid;margin-top:20px" onclick="docompreg()">保存</button></span>
                        </p>
                    </div>
                <!-- </form> -->
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
    <script type="text/javascript">
        function docompreg() {
            
            var datastr="";
            //alert($("#phone").val());
            if($("#phone").val()!=""){
                datastr="{'mobile':"+$("#phone").val();
            }
            if($("#weibo").val()!=""){
                datastr+=",'weibo':"+$("#weibo").val()+"}";
            }

            //alert(datastr);
            // var weibo = $("#weibo").val();
            // var xueli = $("#xueli").val();
            // var creer = $("#creer").val();
            // var address = $("#address").val();

            var resault = $.ajax({
                url: "/reg/docompleteact/",
                data: datastr,
                async: false,
                type: 'post'
                // success : function(data) 
                // {
                //     alert(data);
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

            // if (resault.responseText == "1") {
                window.location.href = '/member/';
                // return false;
            // }
        
    }
    </script>
</body>
</html>