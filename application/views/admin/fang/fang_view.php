
<div class="Aadd_con">
    <div class="Aadd_insert">
        <h4>房团信息查看</h4>
        <div class="Aadd_icon">
            <div class="Aadd_ititle"><a href="#" class="cur">内容</a></div>
            <form class="actform" action="" method="post">
                <div class='clear'><label>发布时间：</label><?php if (isset($artcon['createtime'])) {echo $artcon['createtime'];}?></div>
                <div class='clear'><label>发布者：</label><?php if (isset($artcon['name'])) {echo $artcon['name'];}?></div>
                <div class='clear'><label>房屋名称：</label><?php if (isset($artcon['title'])) {echo $artcon['title'];}?></div>
                <div class='clear'><label>建筑面积：</label><?php if (isset($artcon['builtarea'])) {echo $artcon['builtarea'];}?></div>
                <div class='clear'><label>土地面积：</label><?php if (isset($artcon['landarea'])) {echo $artcon['landarea'];}?></div>
                <div class='clear'><label>卧室数量：</label><?php if (isset($artcon['bedrooms'])) {echo $artcon['bedrooms'];}?></div>
                <div class='clear'><label>卫生间数量：</label><?php if (isset($artcon['toilets'])) {echo $artcon['toilets'];}?></div>
                <div class='clear'><label>住宅类型：</label><?php if (isset($artcon['housetype'])) {echo $artcon['housetype'];}?></div>
                <div class='clear'><label>显示价格：</label><?php if (isset($artcon['displayprice'])) {echo $artcon['displayprice'];}?></div>             
                <div class='clear'><label>预览图1：</label><?php if (isset($artcon['img1'])) {echo "<img src='".base_url()."uploads/".$artcon['img1']."' />";}?></div>
                <div class='clear'><label>预览图2：</label><?php if (isset($artcon['img2'])) {echo "<img src='".base_url()."uploads/".$artcon['img2']."' />";}?></div>
                <div class='clear'><label>房屋介绍：</label><div class="Aadd_ueditor"><?php if (isset($artcon['desc'])) {echo $artcon['desc'];}?></div></div>

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