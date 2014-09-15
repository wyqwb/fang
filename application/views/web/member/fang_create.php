
        <div class="content fr">
            <!-- 横栏概览 -->
            <div class="userSum"><h2> 创建房源信息</h2></div>

            <!-- 添加房源 -->
            <div class="userInfo">
		<form action="<?php echo base_url(); ?>member/fanglist" method="post" class="modfang" enctype="multipart/form-data">
                <div class="bd">
                    <div class="msginfo" style="color:red"></div>
                    <input type="hidden" name="fangid" value="<?php if (isset($fang['id'])) {echo $fang['id'];}?>" />
                    <table>
                        <tbody>
                            <tr>
                                <td class="tit">选择看房团：</td>
                                <td class="input">
                                <select name="fangtuan" class="text" datatype="*">
                                    <option></option>
                                    <?php if (isset($fang_tuan_list)&&count($fang_tuan_list)>0) {
                                            foreach ($fang_tuan_list as $key => $value) { 
                                                if(isset($fang['tuanid'])){
                                    ?>
                                            <option value="<?php if($value['id']==$fang['tuanid']){echo $fang['tuanid'].'" selected="selected';}
                                                                else{echo $value['id'];}?>">
                                                <?php echo $value['title']?></option>
                                                <?php }else{ ?>
                                             <option value="<?php echo $value['id']?>"><?php echo $value['title']?></option>
                                         <?php } 
                                            }
                                         }?>
                                </select>
                                </td>
                                <td><div class="Validform_checktip">必须选择一个看房团</div></td>
                            </tr>                         
                            <tr>
                                <td class="tit">房屋名称：</td>
				                <td class="input">
                                <input class="text"  name="title"  type="text" value="<?php if (isset($fang['title'])) {echo $fang['title'];}?>"  datatype="*" nullmsg="请输看房源名称！"/>
                                </td>
                                <td><div class="Validform_checktip">房源名称至少3个字符,最多16个字符！</div></td>
                            </tr>
                            <tr>
                                <td class="tit">建筑面积：</td>
                                <td class="input">
                                <input class="text" name="builtarea" type="text" value="<?php if (isset($fang['builtarea'])) {echo $fang['builtarea'];}?>"   datatype="n" nullmsg="建筑面积：!" />
                                </td>
                                <td><div class="Validform_checktip">单位：平方米</div></td>                                
                            </tr>
                            <tr>
                                <td class="tit">土地面积：</td>
                                <td class="input">
                                <input class="text"  name="landarea" type="text"  value="<?php if (isset($fang['landarea'])) {echo $fang['landarea'];}?>"   datatype="n" nullmsg="土地面积：" errormsg="" />
                                </td>
                                <td><div class="Validform_checktip">单位：平方米</div></td>                                
                            </tr>
                            <tr>
                                <td class="tit">卧室数量：</td>
				                <td class="input">
                                <input class="text"  name="bedrooms" type="text"  value="<?php if (isset($fang['bedrooms'])) {echo $fang['bedrooms'];}?>"   datatype="n"   datatype="n" nullmsg="卧室数量："/>
                                </td>
                                <td><div class="Validform_checktip">单位：间</div></td>                                
                            </tr>
                            <tr>
                                <td class="tit">卫生间数量：</td>
                                <td class="input">
                                <input class="text"  name="toilets" type="text"  value="<?php if (isset($fang['toilets'])) {echo $fang['toilets'];}?>"   datatype="n"  datatype="n" nullmsg="卫生间数量："/>
                                </td>
                                <td><div class="Validform_checktip">单位：个</div></td>                                
                            </tr>
                            <tr>
                                <td class="tit">楼层：</td>
                                <td class="input">
                                <input class="text"  name="floor" type="text"  value="<?php if (isset($fang['floor'])) {echo $fang['floor'];}?>"   datatype="n" nullmsg="楼层：" errormsg="" />
                                </td>
                                <td><div class="Validform_checktip">单位：层</div></td>                                
                            </tr> 

                            <tr>
                                <td class="tit">绿化率：</td>
                                <td class="input">
                                <input class="text"  name="pgreen" type="text"  value="<?php if (isset($fang['pgreen'])) {echo $fang['pgreen'];}?>"   datatype="n" nullmsg="楼层：" errormsg="" />
                                </td>
                                <td><div class="Validform_checktip">单位：%</div></td>                                
                            </tr> 

                            <tr>
                                <td class="tit">周边：</td>
                                <td class="input">
                                <input class="text"  name="nearby" type="text"  value="<?php if (isset($fang['nearby'])) {echo $fang['nearby'];}?>"   datatype="*" nullmsg="楼层：" errormsg="" />
                                </td>
                                <td><div class="Validform_checktip">周边配套设施</div></td>                                
                            </tr> 

                            <tr>
                                <td class="tit">住宅类型：</td>
                                <td class="input">
                                <select name="housetype" class="text" datatype="*"  nullmsg="请选择房屋类型！">
                                    <option></option>
                                    <option value="1">普通住宅</option>
                                    <option value="2">商住两用</option>
                                    <option value="3">公寓</option>
                                    <option value="4">别墅</option> 
                                    <option value="5">其他</option>
                                </select>
                                </td>
                                <td><div class="Validform_checktip"></div></td>
                            </tr> 
                            <tr>
                                <td class="tit">房屋照片上传：</td>
                                <td class="input">
                                <input type="file" class='text' data-container="body" data-trigger="focus" data-placement="right" data-content="预览图"  name="homeimg1" value="" />
                                </td>
                                <td><div class="Validform_checktip"></div></td>
                            </tr> 
                            <tr>
                                <td class="tit">房屋照片上传：</td>
                                <td class="input">
                                <input type="file" class='text' data-container="body" data-trigger="focus" data-placement="right" data-content="预览图" data-original-title="" name="homeimg2" value="" /> 
                                </td>
                                <td><div class="Validform_checktip"></div></td>
                            </tr>
                            <tr>
                                <td class="tit">最低价格：</td>
                                <td class="input">
                                <input class="text"  name="lowerprice" type="text"  value="<?php if (isset($fang['lowerprice'])) {echo $fang['lowerprice'];}?>" datatype="n" nullmsg="请输入显示价格！" />
                                </td>
                                <td><div class="Validform_checktip">单位：万元</div></td>
                            </tr>  

                            <tr>
                                <td class="tit">最高价格：</td>
                                <td class="input">
                                <input class="text"  name="highprice" type="text"  value="<?php if (isset($fang['highprice'])) {echo $fang['highprice'];}?>" datatype="n" nullmsg="请输入显示价格！" />
                                </td>
                                <td><div class="Validform_checktip">单位：万元</div></td>
                            </tr> 

                            <tr>
                                <td class="tit">房屋介绍：</td>
                                <td class="input" colspan="2">
                                <textarea class="text" name="desc" style="margin: 0px; width: 450px; height: 180px;resize: none;" datatype="*" nullmsg="请输入房屋介绍！"><?php if (isset($fang['desc'])) {echo $fang['desc'];}?></textarea>
                                <div class="Validform_checktip"></div></td>
                            </tr>  
                            <br>    
                            <tr>
                                <td class="tit">&nbsp;</td>
                                <td class="input"><input class="ui-btn-submit" type="submit"  name="sub"  value="提交" /></td>
                                
                            </tr>

                        </tbody>
                    </table>
                </div>
