<div class="lfloat conrig_full" id='jsCustomScroll2'>
  <div class="concon listscon">
    <div>
	  <h4><?php if(isset($title)){echo $title;}?></h4>
	  <div class='listsearch'>
	    <form action='' method='post'>
	      <div class='serchcon'>查询：
	        <span class='starget'><select name='searchfield' id='jsSelect' >
		        <option value='account'>账号</option>
		        <option value='fullname'>姓名</option>
		        <option value='mobile'>手机</option>
	        </select></span>
 	      </div>
 	      <div>
	        <label>关键字：</label>
	        <input name='searchkey' type='text' />
	      </div>
	      <div><input type='submit' name='searchsub' value='查询' /></div>
	    </form>
	  </div>
	  <hr style='border-bottom:1px dashed #cccccc; margin-bottom:20px;' />            
	  <table class="defaultlisttable"  border="0" cellpadding="4" cellspacing="0">
        <thead><tr>
            <th width='5%'><input type="checkbox" name="admin" value="" /></th>
            <th width='10%'>排序</th>
            <th width='25%'>标题</th>
            <th width='30%'>副标题</th>
            <th width='15%'>发布时间</th>
            <th width='20%'>操作</th>
        </tr></thead>
        <tfoot><tr>
            <th colspan='7'>
              <div class='con_page' style='margin-bottom:8px;overflow:hidden;'>
                <ul class='con_pages'>
                <li class="curr">1</li>
                <li><a href="http://localhost/work/wy_youshan/trunk/index.php/admin/article/article_lists/2">2</a></li>
                <li><a href="http://localhost/work/wy_youshan/trunk/index.php/admin/article/article_lists/4">3</a></li>
                <li><a href="http://localhost/work/wy_youshan/trunk/index.php/admin/article/article_lists/2">下一页</a></li>
                <li><a href="http://localhost/work/wy_youshan/trunk/index.php/admin/article/article_lists/84">尾页</a></li>
            </ul></div></th>
        </tr></tfoot>
        <tbody>
          <tr>
            <td><input type='checkbox' name='' value='' class='' /></td>
            <td>100</td><td>上海致上信息科技有限公司</td>
            <td></td><td>2014-03-13</td>
            <td>
              <a  title='查看' href='http://localhost/work/wy_youshan/trunk/admin/article/article_view/article_lists/124' >
              <img src='./images/admin/icon/icon_view.gif' /></a>
              <a  title='修改' href='http://localhost/work/wy_youshan/trunk/admin/article/modify_article/article_lists/124' >
              <img src='./images/admin/icon/icon_edit.gif' /></a>
              <a class='jsdelete' title='删除' action='http://localhost/work/wy_youshan/trunk/admin/article/article_delete/124'  >
              <img src='./images/admin/icon/icon_drop.gif' /></a>
            </td>
          </tr>
          <tr class="even">
             <td><input type='checkbox' name='' value='' class='' /></td>
             <td>99</td>
             <td>公司简介</td>
             <td>3333</td>
             <td>2014-02-11</td>
             <td>
               <a  title='查看' href='http://localhost/work/wy_youshan/trunk/admin/article/article_view/article_lists/6' >
               <img src='./images/admin/icon/icon_view.gif' /></a>
               <a  title='修改' href='http://localhost/work/wy_youshan/trunk/admin/article/modify_article/article_lists/6' >
               <img src='./images/admin/icon/icon_edit.gif' /></a>
               <a class='jsdelete' title='删除' action='http://localhost/work/wy_youshan/trunk/admin/article/article_delete/6'  >
               <img src='./images/admin/icon/icon_drop.gif' /></a>
             </td>
           </tr>
         </tbody>
       </table>
     </div>
  </div>
</div>
