
	<!-- 主体 -->
	<div class="g-bd">
		<div class="bd-wrap g-wh5">
		<!-- 模块1 -->
		<div class="g-item g-wh7">
				<div class="m-infobox">
					<p>
						<span>区域：</span>
						<a href="">全世界</a>
						<a href="">马来西亚</a>
						<a href="">美国</a>
						<a href="">泰国</a>
						<a href="">加拿大</a>
						<a href="">马尔代夫</a>
						<a href="">日本</a>
						<a href="">西班牙</a>
					</p>
					<p>
						<span>总价：</span>
						<a href="">不限</a>
						<a href="">20万以下</a>
						<a href="">20-30万</a>
						<a href="">30-40万</a>
						<a href="">40-50万</a>
						<a href="">50-60万</a>
						<a href="">60-80万</a>
						<a href="">80-100万</a>
						<a href="">100-120万</a>
						<a href="">120万-150万</a>
						<a href="">150万以上</a>
						<select name="" id="">
							<option value="">按总价</option>
						</select>
						<input type="text" class="short-input">-
						<input type="text" class="short-input">万
					</p>
					<p>
						<span>面积：</span>
						<a href="">不限</a>
						<a href="">50m <sup>2</sup>以下</a>
						<a href="">50-70m <sup>2</sup></a>
						<a href="">70-90m <sup>2</sup></a>
						<a href="">90-110m <sup>2</sup></a>
						<a href="">110-130m <sup>2</sup></a>
						<a href="">130-150m <sup>2</sup></a>
						<a href="">150m <sup>2</sup>以上</a>
						<input type="text" class="short-input">-
						<input type="text" class="short-input">m <sup>2</sup>
					</p>
				</div>
		</div>
		<!-- 模块2 -->
		<?php if(isset($fangtuan)&&(count($fangtuan)>0)) {  ?> 			

					<div class="g-item g-wh7">
						<div class="g-m2-left">
							<div class="ad-title">
								<span class="til"><?php echo $fangtuan['title']?></span><br>
								<span class="ti2">CBD核心，有轨电车1号线，诺贝尔湖，世界级综合体！</span>
								<!-- <img src="<?php  echo WEB_IMAGES_PATH?>price.gif" alt="" class="price"> -->
							</div>
							<div class="ad-img">
								<?php if($fangtuan['previewimg']==""){ ?>
									<img src="<?php  echo WEB_IMAGES_PATH?>adimg.gif" alt="">
								<?php }else{?>
									<img src="<?php  echo CUSTOM_IMAGES_PATH.$fangtuan['previewimg']?>" width="581px" height="301px" alt="">
								<?php }?>				
							</div>
							<div class="ad-cnt">
								<h2>行程信息</h2>							
									<?php echo $fangtuan['Travelinfo']?>						
								<div class="clear"></div>
							</div>
						</div>
						<div class="g-m2-right">
							<!-- 咨询 -->
							<div class="m-con">
								<span class="qq"><img src="<?php  echo WEB_IMAGES_PATH?>qq1.gif" alt=""></span>
								<span class="qq2"><img src="<?php  echo WEB_IMAGES_PATH?>qq2.gif" alt=""></span>
							</div>	
							<div class="g-m2-tab">
								<ul class="btns">
									<li class="on">内容介绍</li>
								</ul>
								<div class="cnt">
									<p><span>出行日期：</span><?php echo $fangtuan['godate']?></p>
									<p><span>行程时间：</span><?php echo $fangtuan['gotime']?></p>
									<p><span>普通费用：</span><?php echo $fangtuan['normalCost']?></p>
									<p><span>Vip费用：</span><?php echo $fangtuan['vipCost']?></p>
									<p><span>显示价格：</span><?php echo $fangtuan['displayCost']?></p>

								</div>
							</div>		
							<div class="m2-img2">
							<h2>注意事项：</h2>
							<p><span><?php echo $fangtuan['attention']?></p>
							</div> 
						</div>
						<div class="clear"></div>

					</div>
		<?php }else {?>


		<?php }	?>

		<!-- 模块3 -->
		<div class="g-item g-wh7">			
			<div class="g-m3-l">
				<img src="<?php  echo WEB_IMAGES_PATH?>city.gif" alt="">
				<h2 class="m3-til">尊享城市发展机遇鼎力助推城市国际化</h2>
				<ul class="m3-list1">
					<li>
						<div class="til">一核四成.高新区CBD问鼎未来</div>
						<div class="cnt">作为一种客观存在的物质形态，房地产是指房产和地产的总称，包括土地和土地上永久建筑物及其所衍生的权利。房产是指建筑在土地上的各种房屋，包括住宅、厂房、仓库和商业、服务、文化、教育、卫生、体育以及办公用房等。地产是指土地及其上下一定的空间，包括地下的各种基础设施、地面道路等。</div>
					</li>
					<li>
						<div class="til">一核四成.高新区CBD问鼎未来</div>
						<div class="cnt">
							作为一种客观存在的物质形态，房地产是指房产和地产的总称，包括土地和土地上永久建筑物及其所衍生的权利。房产是指建筑在土地上的各种房屋，包括住宅、厂房、仓库和商业、服务、文化、教育、卫生、体育以及办公用房等。地产是指土地及其上下一定的空间，包括地下的各种基础设施、地面道路等。
						</div>
					</li>
					<li>
						<div class="til">一核四成.高新区CBD问鼎未来</div>
						<div class="cnt">
							作为一种客观存在的物质形态，房地产是指房产和地产的总称，包括土地和土地上永久建筑物及其所衍生的权利。房产是指建筑在土地上的各种房屋，包括住宅、厂房、仓库和商业、服务、文化、教育、卫生、体育以及办公用房等。地产是指土地及其上下一定的空间，包括地下的各种基础设施、地面道路等。
						</div>
					</li>
				</ul>
				<img src="<?php  echo WEB_IMAGES_PATH?>map.gif" alt="" class="map">
			</div>
			<div class="g-m3-r">
				<ul class="m3-list2">
					<li>
						<div class="til">一核四成.高新区CBD问鼎未来</div>
						<div class="cnt">作为一种客观存在的物质形态，房地产是指房产和地产的总称，包括土地和土地上永久建筑物及其所衍生的权利。房产是指建筑在土地上的各种房屋，包括住宅、厂房、仓库和商业、服务、文化、教育、卫生、体育以及办公用房等。地产是指土地及其上下一定的空间，包括地下的各种基础设施、地面道路等。
						</div>
					</li>
					<li>
						<div class="til">一核四成.高新区CBD问鼎未来</div>
						<div class="cnt">作为一种客观存在的物质形态，房地产是指房产和地产的总称，包括土地和土地上永久建筑物及其所衍生的权利。房产是指建筑在土地上的各种房屋，包括住宅、厂房、仓库和商业、服务、文化、教育、卫生、体育以及办公用房等。地产是指土地及其上下一定的空间，包括地下的各种基础设施、地面道路等。
						</div>
					</li>
					<li>
						<div class="til">一核四成.高新区CBD问鼎未来</div>
						<div class="cnt">作为一种客观存在的物质形态，房地产是指房产和地产的总称，包括土地和土地上永久建筑物及其所衍生的权利。房产是指建筑在土地上的各种房屋，包括住宅、厂房、仓库和商业、服务、文化、教育、卫生、体育以及办公用房等。地产是指土地及其上下一定的空间，包括地下的各种基础设施、地面道路等。
						</div>
					</li>
					<li>
						<div class="til">一核四成.高新区CBD问鼎未来</div>
						<div class="cnt">作为一种客观存在的物质形态，房地产是指房产和地产的总称，包括土地和土地上永久建筑物及其所衍生的权利。房产是指建筑在土地上的各种房屋，包括住宅、厂房、
						</div>
					</li>
					<li>
						<div class="til">一核四成.高新区CBD问鼎未来</div>
						<div class="cnt">作为一种客观存在的物质形态，房地产是指房产和地产的总称，包括土地和土地上永久建筑物及其所衍生的权利。房产是指建筑在土地上的各种房屋，包括住宅、厂房、
						</div>
					</li>
				</ul>
				<img src="<?php  echo WEB_IMAGES_PATH?>nice.gif" alt="">
			</div>
			<div class="clear"></div>
		</div>
		<!-- 模块4 -->
		<div class="g-item g-wh7" style="border:none;">
			<img src="<?php  echo WEB_IMAGES_PATH?>lbanner.gif" alt="">
		</div>
		<!-- 模块5 -->
		<div class="g-item g-wh7">
			<div class="g-m2-tab g-wh8">

				<div class="comment-box">
						<div style="float:left;margin-top:100px"> * 评论内容：</div>
					    <div class="cont">
					   <?php if($islogin){?> 
					   <textarea id="comments" style="resize:none" ></textarea>
						<?php }else{?>
					   <textarea id="comments" style="resize:none;"  disabled="disabled" >登录后可评论</textarea>
						<?php } ?>
					   </div>
					   	<div style="margin-left:95px;margin-top:20px">
					   		<input type="button" value="提交" onclick="docomments(<?php echo $fangtuanid?>)" style="width:100px;height:30px">
					   	</div>
				</div> 
			</div>
		</div>
<script>

 function docomments(fangtuanid){
 	var comments = $("#comments").val();
    if (comments == "") {
        alert("评论内容不能为空");
        $("#comments").focus();
            return false;
     }                    

    		var resault = $.ajax({
    		url: "/fang/comments/",
                data: {
                    'message': comments,
                    'type':2,
                    'aid':fangtuanid
                },
                async: false,
                type: 'post'
            });
            //alert(resault.responseText);
            if (resault.responseText == "1") {               
                window.location.href="/fang/tuandetail/"+fangtuanid;
                return false;
            }
  }

</script>