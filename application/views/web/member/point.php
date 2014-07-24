        <div class="content fr">
            <!-- 用户概览 -->
            <div class="userSum">
                <div class="bd clearfix">
                    <dl class="fl clearfix info">
                        <dt class="fl"><a href=""><img src="<?php echo base_url(); ?>images/ewm.png" width="80" height="80" alt="" /></a></dt>
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
            <!-- 火热招募 -->
            <div class="ui-winbox1 myIntegral">
                <div class="hd clearfix mb15">
                    <h3 class="fl">积分明细</h3>
                </div>
                <div class="bd">
                    <div class="date-list">
                        <table>
                            <thead>
                                <tr>
                                    <th>编&nbsp;号</th>
                                    <th>来源/用途</th>
                                    <th>积分变化</th>
                                    <th>日&nbsp;期</th>
                                    <th>备&nbsp;注</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($point as $arr):?>
                                <tr>
                                    <td><?php echo $arr['Id']?></td>
                                    <td class="tal">
                                    <?php if(!empty($arr['MUMBER'])) :?>
                                    			购买<?php echo $arr['NAME'];?>
                                    			<?php else:?>
                                    			<?php echo $arr['type'];?>
                                    			<?php endif;?>
                                    </td>
                                    <td class="add">+<?php  echo $arr['point'];?></td>
                                    <td> <?php echo date("Y年m月d日 G:i",strtotime($arr['creattime']));?></td>
                                    <td><?php echo $arr['type'];?></td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
