<div id='jsCustomScroll2' class="lfloat conrig_full">
    <div class="concon listscon">
        <div class="Aadd_con">
            <div class="Aadd_insert">
                <h4>友情连接创建</h4>
                <div class="Aadd_icon">
                    <div class="Aadd_ititle"><a href="#" class="cur">内容</a></div>
                    <form action="" method="post" class='js_needcheck' enctype="multipart/form-data">
                        <div class="clear">
                        <label>标题：</label>
                        <input type="text" class='js_notnull' data-container="body" data-trigger="focus" data-placement="right" data-content="广告标题" data-original-title="" name="title" value="<?php if(isset($result['title'])){echo $result['title'];}?>" />
                        </div>
                        
                        <div class="clear pub_hidden">
                        <label>分类：</label><?php if(isset($sort)){echo $sort;}?>
                         <input type="hidden"  class='js_notnull' name="type" value="links" />
                        </div>

                        <div class="clear">
                        <label>外链地址：</label>
                        <input type="text" class='js_notnull' data-container="body" data-trigger="focus" data-placement="right" data-content="外链地址" data-original-title="" name="url" value="<?php if(isset($result['url'])){echo $result['url'];}?>" />
                        </div>

                        <div class="clear"><label>预览图：</label><input type="file" class='' data-container="body" data-trigger="focus" data-placement="right" data-content="预览图" data-original-title="" name="addphoto" value="" /></div>

                        <div class="Aadd_save"><input class="redbg" type="submit" name="sub" value="保存" /></div>
                    </form>
                </div>
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
    // var editor = UE.getEditor('ueditor');
</script>