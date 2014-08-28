
<div class="Aadd_con">
    <div class="Aadd_insert">
        <h4>房团信息查看</h4>
        <div class="Aadd_icon">
            <div class="Aadd_ititle"><a href="#" class="cur">内容</a></div>
            <form class="actform" action="" method="post">
                <div class='clear'><label>发布时间：</label><?php if (isset($artcon['createtime'])) {echo $artcon['createtime'];}?></div>
                <div class='clear'><label>发布者：</label><?php if (isset($artcon['name'])) {echo $artcon['name'];}?></div>
                <div class='clear'><label>看房团名称：</label><?php if (isset($artcon['title'])) {echo $artcon['title'];}?></div>
                <div class='clear'><label>出行日期：</label><?php if (isset($artcon['godate'])) {echo substr($artcon['godate'],0,10);}?></div>
                <div class='clear'><label>行程时间：</label><?php if (isset($artcon['gotime'])) {echo substr($artcon['gotime'],0,10);}?></div>
                <div class='clear'><label>普通费用：</label><?php if (isset($artcon['normalCost'])) {echo $artcon['normalCost'];}?></div>
                <div class='clear'><label>Vip费用：</label><?php if (isset($artcon['vipCost'])) {echo $artcon['vipCost'];}?></div>
                <div class='clear'><label>显示价格：</label><?php if (isset($artcon['displayCost'])) {echo $artcon['displayCost'];}?></div>
                <div class='clear'><label>行程信息：</label><?php if (isset($artcon['Travelinfo'])) {echo $artcon['Travelinfo'];}?></div>
                <div class='clear'><label>注意事项：</label><div class="Aadd_ueditor"><?php if (isset($artcon['attention'])) {echo $artcon['attention'];}?></div></div>
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