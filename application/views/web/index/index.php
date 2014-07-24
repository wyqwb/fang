<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8" />
<title>房产</title>
<link href="/css/base.css" rel="stylesheet" type="text/css" />
<style type="text/css">

/* focus */
#focus{width:980px;height:320px;overflow:hidden;position:relative;}
#focus ul{height:320px;position:absolute;}
#focus ul li{float:left;width:980px;height:320px;overflow:hidden;position:relative;background:white;}
#focus ul li div{position:absolute;overflow:hidden;}
#focus .btnBg{position:absolute;width:980px;height:20px;left:10;bottom:0;}
#focus .btn{position:absolute;width:980px;height:10px;padding:5px 10px;right:0;bottom:0;text-align:center;}
#focus .btn span{display:inline-block;_display:inline;_zoom:1;width:25px;height:5px;_font-size:0;margin-left:5px;cursor:pointer;background:#29A7E1;}
#focus .btn span.on{background:#29A7E1;}
#focus .preNext{width:45px;height:100px;position:absolute;top:90px;background:url(/images/lunbo/sprite.png) no-repeat 0 0;cursor:pointer;}
#focus .pre{left:0;}
#focus .next{right:0;background-position:right top;}
#focus img{width: 980px;height: 300px}
</style>
		<style type="text/css">
			#wrapper {
				width: 735px;
				height: 220px;
				margin: -110px 0 0 -367px;
				position: absolute;
				left: 50%;
				top: 50%;
			}

			#carousel {
				width: 735px;
				position:vrelative;
			}
			#carousel ul {
				list-style: none;
				display: block;
				margin: 0;
				padding: 0;
			}
			#carousel li {
				background: transparent url(images/carousel_polaroid.png) no-repeat 0 0;
				font-size: 40px;
				color: #999;
				text-align: center;
				display: block;
				width: 232px;
				height: 178px;
				padding: 0;
				margin: 6px;
				float: left;
				position: relative;
			}

			#carousel li img {
				width: 201px;
				height: 127px;
				margin-top: 14px;
			}
			
			#carousel li span {
				background: transparent url(/images/carousel_shine.png) no-repeat 0 0;
				text-indent: -999px;
				display: block;
				overflow: hidden;
				width: 201px;
				height: 127px;
				position: absolute;
				z-index: 2;
				top: 14px;
				left: 16px;
			}			

			.clearfix {
				float: none;
				clear: both;
			}
			#carousel .prev, #carousel .next {
				background: transparent url(/images/carousel_control.png) no-repeat 0 0;
				text-indent: -999px;
				display: block;
				overflow: hidden;
				width: 15px;
				height: 21px;
				margin-left: 10px;
				position: absolute;
				top: 70px;				
			}
			#carousel .prev {
				background-position: 0 0;
				left: -30px;
			}
			#carousel .prev:hover {
				left: -31px;
			}			
			#carousel .next {
				background-position: -18px 0;
				right: -20px;
			}
			#carousel .next:hover {
				right: -21px;
			}				
			#carousel .pager {
				text-align: center;
				margin: 0 auto;
			}
			#carousel .pager a {
				background: transparent url(/images/carousel_control.png) no-repeat -2px -32px;
				text-decoration: none;
				text-indent: -999px;
				display: inline-block;
				overflow: hidden;
				width: 8px;
				height: 8px;
				margin: 0 5px 0 0;
			}
		/*	#carousel .pager a.selected {
				background: transparent url(/images/carousel_control.png) no-repeat -12px -32px;
				text-decoration: underline;				
			}
			*/
			#source {
				text-align: center;
				width: 100%;
				position: absolute;
				bottom: 10px;
				left: 0;
			}
			#source, #source a {
				font-size: 12px;
				color: #999;
			}
			
			#donate-spacer {
				height: 100%;
			}
			#donate {
				border-top: 1px solid #999;
				width: 750px;
				padding: 50px 75px;
				margin: 0 auto;
				overflow: hidden;
			}
			#donate p, #donate form {
				margin: 0;
				float: left;
			}
			#donate p {
				width: 650px;
			}
			#donate form {
				width: 100px;
			}
		</style>

