
        <div class="content fr">
            <!-- 用户概览 -->
            <div class="userSum">
                <div class="bd clearfix">
                    <dl class="fl clearfix info">
                        <dt class="fl"><a href="javascript:void(0);"><img src="/images/reguser.png" width="80" height="80" alt="" /></a></dt>
                        <dd class="fl">
			                 <p><b>会员<?php echo get_cookie("username"); ?></b></p>
			                 <p><span><?php echo date("H") < 12 ? "上午好!" : "下午好!";?></span></p>
                        </dd>
                    </dl>
<!--                     <div class="fl about">
                        <p>会员等级：<a class="c_ad0909" href="">11</a>&nbsp;<a href=""><img src="<?php echo base_url(); ?>images/vipclass.jpg" alt="" /></a></p>
                        <p>积分：<strong class="c_ad0909">11</strong>分&nbsp;<a href=""><img src="<?php echo base_url(); ?>images/money.jpg" alt="" /></a></p>
                    </div> -->
                </div>
            </div>
            <!-- 广告 -->
            <div class=""></div>
            <!-- 火热招募 -->
            <div class="ui-winbox1 myRecruit">
                <div class="hd clearfix">
                    <!-- <h3 class="fl">火热招募中</h3> -->
                </div>
                <div class="bd">
                
                 <ul class="item-list">
                  <!-- <?php foreach($product as $arr): ?> -->
                        <li class="item clearfix">
                            <a class="fl" href="javascript:void(0);"><img src="/images/ewm.png" width="96" height="106" alt="" /></a>
                            <div class="fl info">
                                <p><span class="icon-pro"></span><a href="/">房源一</a></p>
                                <p><span></span><span></span><span></span></p>
                            </div>

                        </li>
                        <!-- <?php endforeach;?> -->
                        
                    </ul>
                    <div class="myPageNum clearfix" style="margin-top:15px;">
                    <!-- <?php echo $page;?> -->
                    </div>
                </div>
            </div>
        </div>
   </div>