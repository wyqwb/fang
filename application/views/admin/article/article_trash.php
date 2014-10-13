<div id='jsCustomScroll2' class="lfloat conrig_full">
    <div class="concon listscon">
        <div>
            <?php if(isset($title)){echo $title;}?>
            <?php //if(isset($search)){echo $search;}?>
            <!--<div><label>分类：</label><select style='width:300px;'><option>请选择所属分类</option><option>请选2择</option></select></div>
            <div><label>标题：</label><input style='width:300px;' type="text" /></div>
            <div><input type='submit' name='sortsub' /></div>
            --><table cellpadding="0" cellspacing="0" width='100%'><!--
                <tr class="lists-title">
                    <th colspan="7"><a href="#"><img src="/images/admin/del.png" /> 删除</a> | <a href="#"><img src="/images/admin/edit.png" /> 编辑</a> | <a href="#"><img src="/images/admin/sort.png" /> 排序</a></th>
                </tr>
                --><tr class="con-lists">
                    <th width="8%">编号</th>
                    <th width="20%">标题</th>
                    <th width="25%">副标题</th>
                    <th width="12%">文章分类</th>
                    <th width="15%">发布时间</th>
                    <th class="bordright" width="20%">编辑</th>
                </tr>
                <?php foreach ($lists['result'] as $item):?>
                <tr>
                    <td><?php echo $item['id'];?></td>
                    <td><?php echo $item['title'];?></td>
                    <td><?php echo $item['subtitle'];?></td>
                    <td><?php echo $item['tname'];?></td>
                    <td><?php echo $item['published'];?></td>
                    <td>
                        <a href="javascript:;" onclick="checkdel(<?php echo $item['id'];?>)" title="删除"><img src="./images/admin/icon/icon_drop.gif" /></a>
                        <a href="./index.php/admin/article/article_view/<?php echo $item['id'];?>" title="查看"><img src="./images/admin/icon/icon_view.gif" /></a>
                        <a href="./index.php/admin/article/article_trash/<?php echo $item['id'];?>/1" title="还原"><img src="./images/admin/icon/icon_copy.gif" /></a>
                    </td>
                </tr>
                <?php endforeach;?>
            </table>
            <div class="con_page"><ul><?php echo $lists['page'];?></ul></div>
        </div>
    </div>
</div>
<script type="text/javascript">
function checkdel(id){
	if(confirm('您确定删除吗？')){
		location.href='./index.php/admin/article/article_delete/'+id;
	}
}
</script>


</div>

</div>
</body>

</html>
