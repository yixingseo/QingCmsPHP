<?php 
require "./cms.header.php";
require "./cms.meta.php";
require "../include/sort.class.php";
$id = isset($_GET["id"]) ? $_GET["id"] : 0;
$sort = new MySort($id);
//var_dump($sort->model);
 ?>
<script src="../include/ueditor/ueditor.config.js"></script>
<script src="../include/ueditor/ueditor.all.min.js"></script>
<h3>分类管理</h3>
<form action="sort.action.php?action=<?php echo $sort->model["id"] > 0 ? "update" : "insert" ?>" method="post" id="form">
<table width="100%" border="0" cellspacing="1" cellpadding="0" class="table table-bordered table-hover table-admin">

<!-- pid -->
  <tr>
    <th scope="row"><label>上级分类</label></th>
    <td style="width:450px;">
    <select name="pid" id="pid" class="form-control" style="width:200px;" disabled<%end if%>>
    	<option value="0">根目录</option>
		  <?php
        $arrayList = $sort->getList();
        $arrayList = $sort->levelList($arrayList);
        foreach ($arrayList as $key => $row) {
          echo '<option value="'.$row["id"].'">'.$row["deepTag"].$row["title"].'</option>';
        }
      ?>
    </select>
    </td>
    <td><div class="tip">上级分类</div></td>
  </tr>

<!-- title -->
  <tr>
    <th scope="row"><label>分类名称</label></th>
    <td><input name="title" type="text" class="form-control" id="title" value="<?php echo $sort->model["title"] ?>" maxlength="255" /></td>
    <td><div class="tip">*分类名称</div></td>
  </tr>

<!-- pic -->  
<tr>
    <th><label>缩略图</label></th>
    <td>
    <div class="input-group">
      <input name="pic" type="text" id="pic" value="<?php echo $sort->model["pic"] ?>" class="form-control" />
      <div class="input-group-btn" style="position:relative">
          <input name="" type="button" class="btn btn-default" value="上传图片" id="upload_btn" onClick="selectFile()">
          <iframe class="upload_btn" src="upload.asp" style="position:absolute;top:0;z-index:999;right:0px;width:90px;height:35px;" scrolling="no" frameborder="0"></iframe>
        </div>
    </div>
    </td>
    <td>
      <div class="tip">
        
      </div>
    </td>
  </tr>

<!-- urlname -->
  <tr>
    <th scope="row"><label>URL别名</label></th>
    <td>
    	<input name="urlname" type="text" class="form-control url" id="urlname" value="<?php echo $sort->model["urlname"] ?>" maxlength="255" />
    </td>
    <td><div class="tip">URL名称，跳转请输入网址 http://</div></td>
  </tr>

<!-- template -->
  <tr>
    <th scope="row"><label>模板</label></th>
    <td>
    	<div class="row">
        	<div class="col-sm-6">
            	<select name="sort_template" id="sort_template" class="form-control">
                    <option value="">分类模板</option>
                    <?php echo getTemplate() ?>
                </select>
            </div>
            <div class="col-sm-6">
            	<select name="content_template" id="content_template" class="form-control">
                    <option value="">内容模板</option>
                    <?php echo getTemplate() ?>
                </select>
            </div>
        </div>

        <div class="checkbox"><label><input type="checkbox" name="changeChild" value="True" id="changeChild" />修改小类模板</label></div>

    </td>
    <td>
    	<div class="tip">*列表/内容显示模板</div>
    </td>
  </tr>

<!-- content -->
  <tr>
    <th><label>分类内容</label></th>
    <td colspan="2">

        <script id="content" name="content" type="text/plain" style="width:760px;height:300px;"><?php echo $sort->model["content"] ?></script>
        <script>
            var ue = UE.getEditor('content');
        </script>

    </td>
  </tr>

<!-- weight -->
  <tr>
    <th scope="row"><label>排序</label></th>
    <td>
    <input name="weight" type="text" id="weight" value="<?php echo $sort->model["weight"] ?>" class="form-control weight" />
    </td>
    <td>
    	<div class="tip">*越大排越前</div>
    </td>
  </tr>

<!-- button -->
  <tr>
    <th scope="row">&nbsp;</th>
    <td>
    <input name="id" type="hidden" value="<?php echo $sort->model["weight"] ?>" />
    <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> 保存设置</button>
    </td>
    <td></td>
  </tr>
</table>
</form>

</body>
</html>

