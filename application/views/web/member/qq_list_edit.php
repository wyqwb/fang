
        <div class="content fr">            
            <!-- 横栏概览 -->
            <div class="userSum"><h2>我的QQ客服列表</h2></div>

            <!-- 看房团列表 -->
            <div class="userSum">
            <?php if (isset($qq_list)&&count($qq_list)>0) {           
            ?>

                <div class="bd clearfix">
                    <dl class="fl clearfix info">
                        <dt class="fl">
                        <img src="<?php echo base_url(); ?>images/qq2.jpg" width="30" height="30" alt="" />
                        </dt>
                        <dd class="fl" style="line-height:30px">
                        <input id='customer_qq1' value="<?php if(isset($qq_list['customer_qq1'])){echo $qq_list['customer_qq1'];}?>" style="width: 200px;border: 1px solid #ccc;line-height:30px;margin-left:30px">

                        </dd>
                    </dl>
                    <div class="fl about" style="float:right;line-height:30px">
                    <input type="button" value="保存" onclick="dosave()" style="width: 100px;height: 30px;cursor: pointer;background-color: #28a7e1;">
                    </div>
                </div>
                <div class="bd clearfix">
                    <dl class="fl clearfix info">
                        <dt class="fl">
                        <img src="<?php echo base_url(); ?>images/qq1.jpg" width="30" height="30" alt="" />
                        </dt>
                        <dd class="fl" style="line-height:30px">
                        <input id='customer_qq2' value="<?php if(isset($qq_list['customer_qq2'])){echo $qq_list['customer_qq2'];}?>" style="width: 200px;border: 1px solid #ccc;line-height:30px;margin-left:30px">
                        </dd>
                    </dl>
                    <div class="fl about" style="float:right;line-height:30px">
                    <input type="button" value="保存" onclick="dosave()" style="width: 100px;height: 30px;cursor: pointer;background-color: #28a7e1;">
                    </div>
                </div>

            <?php 
               }?>

               </div>
        </div>
    </div>
<script type="text/javascript"> 
function dosave(){
    var customer_qq1 = $("#customer_qq1").val();
    var customer_qq2 = $("#customer_qq2").val();
    $.ajax({
         type: "POST",
         async: false,
         url: "/member/mod_qq_act/",
         data: {'action':'domod','customer_qq1':customer_qq1,'customer_qq2':customer_qq2},
         success: function(msg){
           window.location.href = '/member/qq_list/';
         } 
       }); 
}

</script>
