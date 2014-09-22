
        <div class="content fr">            
            <!-- 横栏概览 -->
            <div class="userSum"><h2>我参与的看房团列表</h2></div>

            <!-- 看房团列表 -->
            <div class="userSum">

            <?php //if (isset($comments_list)&&count($comments_list)>0) {
               // foreach ($comments_list as $key => $value) {                
            ?>
                <div class="bd clearfix">
                    <dl class="fl clearfix info">
                        <dt class="fl">
                        <!-- <a href=""><img src="<?php echo base_url(); ?>images/ewm.png" width="80" height="80" alt="" /></a> -->
                        </dt>
                        <dd class="fl"><a href="/member/orders/1" target="_blank">某某看房团</a></dd>
                    </dl>
                    <div class="fl about" style="float:right">2014/09/23 23:00</div>
                </div>

            <?php // } } ?>

            </div>
        </div>
    </div>
<script type="text/javascript"> 
$(".moduserinfo").Validform({
    tiptype:function(msg,o,cssctl){
        //msg：提示信息;
        //o:{obj:*,type:*,curform:*}, obj指向的是当前验证的表单元素（或表单对象），type指示提示的状态，值为1、2、3、4， 1：正在检测/提交数据，2：通过验证，3：验证失败，4：提示ignore状态, curform为当前form对象;
        //cssctl:内置的提示信息样式控制函数，该函数需传入两个参数：显示提示信息的对象 和 当前提示的状态（既形参o中的type）;
        if(!o.obj.is("form")){//验证表单元素时o.obj为该表单元素，全部验证通过提交表单时o.obj为该表单对象;
            var objtip=o.obj.parents('tr').find(".Validform_checktip");
            cssctl(objtip,o.type);
            objtip.text(msg);
        }
    },
        beforeSubmit:function(){
            $('.ui-btn-submit').click();
        
        }
});

var options = {
    target:     '.msginfo',
    success: function() {
    } };
$('.moduserinfo').ajaxForm(options);


$('select').each(function(){
    var dataval = $(this).attr('data-value');
    if(dataval){
        $(this).find('option[value='+dataval+']').attr('selected',true);
    }
})


function deletefangtuan(id){
    var resault = $.ajax({
            url: "/fang/fuang_tuan_over/"+id,
                data: {},
                async: false,
                type: 'post'
            });
    location.reload();
    return;
}
</script>
