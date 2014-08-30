<div id='jsCustomScroll2' class="lfloat conrig_full">
    <div class="Aadd_con">
        <div class="Aadd_insert">
            <h4>创建试题</h4>
            <div class="Aadd_icon">
                <div class="Aadd_ititle"><a href="#" class="cur">内容</a></div>
                <form action="<?php echo base_url().'admin/edu/modifycourse';?>" method="post" class='js_needcheck'>
                    <input type="hidden" name="id" value="<?php if(isset($course['id'])){echo $course['id'];}?>" />
                    <div><label>标题：</label><input type="text" class='js_notnull' data-container="body" data-trigger="focus" data-placement="right" data-content="文章标题不可为空" data-original-title="" name="title" value="<?php if(isset($course['title'])){echo $course['title'];}?>" /></div>
                    <div class="clear "><label>课程类别：</label><select name="category"><option value="0">请选择所属分类</option><?php foreach($result as $k=> $v){if($course['category']==$v['id']){echo "<option selected='selected' value='".$v['id']."'>".$v['title']."</option>";}else{echo "<option value='".$v['id']."'>".$v['title']."</option>";}}?></select></div>

                    <div class="clear "><label>课程等级：</label><input type="text" class='' data-container="body" data-trigger="focus" data-placement="right" data-content="" data-original-title="" name="level" value="<?php if(isset($course['level'])){echo $course['level'];}?>" /></div>
                    <div class="clear "><label>课程价格：</label><input type="text" class='' data-container="body" data-trigger="focus" data-placement="right" data-content="" data-original-title="" name="price" value="<?php if(isset($course['price'])){echo $course['price'];}?>" /></div>
                    <div  class="clear"><label>课程描述：</label><div class="Aadd_ueditor"><textarea name="des" id="ueditor" style="width:700px;"><?php if(isset($course['des'])){echo $course['des'];}?></textarea></div></div>
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