<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <base href='<?php echo base_url();?>' />
    <title>CMS-index</title>
    <link type="text/css" rel="stylesheet" href="/css/adminstyle.css">
    <style>
        .lighttable th{text-align:right;padding-right:20px;}
        .lighttable td{text-align:left;padding-left:20px;}
        table{table-layout:fixed;}
        table td{word-wrap:break-word;}
    </style>
    <?php load_resource('bootstrap.min.css');?>
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
</head>
<body>
<div class="ADD_coninp" style='overflow:hidden;position:absolute;left:0px;top:0px;right:0px;bottom:0px;' id='jsCustomScroll2'>
    <?php if(isset($table)){echo $table;}?>
</div>
</body>
</html>