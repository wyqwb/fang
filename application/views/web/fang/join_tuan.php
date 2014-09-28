<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url();?>" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" href="/css/common.css" rel="stylesheet" />
    <link type="text/css" href="/css/vipstyle.css" rel="stylesheet" />
    <link type="text/css" href="/css/style.css" rel="stylesheet" />
  


<script charset="utf-8" type="text/javascript" src="/javascript/jquery-1.8.3.min.js" ></script>
<script charset="utf-8" type="text/javascript" src="/javascript/Validform_v5.3.2.js" ></script>
<script charset="utf-8" type="text/javascript" src="/javascript/jquery.form.min.js" ></script>


    <title>会员中心</title>
    
  <style type="text/css">
  /*==========以下部分是Validform必须的===========*/
.Validform_checktip{
  margin-left:8px;
  line-height:20px;
  height:20px;
  overflow:hidden;
  color:#999;
  font-size:12px;
}
.Validform_right{
  color:#71b83d;
  padding-left:20px;
  background:url(images/right.png) no-repeat left center;
}
.Validform_wrong{
  color:red;
  padding-left:20px;
  white-space:nowrap;
  background:url(images/error.png) no-repeat left center;
}
.Validform_loading{
  padding-left:20px;
  background:url(images/onLoad.gif) no-repeat left center;
}
.Validform_error{
  background-color:#ffe7e7;
}
#Validform_msg{color:#7d8289; font: 12px/1.5 tahoma, arial, \5b8b\4f53, sans-serif; width:280px; -webkit-box-shadow:2px 2px 3px #aaa; -moz-box-shadow:2px 2px 3px #aaa; background:#fff; position:absolute; top:0px; right:50px; z-index:99999; display:none;filter: progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#999999'); box-shadow: 2px 2px 0 rgba(0, 0, 0, 0.1);}
#Validform_msg .iframe{position:absolute; left:0px; top:-1px; z-index:-1;}
#Validform_msg .Validform_title{line-height:25px; height:25px; text-align:left; font-weight:bold; padding:0 8px; color:#fff; position:relative; background-color:#999;
background: -moz-linear-gradient(top, #999, #666 100%); background: -webkit-gradient(linear, 0 0, 0 100%, from(#999), to(#666)); filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#999999', endColorstr='#666666');}
#Validform_msg a.Validform_close:link,#Validform_msg a.Validform_close:visited{line-height:22px; position:absolute; right:8px; top:0px; color:#fff; text-decoration:none;}
#Validform_msg a.Validform_close:hover{color:#ccc;}
#Validform_msg .Validform_info{padding:8px;border:1px solid #bbb; border-top:none; text-align:left;}
.msg-block{color:red;}

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
}

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
<!-- 主体 -->
<div class="main layout mc clearfix">
<!-- 头部 -->
<div class="m" id="orderinfo">
    <div class="mt">
        <strong>核对参团订单信息</strong></div>
    <div class="mc">
	<!-- 节能补贴信息 -->	
		
    <!--顾客信息-->
    <dl class="fore">
	     <dt>参团人信息 <a href="#">[修改]</a></dt>
		    <dd>
          <ul>
		        <li>参&nbsp;团&nbsp;人：张某某</li>
		        <li>地&nbsp;&nbsp;&nbsp;&nbsp;址：北京XXX，xxx街道</li>
            <li>手机号码：xxxxxxxx</li>
          </ul>
        </dd>
    </dl>    
    <!-- 礼品购订单展示送礼人信息 -->

        
    <!--配送、支付方式-->
    <dl>
      <dt>支付及配送方式 <a href="#">[修改]</a></dt>
      <dd>
        <ul>    
          <li>支付方式：在线支付</li>            
          <li>运&nbsp;&nbsp;&nbsp;&nbsp;费：￥0.00</li>      
          <li>送货日期：2014-05-16</li>  
        </ul>
      </dd>
    </dl>

    <!--发票-->
    <dl>
      <dt>发票信息 <a href="#">[修改]</a></dt>
      <dd>   	  		
    		<ul>
      	  <li>发票类型：普通发票</li>
      	  <li>发票抬头：个人</li>
      	  <li>发票内容：参加房产团费用</li>       
        </ul>
    	</dd>
    </dl>
    <!-- 礼品购订单展示寄语信息 -->
        
    <!--备注-->
    	
    <!--商品-->
		<dl>
      <dt>
	    <span class="i-mt">商品清单</span>
  
	   <div id="fquan" class="fquan">
          <div id="eventName" onmouseover="showCoupon()" onmouseout="hideCoupon()"></div>          
          <div class="prompt p-fquan" id="couponListShow">
              <div class="pc" id="couponList"></div>
          </div>
      </div>  
      <div class="clr"></div>
      
  </dt>
  
  <dd class="p-list">
    <table cellpadding="0" cellspacing="0" width="100%">
      <tbody>
      <tr>
        <th width="10%"> 商品编号 </th>
        <th width="12%"> 商品图片 </th>
        <th width="42%"> 商品名称 </th>
        <th width="10%"> 房团价 </th>
        <!-- <th width="8%"> 京豆数量 </th> -->
        <th width="7%"> 商品数量 </th>
        <th width="11%">操作 </th>
      </tr>
      <tr>
        <td>178627</td>
        <td>
            <div class="img-list">
                <a class="img-box" target="_blank" href="#">
                    <img width="50" height="50" src="<?php  echo WEB_IMAGES_PATH?><?php echo  $fangtuan['previewimg']?>" title="看房团图片">
                </a>
            </div>
        </td>        
        <td>
			   <div class="al fl">			
				    <a class="flk13" target="_blank" href="/fang/tuandetail/<?php echo $fangtuan['id']?>" ><?php echo $fangtuan['title']?></a>	
					</div>
          <div class="clr"></div>
          <div id="coupon_178627" class="fl"></div>
		    </td>		
        <td><span class="ftx04"> ￥<?php echo $fangtuan['displayCost']?></span>
        </td>			
        <!-- <td>0</td>				 -->
        <td>1</td>
        <td>
		      <span id="iwo178627" class="flk13"><a target="_blank" href="#" clstag="click|keycount|orderinfo|product_comment">查看评价</a>|<a clstag="click|keycount|orderinfo|product_show" href="#" target="_blank">取消</a>
				  <br>
                  <!-- <a href="http://myjd.jd.com/repair/ordersearchlist.action?searchString=1427058683" target="_blank" clstag="click|keycount|orderinfo|product_repair">申请返修/退换货</a> -->
				</span>
                        	   <!-- <a class="btn-again" clstag="click|keycount|orderlist|buy" href="http://gate.jd.com/InitCart.aspx?pid=178627&amp;pcount=1&amp;ptype=1" target="_blank">还要买</a> -->
          </td>
      </tr>
                </tbody></table>
  </dd>
