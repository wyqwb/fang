<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<link rel="stylesheet" href="/css/index.css">
	<script type="text/javascript"  src="/javascript/jquery.js"></script>
	<script type="text/javascript"  src="/javascript/slider.js"></script>
	<script type="text/javascript" src="/javascript/unslider.min.js"></script>
	<script>
	$(function() {
		var w=$("#focus").css("width");
		$("#focus").find("li").css("width",w);
		$("#m-pic-scroll2").scrollimg();
		$("#m-pic-scroll3").scrollimg();
		$("#ul-list").scrollimg({
			leftBtn: ".btn-left3",
			rightBtn: ".btn-right3",
			itembox: "li"
		});

		var sWidth = $("#focus").width(); //获取焦点图的宽度（显示面积）
		var len = $("#focus ul li").length; //获取焦点图个数
		var index = 0;
		var picTimer;
		btn = "<div class='preNext pre'></div><div class='preNext next'></div>";
		$("#focus").append(btn);
		$("#focus .btnBg").css("opacity", 0.8);

		//为小按钮添加鼠标滑入事件，以显示相应的内容
		$(".count li").css("opacity", 0.4).mouseover(function() {
			index = $(".count li").index(this);
			$('.count').find("li").eq(index).addClass("on").siblings().removeClass("on");
			showPics(index);
		}).eq(0).trigger("mouseover");

		//上一页、下一页按钮透明度处理
		$("#focus .preNext").css("opacity", 0.5).hover(function() {
			$(this).stop(true, false).animate({
				"opacity": "0.8"
			}, 300);
		}, function() {
			$(this).stop(true, false).animate({
				"opacity": "0.5"
			}, 300);
		});

		//上一页按钮
		$("#focus .pre").click(function() {
			index -= 1;
			if (index == -1) {
				index = len - 1;
			}
			showPics(index);
		});

		//下一页按钮
		$("#focus .next").click(function() {
			index += 1;
			if (index == len) {
				index = 0;
			}
			showPics(index);
		});

		//本例为左右滚动，即所有li元素都是在同一排向左浮动，所以这里需要计算出外围ul元素的宽度
		$("#focus ul").css("width", sWidth * (len));

		//鼠标滑上焦点图时停止自动播放，滑出时开始自动播放
		$("#focus").hover(function() {
			clearInterval(picTimer);
		}, function() {
			picTimer = setInterval(function() {
				showPics(index);
				index++;
				if (index == len) {
					index = 0;
				}
			}, 4000); //此4000代表自动播放的间隔，单位：毫秒
		}).trigger("mouseleave");

		//显示图片函数，根据接收的index值显示相应的内容

		function showPics(index) { //普通切换
			var nowLeft = -index * sWidth; //根据index值计算ul元素的left值
			$("#focus ul").stop(true, false).animate({
				"left": nowLeft
			}, 300); //通过animate()调整ul元素滚动到计算出的position
			//$("#focus .btn span").removeClass("on").eq(index).addClass("on"); //为当前的按钮切换到选中的效果
			// $(".count li").stop(true, false).animate({
			// 	"opacity": "0.4"
			// }, 300).eq(index).stop(true, false).animate({
			// 	"opacity": "1"
			// }, 300); //为当前的按钮切换到选中的效果
			$('.count').find("li").eq(index).addClass("on").siblings().removeClass("on");
		}
	})
	</script>
</head>
<body>
	<!-- 广告 -->
