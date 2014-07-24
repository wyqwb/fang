        <div class="content fr">
        
        
            <!-- 意见反馈>列表 -->
            <div class="ui-winbox2 mt20">
                <div class="hd clearfix">
                    <h3 class="ui-titSty1 fl mr20"><span>意见反馈</span></h3>
                    <p class="menu fl"><a href="<?php echo base_url();?>member/feedback">全部意见</a>&nbsp;|&nbsp;<a href="<?php echo base_url();?>member/feedback/wait">待处理问题</a>&nbsp;|<!--  &nbsp;<a href="<?php //echo base_url();?>member/feedback/being">处理中工单</a>-->&nbsp;|&nbsp;<a href="<?php echo base_url();?>member/feedback/finish">已处理问题</a>&nbsp;|<!--  &nbsp;<a href="<?php //echo base_url();?>member/feedback/close">已关闭工单</a>--></p>
                    <a class="ui-btnSty1 fr" href=""><span>提交工单</span></a>
                </div>
                <div class="bd clearfix">
                    <div class="myQUestionList">
                        <table>
                            <thead>
                                <tr>
                                    <th class="pl16">编号</th>
                                    <th>问题类型</th>
                                    <th>标题</th>
                                    <th>提交时间</th>
                                    <th>状态</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($qa as $arr): ?>
                                <tr>
                                    <td class="pl16"><?php echo $arr['Id'];?></td>
                                    <td><?php echo $arr['type'];?></td>
                                    <td><a href="<?php echo base_url()."member/feedbackdetail/".$arr['Id'];?>"><?php echo mb_strcut( $arr['title'],0,50,'UTF-8');?></a></td>
                                    <td><?php echo $arr['postdate'];?></td>
                                    <td class="pr16 <?php switch ($arr['state']){
                                    	case "完成":
                                    		echo "c_6da83a";
                                    		break;
                                    	case "等待处理":
                                    		echo "c_ad0909";
                                    		break;
                                    		default:
                                    				echo "c_ad0909";
                                    	
                                    }?> "><?php echo $arr['state']?></td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- 意见反馈>提交 -->
            <form action="<?php echo base_url(); ?>member/feedbackact" method="post" class="moduserinfo">
            <div class="ui-winbox2">
                <div class="msginfo"></div>
                <div class="bd clearfix">
                    <div class="mySubmitArea">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="tit tar">问题类型：</td>
                                    <td class="con"><select name="type" class="select" datatype="*" nullmsg="问题类型不能为空!" style="width: 220px;"><option value="">--选择类型--</option>
                                    			<?php foreach ($gongdan as $arr):?>
                                    			<option value="<?php echo $arr['name'];?>"><?php echo $arr['name'];?></option>
                                    					<?php endforeach;?>
                                    </select></td>
                                </tr>
                                <tr>
                                    <td class="tit tar">标题：</td>
                                    <td class="con"><input class="text" name="title" datatype="*" nullmsg="标题不能为空!"style="width: 220px;" type="text" value="" /><img src="" alt="" /></td>
                                </tr>
                                <tr>
                                    <td class="tit tar">问题正文：</td>
                                    <td class="con"><textarea datatype="*" name="content" nullmsg="正文不能为空!" style="width: 100%;height: 200px;" class="textbox"></textarea></td>
                                </tr>
                                <tr>
                                    <td class="tit tar">验证码：</td>
                                    <td class="con"><input class="text" name="captcha" style="width: 100px;" datatype="*" nullmsg="验证码不能为空!"  type="text" value="" />&nbsp;<?php echo $captcha['image'];?></td>
                                </tr>
                                <tr>
                                    <td class="tit tar">&nbsp;</td>
                                    <td class="con"><input type="submit" value="提交" class="ui-btn-submit" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </form>
            <!-- 意见反馈>内容 -->
            </div>
            </div>
            
<script type="text/javascript"> 
$(".moduserinfo").Validform({
	tiptype:1,
		beforeSubmit:function(){
			$('.ui-btn-submit').click();
		
		}
});

var options = {
    target:     '.msginfo',
    success: function(a) {
        if(a =="提交成功"){
	    	alert('提交成功!');
			window.location.href = "<?php echo base_url(); ?>member/feedback";
	    }
    } };
$('.moduserinfo').ajaxForm(options);
</script>
