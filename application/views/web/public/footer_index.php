
        <div class="g-item g-wh5">
             <a href="http://112.126.64.44/">   <img src="<?php  echo WEB_IMAGES_PATH?>m9.jpg" alt=""></a>
            <div class="m-news">
                <div class="g-box">
                    <h2>新闻</h2>
                    <img src="<?php  echo WEB_IMAGES_PATH?>news.gif" alt="">
                </div>
                <div class="g-box g-wh6">
                    <ul class="list5">
                    <?php if(count($news[1])>1){
                            foreach ($news[1] as $key => $value) {   ?> 
                        <li><a href="/article/detail/<?php echo $value['id']?>"><?php echo $value['title']?></a></li>
                    <?php  } } else{ ?>
                        <li><a href="">Yellowstone National Park</a></li>
                        <li><a href="">Yellowstone National Park</a></li>
                        <li><a href="">Yellowstone National Park</a></li>
                        <li><a href="">Yellowstone National Park</a></li>
                        <li><a href="">Yellowstone National Park</a></li>
                        <li><a href="">Yellowstone National Park</a></li>
                    <?php }?>
                    </ul>
                </div>
                <div class="g-box g-wh6">
                    <ul class="list5">
                    <?php if(count($news[2])>1){
                            foreach ($news[2] as $key => $value) {   ?> 
                        <li><a href=""><?php echo $value['title']?></a></li>
                    <?php  } } else{ ?>
                        <li><a href="">Yellowstone National Park</a></li>
                        <li><a href="">Yellowstone National Park</a></li>
                        <li><a href="">Yellowstone National Park</a></li>
                        <li><a href="">Yellowstone National Park</a></li>
                        <li><a href="">Yellowstone National Park</a></li>
                        <li><a href="">Yellowstone National Park</a></li>
                    <?php }?>
                    </ul class="list5">
                </div>
                <div class="g-box g-wh6">
                    <ul class="list5">
                    <?php if(count($news[3])>1){
                            foreach ($news[3] as $key => $value) {   ?> 
                        <li><a href=""><?php echo $value['title']?></a></li>
                    <?php  } } else{ ?>
                        <li><a href="">Yellowstone National Park</a></li>
                        <li><a href="">Yellowstone National Park</a></li>
                        <li><a href="">Yellowstone National Park</a></li>
                        <li><a href="">Yellowstone National Park</a></li>
                        <li><a href="">Yellowstone National Park</a></li>
                        <li><a href="">Yellowstone National Park</a></li>
                    <?php }?>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!-- 模块9 -->
        <div class="g-item g-wh5">
            <div class="m-clients">
                <h2>友情链接</h2>
                <span class="btn-left3"></span>
                <span class="btn-right3"></span>
            </div>
            <ul class="list6" id="ul-list">
            <?php foreach ($links as $key => $value) {
            ?>
            <li><a target="_blank" href="http://<?php echo $value['url']?>"><img src="<?php  echo CUSTOM_IMAGES_PATH.$value['previewimg']?>" width="170px" height="90px" target="_blank" alt=""></a></li>
            <?php }?>
            </ul>
            <div class="clear"></div>
        </div>
        </div>
    </div>
    <!-- 尾部 -->
    <div class="g-ft g-bg1">
        <div class="g-ft-wrap g-wh5">
            <span>2013 ModusVersus</span>
            <div class="connects">
                <a href=""><img src="<?php  echo WEB_IMAGES_PATH?>f1.png" alt=""></a>
                <a href=""><img src="<?php  echo WEB_IMAGES_PATH?>f2.png" alt=""></a>
                <a href=""><img src="<?php  echo WEB_IMAGES_PATH?>f3.png" alt=""></a>
                <a href=""><img src="<?php  echo WEB_IMAGES_PATH?>f4.png" alt=""></a>
            </div>
        </div>      
    </div>
    <script>
    $(function() {
        $("#ul-list").scrollimg({
            leftBtn: ".btn-left3",
            rightBtn: ".btn-right3",
            itembox: "li"
        });     
    })
    </script>
</body>
</html>