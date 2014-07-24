<!DOCTYPE html>
<html>
    <head>
        <base href="<?php echo base_url();?>" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name='keywords' content='' />
        <meta name='description' content='' />
        <title>上海致上信息科技有限公司</title>
        <link href="css/common.css" rel="stylesheet" type="text/css" />
        <link href="css/base.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="css/vipstyle.css" rel="stylesheet" type="text/css" />
        <script charset="utf-8" type="text/javascript" src="javascript/jquery-1.8.3.min.js" ></script>
        <script charset="utf-8" type="text/javascript" src="javascript/global.js" ></script>
    </head>

    <body>
      <div style="line-height:40px;width:980px;margin:0 auto;margin-top:50px;font-size:30px">
       	<div style="text-align:center;width:980px">  
          <div style="margin-bottom:20px">品牌赏析成绩报告</div>
          <ul style="width:480px;font-size:14px;text-align:left;float:left;padding-left:100px">
              <li><img src="<?php echo WEB_IMAGES_PATH?>right.png">1.品牌3.1 Phillip Lim的正式中文名是_______.</li>
              <li><img src="<?php echo WEB_IMAGES_PATH?>wrong.png">2.下图中Jessica Alba的手提包来自3.1 Phillip Lim。</li>
              <li><img src="<?php echo WEB_IMAGES_PATH?>right.png">3. ××××××××××××××××××××××××</li>
              <li><img src="<?php echo WEB_IMAGES_PATH?>right.png">4. ××××××××××××××××××××××××</li>
              <li><img src="<?php echo WEB_IMAGES_PATH?>right.png">5. ××××××××××××××××××××××××</li>
              <li style="margin-top:20px">
                <input type="submit"  value="课程推荐1" style="width:100px;height:50px" />
                <input type="submit"  value="课程推荐2" style="width:100px;height:50px" />
                <input type="submit"  value="课程推荐3" style="width:100px;height:50px" />
                <input type="submit" id="startexam" value="学习其他课程" style="width:100px;height:50px" />
              </li>
          </ul>
          <div style="float:right;padding-right:90px">
          <!-- <img src="<?php //echo WEB_IMAGES_PATH?>pass.png" width="190px"> -->
          <div style="color:red;margin-top:80px">您考本次考了<?=$examscore?>分</div>
          </div>
        </div>
        <div style="text-align:right;margin-right:200px">
          <form id="examfrom">
            <!-- <input type="button" onClick="history.go(-1);" value="返回"  style="width:100px;height:25px"/> -->
          </form>
        </div>
      </div>
</body>
</html>
<script type="text/javascript">
	$(function() {
		$("#startexam").click(function() {
    	 $("#examfrom").attr("action", "/course/listcourse/");
    	 $("#examfrom").submit();
		});
	});
</script>