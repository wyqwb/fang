<script type="text/javascript">
$(function(){	
	$('.tabPanel ul li').click(function(){
		$(this).addClass('hit').siblings().removeClass('hit');
		$('.panes>div:eq('+$(this).index()+')').show().siblings().hide();	
	})
		$('.tabPanel2 ul li').click(function(){
		$(this).addClass('hit').siblings().removeClass('hit');
		$('.panes2>div:eq('+$(this).index()+')').show().siblings().hide();	
	})
	$li1 = $(".apply_nav .apply_array");
	$window1 = $(".apply .apply_w");
	$left1 = $(".apply .img_l");
	$right1 = $(".apply .img_r");
	
	$window1.css("width", $li1.length*948);

	var lc1 = 0;
	var rc1 = $li1.length-5;
	
	$left1.click(function(){
		if (lc1 < 1) {

			$(".img_l").addClass('hit')
			return;
		}
		lc1--;
		rc1++;
		$window1.animate({left:'+=948px'}, 500);
	});

	$right1.click(function(){
		if (rc1 < 1){
			return;
		}
		lc1++;
		rc1--;
		$window1.animate({left:'-=948px'}, 500);
	});

})


</script>
<div class="header2"></div>
<div class="teacher_box1">
<h3>推荐机构</h3>
  <div class="apply apply2">
  
      <div class="img_l"><img src="/<?php echo WEB_IMAGES_PATH?>i_l.gif" /></div>
      
      <div class="apply_nav">
          <div class="apply_w">



<div class="apply_array">
                  <div class="apply_img"><img src="/<?php echo WEB_IMAGES_PATH?>jgbar_1.jpg" />
                    
                  </div>

              </div>
              
              <div class="apply_array">
                  <div class="apply_img"><img src="/<?php echo WEB_IMAGES_PATH?>jgbar_2.jpg" />
                    
                  </div>

              </div>
          
<div class="apply_array">
                  <div class="apply_img"><img src="/<?php echo WEB_IMAGES_PATH?>jgbar_3.jpg" />
                    
                  </div>

              </div>


          
          </div>
      </div>
      
      <div class="img_r"><img src="/<?php echo WEB_IMAGES_PATH?>i_r.gif" /></div>
      
  </div>
</div>
<div class="teacher_box2" style="">
	<h3>国外合作机构<a href="#"  class="more"><img src="/<?php echo WEB_IMAGES_PATH?>jgmore.gif"  alt=""/>　 </a></h3>
    <h4>Lorem ipsum dolor sit amet, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </h4>
    <ul>
        <?php
        foreach ($total as $key => $value){   
        ?>  
     <li><a href="/cooporgnization/detail/"><img src="/<?php echo WEB_IMAGES_PATH.$value['previewimg']?>"  alt=""/></a>
      <p class="man"><?php echo $value['title']?><br>
      <a href="#">时尚行业资讯</a> <a href="#">时尚行业资讯</a> <a href="#">时尚行业资讯</a>
      </p>
        <p><?php echo $value['content']?></p>
        <p class="more"><a href="#">Learn more </a></p> </li> 
    <?php }?> 

 
       
    
    </ul>
    <div style=" clear:both;"></div>
</div>
<div class="teacher_box2">
	<h3>国内合作机构<a href="#"  class="more"><img src="/<?php echo WEB_IMAGES_PATH?>jgmore.gif"  alt=""/>　 </a></h3>
    <h4>Lorem ipsum dolor sit amet, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </h4>
    <ul>


   	  <li><a href="/cooporgnization/detail/"><img src="/<?php echo WEB_IMAGES_PATH?>jigou_03.jpg"  alt=""/></a>
      <p class="man">马兰欧尼学院<br>
      <a href="#">时尚行业资讯</a> <a href="#">时尚行业资讯</a> <a href="#">时尚行业资讯</a>
      </p>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem Sed ut 
perspiciatis unde omnis iste natus error sit voluptatem</p>
        <p class="more"><a href="#">Learn more </a></p> </li>



           	  <li><a href="/cooporgnization/detail/"><img src="/<?php echo WEB_IMAGES_PATH?>jigou_06.jpg"  alt=""/></a>
      <p class="man">马兰欧尼学院<br>
      <a href="#">时尚行业资讯</a> <a href="#">时尚行业资讯</a> <a href="#">时尚行业资讯</a>
      </p>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem Sed ut 
perspiciatis unde omnis iste natus error sit voluptatem</p>
        <p class="more"><a href="#">Learn more </a></p> </li>
           	  <li><img src="/<?php echo WEB_IMAGES_PATH?>jigou_08.jpg"  alt=""/>
      <p class="man">马兰欧尼学院<br>
      <a href="#">时尚行业资讯</a> <a href="#">时尚行业资讯</a> <a href="#">时尚行业资讯</a>
      </p>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem Sed ut 
perspiciatis unde omnis iste natus error sit voluptatem</p>
        <p class="more"><a href="#">Learn more </a></p> </li>
  
       
    
    </ul>
</div>