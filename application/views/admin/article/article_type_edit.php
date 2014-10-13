<div id='jsCustomScroll2' class="lfloat conrig_full">
<div class="Aadd_con">
    <div class="Aadd_insert">
        <h4>分类修改</h4>
        <div class="Aadd_icon">
            <div class="Aadd_ititle"><a href="#" class="cur">内容</a></div>
            <form action="<?php echo $actUrl;?>" method="post">
            	<input type="hidden" name="id" value="<?php if (isset($artcon['id'])) {echo $artcon['id'];}?>" />
                <div class='clear'><label>标题：</label><input type="text" name="title" value="<?php if (isset($artcon['title'])) {echo $artcon['title'];}?>" /></div>
                <div class='clear'><label>栏目：</label><?php if(isset($article_tree)){echo $article_tree;}?></div>
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
<?php load_resource('./ueditor/ueditor.config.js',FALSE,TRUE);?>
<?php load_resource('./ueditor/ueditor.all.js',FALSE,TRUE);?>
<?php load_resource('./ueditor/lang/zh-cn/zh-cn.js',FALSE,TRUE);?>
<script>
    var editor = UE.getEditor('ueditor');
</script>