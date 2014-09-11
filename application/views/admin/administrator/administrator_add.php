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
			<h4>管理员<?php if (isset($user['id'])){ echo "修改";} else {echo "添加";}?></h4>
			<div class="Aadd_icon">
				<form action="<?php echo $actUrl;?>" method="post" onsubmit="return checkLogin();">
					<input type="hidden" name="id" value="<?php if (isset($user['id'])){echo $user['id'];}?>" />
					<div><label>用户名：</label><input type="text" name="name" value="<?php if (isset($user['name'])){echo $user['name'];} ?>" /></div>
					<?php if (isset($user['id'])){?>
					<div><label>原密码：</label><input type="password"  id="jsnpwd" /></div>
					<?php }?>
					<div><label>密码：</label><input type="password" name="password" id="jspwd" /></div>
					<div><label>确认密码：</label><input type="password" name="rpassword" id="jsrpwd" /></div>
					<div class="Aadd_save"><input class="redbg" type="submit" name="sub" value="保存" /> <input class="bluebg" type="reset" value="重置" /></div>
				</form>
			</div>
		</div>
	</div>
</div>

</div>
<?php load_resource('md5.js');?>
<script type="text/javascript">
	function checkLogin(){
		var id = "<?php if (isset($user['id'])){ echo $user['id'];} else {echo '';}?>";
		if (id != '') {
			var npwd = $.trim($('#jsnpwd').val());
			npwd = hex_md5(npwd);
			if (npwd != '<?php if (isset($user['password'])){ echo $user['password'];} else { echo '';}?>') {
				alert('原密码不正确!');
				return false;
			}
		}
		var pwd = $.trim($('#jspwd').val());
		var rpwd = $.trim($('#jsrpwd').val());
		if (pwd != rpwd) {
			alert('密码与确认密码不一致，请重新填写！');
			return false;
		}
		return true;
	}
</script>


</body>
</html>
