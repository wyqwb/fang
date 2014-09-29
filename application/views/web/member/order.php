<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url();?>" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" href="/css/common.css" rel="stylesheet" />
    <link type="text/css" href="/css/vipstyle.css" rel="stylesheet" />
    <link type="text/css" href="/css/style.css" rel="stylesheet" />
  


<!-- <script charset="utf-8" type="text/javascript" src="/javascript/jquery-1.8.3.min.js" ></script> -->
<!-- <script charset="utf-8" type="text/javascript" src="/javascript/Validform_v5.3.2.js" ></script> -->
<!-- <script charset="utf-8" type="text/javascript" src="/javascript/jquery.form.min.js" ></script> -->


    <title>会员中心</title>
    
  <style type="text/css">


/* foot part*/
.g-ft {
  height: 50px;
}
.g-ft .g-ft-wrap {
  position: relative;
  margin: 0 auto;
  color: #fff;
  line-height: 50px;
}
.g-ft .connects {
  position: absolute;
  right: 0;
  top: 0;
}
.g-bg1 {
  background: #28a7e1;
}*/

  </style>
</head>

<body>
<div id="header_bg">
    <div id="header">
        <a href="/"><img src="/images/logo.jpg" width="140" height="59" style="margin-top:10px" alt="用户中心" /></a>
        <div class="fr">
            <div class="tel">
             </div>
            <div class="lxfs">
              <?php  if(isset($islogin)&&($islogin)) { ?>
              <div class="lxfs">
                      您好：<span class="vipname"><a href="/member/"><?php echo $member['account'];?></a></span> , 欢迎来到本站！
                      <span class="vipred"><a href="/member/outlogin">[退出]</a></span>
                  </div>
                  <?php } else{ ?>
                    <a href="/reg/">注册</a> 
                    <a href="/login/">登陆</a>
                    <a href=""><img src="<?php  echo WEB_IMAGES_PATH?>qqicon.gif" alt=""></a>
                  <a href=""><img src="<?php  echo WEB_IMAGES_PATH?>wxicon.gif" alt=""></a>     
                  <?php }?>
            </div>
        </div>
    </div>
</div> 
  


<div class="w">
	<div class="breadcrumb"><strong><a href="http://home.jd.com/">我的订单</a></strong><span>&nbsp;&gt;&nbsp;<a href="http://jd2008.jd.com/JdHome/OrderList.aspx">订单中心</a>&nbsp;&gt;&nbsp;订单：496891929<span></span></span></div>
	<!--变量-->
	<span id="pay-button-order" style="display:none"></span>
	<!--状态、提示-->
			<style type="text/css">
