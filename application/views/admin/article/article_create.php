<div id='jsCustomScroll2' class="lfloat conrig_full">
<div class="Aadd_con">
    <div class="Aadd_insert">
        <h4>文章发布</h4>
        <div class="Aadd_icon">
            <div class="Aadd_ititle"><a href="#" class="cur">内容</a></div>
            <form action="<?php echo $actUrl;?>" method="post" class='js_needcheck' enctype="multipart/form-data">
            	<input type="hidden" name="id" value="<?php if (isset($artcon['id'])) {echo $artcon['id'];}?>" />
                <div><label>标题：</label><input type="text" class='js_notnull' data-container="body" data-trigger="focus" data-placement="right" data-content="文章标题不可为空" data-original-title="" name="title" value="<?php if (isset($artcon['title'])) {echo $artcon['title'];}?>" /></div>
                <!-- <div class="clear"><label>副标题：</label><input type="text" name="subtitle" value="<?php if (isset($artcon['subtitle'])) {echo $artcon['subtitle'];}?>" /></div> -->
                <!-- <div  class="clear"><label>发布时间：</label><input class='js_notnull datePicker' data-container="body" data-trigger="focus" data-placement="right" data-content="文章发布时间不可为空" data-original-title=""  type="text" class='datePicker' name="published" value="<?php if (isset($artcon['published'])) {echo $artcon['published'];}?>" /></div> -->
                <div  class="clear"><label>栏目：</label><?php if(isset($article_tree)){echo $article_tree;}?></div>
                <div  class='clear' id = "jsOrder"><label>排序：</label><input type="text" class='js_notnull' data-container="body" data-trigger="focus" data-placement="right" data-content="文章排序不可为空，默认为0" data-original-title="" name="order" value="<?php if (isset($artcon['order'])) {echo $artcon['order'];}else{echo 0;}?>" /></div>
                <div class="clear "><label>预览图：</label><input type="file" class="" data-container="body" data-trigger="focus" data-placement="right" data-content="" data-original-title="" name="addphoto" value=""></div>
                <div class="clear "><label>是否推荐：</label><input type="radio" name="selected" <?php if (isset($artcon['selected'])) {echo "checked='checked'";}?> value="1" /><span style="margin-right:30px;">是</span><input type="radio" name="selected" <?php if (isset($artcon['selected'])) {echo "checked='checked'";}?> value="0" />否</div>

                <div  class="clear"><label>内容：</label><div class="Aadd_ueditor"><textarea name="content" id="ueditor" style="width:700px;"><?php if (isset($artcon['content'])) {echo $artcon['content'];}?></textarea></div></div>
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
<?php load_resource('./ueditor/ueditor.config.js',FALSE,TRUE);?>
<?php load_resource('./ueditor/ueditor.all.js',FALSE,TRUE);?>
<?php load_resource('./ueditor/lang/zh-cn/zh-cn.js',FALSE,TRUE);?>
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
<?php load_resource('./javascript/simplecheck.js',FALSE,TRUE);?>