<div id='jsCustomScroll2' class="lfloat conrig_full">
<div class="Aadd_con">
    <div class="Aadd_insert">
        <h4>文章查看</h4>
        <div class="Aadd_icon">
            <div class="Aadd_ititle"><a href="#" class="cur">内容</a></div>
            <form class="actform" action="" method="post">
                <div><label>标题：</label><?php if (isset($artcon['title'])) {echo $artcon['title'];}?></div>
                <div><label>副标题：</label><?php if (isset($artcon['subtitle'])) {echo $artcon['subtitle'];}?></div>
                <div><label>文章类型：</label><?php if (isset($artcon['tname'])) {echo $artcon['tname'];}?></div>
                <div><label>排序：</label><?php if (isset($artcon['order'])) {echo $artcon['order'];}?></div>
                <div><label>发布时间：</label><?php if (isset($artcon['published'])) {echo $artcon['published'];}?></div>
                <div><label>修改时间：</label><?php if (isset($artcon['modifytime'])) {echo date('Y-m-d',$artcon['modifytime']);}?></div>
                <div><label>内容：</label><div class="Aadd_ueditor"><?php if (isset($artcon['content'])) {echo $artcon['content'];}?></div></div>
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