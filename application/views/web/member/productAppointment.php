<div class="content fr">
<div class="breadCrumbs mb20">当前位置：首页&nbsp;&gt;&nbsp;产品专区&nbsp;&gt;&nbsp;<a href="">产品预约</a></div>
<!-- 列表 -->
<div class="data-list ui-date ui-dateSty2">
    <table>
        <thead>
            <tr>
                <th colspan="2">产品名称</th>
                <th>预期年化收益率</th>
                <th>产品期限</th>
                <th>发行期</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="45" class="icon"><span class="icon-pro"></span></td>
                <td width="130" class="icon_name"><a href=""><?php echo $table["NAME"];?></a></td>
                <td class="c_ff0000" width="200">
				<?php if(isset($table["RATE"])):?>
				<table>
				<?php foreach($table["RATE"] as $value):?>
				<tr><td  style="border-left:0px;border-top:0px;border-right:0px;border-bottom:0px;text-align:left">
				<span class="red" style="text-align:center;"><?php echo $value;?></span></td></tr>
				
				
				<?php endforeach;?>
				</table>
				<?php endif;?>
				</td>
                <td><?php echo $table["PRODUCTDEADLINE"];?></td>
                <td><?php echo $table["PROJECTDATE"];?></td>
                <td><span class="icon-reserve"></span>&nbsp;&nbsp;<span class="icon-downPdf"></span></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="myReserve">
    <div class="inputArea">
    	<form action="<?php echo base_url();?>member/appointment/<?php echo $table["NUMBER"];?>" method="post">
        <table>
            <tbody>
                <tr>
                    <td class="tit tar" width="120">客户姓名：</td>
                    <td class="con"><input class="text" type="text" value="<?php echo $member["fullname"]?>" disabled="true" style="width: 206px; color: #a4a5a9;" /></td>
                </tr>
                <tr>
                    <td class="tit tar" width="120">联系电话：</td>
                    <td class="con"><input class="text" type="text" value="<?php echo $member["mobile"]?>" disabled="true" style="width: 206px; color: #a4a5a9;" /></td>
                </tr>
                <tr>
                    <td class="tit tar" width="120">投资金额：</td>
                    <td class="con"><input class="text" type="text" name="money" value="" style="width: 206px;" /></td>
                </tr>
                <tr>
                    <td class="tit tar" width="120">城市选择：</td>
                    <td class="con"><select name="city">
                    <option>选&nbsp;择</option>
                    <?php if(isset($city)):?>
                    <?php foreach ( $city as $value ):?>
                    	<option value="<?php echo $value["name"]?>"><?php echo $value["name"]?></option>
                    <?php endforeach;?>
                    <?php endif;?>
                    </select><span class="tag c_fc6364">请选择你所在的城市</span></td>
                </tr>
                <tr>
                    <td class="tit tar" width="120" valign="top">备　　注：</td>
                    <td class="con">
                    <input class="textarea" type="textarea" name="remark" style="width: 206px;height: 100px;" />
                    </td>
                </tr>
                <tr>
                    <td class="tit tar" width="120">&nbsp;</td>
                    <td class="con"><input class="btn-reserve mphand" type="submit" value="预约" /></td>
                </tr>
            </tbody>
        </table>
        </form>
    </div>
</div>
</div>
</div>