<div id='jsCustomScroll2' class="lfloat conrig_full">
    <div class="Aadd_con">
        <div class="Aadd_insert">
            <h4>创建试题</h4>
            <div class="Aadd_icon">
                <div class="Aadd_ititle"><a href="#" class="cur">内容</a></div>
                <form action="<?php echo $actUrl;?>" method="post" class='js_needcheck'>
                    <input type="hidden" name="id" value="" />
                    <div><label>标题：</label><input type="text" class='js_notnull' data-container="body" data-trigger="focus" data-placement="right" data-content="文章标题不可为空" data-original-title="" name="title" value="" /></div>
                    <div  class="clear"><label>试卷简介：</label><div class="Aadd_ueditor"><textarea name="des" id="ueditor" style="width:700px;"></textarea></div></div>


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
    $('#jsSelect').change(function () {
        var vals = $(this).val();
        if (vals == 1 || vals == 2 || vals == 3 || vals == 4 || vals == 5) {
            $('#jsOrder').css('display','none');
        } else {
            $('#jsOrder').css('display','block');
        }
    });
    $('#jsSelect').change(function(){
        var val = $(this).val();
        if(val == '选择题')
        {
            $('.questiontype1').removeClass('pub_hidden');
            $('.questiontype2').addClass('pub_hidden');
        }
        else
        {
            $('.questiontype1').addClass('pub_hidden');
            $('.questiontype2').removeClass('pub_hidden');
        }
    });
</script>
<?php load_resource('./javascript/simplecheck.js',FALSE,TRUE);?>