<script type="text/javascript" src="/javascript/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/javascript/jquery.carouFredSel-6.0.4-packed.js"></script>

<script type="text/javascript">
$(function() {
	var sWidth = $("#focus").width(); //获取焦点图的宽度（显示面积）
	var len = $("#focus ul li").length; //获取焦点图个数
	var index = 0;
	var picTimer;
	
	//以下代码添加数字按钮和按钮后的半透明条，还有上一页、下一页两个按钮
	var btn = "<div class='btnBg'></div><div class='btn'>";
	for(var i=0; i < len; i++) {
		btn += "<span></span>";
	}
	btn += "</div><div class='preNext pre'></div><div class='preNext next'></div>";
	$("#focus").append(btn);
	$("#focus .btnBg").css("opacity",0.5);

	//为小按钮添加鼠标滑入事件，以显示相应的内容
	$("#focus .btn span").css("opacity",0.9).mouseover(function() {
		index = $("#focus .btn span").index(this);
		showPics(index);
	}).eq(0).trigger("mouseover");

	//上一页、下一页按钮透明度处理
	$("#focus .preNext").css("opacity",0.2).hover(function() {
		$(this).stop(true,false).animate({"opacity":"0.5"},300);
	},function() {
		$(this).stop(true,false).animate({"opacity":"0.2"},300);
	});

	//上一页按钮
	$("#focus .pre").click(function() {
		index -= 1;
		if(index == -1) {index = len - 1;}
		showPics(index);
	});

	//下一页按钮
	$("#focus .next").click(function() {
		index += 1;
		if(index == len) {index = 0;}
		showPics(index);
	});

	//本例为左右滚动，即所有li元素都是在同一排向左浮动，所以这里需要计算出外围ul元素的宽度
	$("#focus ul").css("width",sWidth * (len));
	
	//鼠标滑上焦点图时停止自动播放，滑出时开始自动播放
	$("#focus").hover(function() {
		clearInterval(picTimer);
	},function() {
		picTimer = setInterval(function() {
			showPics(index);
			index++;
			if(index == len) {index = 0;}
		},4000); //此4000代表自动播放的间隔，单位：毫秒
	}).trigger("mouseleave");
	
	//显示图片函数，根据接收的index值显示相应的内容
	function showPics(index) { //普通切换
		var nowLeft = -index*sWidth; //根据index值计算ul元素的left值
		$("#focus ul").stop(true,false).animate({"left":nowLeft},300); //通过animate()调整ul元素滚动到计算出的position
		//$("#focus .btn span").removeClass("on").eq(index).addClass("on"); //为当前的按钮切换到选中的效果
		$("#focus .btn span").stop(true,false).animate({"opacity":"0.4"},300).eq(index).stop(true,false).animate({"opacity":"1"},300); //为当前的按钮切换到选中的效果
	}
});

</script>

<script type="text/javascript">
			$(function() {

				$('#carousel ul').carouFredSel({
					prev: '#prev',
					next: '#next',
					pagination: "#pager",
					scroll: 1000
				});
	
			});
