<?php
include("cms.header.php");
include("cms.meta.php");
require("../include/sort.class.php");

 ?>
<h3>分类管理</h3>

<div class="tools">
    <div class="form-inline">
      <div class="form-group"><a class="btn btn-primary" href="sort.formview.php"><i class="fa fa-plus-circle"></i> 添加分类</a></div>
    </div>
</div>

<table width="100%" class="table table-bordered table-hover">
  <tr>
    <th style="width:80px;">编号</th>
    <th>分类名称</th>
    <th style="width:70px;">浏览</th>
    <th class="text-center">列表</th>
    <th class="text-center">导航</th>
    <th>分类模板</th>
    <th>内容模板</th>
    <th>排序</th>
    <th>操作</th>
  </tr>
<?php
$sort = new MySort;
$arrayList = $sort->getList();
$arrayList = $sort->getTree($arrayList);
foreach ($arrayList as $key => $row) {
?>

<tr id="row_<?php echo $row["id"] ?>" <?php if($row["deep"] == 0){?>class="active"<?php } ?>>
  <td><?php echo $row["id"] ?></td>
  <td><?php echo $row["deepTag"] ?> <?php echo $row["title"] ?></td>
  <td><?php echo $row["url"] ?></td>
  <td class="text-center"><?php if($row["is_parent"]){ ?><i class="fa fa-check text-success"></i><?php }else{ ?> <i class="fa fa-times"></i> <?php } ?></td>
  <td class="text-center"><?php if($row["is_nav"]){ ?><i class="fa fa-check text-success"></i><?php }else{ ?> <i class="fa fa-times"></i> <?php } ?></td>
  <td><?php echo $row["sort_template"] ?></td>
  <td><?php echo $row["content_template"] ?></td>
  <td><?php echo $row["weight"] ?></td>
  <td>
    <a href="sort.formview.php?pid=<?php echo $row["id"]?>"><i class="fa fa-plus"></i> 添加小类</a>
    <a href="sort.formview.php?id=<?php echo $row["id"]?>"><i class="fa fa-pencil"></i> 修改</a>
    <a href="sort.action.php?action=delete&id=<?php echo $row["id"]?>" onclick="return confirm('确定要删除吗')"><i class="fa fa-trash-o"></i> 删除</a>
  </td>
</tr>

<?php
}
?>


</table>




</body>
</html>
