<div id="banner" class='banner_child'>
    <div class="search">
        <div class="search_main">
            <div class="search_right">
                <input type="text" name="search" id="search" value="请输入关键词"  onfocus="javascript:this.value=''"/>
                <input type='submit' style='display:none;' name='sub' /><a href="#" class="submit_search"></a>
                <a href="#">联系我们</a>
            </div>
            <div class="search_r"></div>
        </div>
    </div>
    <div class="banner_img">
        <a href="#"><img src="images/banner_cpzq.jpg" width="1988" height="189" alt="走进友山" /></a>
    </div>
</div>
<div id="main">
    <div class="left fl">
        <div class="menu">
            <div class="title">产品专区</div>
            <dl>
                <dt <?php if(isset($focus) && $focus == 'raisedin'){echo 'class="current"';}?>><a href="products/raisedin">募集中产品</a></dt>
                <dt <?php if(isset($focus) && $focus == 'established'){echo 'class="current"';}?>><a href="products/established">已成立产品</a></dt>
                <dt <?php if(isset($focus) && $focus == 'paid'){echo 'class="current"';}?>><a href="products/paid">已兑付产品</a></dt>
                <dt <?php if(isset($focus) && $focus == '122'){echo 'class="current"';}?>><a href="products/service/122">产品成立公告</a></dt>
                <dt <?php if(isset($focus) && $focus == '152'){echo 'class="current"';}?>><a href="products/service/152">产品管理报告</a></dt>
            </dl>
            <div class="shadow"></div>
        </div>
        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=2226488136&amp;site=qq&amp;menu=yes"><img src="images/kf.png" width="250" height="96" alt="客服"></a>
    </div>
  <div class="content fr">
    <div class="break">当前位置：<a href="#">首页</a><span>></span><a href="products">产品专区</a><span>></span><span class="current"> <?php echo $title;?></span></div>
    <div class="zjys">
        <h1 class="article_title"><?php echo $content['title'];?></h1>
        <div class="article_date"><?php if(isset($content['published'])){echo '<span>发布时间： '.$content['published'].'</span>';}  ?></div>
        <div style="font-size:14px; line-height:25px;">
            <?php echo $content['content']; ?>
        </div>
    </div>
  </div>
  <div class="clear"></div>
</div>
