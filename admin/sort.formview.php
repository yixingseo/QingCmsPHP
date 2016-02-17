<?php 
require "./cms.header.php";
require "./cms.meta.php";
require "../include/sort.class.php";

$sort = new MySort;
if(isset($_GET["id"])){
  $sort->read($_GET["id"]);
}elseif (isset($_GET["pid"])) {
  $parent = new MySort;
  $parent->read($_GET["pid"]);
  $sort->model["pid"] = $_GET["pid"];
  $sort->model["sort_template"] = $parent->model["sort_template"];
  $sort->model["content_template"] = $parent->model["content_template"];
  $sort->model["is_parent"] = $parent->model["is_parent"];
  $sort->model["is_nav"] = $parent->model["is_nav"];
}
?>
<!-- 编辑器 -->
<script src="../include/ueditor/ueditor.config.js"></script>
<script src="../include/ueditor/ueditor.all.min.js"></script>

<!-- 图片上传 -->
<script src="../include/webuploader/webuploader.min.js"></script>
<link rel="stylesheet" href="../include/webuploader/webuploader.css">
<h3 class="admin-title">分类管理</h3>

<form action="sort.action.php?action=<?php echo $sort->model["id"] > 0 ? "update" : "insert" ?>" method="post" id="form">
<input type="hidden" name="id" value="<?php echo $sort->model["id"]; ?>">
<div class="container-fluid">
  <div class="row">
    <!-- left -->    
    <div class="col-xs-8 form-horizontal">

      <div class="form-group">
        <label for="" class="col-sm-2 control-label">上级分类</label>
        <div class="col-sm-10">
          <select name="pid" id="pid" class="form-control" style="width:300px;">
          <option value="0">根目录</option>
          <?php
            $list = $sort->getList();
            $arrayList = $sort->getLevelList($list,0,0);
            foreach ($arrayList as $key => $row) {
              echo '<option value="'.$row["id"].'">'.$row["deepTag"].$row["title"].'</option>';
            }
          ?>
          </select>
        </div>
      </div>    

      <div class="form-group">
        <label for="" class="col-sm-2 control-label">分类名称</label>
        <div class="col-sm-10">
          <input name="title" type="text" class="form-control require" id="title" value="<?php echo $sort->model["title"] ?>" maxlength="255" />
        </div>
      </div>
      
      <div class="form-group">
        <label for="" class="col-sm-2 control-label">缩略图</label>
        <div class="col-sm-10">
          <p><input name="pic" type="text" id="pic" value="<?php echo $sort->model["pic"];?>" placeholder="" class="form-control" /></p>
          <div class="well well-sm">
              <div class="" id="filePicker">上传图片</div>
          </div>
        </div>
      </div>
      
      <div class="form-group">
        <label for="" class="col-sm-2 control-label">内容主体</label>
        <div class="col-sm-10">
          <script id="content" name="content" type="text/plain" style="height:300px;"><?php echo $sort->model["content"] ?></script>
        </div>
      </div>

    </div>
    <!-- left.end -->

    <div class="col-xs-3">
      
        <div class="form-group">
          <label for="">URL别名</label>
          <input name="urlname" type="text" class="form-control url" id="urlname" value="<?php echo $sort->model["urlname"] ?>" maxlength="255" />
        </div>

        <div class="form-group">
          <label for="">分类显示模板</label>
          <select name="sort_template" id="sort_template" class="form-control">
              <option value="">分类模板</option>
              <?php 
              $templateFiles = getTemplate();
              foreach ($templateFiles as  $value) {
                $value = iconv('gb2312','utf-8',$value);
                echo "<option value=\"{$value}\">{$value}</option>";
              }
               ?>
          </select>
        </div>
        
        <div class="form-group">
          <label for="">内容显示模板</label>
          <select name="content_template" id="content_template" class="form-control">
              <option value="">内容模板</option>
              <?php
              foreach ($templateFiles as  $value) {
                $value = iconv('gb2312','utf-8',$value);
                echo "<option value=\"{$value}\">{$value}</option>";
              }
              ?>
          </select>
        </div>
        
        <div class="form-group">
          <label for="">排序</label>
          <input name="weight" type="text" id="weight" value="<?php echo $sort->model["weight"] ?>" class="form-control" />
        </div>

        <div class="form-group">
          <div class="checkbox"><label>
          <input name="is_parent" type="checkbox" <?php if($sort->model["is_parent"]==1){echo "checked value='1'";}?>> 
          不显示在分类列表中
          </label>
          <div class="checkbox"><label>
          <input name="is_nav" type="checkbox" <?php if($sort->model["is_nav"]==1){echo "checked value='1'";}?>> 
          不显示在导航中</label>
        </div>

        <div class="well well-sm">
          <a href="" class="btn btn-success"> <i class="fa fa-check"></i> 预览</a>
          <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> 发布</button>
        </div>
    </div>
    <!-- right.end -->
    <div class="clearfix"></div>
  </div>
</div>



</form>
<script>
var ue = UE.getEditor('content');

$(function(){
    $('#pid').val('<?php echo $sort->model["pid"] ?>');
    $('#sort_template').val('<?php echo $sort->model["sort_template"] ?>');
    $('#content_template').val('<?php echo $sort->model["content_template"] ?>');
})

//缩略图上传
var uploader = WebUploader.create({
    fileNumLimit:1,
    auto: true,
    swf: '../include/webuploader/Uploader.swf',
    server: '../include/webuploader/server/fileupload.php',
    pick: '#filePicker',
    accept: {
        title: 'Images',
        extensions: 'jpg,png',
        mimeTypes: 'image/*'
    },
    compress:{
        width: 400,
        height: 400,
    }
});

uploader.on( 'uploadError', function( file , reason ) {
   alert('上传失败');
});

uploader.on( 'uploadSuccess', function( file , response) {    
    var imgurl = response.url;
    $('#pic').val(imgurl);
});

</script>
</body>
</html>

