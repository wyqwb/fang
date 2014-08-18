
        <div class="content fr">
            <!-- 横栏概览 -->
            <div class="userSum"><h2> 创建看房团信息</h2></div>

            <!-- 添加看房团 -->
            <div class="userInfo">
		<form action="<?php echo base_url(); ?>/member/moduserinfo" method="post" class="moduserinfo">
                <div class="bd">
                    <div class="msginfo" style="color:red"></div>
                    <table>
                        <tbody>
                            <tr>
                                <td class="tit">看房团名称：</td>
                                <td class="input"><input class="text"  name="title"  type="text" value="" datatype="t" nullmsg="请输看房团名称！"/></td>
                                <td><b class="icon-"></b><div class="Validform_checktip"></div></td>
                            </tr>
                            <tr>
                                <td class="tit">注意事项：</td>
                                <td class="input">
                                <!-- <textarea class="text" name="attention" /><textarea /> -->
                                <input class="text" name="attention" type="text" value="" datatype="t" nullmsg="请输入注意事项!" /></td>
                                <td><b class="icon-"></b><div class="Validform_checktip"></div></td>
                            </tr>
                            <tr>
                                <td class="tit">行程信息：</td>
                                <td class="input"><input class="text"  name="Travelinfo" type="text" value="" datatype="*" nullmsg="请输入行程信息！" errormsg="" /></td>
                                <td><b class="icon-"></b><div class="Validform_checktip"></div></td>
                            </tr> 
                            <tr>
                                <td class="tit">出行日期：</td>
                                <td class="input">
                                <input class="text"  name="vipCost" type="text" value="" datatype="*" nullmsg="请选择出行日期！"/></td>
                                <td><b class="icon-"></b><div class="Validform_checktip"></div></td>
                            </tr>
                            <tr>
                                <td class="tit">行程时间：</td>
                                <td class="input">
                                <input class="text"  name="vipCost" type="text" value="" datatype="*" nullmsg="请输入行程时间：！"/></td>
                                <td><b class="icon-"></b><div class="Validform_checktip"></div></td>
                            </tr> 
                            <tr>
                                <td class="tit">普通费用：</td>
                                <td class="input"><input class="text"  name="normalCost" type="text" value="" datatype="*" nullmsg="请输入普通费用！"/></td>
                                <td><b class="icon-"></b><div class="Validform_checktip"></div></td>
                            </tr> 
                            <tr>
                                <td class="tit">Vip费用：</td>
                                <td class="input"><input class="text"  name="vipCost" type="text"  /></td>
                                <td><b class="icon-"></b></td>
                            </tr> 
                            <tr>
                                <td class="tit">显示价格：</td>
                                <td class="input"><input class="text"  name="displayCost" type="text" datatype="*" nullmsg="请输入显示价格！" /></td>
                                <td><b class="icon-"></b><div class="Validform_checktip"></div></td>
                            </tr> 

                            <tr>
                                <td class="tit">&nbsp;</td>
                                <td class="input"><input class="ui-btn-submit" type="submit" value="提交" /></td>
                                <td></td>
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