</form>
            </div>
        </div>
           </div>
<script type="text/javascript"> 
$(".modfang").Validform({
	tiptype:function(msg,o,cssctl){
		//msg：提示信息;
		//o:{obj:*,type:*,curform:*}, obj指向的是当前验证的表单元素（或表单对象），type指示提示的状态，值为1、2、3、4， 1：正在检测/提交数据，2：通过验证，3：验证失败，4：提示ignore状态, curform为当前form对象;
		//cssctl:内置的提示信息样式控制函数，该函数需传入两个参数：显示提示信息的对象 和 当前提示的状态（既形参o中的type）;
		if(!o.obj.is("form")){//验证表单元素时o.obj为该表单元素，全部验证通过提交表单时o.obj为该表单对象;
			var objtip=o.obj.parents('tr').find(".Validform_checktip");
			cssctl(objtip,o.type);
			objtip.text(msg);
		}
	},
		beforeSubmit:function(){
			$('.ui-btn-submit').click();
		
		}
});

var options = {
    target:     '.msginfo',
    success: function() {
    } };
$('.moduserinfo').ajaxForm(options);


$('select').each(function(){
	var dataval = $(this).attr('data-value');
	if(dataval){
		$(this).find('option[value='+dataval+']').attr('selected',true);
	}
})
</script>
