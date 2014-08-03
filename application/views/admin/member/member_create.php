<div id='jsCustomScroll2' class="lfloat conrig_full">
<div class="Aadd_con">
    <div class="Aadd_insert">
        <h4>会员信息</h4>
        <div class="Aadd_icon">
            <div class="Aadd_ititle"><a href="#" class="cur">内容</a></div>
            <form action="<?php echo $actUrl;?>" method="post">
            	<input type="hidden" name="id" value="<?php if (isset($artcon['Id'])) {echo $artcon['Id'];}?>" />
                <div class="clear"><label>账    号：</label><input type="text" name="account" value="<?php echo $artcon['account'];?>" /></div>
                <div class="clear"><label>姓    名：</label><input type="text" name="fullname" value="<?php echo $artcon['fullname'];?>" /></div>
                <div class="clear"><label>性    别：</label><select name="gender" ><?php echo $artcon['gender'];?>
                	<option value="男">男</option>
                	<option value="女">女</option>
                </select></div>
                <!-- <div class="clear"><label>身份证号：</label><input type="text" name="idcard" value="<?php echo $artcon['idcard'];?>" /></div> -->
                <div class="clear" id = "jsOrder"><label>手    机：</label><input type="text" name="mobile" value="<?php echo $artcon['mobile'];?>" /></div>
                <div  class="clear"><label>城    市：</label><select name="city"  ><?php echo $artcon['city'];?>
                <?php foreach($city as $arr) :?>
                 	<option value="<?php echo $arr['name'];?>"><?php echo $arr['name'];?></option>
                <?php endforeach;?>
                </select></div>
                <div  class="clear"><label>积    分：</label><input type="text" name="point" value="<?php echo $artcon['point'];?>" /></div>
                <div class="Aadd_save"><input class="redbg" type="submit" name="sub" value="保存" /></div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</body>
</html>
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
        $('.datePicker').datepicker();

    });
</script>
<?php load_resource(base_url().'ueditor/ueditor.config.js',FALSE,TRUE);?>
<?php load_resource(base_url().'ueditor/ueditor.all.js',FALSE,TRUE);?>
<?php load_resource(base_url().'ueditor/lang/zh-cn/zh-cn.js',FALSE,TRUE);?>
<script>
    var editor = UE.getEditor('ueditor');
	$('#jsSelect').change(function () {
		var vals = $(this).val();
		if (vals == 1 || vals == 2 || vals == 3 || vals == 4 || vals == 5) {
			$('#jsOrder').css('display','none');
		} else {
			$('#jsOrder').css('display','block');
		}
	});
    
</script>