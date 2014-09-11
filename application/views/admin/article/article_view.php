
<div class="Aadd_con">
    <div class="Aadd_insert">
        <h4>文章查看</h4>
        <div class="Aadd_icon">
            <div class="Aadd_ititle"><a href="#" class="cur">内容</a></div>
            <form class="actform" action="" method="post">
                <div class='clear'><label>标题：</label><?php if (isset($artcon['title'])) {echo $artcon['title'];}?></div>
                <div class='clear'><label>文章类型：</label><?php if (isset($artcon['tname'])) {echo $artcon['tname'];}?></div>
                <div class='clear'><label>预览图：</label><?php if (isset($artcon['previewimg'])) {echo "<img src='".base_url()."uploads/".$artcon['previewimg']."' />";}?></div>
                <div class='clear'><label>排序：</label><?php if (isset($artcon['order'])) {echo $artcon['order'];}?></div>
                <div class='clear'><label>是否推荐：</label><?php if (isset($artcon['selected'])) {if($artcon['selected'] == '1'){echo "是";}else{echo "否";}}?></div>
                <div class='clear'><label>发布时间：</label><?php if (isset($artcon['published'])) {echo $artcon['published'];}?></div>
                <div class='clear'><label>修改时间：</label><?php if (isset($artcon['modifytime'])) {echo $artcon['modifytime'];}?></div>
                <div class='clear'><label>内容：</label><div class="Aadd_ueditor"><?php if (isset($artcon['content'])) {echo $artcon['content'];}?></div></div>
            </form>


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