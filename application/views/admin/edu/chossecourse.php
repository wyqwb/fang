<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <meta name="renderer" content="webkit">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <base href="<?php echo base_url();?>" />
    <title>CMS-index</title>
    <link type='text/css' rel='stylesheet' href='./css/bootstrap.min.css' />
    <link type='text/css' rel='stylesheet' href='css/adminstyle.css' />
    <link type='text/css' rel='stylesheet' href='css/jquery.mCustomScrollbar.css' />
    <link type='text/css' rel='stylesheet' href='css/jquery.ui.css' />
    <script type='text/javascript' src='javascript/jquery-1.8.3.min.js'></script>
    <script type='text/javascript' src='javascript/global.js'></script>
    <script type='text/javascript' src='javascript/jquery.mousewheel.js'></script>
    <script type='text/javascript' src='javascript/bootstrap.js'></script>
    <script type='text/javascript' src='javascript/jquery.form.min.js'></script>
    <script type='text/javascript' src='javascript/jquery-ui-1.10.4.custom.min.js'></script>
    <script type='text/javascript' src='javascript/jquery.filemanagement.js'></script>
    <script type='text/javascript' src='javascript/jquery.lightbox.js'></script>
    <script type='text/javascript' src='javascript/jquery.mCustomScrollbar.js'></script>
    <script type='text/javascript' src='javascript/lightbox.js'></script>
    <script type='text/javascript' src='javascript/default_lightcontrol.js'></script>
    <script type='text/javascript' src='javascript/customscrollbar.js'></script>
    <style>
        .td_row{overflow:hidden}
        .td_4{width:33.3333333333%;float:left;text-align:left;padding-left:10px;}
        .td_6{width:50%;float:left;}
        .td_8{width:66.6666666666%;float:left;}
    </style>
<body>


<div class="ADD_coninp" style="overflow:hidden;position:absolute;left:0px;top:0px;right:0px;bottom:0px;" id="jsCustomScroll2">
    <form action="<?php echo base_url();?>admin/edu/addcourse" method="post" enctype="multipart/form-data">
    <div style="width:100%;height:25px;margin-top:10px;line-height:25px;background-color:#6F9CBB;color:#ffffff;line-height:25px;text-align:center;">创建该课程下的课时</div>
    <input type="hidden" name="pid" value="<?php if(isset($pid)){echo $pid;}?>" />
        <div><label>标题：</label><input type="text" class='js_notnull' data-container="body" data-trigger="focus" data-placement="right" data-content="文章标题不可为空" data-original-title="" name="title" value="" /></div>
        <div class="clear "><label>课程类别：</label><input type="text" class='' data-container="body" data-trigger="focus" data-placement="right" data-content="课程类别" data-original-title="" name="category" value="" /></div>
        <div class="clear "><label>课程等级：</label><input type="text" class='' data-container="body" data-trigger="focus" data-placement="right" data-content="" data-original-title="" name="level" value="" /></div>
        <div class="clear "><label>视频地址：</label><input type="text" class='' data-container="body" data-trigger="focus" data-placement="right" data-content="" data-original-title="" name="video" value="" /></div>
        <div class="clear "><label>预览图：</label><input type="file" class='' data-container="body" data-trigger="focus" data-placement="right" data-content="" data-original-title="" name="addphoto" value="" /></div>
        <div  class="clear"><label>课程描述：</label><div class="Aadd_ueditor"><textarea name="des" id="ueditor" style="width:700px;"></textarea></div></div>
        <div class="Aadd_save"><input class="redbg" type="submit" name="sub" value="保存" /></div>
    </form>
</div>
</body>
</html>
<script>
    $(document).ready(function(){
        var jscheck = $('#jscheck');
        var homecheck = $('.homecheck');
        var checkhidden = function(){
            if(jscheck.attr('checked')=='checked')
            {
                homecheck.removeClass('pub_hidden');
            }
            else
            {
                homecheck.addClass('pub_hidden');
            }
        }
        checkhidden();
        jscheck.click(function(){
            checkhidden();
        });
        var jscheckproduct = $('#jscheckproduct');
        var productcheck = $('.productcheck');
        var checkhiddenproduct = function(){
            if(jscheckproduct.attr('checked')=='checked')
            {
                productcheck.removeClass('pub_hidden');
            }
            else
            {
                productcheck.addClass('pub_hidden');
            }
        }
        checkhiddenproduct();
        jscheckproduct.click(function(){
            checkhiddenproduct();
        });

    });
</script>
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
</script>
<?php load_resource('./javascript/simplecheck.js',FALSE,TRUE);?>