</dl>
		
	<!--条形码-->
<!--     <div id="barcode"> 
    <span class="ftx13 fl">查看条形码</span>
  <ul id="sn_list" class="hide"></ul>
</div>   -->  
<!-- 商家运费险  -->
    <!-- <input type="hidden" id="venderIdListStr" value=""> -->

        <div id="yunFeiXian">
      </div>	
    </div>

    <!--金额-->
			 <div class="total">
        <ul>
          <!-- <li><span>总商品金额：</span>￥4500.00</li> -->
          <!-- <li><span>- 返现：</span>￥0.00</li> -->
			         <button type="submit" onclick="dopay()" style="background-color: #e00;position: relative;line-height: 36px;overflow: hidden;color: #fff;font-weight: bold;font-size: 16px;width: 135px;height: 36px;background:url(/images/btn-submit.jpg) no-repeat; " >提交订单</button>
               <b></b>
        </ul>
        <!-- <span class="clr">ad</span> <span style="color:#EDEDED;"></span> -->
        <div class="extra">应付总额：<span class="ftx04"><b>￥<?php echo $fangtuan['displayCost']?></b></span>


        </div>

      </div>
      <link type="text/css" href="/css/jd.css" rel="stylesheet" />

</div>
<script type="text/javascript">
  function dopay () {
                window.location.href = '/member/pay/'+<?php echo $fangtuan['id']?>;
  }
</script>

</body>
</html>