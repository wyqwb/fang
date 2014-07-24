<div id="banner" class='banner_child'>
    <div class="search">
        <div class="search_main">
            <div class="search_right">
                <input type="text" name="search" id="search" value="请输入关键词"  onfocus="javascript:this.value=''"/>
                <input type='submit' style='display:none;' name='sub' /><a href="#" class="submit_search"></a>
                <a href="#">联系我们</a>
            </div>
            <div class="search_r"></div>
        </div>
    </div>
    <div class="banner_img">
        <a href="#"><img src="images/banner_cpzq.jpg" width="1988" height="189" alt="走进友山" /></a>
    </div>
</div>
<div id="main">
    <div class="left fl">
        <div class="menu">
            <div class="title">产品专区</div>
            <dl>
                <dt <?php if(isset($focus) && $focus == 'raisedin'){echo 'class="current"';}?>><a href="products/raisedin">募集中产品</a></dt>
                <dt <?php if(isset($focus) && $focus == 'established'){echo 'class="current"';}?>><a href="products/established">已成立产品</a></dt>
                <dt <?php if(isset($focus) && $focus == 'paid'){echo 'class="current"';}?>><a href="products/paid">已兑付产品</a></dt>
                <dt ><a href="products/service/122">产品成立公告</a></dt>
                <dt ><a href="products/service/152">产品管理报告</a></dt>
            </dl>
            <div class="shadow"></div>
        </div>
        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=2226488136&amp;site=qq&amp;menu=yes"><img src="images/kf.png" width="250" height="96" alt="客服"></a>
    </div>
    <div class="content fr">
        <?php if($focus == 'raisedin'):?>
        <div class="break">当前位置：<a href="#">首页</a><span>></span><a href="products">产品专区</a><span>></span><span class="current"> 募集中产品</span></div>
        <?php endif;?>
        <?php if($focus == 'established'):?>
        <div class="break">当前位置：<a href="#">首页</a><span>></span><a href="products">产品专区</a><span>></span><span class="current"> 已成立产品</span></div>
        <?php endif;?>
        <?php if($focus == 'paid'):?>
        <div class="break">当前位置：<a href="#">首页</a><span>></span><a href="products">产品专区</a><span>></span><span class="current"> 已兑付产品</span></div>
        <?php endif;?>
    <div class="data-list ui-date ui-dateSty2">

		<!-- 已兑付产品信息暂未开通,敬情期待 -->
		<?php if (($this->config->config['loginflag'] == 1)&&($focus == 'paid')):?>
			<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
			<p align="middle"><img src="images/pro_coming_soon.jpg" alt="敬情期待" /></p>
        <?php else:?> <!-- 敬情期待 -->

		<table>
                <thead>
                <tr>
                    <!--
                    <th width="45">编号</th> 
                    -->
                    <th colspan="2">产品名称</th>
                    <th width="110">预期年化收益率</th>
                    <th width="50">产品期限</th>
            <?php if($focus == 'raisedin'):?>
                     <th width="80">发行日期</th>
            <?php endif;?>
            <?php if($focus == 'established'):?>
                     <th width="80">成立日期</th>
            <?php endif;?>
            <?php if($focus == 'paid'):?>
                     <th width="80">兑付日期</th>
            <?php endif;?>
                <?php if($focus == 'raisedin'):?>
                    <th width="180">操作</th>
                <?php endif;?>
                <?php if($focus == 'established'):?>
                    <th width="100">操作</th>
                <?php endif;?>
                <?php if($focus == 'paid'):?>
                    <th width="100">操作</th>
                <?php endif;?>
                </tr></thead>
                <tbody>
                <?php if(isset($result)&&count($result)>0):?>
                <?php foreach($result as $row):?>
                <tr class="even">
                    <!--
                    <td> <?php echo $row['NUMBER'];?></td>
                    -->
                    <td width="40" class="icon"><img src="images/producttype/<?php echo $row['PRODUCTTYPENUMBER'].".png";?>" width="26" height="26"  alt="友山基金"/></td>
            <td class="icon_name">
            <?php if ($this->config->config['loginflag'] == 1):?>
                    <a class="jstip"><?php echo $row['title'];?></a>
            <?php else:?>
                    <a><?php echo $row['title'];?></a>
            <?php endif;?>
                    </span></td>
                    <td class="c_ff0000 tar">
                    <?php echo $row['RATE_INFO'];?>&nbsp;<div class="icon_question">
                        <div class="i_tag">
                            <div class="i_c">
                                <div class="i_d">
                                    <div class="i_e">
                                    </div>
                                    <?php if(isset($row['RATE'])):?>
                                    <?php foreach ( $row['RATE'] as $value ):?>
                                    <p><?php echo $value;?></p>
                                    <?php endforeach;?>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>&nbsp;
                    </td>
                    <td><?php echo $row['PRODUCTDEADLINE'];?>天</td>
                    <td><?php echo $row['PROJECTDATE'] ;?></td>
                    <td>
            <?php if ($this->config->config['loginflag'] == 1):?>
                <?php if($focus == 'raisedin'):?>
                    <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=2226488136&amp;site=qq&amp;menu=yes">
                    <img src="images/btn_booking.png" width="80" height="24" alt="在线预约" /></a>
                    <a class="jstip"><img src="images/btn_downAbout.png" width="80" height="24" alt="产品简介" /></a>
                <?php endif;?>
                <?php if($focus == 'established'):?>
                    <a class="jstip"><img src="images/icon_netValue.png" width="80" height="24" alt="净值查询" /></a>
                <?php endif;?>
                <?php if($focus == 'paid'):?>
                    <a class="jstip"><img src="images/icon_netValue.png" width="80" height="24" alt="净值查询" /></a>
                <?php endif;?>
            <?php else:?>
                <?php if($focus == 'raisedin'):?>
                    <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=2226488136&amp;site=qq&amp;menu=yes">
                    <img src="images/btn_booking.png" width="80" height="24" alt="在线预约" /></a>
                    <a href="#" ><img src="images/btn_downAbout.png" width="80" height="24" alt="产品简介" /></a>
                <?php endif;?>
                <?php if($focus == 'established'):?>
                    <a href="#" ><img src="images/icon_netValue.png" width="80" height="24" alt="净值查询" /></a>
                <?php endif;?>
                <?php if($focus == 'paid'):?>
                    <a href="#" ><img src="images/icon_netValue.png" width="80" height="24" alt="净值查询" /></a>
                <?php endif;?>
            <?php endif;?>       
                        </td></tr>
               <?php endforeach; ?>
               <?php endif; ?>
                </tbody>
            </table>
            <div class="page" style="margin-top:15px;">
                <ul>        <?php echo $page;?></ul>
            </div>
            <script>
                $.each($(".i_tag"), function (i, data) {
                    data = $(data);
                    data.css("margin-top", "-" + (Math.round(data.height() / 2) + 2).toString() + "px");
                });
            </script>
        <?php endif;?>   <!-- 敬情期待 -->
        </div>
    </div>
    <div class="clear"></div>
</div>