<!-- 	<div class="g-banner-wrap">
		<div class="g-banner">
			
		</div>
	</div> -->
	<!-- 头部 -->
	<div class="g-hd">
		<div class="g-item g-bg1">
			<div class="g-info">
				<div class="m-logo">
				<img src="<?php  echo WEB_IMAGES_PATH?>logo.gif" alt="">
				</div>
				<div class="m-search">
					<a href=""><img src="<?php  echo WEB_IMAGES_PATH?>search.gif" alt=""></a>
					<input type="text" name="content" class="search-input">
					<span>热门关键词：
						<a href="">投资</a>
						<a href="">移民</a>
						<a href="">马来西亚</a>
						<a href="">云顶</a>
					</span>
				</div>
				<div class="m-login">
					<a href="/login/">登录</a>
					<a href="/reg/">立即注册</a>
					<a href=""><img src="<?php  echo WEB_IMAGES_PATH?>qqicon.gif" alt=""></a>
					<a href=""><img src="<?php  echo WEB_IMAGES_PATH?>wxicon.gif" alt=""></a>
				</div>
			</div>
		</div>
		<div class="g-item">
			<!-- 图片切换 -->
			<div class="m-pic-scroll">
			<div class="wrapper" >	
			<div id="focus" style="padding-bottom:30px;">
				<ul>
				<?php 
				if($ads!=""){
					foreach ($ads as $key => $value) {
							echo "<li><a href='' ><img src='".CUSTOM_IMAGES_PATH.$value['previewimg']."' alt='' /></a></li>";
						}	
				}else{					
				?>
					<li><a href="" ><p><img src="<?php  echo WEB_IMAGES_PATH?>banner.jpg" alt="" /></p></a></li>
					<li><a href="" ><p><img src="<?php  echo WEB_IMAGES_PATH?>banner2.jpg" alt="" /></p></a></li>
					<li><a href="" ><p><img src="<?php  echo WEB_IMAGES_PATH?>banner3.jpg" alt="" /></p></a></li>
				<?php }?>
				</ul>
			</div><!--focus end-->	
			</div><!-- wrapper end -->
			</div>
			<div class="scroll-ico">
				<ul class="count">
					<li class="on"></li>
					<li></li>
					<li></li>
				</ul>
			</div>
		</div>
	</div>	
	<!-- 主体 -->
	<div class="g-bd">
		<!-- 主体上部 -->
		<div class="g-bd-up">
			<!-- 模块1 -->
			<div class="g-item g-wh">
				<div class="g-m1">
					<div class="g-pic-box">
					<img src="<?php  echo WEB_IMAGES_PATH?>index_page_26.gif" alt="">
					<div class="g-m1-btns">
						<span class="btn-gray"><a href="">HOT PICTURES</a></span>
					</div>					
					</div>
					<div class="g-pic-box">
						<img src="<?php  echo WEB_IMAGES_PATH?>index_page_29.gif" alt="">
						<div class="g-m1-btns">
							<span class="btn-gray"><a href="">HOT PICTURES</a></span>
						</div>	
					</div>
					<div class="g-pic-box">
						<img src="<?php  echo WEB_IMAGES_PATH?>index_page_29.gif" alt="">
						<div class="g-m1-btns">
							<span class="btn-gray"><a href="">HOT PICTURES</a></span>
						</div>
					</div>
					<div class="clear"></div>
				</div>				
			</div>	
			<!-- 模块2 -->
			<div class="g-item g-wh">
				<div class="g-m2">
					<div class="g-box-hd">
						<span class="title">最受欢迎的图片</span><br>
						<span class="title2">最受欢迎的图片内容，测试内容</span>
					</div>
					<div class="g-box-bd">
						<div class="m-pic-scroll2" id="m-pic-scroll2">
							<div class="img-box">
								<img src="<?php  echo WEB_IMAGES_PATH?>index_page_48.gif" alt="">
								<span class="stitle">教育1</span><br>
								<span class="describe">Lorem ipsum dolor sit amet, coctetu adipiscing elit.</span>
							</div>
							<div class="img-box">
								<img src="<?php  echo WEB_IMAGES_PATH?>index_page_48.gif" alt="">
								<span class="stitle">教育2</span><br>
								<span class="describe">Lorem ipsum dolor sit amet, coctetu adipiscing elit.</span>
							</div>
							<div class="img-box">
								<img src="<?php  echo WEB_IMAGES_PATH?>index_page_48.gif" alt="">
								<span class="stitle">教育3</span><br>
								<span class="describe">Lorem ipsum dolor sit amet, coctetu adipiscing elit.</span>
							</div>
							<div class="img-box">
								<img src="<?php  echo WEB_IMAGES_PATH?>index_page_48.gif" alt="">
								<span class="stitle">教育4</span><br>
								<span class="describe">Lorem ipsum dolor sit amet, coctetu adipiscing elit.</span>
							</div>
							<div class="img-box">
								<img src="<?php  echo WEB_IMAGES_PATH?>index_page_48.gif" alt="">
								<span class="stitle">教育5</span><br>
								<span class="describe">Lorem ipsum dolor sit amet, coctetu adipiscing elit.</span>
							</div>
							<div class="clear"></div>
							<span class="btn-left2"></span>
							<span class="btn-right2"></span>

						</div>
					</div>
				</div>
			</div>	
			<!-- 模块3 -->
			<div class="g-item g-wh">
				<div class="g-m2">
					<div class="g-box-hd">
						<span class="title">目标国家</span><br>
						<span class="title2">T最受欢迎的国家，测试内容</span>
					</div>
					<div class="g-box-bd">
						<div class="m-pic-scroll2" id="m-pic-scroll3">
							<div class="img-box">
								<img src="<?php  echo WEB_IMAGES_PATH?>index_page_52.gif" alt="">
								<span class="stitle">教育1</span><br>
								<span class="describe">Lorem ipsum dolor sit amet, coctetu adipiscing elit.</span>
							</div>
							<div class="img-box">
								<img src="<?php  echo WEB_IMAGES_PATH?>index_page_52.gif" alt="">
								<span class="stitle">教育2</span><br>
								<span class="describe">Lorem ipsum dolor sit amet, coctetu adipiscing elit.</span>
							</div>
							<div class="img-box">
								<img src="<?php  echo WEB_IMAGES_PATH?>index_page_52.gif" alt="">
								<span class="stitle">教育3</span><br>
								<span class="describe">Lorem ipsum dolor sit amet, coctetu adipiscing elit.</span>
							</div>
							<div class="img-box">
								<img src="<?php  echo WEB_IMAGES_PATH?>index_page_52.gif" alt="">
								<span class="stitle">教育4</span><br>
								<span class="describe">Lorem ipsum dolor sit amet, coctetu adipiscing elit.</span>
							</div>
							<div class="img-box">
								<img src="<?php  echo WEB_IMAGES_PATH?>index_page_52.gif" alt="">
								<span class="stitle">教育5</span><br>
								<span class="describe">Lorem ipsum dolor sit amet, coctetu adipiscing elit.</span>
							</div>
							<div class="clear"></div>
							<span class="btn-left2"></span>
							<span class="btn-right2"></span>

						</div>
					</div>
				</div>
			</div>	

		<!-- 主体中部 -->
		<div class="g-bd-mid g-wh5">
			<!-- 主体中部左侧 -->
			<div class="g-mid-left">
					<!-- 模块4 -->

				<?php
            		foreach ($toplist as $key => $value) {
            	?> 	
				<div class="g-m4">
					<div class="coment">
						<span class="top">TOP顶</span>
						<a href="/comments/?fangid=<?php echo $value['id']?>"><span class="say">评</span></a>
						<img src="<?php  echo WEB_IMAGES_PATH?>m4img.jpg" alt="" class="m4-img">
					</div>
					<div class="details">
						<p><span class="title"><?php echo $value['title']?></span></p>
						<p>
							<span class="writer">管理员提交</span>
						    <span class="abouts">设计模板</span>
						    <span class="comments">22</span>
					    </p>
						<p>
							<?php echo $value['content']?>
						</p>
						<p>
							<span class="btn-gray g-wh3"><a href="/fang/?fangid=<?php echo $value['id']?>">查看详情</a></span>
							<span class="btn-gray g-wh3"><a href="/jia/?fangid=<?php echo $value['id']?>">我要出价</a></span>
							<span class="btn-gray g-wh3"><a href="/tuan/?fangid=<?php echo $value['id']?>">看房团</a></span>
							<span class="btn-gray g-wh3"><a href="/yim/?fangid=<?php echo $value['id']?>">移民优势</a></span>
							<div class="clear"></div>
						</p>
					</div>
				</div>
				<?php }?>
					<!-- 模块5 -->


			</div>
			<!-- 主体中部右侧 -->
			<div class="g-mid-right">	
				<div class="g-item-l">
					<h2>分类标签</h2>
					<ul class="list1">
						<li><a href="">标识设计</a></li>
						<li><a href="">网站设计</a></li>
						<li><a href="">图形设计</a></li>
						<li><a href="">快速文档</a></li>
						<li><a href="">图标</a></li>
					</ul>
				</div>
				<div class="g-item-l">
					<h2>分类标签</h2>
					<ul class="list2">
						<li><a href="">标识设计</a><br>
							<span>25 5,2013</span>
						</li>
						<li><a href="">网站设计</a><br>
							<span>25 5,2013</span>
						</li>
						<li><a href="">图形设计</a><br>
							<span>25 5,2013</span>
						</li>
						<li><a href="">快速文档</a><br>
							<span>25 5,2013</span>
						</li>
					</ul>
				</div>
				<div class="g-item-l">
					<h2>标签</h2>
					<ul class="list3">
						<li><a href="">标签</a></li>
						<li><a href="">标签1</a></li>
						<li><a href="">标签2</a></li>
						<li><a href="">标签3</a></li>
						<li><a href="">标签4</a></li>			
						<li><a href="">标签5</a></li>
						<li><a href="">标签6</a></li>			
						<li><a href="">标签7</a></li>
						<li><a href="">标签8</a></li>
						<li><a href="">标签9</a></li>
						<li><a href="">标签</a></li>
					</ul>
					<div class="clear"></div>
				</div>
				<div class="g-item-l">
					<h2>归档</h2>
					<ul class="list4">
						<li><a href="">2013</a></li>
						<li><a href="">2012</a></li>
						<li><a href="">2011</a></li>
					</ul>
				</div>
				<div class="g-item-l">	
					<div class="m-banner">banner广告</div>
					<div class="m-banner">banner广告</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<!-- 主体下部 -->
		<div class="g-bd-ft">
			<!-- 模块7 -->
			<div class="g-item g-wh5">

				<?php
            		foreach ($list2 as $key => $value) {
            	?> 
				<div class="g-box g-wh4">
					<img src="<?php  echo CUSTOM_IMAGES_PATH?><?php echo $value['previewimg']?>" alt="">
					<div>
						<span class="btn-gray g-wh3"><a href="/fang/?fangid=<?php echo $value['id']?>">查看详情</a></span>
						<span class="btn-gray g-wh3"><a href="/jia/?fangid=<?php echo $value['id']?>">我要出价</a></span>
						<span class="btn-gray g-wh3"><a href="/tuan/?fangid=<?php echo $value['id']?>">看房团</a></span>
						<span class="btn-gray g-wh3"><a href="/yim/?fangid=<?php echo $value['id']?>">移民优势</a></span>
					</div>
				</div>
				<?php }?>



				<div class="clear"></div>
			</div>
			
