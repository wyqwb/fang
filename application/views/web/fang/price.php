<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>看房团出价页面</title>
    <link rel="stylesheet" type="text/css" href="/css/login.css">
   	<link rel="stylesheet" href="/css/index.css">
    <script type="text/javascript" src="/javascript/jquery.js"></script>
	<script type="text/javascript"  src="/javascript/slider.js"></script>
	<script type="text/javascript" src="/javascript/unslider.min.js"></script>
<script type="text/javascript">
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
	<!-- 头部 -->
	<div class="g-hd-wrap">
		<div class="g-hd g-wh" style="width:1000px">
			<a href="/"><img src="<?php  echo WEB_IMAGES_PATH?>logo.png" alt="logo"></a>
			<!-- <div class="m-language"><a href="#">[English]</a></div> -->
		</div>
	</div>
	<!-- 主体 -->
	<div class="g-bd" style="width:980px;margin:0 auto;border:5px solid #ccc;margin-bottom:50px">
			<div class="g-item">
			<div class="m-pic-scroll" style="min-width:980px">
			<div class="wrapper" >	
			<div id="focus" style="padding-bottom:30px;text-align: center;min-width:980px">
				<ul>
				<?php 
				// if($ads!=""){
					// foreach ($ads as $key => $value) {
							// echo "<li style='background-color: #30b9e7;'><a href='' ><img src='".CUSTOM_IMAGES_PATH.$value['previewimg']."' alt='' /></a></li>";
						// }	
				// }else{					
				?>
					<li><p><img src="<?php  echo WEB_IMAGES_PATH?>banner.jpg" alt="" /></p></li>
					<li><p><img src="<?php  echo WEB_IMAGES_PATH?>banner2.jpg" alt="" /></p></li>
					<li><p><img src="<?php  echo WEB_IMAGES_PATH?>banner3.jpg" alt="" /></p></li>
				<?php // }?>
				</ul>
			</div><!--focus end-->	
			</div><!-- wrapper end -->
			</div>

			</div>
	<div class="clear"></div>
	<!-- 底部 -->

		<!-- 主体下部 -->
		<div class="g-bd-ft" style="width:980px;height:640px;border:1px solid #ccc;text-align:center">
			<!-- 模块7 -->
			<div style="width:980px">
				<div style="width:480px;float:left;height:220px;text-align:left;margin-top:20px;margin-bottom:20px;border:1px solid #ccc">


				<span style="font-size:20px">房源简介：</span><br>
				<?php echo $fang['desc']?></div>
				<div style="width:480px;margin-left:15px;float:left;height:220px;text-align:left;margin-top:20px;margin-bottom:20px;border:1px solid #ccc">						
				<span style="font-size:20px">房源内容：</span><br>	
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
			<div style="margin-top:260px;width:980px;height:200px;background-color:#ccc;overflow: hidden;">
				<div class="jia_fang_item" style="margin-left: 12px">	
				<img src="<?php  echo WEB_IMAGES_PATH?>item.png">			
				</div>
				
				<div class="jia_fang_item">
				<img src="<?php  echo WEB_IMAGES_PATH?>item.png">					
				</div>	

				<div class="jia_fang_item">
				<img src="<?php  echo WEB_IMAGES_PATH?>item.png">					
				</div>	

				<div class="jia_fang_item">
				<img src="<?php  echo WEB_IMAGES_PATH?>item.png">					
				</div>		

				<div class="jia_fang_item">
				<img src="<?php  echo WEB_IMAGES_PATH?>item.png">					
				</div>	

				<div class="jia_fang_item">
				<img src="<?php  echo WEB_IMAGES_PATH?>item.png">					
				</div>	
			</div>



				<div style="height:100px;">
				<span style="margin-right:80px">均价：<?php echo $fang['displayprice']?></span>
				<span>我出价：<input type="text" id="jia"  style="margin-top:50px;width:300px;height:30px" /></span>
				</div>
				<div style="height:100px;position: absolute;top: 1270px;left: 670px;">
				<input type="button" value="确定" onclick="forcost()" style="width:150px;height:35px">
				</div>
	</div>
	<script type="text/javascript">
	function forcost() {
            var jia = $("#jia").val();
            if (jia == "") {
            alert("出价不能为空");
            $("#jia").focus();
            return false;
        	}

            var resault = $.ajax({
                url: "/fang/forcost/",
                data: {
                    'jia': jia,
                    'fangid': "<?php echo $fangid?>"
                },
                async: false,
                type: 'post'
            });
            //alert(resault.responseText);
            if (resault.responseText == "-1") {
            	alert("您已经出过价");
            	window.location.href = '/fang/tuandetail/<?php echo $tuanid?>';
                return ;
            }
            if (resault.responseText == "-2") {
            	// alert("您的出价过低");
            	// $("#jia").focus();
                // return false;
                window.location.href = '/fang/tuandetail/<?php echo $tuanid?>';
                return;

            }
            if (resault.responseText == "1") {
   				window.location.href = '/fang/tuandetail/<?php echo $tuanid?>';
                return ;
            }
        }

	</script>
</body>
</html>