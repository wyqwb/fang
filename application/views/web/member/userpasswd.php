﻿        <div class="content fr">
		
            <!-- 用户概览 -->            
            <div class="userSum">
                <div class="bd clearfix">
                    <dl class="fl clearfix info">
                        <dt class="fl"><a href=""><img src="<?php echo base_url(); ?>/images/ewm.png" width="80" height="80" alt="" /></a></dt>
                        <dd class="fl">
			                <p><b><?php echo $user_data['account']; ?></b></p>
                            <p><span><?php echo date("H") < 12 ? "上午好!" : "下午好!";?></span></p>
                        </dd>
                    </dl>
                    <div class="fl about">
                        <p>积分：<strong class="c_ad0909"><?php echo $user_data['point']; ?></strong>分&nbsp;<a href=""><img src="<?php echo base_url(); ?>/images/money.jpg" alt="" /></a></p>
                    </div>
                </div>
            </div>
            <!-- 个人信息修改 -->
            <div class="userInfo">
                <div class="msginfo"></div>
                <div class="bd">
		              <form action="<?php echo base_url(); ?>member/modifypasswd" method="post"  class="modifypasswd">
                    <table>
                        <tbody>
                            <tr>
                                <td class="tit">原始密码：</td>
                                <td class="input">
                                <input class="text"  nullmsg="请输入原始密码！"    errormsg="您的密码不符合要求！" type="password" name="passwd" id="passwd" value="" onblur="chkpwd()" />
                                </td>
				                <td><div class="Validform_passwd"></div></td>
                            </tr>
                            <tr>
                                <td class="tit">新密码：</td>
                                <td class="input">
                                <input class="text" type="password"  datatype="*6-16" nullmsg="请设置密码！" errormsg="密码范围在6~16位之间！" name="newpasswd" value="" />
                                </td>
                                <td><div class="Validform_checktip"></div></td>
                            </tr>
                            <tr>
                                <td class="tit">确认密码：</td>
                                <td class="input">
                                <input class="text" datatype="*" recheck="newpasswd" nullmsg="请再输入一次密码！" errormsg="您两次输入的账号密码不一致！" type="password"  value="" />
                                </td>
				                <td><b><div class="Validform_checktip"></div></b></td>
                            </tr>                           
                            <tr>
                                <td class="tit">&nbsp;</td>
                                <td class="input"><input class="ui-btn-submit"  type="submit" value="提交" /></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
	    </form>
                </div>
            </div>
                    </div>
                       </div>
<script type="text/javascript"> 
$(".modifypasswd").Validform({
	tiptype:function(msg,o,cssctl){
		//msg：提示信息;
		//o:{obj:*,type:*,curform:*}, obj指向的是当前验证的表单元素（或表单对象），type指示提示的状态，值为1、2、3、4， 1：正在检测/提交数据，2：通过验证，3：验证失败，4：提示ignore状态, curform为当前form对象;
		//cssctl:内置的提示信息样式控制函数，该函数需传入两个参数：显示提示信息的对象 和 当前提示的状态（既形参o中的type）;
		if(!o.obj.is("form")){//验证表单元素时o.obj为该表单元素，全部验证通过提交表单时o.obj为该表单对象;
			var objtip=o.obj.parents('tr').find(".Validform_checktip");
			cssctl(objtip,o.type);
			objtip.text(msg);
		}
	},
		beforeSubmit:function(){
			$('.ui-btn-submit').click();
		
		}
});

var options = {
    target:     '.msginfo',
    success: function() {
    } };
$('.modifypasswd').ajaxForm(options);


function chkpwd() {
            var passwd = $("#passwd").val();
            if (passwd == "") {
            $(".Validform_passwd").css("color","red");
            $(".Validform_passwd").html("请输入密码");
            return false;
            }

            var resault = $.ajax({
                url: "/member/chkpasswd/",
                data: {
                    'passwd': passwd,
                    'chkpwd':true
                },
                async: false,
                type: 'post'
            });
            // alert(resault.responseText);
            if (resault.responseText == "-1") {
                $(".Validform_passwd").css("color","red");
                $(".Validform_passwd").html("密码错误,请重新输入!");
                // $("#passwd").focus();
                return false;
            }
            }else{
                return  true;
            }

        }
</script>