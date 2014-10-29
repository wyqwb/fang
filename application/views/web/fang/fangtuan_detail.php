
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
						<div class="g-m2-left" style="margin-left:20px;">
							<div class="ad-title" style="min-height:60px;">
								<span class="til"><?php echo $fangtuan['title']?></span><br>
								<span class="ti2">CBD核心，有轨电车1号线，诺贝尔湖，世界级综合体！</span>
								
								<span class="price">
									<span style="font-size:14px;font-weight:bold;vertical-align: middle">售价</span>
									<span style="color:#e41717;font-size:22px;font-weight:bold;vertical-align: middle"><?php echo $fangtuan['displayCost']?></span>
								</span>
							</div>
							<div class="ad-img">
								<?php if($fangtuan['previewimg']==""){ ?>
									<img src="<?php  echo WEB_IMAGES_PATH?>adimg.gif" alt="">
								<?php }else{?>
									<img src="<?php  echo CUSTOM_IMAGES_PATH.$fangtuan['previewimg']?>" width="581px" height="301px" alt="">
								<?php }?>				
							</div>
							<div class="ad-cnt" style="margin-bottom:10px;">
								<h2>行程信息</h2>							
									<?php echo $fangtuan['Travelinfo']?>						
								<div class="clear"></div>
							</div>
						</div>
						<div class="g-m2-right">
							<!-- 咨询 -->
							<div class="m-con">
								<span class="qq">
								<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $online_qq['customer_qq1']?>&site=qq&menu=yes">
								<img src="<?php  echo WEB_IMAGES_PATH?>qq1.gif" alt="">
								</a>
								</span>
								<span class="qq2">
								<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $online_qq['customer_qq2']?>&site=qq&menu=yes">
								<img src="<?php  echo WEB_IMAGES_PATH?>qq2.gif" alt=""></a>
								</span>
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
									<input type="button" onclick="jointuan(<?php echo $islogin?>)" value="参加看房团" style="width:130px;height:35px;font-size:18px;background-color:#c72929;border:none;margin-top:80px;cursor:pointer;color:#fff;">
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
				<?php echo $fangtuan['des']?>
			<div class="clear"></div>
		</div>
		<!-- 模块4 -->
		<div class="g-item g-wh7" style="border:none;">
			<img src="<?php  echo WEB_IMAGES_PATH?>lbanner.gif" alt="">
		</div>
		<!-- 模块5 -->
		<div class="g-item g-wh7">

			  <div id="comment" class="m m2" style="padding:0 20px;position:relative"> 
			   <div class="mt"> 
			    <h2 style="color:#ccc">看房团评价</h2> 
			   </div> 
			   <textarea class="mc" cols="162" rows="8">
			   </textarea> 
			   	<div id="i-comment" style="position:absolute;right:10px;top:104px;width:150px;"> 
			     <div class="btns"> 
			      <div style="color:#ccc">
			       您可对看房团进行评价
			      </div> 
			      <a href="/fang/dotuancomments/<?php echo $fangtuan['id']?>" class="btn-comment" target="_blank" style="color:#fff;border:none;font-size:18px;">我要评论</a> 
			     </div>
			    </div>
			  </div>
			<div class="g-m2-tab g-wh8" id="fangtuanTab">
				<ul class="btns">
					<li class="on">点评<a href=""></a></li>
					<li>看房团点评</li>
				</ul>
				<div class="cnts">
			
					<?php if(count($comments_list)>0){
						foreach ($comments_list as $key => $value) {
					
						
					?>

					<div class="u-cnt">
						<div class="user-comments">
							<div class="star">
								<div class="time"><?php echo $value['createtime']?></div>
							</div>
							<dl class="labels">
								<dt>标签：</dt>
								<dd><span href="">内容</span><span href="">内容</span></dd>
							</dl>
							<dl class="content">
								<dt>心得：</dt>
								<dd><?php echo $value['content']?></dd>
							</dl>
							<div class="btn">
								<a href="" class="gray-btn">有用(10)</a>
								<a href="" class="gray-btn">回复(0)</a>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					
					<?php } }else{?>

					<div class="u-cnt">
						<div class="user-comments">
							<div class="star">
							<!-- <img src="<?php  echo WEB_IMAGES_PATH?>stars.gif" alt=""> -->
							<div class="time">2014-07-11 06:30</div>
							</div>
							<dl class="labels">
								<dt>标签：</dt>
								<dd><span href="">内容</span><span href="">内容</span></dd>
							</dl>
							<dl class="content">
								<dt>心得：</dt>
								<dd>作为一种客观存在的物质形态，房地产是指房产和地产的总称，包括土地和土地上永久建筑物及其所衍生的权利。房产是指建筑在土地上的各种房屋，包括住宅、厂房、仓库和商业、服务、文化、教育、卫生、体育以及办公用房等。地产是指土地及其上下一定的空间，包括地下的各种基础设施、地面道路等。房地产由于其自己的特点即位置的固定性和不可移动性，在经济学上又被称为不动产。可以有三种存在形态：即土地、建筑物、房地合一。在房地产拍卖中，其拍卖标的也可以有三种存在形态，即土地（或土地使用权）、建筑物和房地合一状态下的物质实体及其权益。随着个人财产所有权的发展，房地产已经成为商业交易的主要组成部分。</dd>
							</dl>
						</div>
						<div class="clear"></div>
					</div>

				<?php }?>
					<div class="u-cnt" style="display:none">222</div>
				</div>
			</div>
		</div>
	<script src="/javascript/jquery.js"></script>
	<script type="text/javascript">
	function jointuan(islogin) {
			if(!islogin){alert("请登录");return;}
   			window.location.href = '/fang/jointuan/<?php echo $fangtuan["id"]?>';
			return ;
            var resault = $.ajax({
                url: "/fang/jointuan/",
                data: {
                    'username': username,
                    'password': password
                },
                async: false,
                type: 'post'
            });
            if (resault.responseText == "-1") {
            	alert("账号和密码错误");
                //$("#check").html("验证码错误或过期!");
                //window.location.reload();
                return false;
            }
            if (resault.responseText == "1") {
                window.location.href = '/member/';
                return false;
            }
        }
      $(function(){
      		var contents=$("#fangtuanTab .u-cnt");
      		$("#fangtuanTab ul").find("li").each(function(i){
      			$(this).click(function(){
      				$(this).addClass("on").siblings().removeClass("on");
      				contents.hide();
      				contents.eq(i).show();
      			});
      		})
      })
	</script>