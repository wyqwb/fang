
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
                        <?php echo $qq_list['customer_qq1']?>
                        </dd>
                    </dl>
                    <div class="fl about" style="float:right;line-height:30px">
                    <input type="button" value="修改" onclick="domod()" style="width: 100px;height: 30px;cursor: pointer;background-color: #28a7e1;">
                    </div>
                </div>
                <div class="bd clearfix">
                    <dl class="fl clearfix info">
                        <dt class="fl">
                        <img src="<?php echo base_url(); ?>images/qq1.jpg" width="30" height="30" alt="" />
                        </dt>
                        <dd class="fl" style="line-height:30px">
                        <?php echo $qq_list['customer_qq2']?>
                        </dd>
                    </dl>
                    <div class="fl about" style="float:right;line-height:30px">
                    <input type="button" value="修改" onclick="domod()" style="width: 100px;height: 30px;cursor: pointer;background-color: #28a7e1;">
                    <!-- <a href="javascript:void(0)" onclick="deletefang(<?php echo $value['Id'] ?>)">删除</a> -->
                    </div>
                </div>

            <?php 
               }?>

               </div>
        </div>
    </div>
<script type="text/javascript"> 
function domod(){
           window.location.href = '/member/mod_qq/';
}

</script>
