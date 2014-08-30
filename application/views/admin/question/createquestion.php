<div id='jsCustomScroll2' class="lfloat conrig_full">
    <div class="Aadd_con">
        <div class="Aadd_insert">
            <h4>创建试题</h4>
            <div class="Aadd_icon">
                <div class="Aadd_ititle"><a href="#" class="cur">内容</a></div>
                <form action="<?php echo $actUrl;?>" method="post" class='js_needcheck'>
                    <input type="hidden" name="id" value="" />
                    <div><label>标题：</label><input type="text" class='js_notnull' data-container="body" data-trigger="focus" data-placement="right" data-content="文章标题不可为空" data-original-title="" name="title" value="" /></div>
                    <div class="clear"><label>试题类型：</label><select name="type" id="jsSelect" style="width:300px;"><option value="选择题" selected="selected">选择题</option><option value="判断题" >判断题</option></select></div>
                    <div class="clear"><label>所属课程：</label><select name="course" id="jscourse" style="width:300px;"><option value="0" selected="selected">请选择课程</option></select></div>
                    <div class="clear"><label>所属课时：</label><select name="coursehour" id="jscoursehour" style="width:300px;"><option value="0" selected="selected">请选择课时</option></select></div>
                    <div class="clear questiontype1"><label>选择条件A：</label><input type="text" class='' data-container="body" data-trigger="focus" data-placement="right" data-content="选择条件不可为空，默认A为正确答案。" data-original-title="" name="a" value="" /></div>
                    <div class="clear questiontype1"><label>选择条件B：</label><input type="text" class='' data-container="body" data-trigger="focus" data-placement="right" data-content="选择条件不可为空，默认A为正确答案。" data-original-title="" name="b" value="" /></div>
                    <div class="clear questiontype1"><label>选择条件C：</label><input type="text" class='' data-container="body" data-trigger="focus" data-placement="right" data-content="选择条件不可为空，默认A为正确答案。" data-original-title="" name="c" value="" /></div>
                    <div class="clear questiontype1"><label>选择条件D：</label><input type="text" class='' data-container="body" data-trigger="focus" data-placement="right" data-content="选择条件不可为空，默认A为正确答案。" data-original-title="" name="d" value="" /></div>
                    <div class="clear questiontype2 pub_hidden"><label>判断题答案A：</label><input type="text" class='' data-container="body" data-trigger="focus" data-placement="right" data-content="选择条件不可为空，默认A为正确答案。" data-original-title="" name="a2" value="" /></div>
                    <div class="clear questiontype2 pub_hidden"><label>判断题答案B：</label><input type="text" class='' data-container="body" data-trigger="focus" data-placement="right" data-content="选择条件不可为空，默认A为正确答案。" data-original-title="" name="b2" value="" /></div>
                    <div  class="clear"><label>问题描述：</label><div class="Aadd_ueditor"><textarea name="question" id="ueditor" style="width:700px;"></textarea></div></div>


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
    var json = <?php echo $json;?>;
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
    var jscourse = $('#jscourse');
    var jscoursehour = $('#jscoursehour');
    $(json).each(function(){
        var id = this.id,
            pid = this.pid,
            title = this.title,
            options = "";
        if(pid == 0)
        {
            options = "<option value="+id+" >"+title+"</option>";
            jscourse.append(options);
        }
    });
    jscourse.change(function(){
        var val = $(this).val();
        jscoursehour.empty();
        var defaultoption = '<option value="0" selected="selected">请选择课时</option>';
        //var default = '<option value="0" selected="selected">请选择课时</option>';
        jscoursehour.append(defaultoption);
        $(json).each(function(){
            var id = this.id,
                pid = this.pid,
                child = this.child;
            if(id == val)
            {
                if(child)
                {
                    $(child).each(function(){
                        var id = this.id,
                            pid = this.pid,
                            title = this.title,
                            options = '';
                        options = "<option value="+id+" >"+title+"</option>";
                        jscoursehour.append(options);


                    });
                }
            }
        });
    });

</script>
<?php load_resource('./javascript/simplecheck.js',FALSE,TRUE);?>