.icon-box {
    position: relative;
}
.icon-box .warn-icon {
    background-position: -96px 0;
}
.icon-box .m-icon {
    background: url("http://misc.360buyimg.com/myjd/skin/2014/i/icon48.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
    display: inline-block;
    height: 48px;
    left: 0;
    position: absolute;
    top: 0;
    width: 48px;
}
.icon-box .item-fore {
    margin-left: 58px;
}
.tip-box .item-fore {
    overflow: hidden;
}
.tip-box h3 {
    font-family: "microsoft yahei";
    font-size: 16px;
    line-height: 30px;
}
.tip-box .ftx04, .tip-box .ftx-04 {
    color: #FF8A15;
}
.tip-box .ftx03, .tip-box .ftx-03 {
    color: #999999;
}
.tip-box .op-btns {
    margin-top: 20px;
}
.tip-box .btn-9:link, .tip-box .btn-9:visited, .tip-box .btn-10:link, .tip-box .btn-10:visited, .tip-box .btn-11:link, .tip-box .btn-11:visited, .tip-box .btn-12:link, .tip-box .btn-12:visited {
    color: #323333;
    text-decoration: none;
}
.tip-box a {
    color: #005EA7;
}
.tip-box .btn-9, .tip-box .btn-10, .tip-box .btn-11, .tip-box .btn-12 {
    background-color: #F7F7F7;
    background-image: linear-gradient(to top, #F7F7F7 0px, #F3F2F2 100%);
    border: 1px solid #DDDDDD;
    border-radius: 2px;
    color: #323333;
    display: inline-block;
    height: 18px;
    line-height: 18px;
    padding: 2px 14px 3px;
}
.tip-box a {
    color: #005EA7;
}
.tip-box .ml10 {
    margin-left: 10px;
}
</style>
<div class="m" id="orderstate">
  <div class="mt">
          <strong>订单号：496891929&nbsp;&nbsp;&nbsp;&nbsp;状态：<span class="ftx14">完成</span><span id="pay-button-496891929"></span>
              			            </strong>
          <div class="fr">
<!--               <div class="toolbar">
              <input type="button" class="btn-img btn-inst" onclick="window.open('')" id="btn_Print" value="订单打印">
              <input type="button" class="btn-img btn" clstag="click|keycount|orderinfo|btn_Comment" onclick="javascript:location.href='http://club.jd.com/JdVote/TradeComment.aspx?ruleid=496891929&amp;ot=25&amp;payid=1'" id="btn_Comment" value="评价">
              </div> -->
          </div>
  </div>

  <div class="mc" style="display:show">      
				订单已经完成，感谢您在订单商城购物，欢迎您对本次交易及所购商品进行评价。
        <span class="flk13"><a href="#">发表评价</a></span>            
  </div>

  <div class="mc" id="zxzf" style="display:none">
      <div>
          <p style="text-align:left;">
            尊敬的客户，您的订单商品已经从库房发出，请您做好收货准备。
          </p>
          <p style="text-align:left;">
              <span class="ftx-01">由订单提供</span>
              <!-- <s class="icon-bao"></s> -->
              <a target="_blank" href="#">在线交易保障</a>
              <span>如果您已收到货，请确认收货，订单将与卖家结算。如果您对购买的商品不满意，您可在确认收货后发起返修/退换货申请!</span>
          </p>
      </div>
   </div>
</div>

<div id="hbdd" class="Tip360" style="width: 600px;">
    <div class="Tip_Title">
        <em><img src="/images/tip_close.jpg" class="Tip_Close" width="14" height="13"></em>
		    合并订单
    </div>
    <div class="Tip_Content">
        <div id="combin_main">
        </div>
        <div class="align_Left" style="padding: 15px 0 5px;">
				请选择要合并到主订单的订单：</div>
        <div id="combin_item">
        </div>
        <div class="Tip_Submit" style="background: none; border: 0; padding: 20px 250px 20px 0;">
            <a id="combinBtn" href="javascript:alert('请选择要合并的订单！');"><span>合并订单</span></a></div>
        <div class="align_Left">
            <font color="#FF6600">提示</font>：订单合并后，收货人信息、支付方式、配送方式等都将以主订单为准。</div>
    </div>
</div>

<div id="ddyq" class="Tip360" style="width: 360px;">
    <div class="Tip_Title">
        <em>
            <img src="/images/tip_close.jpg" class="Tip_Close" id="defercloseBtn" width="14" height="13">
        </em>订单延期
    </div>
    <div class="Tip_Content">
        <div class="align_Left" style="padding: 5px 0 5px;">
				订单自提时间将延长至： <span id="defer_item"></span>
        </div>
        <div class="align_Left" style="padding: 5px 0 5px;">
				注：超过自提日期，您的订单商品将退库
        </div>
    </div>
</div>
            
	<!--跟踪、付款信息、gis-->
	<div class="m" id="ordertrack">
  <ul class="tab">
    <li class="curr" clstag="#">
      <h2> 订单跟踪</h2>
    </li>
  </ul>
  <div class="clr"></div>
  <div class="mc tabcon">
    <!--订单跟踪-->
    <input type="hidden" value="2013-03-17 17:46:15" id="datesubmit-496891929">
<table cellpadding="0" cellspacing="0" width="100%">
  <tbody id="tbody_track">
    <tr>
      <th width="15%"><strong>处理时间</strong></th>
      <th width="50%"><strong>处理信息</strong></th>
      <th width="35%"><strong>操作人</strong></th>
    </tr>
    
  </tbody>
  <tbody>
    <?php if(count($orders_state)>0){
        foreach ($orders_state as $key => $value) {        
  ?>
    <tr>
    <td><?php echo $value['createtime']?></td>
    <td><?php echo $value['content']?></td>
    <td><?php echo $value['username']?></td>
    </tr>
  <?php } }?>
  </tbody>
</table>
</div>
 
  <div class="mc tabcon hide">
    		<div id="gis">
        <strong>备注：</strong>
        受天气、gps信号、运营商等各类因素影响，您看到的包裹位置和实际位置有时可能会有一些差别。请您谅解！</div>
		  </div>
</div>	
<!--留言-->
		<!--订单信息-->
	<div class="m" id="orderinfo">
    <div class="mt">
        <strong>订单信息</strong></div>
    <div class="mc">
	<!-- 节能补贴信息 -->	
		
    <!--顾客信息-->
    <dl class="fore"><dt>收货人信息</dt><dd>
    <ul>
		  <li>收&nbsp;货&nbsp;人：某某</li>
		  <li>地&nbsp;&nbsp;&nbsp;&nbsp;址：xxxxxxxxxxxxxxxxxxxxxxxxxxxx</li>
      <li>手机号码：151xxxxxxx</li>
    </ul>
  </dd>
</dl>    
    <!-- 礼品购订单展示送礼人信息 -->
        
    <!--配送、支付方式-->
    <dl>
  <dt>支付及配送方式</dt>
  <dd>
    <ul>    
      <li>支付方式：货到付款</li>           
      <li>运&nbsp;&nbsp;&nbsp;&nbsp;费：￥0.00</li>  	  
    </ul>
  </dd>
</dl>

<!--发票-->
<dl>
  <dt>发票信息</dt>
  <dd> 	  		
		<ul>
	     <li>发票类型：普通发票</li>
	     <li>发票抬头：个人</li>
	     <li>发票内容：明细</li>                
	  </ul>
	</dd>
</dl>
<dl>
  <dt>
	<span class="i-mt">商品清单</span>
  
	<div id="fquan" class="fquan">
          <div id="eventName" onmouseover="showCoupon()" onmouseout="hideCoupon()">
          </div>
          
          <div class="prompt p-fquan" id="couponListShow">
              <div class="pc" id="couponList">
              </div>
          </div>
      </div>
  
      <div class="clr"></div>
      
  </dt>
  
  <dd class="p-list">
    <table cellpadding="0" cellspacing="0" width="100%">
      <tbody><tr>
        <th width="10%"> 商品编号 </th>
        <th width="12%"> 商品图片 </th>
        <th width="42%"> 商品名称 </th>
        <th width="10%"> 订单价 </th>
        <th width="8%"> 参团数量 </th>
        <th width="11%"> 
			          操作
                  </th>
      </tr>
                  <tr>
        <td>1010910562</td>
        
        <td>
            <div class="img-list">
                <a class="img-box" target="_blank" href="/fang/tuandetail/<?php echo $fangtuan['id']?>">
                    <img width="50" height="50" src="<?php echo base_url(); ?>images/tuan.png" title="">
                </a>
            </div>
        </td>
        
        <td>
			<div class="al fl">
			
							<a class="flk13" target="_blank" href="/fang/tuandetail/<?php echo $fangtuan['id']?>" > <?php echo $fangtuan['title']?></a>	
							
			          </div>
          <div class="clr"></div>
          <!-- <div id="coupon_1010910562" class="fl"></div> -->
		</td>
		
        <td><span class="ftx04"> ￥<?php echo $fangtuan['cost']?></span></td>
			
        		
				
        <td>1</td>
        <td>
		                				<span id="iwo1010910562" class="flk13">
				  <br>
                  <a href="#" target="_blank" >查看</a>
				</span>
                
          </td>
      </tr>
                </tbody></table>
  </dd>
</dl>
		
  

<!-- 商家运费险  -->
    <input type="hidden" id="venderIdListStr" value="18844">

<div id="yunFeiXian">
</div>	</div>
    <!--金额-->
			 <div class="total">
  <ul>
    <li><span>总商品金额：</span>￥<?php echo $fangtuan['cost']?></li>
    <li><span>- 返现：</span>￥0.00</li>
			<li><span>+ 运费：</span>￥0.00</li>
	    
                    
    	  </ul>
  <div class="extra">
                  应付总额：<span class="ftx04"><b>￥<?php echo $fangtuan['cost']?></b></span>
  </div>
    </div>
<link type="text/css" rel="stylesheet" href="/css/jd.css">	    
</div>
	</div>


  </body>
</html>