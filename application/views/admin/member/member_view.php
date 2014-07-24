<div id='jsCustomScroll2' class="lfloat conrig_full">
<div class="Aadd_con">
    <div class="Aadd_insert">
        <h4>会员信息</h4>
        <div class="Aadd_icon">
            <div class="Aadd_ititle"><a href="#" class="cur">内容</a></div>
            	<input type="hidden" name="id" value="<?php if (isset($artcon['id'])) {echo $artcon['id'];}?>" />
                <div class="clear"><label>账    号：</label><input type="text" name="account" value="<?php echo $artcon['account'];?>" disabled="disabled"/></div>
                <div class="clear"><label>姓    名：</label><input type="text" name="fullname" value="<?php echo $artcon['fullname'];?>" disabled="disabled"/></div>
                <div class="clear"><label>性    别：</label><input type="text" name="gender" value="<?php echo $artcon['gender'];?>" disabled="disabled"/></div>
                <div class="clear"><label>身份证号：</label><input type="text" name="idcard" value="<?php echo $artcon['idcard'];?>" disabled="disabled"/></div>
                <div class="clear" id = "jsOrder"><label>手    机：</label><input type="text" name="mobile" value="<?php echo $artcon['mobile'];?>" disabled="disabled"/></div>
                <div  class="clear"><label>城    市：</label><input type="text" name="city" value="<?php echo $artcon['city'];?>" disabled="disabled"/></div>
                <div  class="clear"><label>积    分：</label><input type="text" name="point" value="<?php echo $artcon['point'];?>" disabled="disabled"/></div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</body>
</html>

<?php load_resource(base_url().'ueditor/ueditor.config.js',FALSE,TRUE);?>
<?php load_resource(base_url().'ueditor/ueditor.all.js',FALSE,TRUE);?>
<?php load_resource(base_url().'ueditor/lang/zh-cn/zh-cn.js',FALSE,TRUE);?>
<script>
    var editor = UE.getEditor('ueditor');
	$('#jsSelect').change(function () {
		var vals = $(this).val();
		if (vals == 1 || vals == 2 || vals == 3 || vals == 4 || vals == 5) {
			$('#jsOrder').css('display','none');
		} else {
			$('#jsOrder').css('display','block');
		}
	});
    
</script>