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
        <form action="<?php echo $actUrl;?>" method="post" class='js_needcheck'">
            <table class='lighttable' width="100%" cellpadding="0" cellspacing="0">
                <tbody>
            <?php foreach($artcon as $arr):?>
            	<tr><input type="hidden" name="id" value="<?php if (isset($arr['Id'])){echo $arr['Id'];}?>" /></tr>
                <tr><th>产品编号：</th>
                <td><input type="text" class="js_notnull" name="NUMBER" value="<?php echo $arr['NUMBER'];?>" /></td></tr>
                <tr><th>净    值：</th>
                <td><input type="text" class="js_notnull" name="price" value="<?php echo $arr['price'];?>" /></td></tr>
                <tr><th>累计净值：</th>
                <td><input type="text" class="js_notnull" name="pricesum" value="<?php echo $arr['pricesum'];?>" /></td></tr>
                <tr><th>净值日期：</th>
                <td><input class='js_notnull datePicker' data-container="body" data-trigger="focus" 
 					data-placement="right" data-content="净值时间不可为空" data-original-title=""  type="text" class='datePicker' 
 					name="date" value="<?php {echo $arr['date'];}?>" /></td></tr>
			<?php endforeach;?>
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

<script>
    $(document).ready(function(){
      /*  $('#js_notnull').focus(function(){
            $(this).popover('show');
        });*/
        $('.js_notnull').each(function(){
            $(this).focus(function(){
                $(this).popover('show');
            });
        });
        $('#jsSelect').click(function(){
            $(this).removeClass('error');
        });
        $('.js_notnull').click(function(){
            $(this).removeClass('error');
        });
        $('.js_needcheck').submit(function(){
            var result = true;
            var selectval = $('#jsSelect').val();
            if(selectval == 0)
            {
                result = false;
                $('#jsSelect').addClass('error');
            }
            else
            {
                result = true;
                $('#jsSelect').removeClass('error');
            }
            $(this).find('.js_notnull').each(function(){
                var val = $(this).attr('value');
                if(val == '')
                {
                    result = false;
                    $(this).addClass('error');
                }
                else
                {
                    $(this).removeClass('error');
                }
            });
            if(result == false)
            {
                return false;
            }
            else{return true;}
        });
    });

</script>
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

