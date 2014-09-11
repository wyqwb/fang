<div id='jsCustomScroll2' class="lfloat conrig_full">
    <div class="concon listscon">
        <div class="Aadd_con">
            <div class="Aadd_insert">
                <h4>创建课程分类</h4>
                <div class="Aadd_icon">
                    <div class="Aadd_ititle"><a href="#" class="cur">内容</a></div>
                    <form action="" method="post" class='js_needcheck'>
                        <input type="hidden" name="id" value="<?php if(isset($result['id'])){echo $result['id'];}else{echo 0;}?>" />
                        <div><label>课程分类标题：</label><input type="text" class='js_notnull' data-container="body" data-trigger="focus" data-placement="right" data-content="课程分类标题不可为空" data-original-title="" name="title" value="<?php if(isset($result['title'])){echo $result['title'];}?>" /></div>
                        <div class="Aadd_save"><input class="redbg" type="submit" name="sub" value="保存" /></div>
                    </form>
                </div>
            </div>
        </div>
        <div>
            <?php if(isset($table)){echo $table;}?>
        </div>


    </div>
</div>



</div>

</div>
</body>

</html>
