
        <div class="content fr">
            <!-- 用户概览 -->
            <div class="userSum">
                <div class="bd clearfix">
                    <dl class="fl clearfix info">
                        <dt class="fl"><a href=""><img src="<?php echo base_url(); ?>images/ewm.png" width="80" height="80" alt="" /></a></dt>
                        <dd class="fl">
                            <p><b><?php echo $member['account']; ?></b></p>
                            <p><span><?php echo date("H") < 12 ? "上午好!" : "下午好!";?></span></p>
                        </dd>
                    </dl>
                    <div class="fl about">
                        <!-- <p>会员等级：<a class="c_ad0909" href=""><?php echo $member['rank']; ?></a>&nbsp;<a href=""><img src="<?php echo base_url(); ?>/images/vipclass.jpg" alt="" /></a></p> -->
                        <!-- <p>积分：<strong class="c_ad0909"><?php echo $member['point']; ?></strong>分&nbsp;<a href=""><img src="<?php echo base_url(); ?>/images/money.jpg" alt="" /></a></p> -->
                    </div>
                </div>
            </div>


            <!-- 个人信息修改 -->
            <div class="userInfo">
		<form action="<?php echo base_url(); ?>/member/moduserinfo" method="post" class="moduserinfo">
                <div class="bd">
                    <div class="msginfo" style="color:red"></div>
                    <table>
                        <tbody>
                            <tr>
                                <td class="tit">真实姓名：</td>
				                <td class="input">
                                <input class="text" type="text" disabled="disabled" value="<?php echo $member['account']; ?>" /></td>
                                <td><b class="icon-"></b>默认姓名，不可修改</td>
                            </tr>
                            <tr>
                                <td class="tit">联系电话：</td>
                                <td class="input"><input class="text" type="text" disabled="true" value="<?php echo $member['mobile']; ?>" /></td>
                                <td><b class="icon-"></b>默认电话，不可修改</td>
                            </tr>
                            <tr>
                                <td class="tit">身份证号：</td>
                                <td class="input"><input class="text"  disabled="true" datatype="*5-25" nullmsg="请输入身份证号码！" errormsg="身份证号码无效！"   name="idcard" type="text" value="<?php echo $member['idcard']; ?>" /></td>
                                <td><b class="icon-"></b>默认身份证号,不可修改</td>
                            </tr> 
                            <tr>
                                <td class="tit">城市选择：</td>
				                <td class="input">
                                <select name="city" data-value="<?php echo $member['city']; ?>"  datatype="*" nullmsg="请选择城市！" errormsg="请选择城市！"   disabled="disabled" style="width:210px;">
					            <option>--选择--</option>
					            <?php foreach($city as $arr): ?>
					            <option value="<?php echo $arr['name']; ?>"> <?php  echo $arr['name'];?></option>
					            <?php endforeach; ?>
					            </select></td>
                                <td><b class="icon-"></b><div class="Validform_checktip"></div></td>
                            </tr>
                            <tr>
                                <td class="tit">邮　　箱：</td>
                                <td class="input"><input class="text" name="mail" type="text" disabled="disabled" datatype="e" nullmsg="请输入邮箱" errormsg="邮箱无效" value="<?php echo $member['email']; ?>" /></td>
                                <td><div class="Validform_checktip"></div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
</form>
            </div>
        </div>
           </div>
<script type="text/javascript"> 
$(".moduserinfo").Validform({
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
$('.moduserinfo').ajaxForm(options);


$('select').each(function(){
	var dataval = $(this).attr('data-value');
	if(dataval){
		$(this).find('option[value='+dataval+']').attr('selected',true);
	}
})
</script>
