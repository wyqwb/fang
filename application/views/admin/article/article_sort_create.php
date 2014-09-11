<div id='jsCustomScroll2' class="lfloat conrig_full">
    <div class="Aadd_con">
        <div class="Aadd_insert">
            <h4>文章发布</h4>
            <div class="Aadd_icon">
                <div class="Aadd_ititle"><a href="#" class="cur">内容</a></div>
                <form action="<?php echo $actUrl;?>" method="post" class='js_needcheck'>
                    <input type="hidden" name="id" value="<?php if (isset($artcon['id'])) {echo $artcon['id'];}?>" />
                    <div  class="clear"><label>所属分类：</label><?php if(isset($article_tree)){echo $article_tree;}?></div>
                    <div class="clear"><label>分类标题：</label><input type="text" class='js_notnull' data-container="body" data-trigger="focus" data-placement="right" data-content="分类标题不可为空" name="title" value="<?php if (isset($artcon['title'])) {echo $artcon['title'];}?>" /></div>
                    <div class="clear" id = "jsOrder"><label>排序：</label><input type="text" name="order" value="<?php if (isset($artcon['order'])) {echo $artcon['order'];}else{echo '0';}?>" /></div>
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