<div id='jsCustomScroll2' class="lfloat conrig_full">
    <link type="text/css" href="css/vipstyle.css" rel="stylesheet" />
<div class="Aadd_con">
    <div class="Aadd_insert">
        <h4>意见反馈</h4>
        <div class="Aadd_icon">
            <div class="Aadd_ititle"><a href="#" class="cur">内容</a></div>
               <div class="bd clearfix">
                    <div class="myTag mt10">
                        <table>
                            <tbody>
                                <tr>
<?php foreach($question as $arr):?>
                                    <td>编号：<span class="c_0685d7"><?php echo $arr['Id'];?></span></td>
                                    <td>问题类型：<?php echo $arr['type'];?></td>
                                    <td>提交时间：<?php echo $arr['postdate'];?></td>
                                    <td>状态：<?php echo $arr['state'];?></td>
<?php endforeach;?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
<?php $i=-1;foreach($artcon as $key=>$arr):?>
                    <dl class="myQuestion mt10">
                        <dt class="clearfix"><span >第<?php echo $key;?>次提问</span><span >状态：<span ><?php echo $arr['state'];?></span></span></dt>
                        <dd>
                            <dl>
                            <?php if(isset($arr['提出问题'])):?>
                                <dt class="clearfix"><span >提问问题</span><span >提交时间：<?php echo $arr['提出问题']['postdate'];?></span></dt>
                                <dd>
                                    <p><?php echo $arr['提出问题']['content'];?></p>
                                </dd>
                            <?php endif;?>
                            <?php if(isset($arr['回答问题'])):?>
                                <dt class="clearfix"><span >答复问题</span><span >提交时间：<?php echo $arr['回答问题']['postdate'];?></span></dt>
                                <dd>
                                    <p><?php echo $arr['回答问题']['content'];?></p>
                                </dd>
                            <?php endif;?>
                            </dl>
                        </dd>
                    </dl>
<?php endforeach;?>
                </div>
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