</script>
</head>
<body class="pagebody"> 
	<div class="header">
		<div class="ad"><img src="<?php echo WEB_IMAGES_PATH?>ad.png"></div>
		<div class="nav"></div>
	</div> 

	<div class="banner">
		<div id="focus">
			<ul>
				<li><a href="" target="_blank"><img src="/images/lunbo/banner1.png" alt="QQ商城焦点图效果下载" /></a></li>
				<li><a href="" target="_blank"><img src="/images/lunbo/banner2.png" alt="QQ商城焦点图效果教程" /></a></li>
				<li><a href="" target="_blank"><img src="/images/lunbo/banner3.png" alt="jquery商城焦点图效果" /></a></li>
				<li><a href="" target="_blank"><img src="/images/lunbo/banner4.png" alt="jquery商城焦点图代码" /></a></li>
				<li><a href="" target="_blank"><img src="/images/lunbo/banner5.png" alt="jquery商城焦点图源码" /></a></li>
			</ul>
		</div><!--focus end-->
	</div>

	<div class="banner">
		<div id="wrapper">
			<div id="carousel">
				<ul>
					<li><img src="images/tz.png" alt="" /><span>Image1</span></li>
					<li><img src="images/ym.png" alt="" /><span>Image2</span></li>
					<li><img src="images/jy.png" alt="" /><span>Image3</span></li>
					<li><img src="images/yl.png" alt="" /><span>Image4</span></li>
					<li><img src="images/dj.png" alt="" /><span>Image5</span></li>
				</ul>
				<div class="clearfix"></div>
				<a id="prev" class="prev" href="#">&lt;</a>
				<a id="next" class="next" href="#">&gt;</a>
				<!-- <div id="pager" class="pager"></div> -->
			</div>
		</div>
	</div>

	<div class="banner">
		<div id="wrapper">
			<div id="carousel">
				<ul>
					<li><img src="images/mg.png" alt="" /><span>Image1</span></li>
					<li><img src="images/adly.png" alt="" /><span>Image2</span></li>
					<li><img src="images/jnd.png" alt="" /><span>Image3</span></li>
					<li><img src="images/mlxy.png" alt="" /><span>Image4</span></li>
					<li><img src="images/dj.png" alt="" /><span>Image5</span></li>
				</ul>
				<div class="clearfix"></div>
				<a id="prev" class="prev" href="#">&lt;</a>
				<a id="next" class="next" href="#">&gt;</a>
				<!-- <div id="pager" class="pager"></div> -->
			</div>
		</div>		

	</div>

	<div class="centers"> 
		<div class="c_left">
			<div class="c_l"><img src="images/d.png"><img src="images/p.png"></div>
			<div class="c_r"><img src="images/cbanner.png">
			<ul>
					<li >查看详情</li>
					<li>我要出价</li>
					<li class="current">看房团</li>
					<li>移民优势</li>
			</ul>
			</div>
			<div class="line"></div>
		</div> 
		<div class="c_right">
			<div class="banner">banner</div>
			<div class="banner">banner</div>
		</div>		
	</div> 

	<div class="kanfangtuan">
		<div class="c_left">
			<div class="c_top"><img src="/images/fang1.png"></div>
			<div class="c_bottom">
				<ul>
					<li class="current">查看详情</li>
					<li>我要出价</li>
					<li>看房团</li>
					<li>移民优势</li>
				</ul>
			</div>
		</div> 
		<div class="c_right">
			<div class="c_top"><img src="/images/fang2.png"></div>
			<div class="c_bottom">				
				<ul>
					<li>查看详情</li>
					<li>我要出价</li>
					<li class="current">看房团</li>
					<li>移民优势</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="kanfangtuan">
		<div class="c_left">
			<div class="c_top"><img src="/images/fang3.png"></div>
			<div class="c_bottom">
			<ul>
					<li>查看详情</li>
					<li>我要出价</li>
					<li>看房团</li>
					<li class="current">移民优势</li>
				</ul>
			</div>
		</div> 
		<div class="c_right">
			<div class="c_top"><img src="/images/fang4.png"></div>
			<div class="c_bottom">
				<ul>
					<li>查看详情</li>
					<li>我要出价</li>
					<li>看房团</li>
					<li>移民优势</li>
				</ul>
			</div>			
		</div>
	</div>

	<div class="banner"><img src="/images/pg.png"></div>

	<div class="banner news">
				<ul>
					<li class="title">Consultin news
					<img src="/images/news.png"></li>
					<li>afafafafsf</li>
					<li>adfasffdsaf</li>
					<li>affafdfsfd</li>
				</ul>
	</div>

    <div class="footer">2013 modulesversion</div> 
</body> 
</html>