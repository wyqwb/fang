<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>CMS-index</title>
    <?php load_resource('adminstyle.css');?>
    <?php load_resource('jquery.mCustomScrollbar.css');?>
    <?php load_resource('jquery.ui.css');?>
    <?php load_resource('jquery-1.8.3.min.js');?>
    <?php load_resource('global.js');?>
    <?php load_resource('jquery.mousewheel.js');?>
    <?php load_resource('bootstrap.js');?>
    <?php load_resource('jquery.form.min.js');?>
    <?php load_resource('jquery-ui-1.10.4.custom.min.js');?>
    <?php load_resource('jquery.filemanagement.js');?>
    <?php load_resource('jquery.lightbox.js');?>
    <?php load_resource('jquery.mCustomScrollbar.js');?>
    <?php load_resource('lightbox.js');?>
    <?php load_resource('default_lightcontrol.js');?>
    <?php load_resource('adminunfold.js');?>
    <?php load_resource('searchcondition.js');?>
    <style>
        .lighttable th{text-align:right;padding-right:20px;}
        .lighttable td{text-align:left;padding-left:20px;}
    </style>
</head>
<body>
    <div class="ADD_coninp">
            <table class='lighttable' width="100%" cellpadding="0" cellspacing="0">
                <tbody>
                    <tr style='height:25px;'><th colspan=4 style="text-align:center;background-color: yellow;"> 产品基础资料</th></tr>
                    <tr style='height:25px;'><th>产品编号：</th><td colspan=3><?php if(isset($olddata['NUMBER'])){echo $olddata['NUMBER'];}?></td></tr>
                    <tr style='height:25px;'><th>产品名称：</th><td colspan=3><?php if(isset($olddata['NAME'])){echo $olddata['NAME'];}?></td></tr>
                    <tr style='height:25px;'><th>投资标的：</th><td colspan=3><?php if(isset($olddata['AGENCY'])){echo $olddata['AGENCY'];}?></td></tr>
                    <tr style='height:25px;'>
		    			<th width='14%'>产品类型：</th><td valign="bottom"><?php if(isset($olddata['PRODUCTTYPENAME'])){echo $olddata['PRODUCTTYPENAME'];}?>
                    	<img src="<?php echo base_url();?>images/producttype/<?php echo $olddata['PRODUCTTYPENUMBER'];?>.png" width="26" height="26"  alt="友山基金"/></td>
		    			<th width='14%'>产品状态：</th><td><?php if(isset($olddata['PRODUCTSTATE1'])){echo $olddata['PRODUCTSTATE1'];}?></td>
		    		</tr>
                    <tr style='height:25px;'>
                    	<th>产品种类：</th><td><?php if(isset($olddata['PRODUCTSORTNAME'])){echo $olddata['PRODUCTSORTNAME'];}?></td>
                    	<th>发行日期：</th><td><?php if(isset($olddata['PROJECTDATE'])){echo $olddata['PROJECTDATE'];}?></td>
		   	 		</tr>
                    <tr style='height:25px;'>
			    		<th>产品规模：</th><td><?php if(isset($olddata['SCALE'])){echo $olddata['SCALE'];}?></td>
			    		<th>成立日期：</th><td><?php if(isset($olddata['FUNDINGDATE'])){echo $olddata['FUNDINGDATE'];}?></td>
		    		</tr>
                    <tr style='height:25px;'>
			    		<th>产品期限：</th><td><?php if(isset($olddata['PRODUCTDEADLINE'])){echo $olddata['PRODUCTDEADLINE'];}?>(天)</td>
                    	<th>兑付日期：</th><td><?php if(isset($olddata['DUEDATE'])){echo $olddata['DUEDATE'];}?></td>
		    		</tr>
                    <tr style='height:25px;'>
                    	<th>产品经理：</th><td><?php if(isset($olddata['DESIGNCHARGER'])){echo $olddata['DESIGNCHARGER'];}?></td>
			    		<th>创建时间：</th><td><?php if(isset($olddata['CREATETIME'])){echo $olddata['CREATETIME'];}?></td>
		    		</tr>
                    <tr style='height:25px;'>
			    		<th>资金托管银行：</th><td><?php if(isset($olddata['COLLECATIONBACK'])){echo $olddata['COLLECATIONBACK'];}?></td>
                    	<th>最后更新：</th><td><?php if(isset($olddata['LASTUPDATETIME'])){echo $olddata['LASTUPDATETIME'];}?></td>
		    		</tr>
                </tbody>
            </table>
        <form action="./admin/product/update" method="post" enctype="multipart/form-data">
        	<input type='hidden' name='oldstate' value='<?php echo $olddata['PRODUCTSTATE'];?>'  />
            <input type='hidden' name='NUMBER' value='<?php echo $olddata['NUMBER'];?>'  />
            <table class='lighttable' width="100%" cellpadding="0" cellspacing="0">
                <tbody>
                    
		    <tr style='height:25px;'><th colspan=4 style="text-align:center;background-color: yellow;">产品信息发布</th></tr>
                    <tr style='height:25px;'><th width='14%'>专区显示：</th><td colspan=3 style='padding: 6px 21px;'><input name='ishow' id='jscheckproduct' type='checkbox' value='1' <?php if(isset($newdata['ishow']) && $newdata['ishow']=='1'){echo "checked='checked'";}?> ></td> </tr>
                    <tr style='height:25px;' class=' productcheck'><th>非会员产品名称：</th><td colspan=3><input name='title' size=100 value='<?php if(isset($newdata['title'])){echo $newdata['title'];}?>' type="text"></td></tr>
                    <tr style='height:25px;' class=' productcheck'><th>专区类别：</th><td colspan=3>
                    	<select name='state' value='<?php if(isset($newdata['state'])){echo $newdata['state'];}?>'>
                    		<option vallue='自动分类' <?php if ($newdata['state']=='自动分类') echo 'selected="selected"';?>>自动分类</option>
                    		<option vallue='募集中' <?php if($newdata['state']=='募集中') echo 'selected="selected"';?>>募集中</option>
                    		<option vallue='已成立' <?php if($newdata['state']=='已成立') echo 'selected="selected"';?>>已成立</option>
                    		<option vallue='已兑付' <?php if($newdata['state']=='已兑付') echo 'selected="selected"';?>>已兑付</option>
                    	</select>
                    <font COLOR = #FF0000 >(注意: 缺省"自动分类"依据CRM系统产品状态实时将产品归类到[募集中\已成立\已兑付]列表, 选择其他选项强制进行手动归类.)</font></td></tr>
                    <tr style='height:25px;' class=' productcheck'><th>产品简介文件：</th><td colspan=3>
                    	<input name='pdf' value='<?php if(isset($newdata['pdf'])){echo $newdata['pdf'];}?>' type="text" readonly>
                    	<input type='file' name='pdffile'></td></tr>
                    <tr style='height:25px;' class=' productcheck'><th>产品视频链接：</th><td colspan=3><input name='video' size=100 value='<?php if(isset($newdata['video'])){echo $newdata['video'];}?>' type="text"></td></tr>
                    <tr style='height:25px;'><th>首页展示：</th><td colspan=3 style='padding: 6px 21px;'><input name='type' id='jscheck' type='checkbox' value='1' <?php if(isset($newdata['type']) && $newdata['type']=='1'){echo "checked='checked'";}?> ></td></tr>
                    <tr style='height:25px;' class=' homecheck'><th>展示图片：</th><td colspan=3>
                    	<?php if(isset($newdata['photo']) && !empty($newdata['photo'])){?><img src='<?php echo base_url();?>/uploads/<?php echo $newdata['photo'];?>' style='width:102px;height:112px;' /><?php } ?>
                    	<input style='margin: 40px;margin-left: 20px;' type='file' name='addfile' /></td></tr>
                    <tr style='height:25px;' class=' homecheck'><th>排序：</th><td colspan=3><input name='order' value='<?php if(isset($newdata['order'])){echo $newdata['order'];} else {echo '0';};?>' type="text"></td></tr>
                </tbody>
            </table>
                    <div style="text-align:center;" class="Aadd_save"><input class="redbg" type="submit" name="sub" value="  保  存  "></div>

        </form>
    </div>
</body>
</html>
<script>
    $(document).ready(function(){
        var jscheck = $('#jscheck');
        var homecheck = $('.homecheck');
        var checkhidden = function(){
            if(jscheck.attr('checked')=='checked')
            {
                homecheck.removeClass('pub_hidden');
            }
            else
            {
                homecheck.addClass('pub_hidden');
            }
        }
        checkhidden();
        jscheck.click(function(){
            checkhidden();
        });
        var jscheckproduct = $('#jscheckproduct');
        var productcheck = $('.productcheck');
        var checkhiddenproduct = function(){
            if(jscheckproduct.attr('checked')=='checked')
            {
            	productcheck.removeClass('pub_hidden');
            }
            else
            {
            	productcheck.addClass('pub_hidden');
            }
        }
        checkhiddenproduct();
        jscheckproduct.click(function(){
        	checkhiddenproduct();
        });

    });
</script>