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
    <script type='text/javascript' src='javascript/adminunfold.js'></script>
    <style>
        .td_row{overflow:hidden}
        .td_4{width:33.3333333333%;float:left;text-align:left;padding-left:10px;}
        .td_6{width:50%;float:left;}
        .td_8{width:66.6666666666%;float:left;}
    </style>
<body>


<div class="ADD_coninp" style="overflow:hidden;position:absolute;left:0px;top:0px;right:0px;bottom:0px;" id="jsCustomScroll2">
    <div>
        <?php if(isset($title)){echo $title;}?>
        <?php if(isset($search)){echo $search;}?>
        <?php if(isset($table)){echo $table;}?>
    </div>
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