<div id='jsCustomScroll2' class="lfloat conrig_full">
<div class="Aadd_con">
    <div class="Aadd_insert">
        <h4><?php if (isset($artcon['title'])) {echo $artcon['title'];}?></h4>
        <div class="Aadd_icon">
            <div class="Aadd_ititle"><a class="cur jsSPopup">内容</a></div>
            <form action="/admin/orgframe/org_conedit" method="post">
            	<input type="hidden" name="id" value="<?php if (isset($artcon['id'])) {echo $artcon['id'];}?>" />
                <div class='clear'><label>标题：</label><input type="text" name="title" value="<?php if (isset($artcon['title'])) {echo $artcon['title'];}?>" /></div>
                <div class='clear'><label>副标题：</label><input type="text" name="subtitle" value="<?php if (isset($artcon['subtitle'])) {echo $artcon['subtitle'];}?>" /></div>
                <div class='clear'><label>内容：</label><div class="Aadd_ueditor"><textarea name="content" id="ueditor" style="width:700px;"><?php if (isset($artcon['content'])) {echo $artcon['content'];}?></textarea></div></div>
                <div class="Aadd_save"><input class="redbg" type="submit" name="sub" value="保存" /></div>
            </form>


        </div>
    </div>
</div>
</div>
</div>
<!-- 弹出层 -->

</div>
</body>
</html>
<?php load_resource('./ueditor/ueditor.config.js',FALSE,TRUE);?>
<?php load_resource('./ueditor/ueditor.all.js',FALSE,TRUE);?>
<?php load_resource('./ueditor/lang/zh-cn/zh-cn.js',FALSE,TRUE);?>
<script>
    var editor = UE.getEditor('ueditor');

    /* 查询的弹出层 */
    $('.jsSPopup').click(function () {
    	$('.SPop_popup').css('display','block');
    });
    $('.jsSpopclose').click(function () {
    	$('.SPop_popup').css('display','none');
    });
</script>