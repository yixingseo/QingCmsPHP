<?php
include("cms.header.php");
include("cms.meta.php");
require("../include/sort.class.php");
 ?>
<h3>分类管理</h3>

<div class="tools">
    <div class="form-inline">
      <div class="form-group"><a class="btn btn-primary" href="sort.formview.asp"><i class="fa fa-plus-circle"></i> 添加分类</a></div>
    </div>
</div>

<table width="100%" class="table table-bordered table-hover">
  <tr>
    <th style="width:80px;">编号</th>
    <th>分类名称</th>
    <th style="width:70px;">浏览</th>
    <th>分类模板</th>
    <th>内容模板</th>
    <th>排序</th>
    <th>操作</th>
  </tr>


</table>


<?php
$sort = new MySort();
$sort->levelList();
 ?>


</body>
</html>
