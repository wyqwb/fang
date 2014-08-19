
    <link type="text/css" href="/css/jquery.ui.css" rel="stylesheet" />
    <link type="text/css" href="/css/bootstrap.min.css" rel="stylesheet" />
    <script charset="utf-8" type="text/javascript" src="/javascript/bootstrap.js" ></script>
    <script charset="utf-8" type="text/javascript" src="/javascript/jquery-ui-1.10.4.custom.min.js" ></script>

        <div class="content fr">
            <!-- 横栏概览 -->
            <div ><h2> 创建看房团信息</h2></div>

            <!-- 添加看房团 -->
            <div class="userInfo">
		<form action="<?php echo base_url(); ?>member/fangtuanlist" method="post" class="createfangtuan">
                <div class="bd">
                    <div class="msginfo" style="color:red"></div>
                    <table>
                        <tbody>
                            <tr>
                                <td class="tit">看房团名称：</td>
                                <td class="input"><input class="text"  name="title"  type="text" value="" datatype="s3-16" nullmsg="看房团名称至少3个字符,最多16个字符！"/></td>
                                <td><b class="icon-"></b><div class="Validform_checktip">看房团名称至少3个字符,最多16个字符！</div></td>
                            </tr>
                            <tr>
                                <td class="tit">注意事项：</td>
                                <td class="input">
                                <!-- <textarea class="text" name="attention" /><textarea /> -->
                                <input class="text" name="attention" type="text" value="" datatype="*" nullmsg="请输入注意事项!" /></td>
                                <td><b class="icon-"></b><div class="Validform_checktip"></div></td>
                            </tr>
                            <tr>
                                <td class="tit">行程信息：</td>
                                <td class="input"><input class="text"  name="Travelinfo" type="text" value="" datatype="*"  nullmsg="请输入行程信息！" errormsg="" /></td>
                                <td><b class="icon-"></b><div class="Validform_checktip">请输入行程信息</div></td>
                            </tr> 
                            <tr>
                                <td class="tit">出行日期：</td>
                                <td class="input">
                                <input class="text"  id="godate" name="godate" type="text" value="" datatype="*" nullmsg="请选择出行日期！" /> 
                                </td>
                                <td><b class="icon-"></b><div class="Validform_checktip">请选择出行日期</div></td>
                            </tr>
                            <tr>
                                <td class="tit">行程时间：</td>
                                <td class="input">
                                <!-- <input class="text"  name="gotime"  type="text" value="" datatype="*" nullmsg="请输入行程时间：！"/> -->
<input class='text js_notnull datePicker' data-container="body" data-trigger="focus" data-placement="right" data-content="文章发布时间不可为空" data-original-title=""  type="text" class='datePicker' name="gotime" value="<?php if (isset($artcon['gotime'])) {echo $artcon['gotime'];}?>" />


                                </td>
                                <td><b class="icon-"></b><div class="Validform_checktip">选择您的行程时间</div></td>
                            </tr> 
                            <tr>
                                <td class="tit">普通费用：</td>
                                <td class="input"><input class="text"  name="normalCost" type="text" value="" datatype="n"  nullmsg="请输入正确的费用(数字)！" errormsg="" /></td>
                                <td><b class="icon-"></b><div class="Validform_checktip">请输入正确的费用(数字)！</div></td>
                            </tr> 
                            <tr>
                                <td class="tit">Vip费用：</td>
                                <td class="input"><input class="text"  name="vipCost" type="text" datatype="n" nullmsg="请输入正确的费用(数字)！" /></td>
                                <td><b class="icon-"></b><div class="Validform_checktip">请输入正确的费用(数字)！</div></td>
                            </tr> 
                            <tr>
                                <td class="tit">显示价格：</td>
                                <td class="input"><input class="text"  name="displayCost" type="text" datatype="n" nullmsg="请输入正确的费用(数字)！" /></td>
                                <td><b class="icon-"></b><div class="Validform_checktip">请输入正确的费用(数字)！</div></td>
                            </tr> 

                            <tr>
                                <td class="tit">&nbsp;</td>
                                <td class="input"><input class="ui-btn-submit" name="sub"  type="submit" value="提交" /></td>
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
$(".createfangtuan").Validform({
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
//$('.createfangtuan').ajaxForm(options);


$('select').each(function(){
	var dataval = $(this).attr('data-value');
	if(dataval){
		$(this).find('option[value='+dataval+']').attr('selected',true);
	}
})

</script>
<script type="text/javascript">
    $((function($){
        $.datepicker.regional['zh-CN'] = {
            clearText: '清除',
            clearStatus: '清除已选日期',
            closeText: '关闭',
            closeStatus: '不改变当前选择',
            prevText: '<上月',
            prevStatus: '显示上月',
            prevBigText: '<<',
            prevBigStatus: '显示上一年',
            nextText: '下月>',
            nextStatus: '显示下月',
            nextBigText: '>>',
            nextBigStatus: '显示下一年',
            currentText: '今天',
            currentStatus: '显示本月',
            monthNames: ['一月','二月','三月','四月','五月','六月', '七月','八月','九月','十月','十一月','十二月'],
            monthNamesShort: ['一','二','三','四','五','六', '七','八','九','十','十一','十二'],
            monthStatus: '选择月份',
            yearStatus: '选择年份',
            weekHeader: '周',
            weekStatus: '年内周次',
            dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],
            dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],
            dayNamesMin: ['日','一','二','三','四','五','六'],
            dayStatus: '设置 DD 为一周起始',
            dateStatus: '选择 m月 d日, DD',
            dateFormat: 'yy-mm-dd',
            firstDay: 1,
            initStatus: '请选择日期',
            isRTL: false};
        $.datepicker.setDefaults($.datepicker.regional['zh-CN']);
    })(jQuery));

    $(document).ready(function(){
        $('.gotime').datepicker();

    });
 </script>
