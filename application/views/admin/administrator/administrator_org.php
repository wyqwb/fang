<div id='jsCustomScroll2' class="lfloat conrig_full">
    <div class="concon listscon">
        <div>
            <?php if(isset($title)){echo $title;}?>
            <?php if(isset($search)){echo $search;}?>
            <table cellpadding="0" cellspacing="0" width='100%'>
                <tr class="lists-title">
                    <th colspan="4"><a href="<?php echo base_url();?>admin/administrator/administrator_add"><img src="<?php echo base_url();?>images/admin/icon/icon_add.gif" />添加管理员</a></th>
                </tr>
                <tr class="con-lists">
                    <th width="10%"><input type="checkbox" /></th>
                    <th width="10%">编号</th>
                    <th width="40%">用户名</th>
                    <th class="bordright" width="40%">编辑</th>
                </tr>
                <?php foreach($list as $item):?>
                <tr>
                    <td><input type="checkbox" /></td>
                    <td><?php if (isset($item['id'])) {echo $item['id'];}?></td>
                    <td><?php if (isset($item['name'])) {echo $item['name'];}?></td>
                    <td>
                        <a href="<?php echo base_url();?>admin/administrator/administrator_edit/<?php if (isset($item['id'])) {echo $item['id'];}?>" title="编辑"><img src="<?php echo base_url();?>images/admin/icon/icon_edit.gif" /></a>
                        <a href="<?php echo base_url();?>admin/administrator/administrator_power/<?php if (isset($item['id'])) {echo $item['id'];}?>" title="权限"><img src="<?php echo base_url();?>images/admin/icon/icon_edit.gif" /></a>
                        <a onclick="checkdel(<?php if (isset($item['id'])) {echo $item['id'];}?>)" href="javascript:;" title="删除"><img src="<?php echo base_url();?>images/admin/icon/icon_drop.gif" /></a>
                    </td>
                </tr>
                <?php endforeach;?>
            </table>
            <div class="con_page"></div>
        </div>


    </div>
</div>

<script type="text/javascript">
function checkdel(id){
	if(confirm('您确定删除吗？')){
		location.href='<?php echo base_url();?>admin/administrator/administrator_delete/'+id;
	}
}
</script>

</div>

</div>
</body>

</html>
