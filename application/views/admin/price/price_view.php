<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>CMS-index</title>
    <?php load_resource('adminstyle.css');?>
    <?php load_resource('jquery.mCustomScrollbar.css');?>
    <?php load_resource('jquery.ui.css');?>
    <?php load_resource('jquery-1.8.3.min.js');?>
    <?php load_resource('global.js');?>
    <?php load_resource('jquery.mousewheel.js');?>
    <?php load_resource('bootstrap.js');?>
    <?php load_resource('jquery.form.min.js');?>
    <?php load_resource('jquery-ui-1.10.4.custom.min.js');?>
    <?php load_resource('jquery.filemanagement.js');?>
    <?php load_resource('jquery.lightbox.js');?>
    <?php load_resource('jquery.mCustomScrollbar.js');?>
    <?php load_resource('lightbox.js');?>
    <?php load_resource('default_lightcontrol.js');?>
    <?php load_resource('adminunfold.js');?>
    <?php load_resource('searchcondition.js');?>
    <style>
        .lighttable th{text-align:right;padding-right:20px;}
        .lighttable td{text-align:left;padding-left:20px;}
    </style>
</head>
<body>
<body>
    <div class="ADD_coninp">
    <div style="text-align:center"><h4>净值信息</h4></div>
        <form action="./admin/price/list" method="get" enctype="multipart/form-data">
            <table class='lighttable' width="100%" cellpadding="0" cellspacing="0">
                <tbody>
            <?php foreach($artcon as $arr):?>
            	<tr><input type="hidden" name="id" value="<?php if (isset($arr['id'])) {echo $arr['id'];}?>" /></tr>
                <tr><th>产品编号：</th><td><input type="text" name="NUMBER" value="<?php echo $arr['NUMBER'];?>" disabled="disabled"/></td></tr>
                <tr><th>产品名称：</th><td><input style="width:400px;" type="text" name="NAME" value="<?php echo $arr['NAME'];?>" disabled="disabled"/></td></tr>
                <tr><th>净    值：</th><td><input type="text" name="price" value="<?php echo $arr['price'];?>" disabled="disabled"/></td></tr>
                <tr><th>累计净值：</th><td><input type="text" name="pricesum" value="<?php echo $arr['pricesum'];?>" disabled="disabled"/></td></tr>
                <tr><th>净值日期：</th><td><input type="text" name="date" value="<?php echo $arr['date'];?>" disabled="disabled"/></td></tr>
			<?php endforeach;?>
                </tbody>
            </table>
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

    });
</script>