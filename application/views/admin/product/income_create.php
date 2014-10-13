<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <base href='<?php echo base_url();?>' />
    <title>CMS-index</title>
    <link type="text/css" rel="stylesheet" href="./css/adminstyle.css">
    <style>
        .lighttable th{text-align:right;padding-right:20px;}
        .lighttable td{text-align:left;padding-left:20px;}
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
<div class="ADD_coninp">
    <form action="./admin/product/income_create" method="post">
        <table class='lighttable' width="100%" cellpadding="0" cellspacing="0">
            <tbody>
            <tr><th width="25%">产品编码：</th><td width="75%"><input name='number' value='<?php if(isset($number)){echo $number;}?>' readonly="readonly" type="text" ></td></tr>
            <tr><th>收益率：</th><td><input name='income' value='<?php if(isset($newdata['income'])){echo $newdata['income'];}?>' type="text"></td></tr>
            <tr><th>创建时间：</th><td><input name='ctime' class='datePicker' value='<?php if(isset($newdata['ctime'])){echo $newdata['ctime'];}?>' type="text"></td></tr>

            <tr><th></th><td><div class="Aadd_save"><input class="redbg" type="submit" name="sub" value="保存"></div></td></tr>
            </tbody>
        </table>

    </form>
</div>
</body>
</html>
<script type="text/javascript">
    $((function($){
        $.datepicker.regional['zh-CN'] = {
            clearText: '清除',
            clearStatus: '清除已选日期',
            closeText: '关闭',
            closeStatus: '不改变当前选择',
            prevText: '<上月',
            prevStatus: '显示上月',
            prevBigText: '<<',
            prevBigStatus: '显示上一年',
            nextText: '下月>',
            nextStatus: '显示下月',
            nextBigText: '>>',
            nextBigStatus: '显示下一年',
            currentText: '今天',
            currentStatus: '显示本月',
            monthNames: ['一月','二月','三月','四月','五月','六月', '七月','八月','九月','十月','十一月','十二月'],
            monthNamesShort: ['一','二','三','四','五','六', '七','八','九','十','十一','十二'],
            monthStatus: '选择月份',
            yearStatus: '选择年份',
            weekHeader: '周',
            weekStatus: '年内周次',
            dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],
            dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],
            dayNamesMin: ['日','一','二','三','四','五','六'],
            dayStatus: '设置 DD 为一周起始',
            dateStatus: '选择 m月 d日, DD',
            dateFormat: 'yy-mm-dd',
            firstDay: 1,
            initStatus: '请选择日期',
            isRTL: false};
        $.datepicker.setDefaults($.datepicker.regional['zh-CN']);
    })(jQuery));

    $(document).ready(function(){
        $('.datePicker').datepicker();

    });
</script>