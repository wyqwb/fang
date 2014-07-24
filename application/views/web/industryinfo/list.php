<!-- <div class="body_wrap">
	<div class="coopsection1">
			<div class="industryinfotop">资讯列表</div>
			<div class="industryinfo">
			<?php
			foreach ($total as $key => $value) {
			?>	
			<?php echo $key+1?>、<a href="/industryinfo/detail/">
			<?php echo $value['title']?></a>
			<div style="float:right"><?php echo $value['timecreated']?></div><br><br>						
			<?php }?>
			</div>
	</div>
		

</div> -->



<div class="header2"></div>
<div class="infor_ad1" style="background-color:#fbf4ee; text-align:center;"><img src="/<?php echo WEB_IMAGES_PATH?>inforbrand_03.jpg"  alt=""/></div>

<div class="infor_box1">
<div class="infor_ad2" ><img src="/<?php echo WEB_IMAGES_PATH?>Enstylement_Web2-071714-brand-click-search_10.jpg"  alt=""/></div>
	<dl>
    	<dt><a href="/industryinfo/detail/"><img src="/<?php echo WEB_IMAGES_PATH?>inforbrand_07.jpg"  alt=""/></a></dt>
        <dd>
        <h5>习近平主席获赠阿根廷国家</h5>
        <p>新华网北京7月20电 据新华社新国际微博报道，正在阿根廷进行国事访长多明格斯。</p>
        </dd>
    </dl>
</div>
<div class="infor_box2">
    <?php
            foreach ($total as $key => $value) {
            ?>  
                <dl>
                <dt><a href="/industryinfo/detail/?id=<?php echo $value['id']?>"><img src="/<?php echo WEB_IMAGES_PATH.$value['previewimg']?>"  alt=""/></dt>
                <dd>
                <h5><?php echo $value['title']?></h5>
                <p><?php substr($value['content'], 0,50)?></p>
                </dd>
            </dl>                     
            <?php }?>
<!--     <dl>
    	<dt><img src="/<?php echo WEB_IMAGES_PATH?>inforbrand_17.jpg"  alt=""/></dt>
        <dd>
        <h5>习近平主席获赠阿根廷国家</h5>
        <p>新华网北京7月20电 据新华社新国际微博报道，正在阿根廷进行国事访问众议长多明格斯。</p>
        </dd>
    </dl>
    <dl>
    	<dt><img src="/<?php echo WEB_IMAGES_PATH?>inforbrand_15.jpg"  alt=""/></dt>
        <dd>
        <h5>习近平主席获赠阿根廷国家</h5>
        <p>新华网北京7月20电 据新华社新国际微博报道，正在阿根廷进行国事访问的国家主席习近。</p>
        </dd>
    </dl>
    <dl>
    	<dt><img src="/<?php echo WEB_IMAGES_PATH?>inforbrand_17.jpg"  alt=""/></dt>
        <dd>
        <h5>习近平主席获赠阿根廷国家</h5>
        <p>新华网北京7月20电 据新华社新国际微博报道，正在阿根廷进行国事访问的国家主。</p>
        </dd>
    </dl>
    <dl>
    	<dt><img src="/<?php echo WEB_IMAGES_PATH?>inforbrand_17.jpg"  alt=""/></dt>
        <dd>
        <h5>习近平主席获赠阿根廷国家</h5>
        <p>新华网北京7月20电 据新华社新国际微博报道，正在阿根廷进行国事访问的国家主席习近平当地时间19日。</p>
        </dd>
    </dl>
    <dl>
    	<dt><img src="/<?php echo WEB_IMAGES_PATH?>inforbrand_17.jpg"  alt=""/></dt>
        <dd>
        <h5>习近平主席获赠阿根廷国家</h5>
        <p>新华网北京7月20电 据新华社新国际微博报道，正在阿根廷进行国事访问的国家主席习近平当地时间19日。</p>
        </dd>
    </dl> -->
    <div style="clear:both;"></div>
</div>