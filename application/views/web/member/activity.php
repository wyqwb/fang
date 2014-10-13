        <div class="content fr">
            <!-- 活动专区>列表 -->
            <div class="ui-winbox2 mt20">
                <div class="hd clearfix">
                    <h3 class="ui-titSty1 fl mr20"><span>活动专区</span></h3>
                </div>
                <div class="bd clearfix">
                    <div class="myArticleList myArtL1 mb15">
                        <dl class="clearfix">
                            <?php foreach($article as $arr):?>
                            <dt class="fl cb"><a href=""><img width="120" height="80" src="images/ewm.png" alt="" /></a></dt>
                            <dd class="fr">
                                <h3 class="c_ad0909 fw400"><a href = "<?php echo base_url()."member/activitydetail/{$arr['id']}";?>"><?php echo $arr['title'];?></a></h3>
                                <p><?php echo $arr['subtitle'];?></p>
                            </dd>
                            <?php endforeach;?>
                        </dl>
                    </div>
                    <div class="myPageNum clearfix">
                    	<?php echo $page;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>