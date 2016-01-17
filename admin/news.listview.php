<?php
include "cms.header.php";
include "cms.meta.php";

include "../include/news.class.php";
?>
<form action="news.listview.asp" method="get">
<h3>内容管理</h3>
<!-- 操作 -->
<div class="tools">
	<div class="form-inline">

		<div class="form-group">
			<button type="button" class="btn btn-danger" id="del_all"><i class="fa fa-recycle"></i> 回收站</button>
			<a class="btn btn-success" href="news.add.asp"><i class="fa fa-plus-circle"></i> 批量添加</a>
			<a class="btn btn-primary" href="news.formview.php"><i class="fa fa-plus-circle"></i> 添加内容</a>
		</div>

		<div class="form-group">
			<div class="input-group">
					<input name="search_key" type="text" class="form-control">
					<span class="input-group-btn">
							<input name="search_btn" type="submit" class="btn btn-default" value="搜索">
					</span>
			</div>
		</div>

		<div class="form-group">
			<select name="sort_jump_box" id="sort_jump_box" class="form-control">
      	<option value="0">按分类查看</option>

      </select>
		</div>

		<div class="form-group">
				<select name="att_jump_box" id="att_jump_box" class="form-control">
        	<option value="">按特性查看</option>

        		<option value="<%=attArray(k)%>"><%=attArray(k)%></option>

        </select>
		</div>

	</div>
</div>
<!-- 操作栏 -->
</form>

<table class="table table-bordered table-hover">
  <tr>
  	<th width="50" class="text-center"><input name="select_all" id="select_all" type="checkbox"></th>
    <th style="width:70px">编号</th>
    <th>标题</th>
    <th style="width:70px">浏览</th>
    <th style="width:50px" class="text-center"><i class="fa fa-photo"></i</th>
    <th class="text-center">分类</th>
    <th class="text-center">特性</th>
    <th>点击</th>
    <th>排序</th>
    <th>操作</th>
  </tr>
<?php
$rs=$DB->prepare("select * from t_news order by weight desc,id desc");
$rs->execute();
foreach ($rs as $key => $row) {
  //var_dump($row);
	# code...
 ?>
  <tr id="<?php echo $row["id"]?>">
  	<td align="center"><input name="ids" type="checkbox" class="ck" value="<?php echo $row["id"]?>" /></td>
    <td class="listview_id"><?php echo $row["id"]?></td>
    <td><?php echo $row["title"]?></td>
    <td><i class="fa fa-link"></i> 浏览</td>
	<td class="text-center"><i class="fa fa-photo showpic"></td>
    <td align="center"></a></td>
    <td>

    </td>
    <td><?php echo $row["hits"]?></td>
    <td class="ajax_weight"><?php echo $row["weight"]?></td>
    <td class="listview_action">
    	<a href="news.formview.php?id=<?php echo $row["id"]?>&redirect=<%=e.getUrl%>"><i class="fa fa-pencil"></i> 修改</a>&nbsp;&nbsp;
    	<a href="news.action.php?action=rec&id=<?php echo $row["id"]?>&redirect=<%=e.getUrl%>" onclick="return confirm('确定要删除吗')"><i class="fa fa-recycle"></i> 回收站</a>
    </td>
  </tr>
<?php
}
 ?>
</table>



</body>
</html>
<!--#include file="cms.footer.php" -->
