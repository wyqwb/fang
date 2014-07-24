
        <div class="content fr">
            <!-- 用户概览 -->
            <div class="userSum">
                <div class="bd clearfix">
                    <dl class="fl clearfix info">
                        <dt class="fl"><a href="javascript:void(0);"><img src="<?php echo base_url(); ?>images/ewm.png" width="80" height="80" alt="" /></a></dt>
                        <dd class="fl">
			<p><b><?php echo $member["fullname"]?></b></p>
			<p><span><?php echo date("H") < 12 ? "上午好!" : "下午好!";?></span></p>
                        </dd>
                    </dl>
                    <div class="fl about">
                        <p>会员等级：<a class="c_ad0909" href=""><?php echo $member["rank"]?></a>&nbsp;<a href=""><img src="<?php echo base_url(); ?>images/vipclass.jpg" alt="" /></a></p>
                        <p>积分：<strong class="c_ad0909"><?php echo $member["point"]?></strong>分&nbsp;<a href=""><img src="<?php echo base_url(); ?>images/money.jpg" alt="" /></a></p>
                    </div>
                </div>
            </div>
            <!-- 广告 -->
            <div class=""></div>
            <!-- 火热招募 -->
            <div class="ui-winbox1 myRecruit">
                <div class="hd clearfix">
                    <h3 class="fl">火热招募中</h3>
                </div>
                <div class="bd">
                
                 <ul class="item-list">
                  <?php foreach($product as $arr): ?>
                        <li class="item clearfix">
                            <a class="fl" href="javascript:void(0);"><img src="images/ewm.png" width="96" height="106" alt="" /></a>
                            <div class="fl info">
                                <p><span class="icon-pro"></span><a href="<?php echo base_url();?>member/productAppointment/<?php echo $arr["NUMBER"];?>"><?php echo $arr['NAME']?></a></p>
                                <p><span>年化收益率：<?php echo $arr['YEARINCOMERATE']?>%</span><span>产品期限：<?php echo $arr['PRODUCTDEADLINE']?>个月</span><span>发行日期：<?php echo $arr['PROJECTDATE']?></span></p>
                            </div>
                            <div class="fr fun">
                                <p><a class="icon-reserve" target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=2226488136&amp;site=qq&amp;menu=yes" ></a>&nbsp;</p>
                                <?php if(!empty($arr['pdf'])): ?>
                                <p><a class="icon-downPdf" href="<?php echo $arr['pdf'];?>"></a>&nbsp;</p>
                                <?php endif; ?>
                            </div>
                        </li>
                        <?php endforeach;?>
                        
                    </ul>
                    <div class="myPageNum clearfix" style="margin-top:15px;">
                    	<?php echo $page;?>
                    </div>
                </div>
            </div>
        </div>
   </div>
