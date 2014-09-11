<style type="text/css">
        table
        {
            width: 950px;
            margin: 0 auto;
            background-color: #fff;
            border-collapse: collapse; /* 关键属性：合并表格内外边框(其实表格边框有2px，外面1px，里面还有1px哦) */
            border: solid #999; /* 设置边框属性；样式(solid=实线)、颜色(#999=灰) */
            border-width: 1px 0 0 1px; /* 设置边框状粗细：上 右 下 左 = 对应：1px 0 0 1px */
        }
        table thead
        {
            background-color: #bfd9f2;
        }
        table th, table td
        {
            border: solid #999;
            border-width: 0 1px 1px 0;
            padding: 2px;
            height: 25px;
            line-height: 25px;
        }
</style>
	<div class="Aadd_con">
		<div class="Aadd_insert">
			<h4>管理员权限修改</h4>
			<div class="Aadd_icon">
				<form action="<?php echo $actUrl;?>" method="post" onsubmit="return checkLogin();">
					<input type="hidden" name="id" value="<?php if (isset($user['id'])){echo $user['id'];}?>" />
					<div><label>用户名：</label><input type="text" name="name" disabled value="<?php if (isset($user['name'])){echo $user['name'];} ?>" /></div>
				<div class="clear"> </div>	
					<table>
					<thead><tr><th>一级菜单</th><th>二级菜单</th><th>三级菜单</th></tr></thead>
					<tbody>
					<?php $rows1=0;$rows2=0;$i=0;?>
					<?php foreach ($power as $arr1):?>
					<tr>
					<?php if ($rows1>1) {$rows1 = $rows1-1;} 
						  else {$rows1=$arr1['rowspan1'];
						  $value = '/'.$arr1['Name1'].'/,';
						  if (!(strpos($user['power'],$value)===False)) $check='checked'; else $check = '';
						  echo '<td rowspan='.$rows1.'><input type="checkbox" name="power'.(100+$i).'" value="'.$value.'" '.$check.' />'.$arr1['Name1'].'</td>';};
					?>
					<?php if ($rows2>1) {$rows2 = $rows2-1;} 
						  else {$rows2=$arr1['rowspan2'];
						  $value = '/'.$arr1['Name1'].'/'.$arr1['Name2'].'/,';
						  if (!(strpos($user['power'],$value)===False)) $check='checked'; else $check = '';
						  echo '<td rowspan='.$rows2.'><input type="checkbox" name="power'.(200+$i).'"  value="'.$value.'" '.$check.' />'.$arr1['Name2'].'</td>';};
					?>
					<?php $value='/'.$arr1['Name1'].'/'.$arr1['Name2'].'/'.$arr1['Name3'].'/,'; if (!(strpos($user['power'],$value)===False)) $check='checked'; else $check = '';?>
					<td><input type="checkbox" name="power<?php echo 300+$i;?>" value="<?php echo $value?>"  <?php echo $check;?>/><?php echo $arr1['Name3']?></td>
					</tr>
					<?php $i++;endforeach;?>
					</tbody></table>
					<div class="Aadd_save"><input class="redbg" type="submit" name="sub" value="保存" /> <input class="bluebg" type="reset" value="重置" /></div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>
