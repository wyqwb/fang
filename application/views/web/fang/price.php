<!doctype html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>看房团出价页面</title>

    <link rel="stylesheet" type="text/css" href="/css/login.css">

   	<link rel="stylesheet" href="/css/index.css">

   	<link rel="stylesheet" href="/css/layout.css">

    <script type="text/javascript" src="/javascript/jquery.js"></script>

	<script type="text/javascript"  src="/javascript/slider.js"></script>

	<script type="text/javascript" src="/javascript/unslider.min.js"></script>

<script type="text/javascript">

	$(function() {

		var w=$("#focus").css("width");

		$("#focus").find("li").css("width",w);

		$("#m-pic-scroll2").scrollimg();

		$("#m-pic-scroll3").scrollimg();

		$("#scroll").scrollimg();

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

		<div class="g-bd-ft" style="width:980px;height:auto;border:1px solid #ccc;text-align:center">

			<!-- 模块7 -->

			<div style="width:980px">

				<div class="g-m2-tab" style="float:left;width:48%;margin:1%;">

					<ul class="btns">

						<li class="on">房源简介：</li>

					</ul>

					<div class="cnt" style="background:#fff;text-align:left">

						<?php echo $fang['desc']?>

					</div>

				</div>

				<div class="g-m2-tab" style="float:left;width:48%;margin:1%;">						

					<ul class="btns">

						<li class="on">房源内容：</li>

					</ul>

					<div class="cnt" style="background:#fff;text-align:left">

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

				<div style="clear:both"></div>

			</div>	

			<div id="scroll" style="width:960px;height:240px;background-color:#ccc;overflow: hidden;position:relative;font-size:16px;padding:0 10px;">

				

			<?php if(isset($other_fang_lists)&&(count($other_fang_lists)>0)){

				 	foreach ($other_fang_lists as $key => $value) {

			?>	<div class="jia_fang_item" style="margin-left: 12px;height:220px;background:#fff;">	

				<a href="/fang/detail/<?php echo $value['id']?>"><img src="<?php  echo CUSTOM_IMAGES_PATH.$value['img1']?>">	</a>		

				<a href="" style="color:#666;font-size:14px;"><?php echo $value['title']?></a>

				</div>				

			<?php } }?>	

<!-- 				<div class="jia_fang_item">

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

				</div>	 -->

				<div class="btn-left2" style="top:80px;left:-4px;background:none;color:#fff"><img src="<?php  echo WEB_IMAGES_PATH?>lt_btn4.png" alt="" width="20"></div>

				<div class="btn-right2" style="top:80px;right:-4px;background:none;color:#fff"><img src="<?php  echo WEB_IMAGES_PATH?>rt_btn4.png" alt="" width="20"></div>

			</div>







				<div style="height:60px;">

				<span style="margin-right:80px">均价：<font style="color:red;font-size:20px;"><?php echo $fang['displayprice']?></font></span>

				</div>

				<div style="margin-bottom:30px;">

				<span>我出价：<input type="text" id="jia"  style="width:200px;height:30px;border:1px solid #ccc;margin-right:20px;" /></span>

				<input type="button" value="确  定" onclick="forcost()" style="width:100px;height:35px;border:none;background:red;color:#fff;">

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