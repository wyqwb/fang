
        <div class="content fr">            
            <!-- 横栏概览 -->
            <div class="userSum"><h2>我的订单列表</h2></div>

            <!-- 参加的看房团列表 -->
            <div class="userSum">

            <?php if (isset($orderlist)&&count($orderlist)>0) {
               foreach ($orderlist as $key => $value) {                
            ?>


<div class="m" id="orderinfo">
<div class="bd clearfix">
<dd class="p-list">
    <table cellpadding="0" cellspacing="0" width="100%">
      <tbody>
      <tr>
        <th width="10%"> 商品编号 </th>
        <th width="12%"> 商品图片 </th>
        <th width="32%"> 商品名称 </th>
        <th width="10%"> 订单价 </th>
        <th width="10%"> 参团客户 </th>
        <th width="10%"> 参团人数</th>
        <th width="11%">操作管理 </th>
      </tr>
     <tr>
        <td>1010910562</td>        
        <td>
            <div class="img-list">
                <a class="img-box" target="_blank" href="">
                    <img width="50" height="50" src="<?php echo base_url(); ?>images/tuan.png" title="">
                </a>
            </div>
        </td>        
        <td>
            <div class="al fl">            
                <a class="flk13" target="_blank" href="/fang/tuandetail/<?php echo $value['tuanid']?>" > <?php echo $value['tuan_title']?></a> 
            </div>
          <!-- <div class="clr"></div> -->
        </td>        
        <td><span class="ftx04"> ￥<?php echo $value['cost']?></span></td>
        <td><?php echo $value['account']?></td>
        <td>1</td>
        <td>
            <a href="/member/orders/<?php echo $value['id']?>" style="" target="_blank" >编辑订单</a></span>
            <br>
            <a href="/member/orders/<?php echo $value['id']?>" style="" target="_blank" >订单详情</a></span>
        </td>
      </tr>
    </tbody>
    </table>
  </dd>
 </div>
</div>


            <?php } } ?>




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



}
</script>
