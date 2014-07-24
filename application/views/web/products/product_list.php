 <div class="content fr">
        <div class="break">当前位置：<a href="#">金友汇专区</a><span>></span><a href="#">产品专区</a><span>></span><span class="current"> <?php echo $name;?></span></div>
        
        <div class="cpzq">
            <table cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th width="30%">产品名称</th>
                    <th>预期年化收益率</th>
                    <th width="10%">产品期限</th>
       	    <?php if($focus == 'raisedin'):?>
                     <th>发行日期</th>
            <?php endif;?>
       	    <?php if($focus == 'established'):?>
                     <th>成立日期</th>
            <?php endif;?>
       	    <?php if($focus == 'paid'):?>
                     <th>兑付日期</th>
            <?php endif;?>
                    <th> 操作  </th>
                </tr></thead>
                <tbody>
                <?php if(isset($result)&&count($result)>0):?>
                <?php foreach($result as $row):?>
                <tr class="even">
                    <td class="pro"><img src="<?php echo base_url(); ?>images/<?php echo $row['PRODUCTTYPENAME'];?>" width="25" height="18"  alt="友山基金"/><span class="proname">
		    <?php if ($this->config->config['loginflag'] == 1):?>
                    <a class="jstip"><?php echo $row['NAME'];?></a>
		    <?php else:?>
                    <a href="<?php echo base_url(); ?>netvalue/product_detail/<?php echo $row["NUMBER"];?>">
                    <?php echo $row['NAME'];?></a>
		    <?php endif;?>
                    </span></td>
                    <td style="width:200px;">
                    <?php if(isset($row['RATE'])):?>
                    <table>
                    <?php foreach ( $row['RATE'] as $value ):?>
                    <tr><td style="border-left:0px;border-top:0px;border-right:0px;text-align:left">
                    <span class="red" style="text-align:center;"><?php echo $value?></span></td></tr>
                    <?php endforeach;?>
                    </table>
                    <?php endif;?>
                    </td>
                    <td  width="10%"><?php echo $row['PRODUCTDEADLINE'];?>天</td><td><?php echo $row['PROJECTDATE'] ;?></td>
                    <td class="end" >
            <?php if ($this->config->config['loginflag'] == 1):?>
	            <?php if($focus == 'raisedin'):?>
            		<a class="jstip" href="<?php echo base_url(); ?>member/productAppointment/<?php echo $row["NUMBER"];?>">
            		<img src="images/btn_booking.png" width="80" height="24" alt="在线预约" /></a>
            		<?php if(isset($row["pdf"])&&null!=$row["pdf"]&&""!=$row["pdf"]):?>
            		<a class="jstip" href="<?php echo $row["pdf"]; ?>"><img src="images/btn_downAbout.png" width="80" height="24" alt="产品简介" /></a>
            		<?php endif;?>
    	        <?php endif;?>
	            <?php if($focus == 'established'):?>
            		<a class="jstip" href="<?php echo base_url(); ?>netvalue/index/<?php echo $row["NUMBER"];?>">
            		<img src="images/icon_netValue.png" width="80" height="24" alt="净值查询" /></a>
    	        <?php endif;?>
	            <?php if($focus == 'paid'):?>
            		<a class="jstip" href="<?php echo base_url(); ?>netvalue/index/<?php echo $row["NUMBER"];?>">
            		<img src="images/icon_netValue.png" width="80" height="24" alt="净值查询" /></a>
    	        <?php endif;?>
            <?php else:?>
        	    <?php if($focus == 'raisedin'):?>
            		<a href="<?php echo base_url(); ?>member/productAppointment/<?php echo $row["NUMBER"];?>" >
            		<img src="images/btn_booking.png" width="80" height="24" alt="在线预约" /></a>
            		<?php if(isset($row["pdf"])&&null!=$row["pdf"]&&""!=$row["pdf"]):?>
            		<a href="<?php echo $row["pdf"]; ?>" ><img src="images/btn_downAbout.png" width="80" height="24" alt="产品简介" /></a>
            		<?php endif;?>
            	<?php endif;?>
        	    <?php if($focus == 'established'):?>
            		<a href="<?php echo base_url(); ?>netvalue/index/<?php echo $row["NUMBER"];?>" >
            		<img src="images/icon_netValue.png" width="80" height="24" alt="净值查询" /></a>
            	<?php endif;?>
        	    <?php if($focus == 'paid'):?>
            		<a href="<?php echo base_url(); ?>netvalue/index/<?php echo $row["NUMBER"];?>">
            		<img src="images/icon_netValue.png" width="80" height="24" alt="净值查询" /></a>
            	<?php endif;?>
            <?php endif;?>       
                        </td></tr>
               <?php endforeach; ?>
               <?php endif; ?>
                </tbody>
            </table>
			<div class="myPageNum clearfix" style="margin-top:15px;">
                    	<?php echo $page;?>
                    </div>

        </div>
    </div>
</div>