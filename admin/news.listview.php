<?php
include "./cms.header.php";
include "./cms.meta.php";

include "../include/news.class.php";
include "../include/sort.class.php";


$where = " where news.show > -1 ";
$parameters = array();

if(isset($_GET['pid']) && $_GET['pid'] > 0){  
  $where.= "and news.pid=:pid ";
  $parameters[':pid'] = $_GET['pid'];
}

if(isset($_GET['search_keywords'])){
  $where.= "and news.title like :keywords ";
  $parameters[':keywords'] = '%'.$_GET['search_keywords'].'%';
}

$sql = "SELECT news.id, news.title,news.att,news.url,news.pic,news.weight,news.hits,sort.id as sort_id,sort.title as sort_title";
$sql.= " FROM `t_news` AS news LEFT JOIN `t_sort` as sort ON sort.id = news.pid ". $where;
//分页
$pagesize = 20;
$sql.= ' '.getLimit($pagesize);
$total = $DB->fetchAll("select count(*) from t_news as news ".$where,$parameters);
//var_dump($sql);
//var_dump($parameters);
?>


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
      <form action="news.listview.php" method="get">
  			<div class="input-group">
  					<input name="search_keywords" id="search_keywords" type="text" class="form-control">
  					<span class="input-group-btn">
  							<input name="search_btn" id="search_btn" type="submit" class="btn btn-default" value="搜索">
  					</span>
  			</div>
      </form>
		</div>

		<div class="form-group">
			<select name="sort_jump_box" id="sort_jump_box" class="form-control">
      	<option value="0">按分类查看</option>
      <?php
        $sort = new MySort;
        $arrayList = $sort->getList();
        $arrayList = $sort->getTree($arrayList);
        foreach ($arrayList as $key => $row) {
          echo '<option value="'.$row["id"].'">'.$row["deepTag"].$row["title"].'</option>';
        }
      ?>
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
$rs = $DB->fetchAll($sql,$parameters);
foreach ($rs as $key => $row) {
 ?>
  <tr id="<?php echo $row["id"]?>">
  	<td align="center"><input name="ids" type="checkbox" class="ck" value="<?php echo $row["id"]?>" /></td>
    <td class="listview_id"><?php echo $row["id"]?></td>
    <td><?php echo $row["title"]?></td>
    <td><i class="fa fa-link"></i> 浏览</td>
    <td class="text-center"><i class="fa fa-photo showpic"></td>
    <td align="center"> <a href="?pid=<?php echo $row["sort_id"]; ?>"><?php echo cutString($row["sort_title"],10); ?></a></td>
    <td>
      <?php echo $row["att"] ?>
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

<?php 
echo getPagelist($total[0]['count(*)'],$pagesize);
 ?>

<script>
$(function(){
  $('#sort_jump_box').change(function(){
    document.location.href='news.listview.php?pid='+$('#sort_jump_box').val();
  })
})

<?php if(isset($_GET['search_keywords'])){?>
$('#search_keywords').val('<?php echo $_GET['search_keywords'] ?>');
<?php } ?>

</script>
</body>
</html>
<?php include "./cms.footer.php"; ?>
