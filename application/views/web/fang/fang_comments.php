
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
		<?php if(isset($fang)&&(count($fang)>0)) {  ?> 			

			<div class="g-item g-wh7">
				<div class="g-m2-left">
					<div class="ad-title">
						<span class="til"><?php echo $fang['title']; ?></span><br>
						<span class="ti2">CBD核心，有轨电车1号线，诺贝尔湖，世界级综合体！</span>
						<img src="<?php  echo WEB_IMAGES_PATH?>price.gif" alt="" class="price">
					</div>
					<div class="ad-img"><img src="<?php echo CUSTOM_IMAGES_PATH.$fang['img1']; ?>" alt="" width="581px" height="301px"></div>
					<div class="ad-cnt">
						<h2>房产内容文字</h2>					
						<?php echo  $fang['desc'];?>				
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
							<p><span>建筑面积：</span><?php echo  $fang['builtarea']?>平方</p>
							<p><span>土地面积：</span><?php echo $fang['landarea']?>平方</p>
							<p><span>卧室数量：</span><?php echo $fang['bedrooms']?>间</p>
							<p><span>卫生间数量：</span><?php echo $fang['toilets']?>间</p>
							<p><span>住宅类型：</span><?php echo $fang['housetype']?></p>
							<p><span>楼层：</span><?php echo $fang['floor']?>楼</p>
							<p><span>绿化率：</span><?php echo $fang['pgreen']?>%</p>
							<p><span>周边：</span><?php echo $fang['nearby']?></p>
							<p><span>其他：</span>内容</p>

						</div>
					</div>		
					<div class="m2-img2">
						<?php if($fangtuan_info['previewimg']==""){ ?>
							<a href="/fang/tuandetail/<?php echo $fangtuan_info['id']?>"><img src="<?php  echo WEB_IMAGES_PATH?>welgo.gif" alt=""></a>
						<?php }else{?>
							<a href="/fang/tuandetail/<?php echo $fangtuan_info['id']?>"><img src="<?php  echo CUSTOM_IMAGES_PATH.$fangtuan_info['previewimg']?>" alt=""></a>
						<?php }?>
					</div>
				</div>
				<div class="clear"></div>
				<div class="g-m2-bottom">
					<div class="customerlist">
						<ul>
							<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
							<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
							<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
							<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
							<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
							<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
							<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
							<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
							<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
							<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
							<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
							<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
							<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
							<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
							<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
							<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
							<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
							<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
						</ul>			
					</div>	
					<div class="bottom-btns">
					<a href="">		<img src="<?php  echo WEB_IMAGES_PATH?>btnblue.gif" alt=""></a><br>
						<img src="<?php  echo WEB_IMAGES_PATH?>btnred.gif" alt="">
						</div>	
					<div class="clear"></div>
							<a href="">>>已出价会员：350名</a>

				</div>
			</div>

		<?php }else {?>

					<div class="g-item g-wh7">
						<div class="g-m2-left">
							<div class="ad-title">
								<span class="til">绿地中央广场&nbsp; 苏州西部新城 &nbsp; 世界级都会地标</span><br>
								<span class="ti2">CBD核心，有轨电车1号线，诺贝尔湖，世界级综合体！</span>
								<img src="<?php  echo WEB_IMAGES_PATH?>price.gif" alt="" class="price">
							</div>
							<div class="ad-img"><img src="<?php  echo WEB_IMAGES_PATH?>adimg.gif" alt=""></div>
							<div class="ad-cnt">
								<h2>房产内容文字</h2>
							
									<ul class="list5">
										<li><a href="">Yellowstone National Park Yellowstone </a></li>
										<li><a href="">Yellowstone National Park</a></li>
										<li><a href="">Yellowstone National Park Yellowstone</a></li>
										<li><a href="">Yellowstone National Park</a></li>
									</ul>
										
									<ul class="list5">
										<li><a href="">Yellowstone National Park</a></li>
										<li><a href="">Yellowstone National Park</a></li>
										<li><a href="">Yellowstone National Park</a></li>
										<li><a href="">Yellowstone National Park</a></li>
									</ul>
						
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
			<!-- 						<li>规格参数</li>
									<li>包装清单</li>
									<li>商品评价<a href="">(673)</a></li> -->
								</ul>
								<div class="cnt">
									<p><span>面积：</span>153平方</p>
									<p><span>楼层：</span>十七楼</p>
									<p><span>绿化率：</span>40%</p>
									<p><span>周边：</span>小学至高中</p>
									<p><span>其他：</span>内容</p>
									<p><span>面积：</span>153平方</p>
									<p><span>楼层：</span>十七楼</p>
									<p><span>绿化率：</span>40%</p>
									<p><span>周边：</span>小学至高中</p>
									<p><span>其他：</span>内容</p>

								</div>
							</div>		
							<div class="m2-img2">
								<img src="<?php  echo WEB_IMAGES_PATH?>welgo.gif" alt="">
							</div>
						</div>
						<div class="clear"></div>
						<div class="g-m2-bottom">
							<div class="customerlist">
								<ul>
									<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
									<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
									<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
									<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
									<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
									<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
									<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
									<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
									<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
									<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
									<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
									<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
									<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
									<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
									<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
									<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
									<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
									<li><img src="<?php  echo WEB_IMAGES_PATH?>person.gif" alt=""></li>
								</ul>			
							</div>	
							<div class="bottom-btns">
							<a href="">	<img src="<?php  echo WEB_IMAGES_PATH?>btnblue.gif" alt=""></a><br>
								<img src="<?php  echo WEB_IMAGES_PATH?>btnred.gif" alt="">
								</div>	
							<div class="clear"></div>
									<a href="">>>已出价会员：350名</a>

						</div>
					</div>

		<?php }	?>


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
					   		<input type="button" value="提交" onclick="docomments(<?php echo $fangid?>)" style="width:100px;height:30px">
					   	</div>
				</div> 

			</div>
		</div>

<script>

 function docomments(fangid){
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
                    'type':1,
                    'aid':fangid
                },
                async: false,
                type: 'post'
            });
            //alert(resault.responseText);
            if (resault.responseText == "1") {               
                window.location.href="/fang/detail/"+fangid;
                return false;
            }
  }

</script>