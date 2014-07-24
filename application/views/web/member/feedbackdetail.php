        <div class="content fr">
            <!-- 意见反馈>内容 -->
            <div class="ui-winbox2 mt20">
                <div class="hd clearfix">
                    <h3 class="ui-titSty1 fl mr20"><span>意见反馈</span></h3>
                    <p class="menu fl"><a href="<?php echo base_url();?>member/feedback">全部意见</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>member/feedback/wait">待处理意见</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>member/feedback/finish">已处理意见</a>&nbsp;</p>
                    <a class="ui-btnSty1 fr" href=""><span>提交意见</span></a>
                </div>
                <div class="bd clearfix">
                    <div class="myTag mt10">
                        <table>
                            <tbody>
                                <tr>
                                    <td>编号：<span class="c_0685d7"><?php echo $prent['Id'];?></span></td>
                                    <td>问题类型：<?php echo $prent['type'];?></td>
                                    <td>提交时间：<?php echo $prent['postdate'];?></td>
                                </tr>
                            </tbody>
                        </table>
		    </div>
<?php if(count($detail) >0): ?>
<?php foreach($detail as $key =>$arr): ?>
                    <dl class="myQuestion mt10">
			<dt class="clearfix"><span class="fl c_ad0909"><?php echo $detail[$key][0]['type']; ?></span><span class="fr">状态：<span class="c_6da83a"><?php echo $detail[$key][0]['state'];?></span></span></dt>
                        <dd>
                            <dl>
			<?php foreach($arr as $key => $subarr): ?>
				<dt class="clearfix"><span class="fl 
<?php if($key ==0): ?>
 c_ad0909">提问问题
<?php else: ?>
 c_6da83a" >答复问题
<?php endif; ?>
</span><span class="fr">提交时间：<?php echo $subarr['postdate'];?></span></dt>
                                <dd>
                                    <p><?php echo $subarr['content'];?></p>
                                </dd>
			<?php endforeach; ?>
                            </dl>
                        </dd>
                    </dl>
<?php endforeach; ?>

<?php endif;?>
                </div>
            </div>
            </div>
            </div>
