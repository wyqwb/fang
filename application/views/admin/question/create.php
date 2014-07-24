<div id='jsCustomScroll2' class="lfloat conrig_full">
    <link type="text/css" href="css/vipstyle.css" rel="stylesheet" />
<div class="Aadd_con">
    <div class="Aadd_insert">
        <h4>意见反馈</h4>
        <div class="Aadd_icon">
            <div class="Aadd_ititle"><a href="#" class="cur">内容</a></div>
            <?php if (sizeof($iorder)>0):?>
	            <form action="<?php echo $actUrl;?>" method="post" class='js_needcheck'>
	            	<input type="hidden" name="questionid" value="<?php echo $question[0]['Id'];?>" />
	            	<div class="clear"><label>未回答问题列表：第</label><select id="jsSelect" name="iorder" >
	            		<?php foreach ($iorder as $arr):?>
                		<option value="<?php echo $arr['iorder'];?>"><?php echo $arr['iorder'];?></option>
                		<?php endforeach;?>
                	</select><label>次问题</label></div>
	                <div  class="clear"><label>内容：</label><div class="Aadd_ueditor">
	                <textarea name="content" style="width:700px;" class='js_notnull'></textarea></div></div>
					<div class="Aadd_save"><input class="redbg" type="submit" name="sub" value="保存" /> <input class="bluebg" type="reset" value="重置" /></div>
                </form>
	        <?php endif;?>
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
<script>
    $(document).ready(function(){
      /*  $('#js_notnull').focus(function(){
            $(this).popover('show');
        });*/
        $('.js_notnull').each(function(){
            $(this).focus(function(){
                $(this).popover('show');
            });
        });
        $('#jsSelect').click(function(){
            $(this).removeClass('error');
        });
        $('.js_notnull').click(function(){
            $(this).removeClass('error');
        });
        $('.js_needcheck').submit(function(){
            var result = true;
            var selectval = $('#jsSelect').val();
            if(selectval == 0)
            {
                result = false;
                $('#jsSelect').addClass('error');
            }
            else
            {
                result = true;
                $('#jsSelect').removeClass('error');
            }
            $(this).find('.js_notnull').each(function(){
                var val = $(this).attr('value');
                if(val == '')
                {
                    result = false;
                    $(this).addClass('error');
                }
                else
                {
                    $(this).removeClass('error');
                }
            });
            if(result == false)
            {
                return false;
            }
            else{return true;}
        });
    });

</script>
