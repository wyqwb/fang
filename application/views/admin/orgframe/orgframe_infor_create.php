<div id='jsCustomScroll2' class="lfloat conrig_full">
<div class="Aadd_con">
    <div class="Aadd_insert">
        <h4>文章发布</h4>
        <div class="Aadd_icon">
            <div class="Aadd_ititle"><a href="#" class="cur">内容</a></div>
            <form action="<?php echo $actUrl;?>" method="post">
            	<input type="hidden" name="id" value="<?php if (isset($artcon['id'])) {echo $artcon['id'];}?>" />
                <div class='clear'><label>标题：</label><input type="text" name="title" value="<?php if (isset($artcon['title'])) {echo $artcon['title'];}?>" /></div>
                <div class='clear'><label>副标题：</label><input type="text" name="subtitle" value="<?php if (isset($artcon['subtitle'])) {echo $artcon['subtitle'];}?>" /></div>
               	<div class='clear'><label>排序：</label><input type="text" name="order" value="<?php if (isset($artcon['order'])) {echo $artcon['order'];}?>" /></div>
               	
				<?php if (isset($artcon['pid']) && $artcon['pid'] == 21) {?>
               	<input type="hidden" name="pid" value="21" />
               	<?php } else {?>
                <div class='clear'><label>栏目：</label><select name="pid">
                	<option value="0">请选择</option>
                	<?php foreach($navList as $item):?>
                	<option <?php if (isset($artcon['pid']) && $artcon['pid'] == $item['id']) {?> selected="selected"<?php }?> value="<?php echo $item['id'];?>"><?php echo $item['title'];?></option>
                	<?php endforeach;?>
                </select></div>
                <?php }?>
                <div class='clear'><label>内容：</label><div class="Aadd_ueditor"><textarea name="content" id="ueditor" style="width:700px;"><?php if (isset($artcon['content'])) {echo $artcon['content'];}?></textarea></div></div>
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