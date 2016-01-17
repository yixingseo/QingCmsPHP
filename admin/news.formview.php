<?php
include "./cms.header.php";
include "./cms.meta.php";
require("../include/news.class.php");

$news = new MyNews;
$id = 0;
if(isset($_GET["id"])){
    $news->read($_GET["id"]);
    //var_dump($news);
}

?>

<script src="../include/ueditor/ueditor.config.js"></script>
<script src="../include/ueditor/ueditor.all.min.js"></script>

<form action="news.action.php?action=<?php if($news->model["id"] > 0){echo "update";}else{echo "insert";} ?>" method="post" name="form" id="form">
<input type="hidden" name="id" value="<?php echo $news->model["id"]; ?>">

<ul class="nav nav-tabs" role="tablist">
   <li role="presentation" class="active"><a href="#base" aria-controls="base" role="tab" data-toggle="tab">基本信息</a></li>
   <li role="presentation"><a href="#seo" aria-controls="seo" role="tab" data-toggle="tab">SEO信息</a></li>
</ul>

<div class="tab-content">

<!-- base -->
<div role="tabpanel" class="tab-pane active" id="base">
  <table class="table table-hover table-bordered table-admin">
  <tr>
    <th><label>内容分类</label></th>
    <td>
    <select name="pid" id="pid" class="form-control require" style="width:250px;">
      <option value="0">根目录</option>
      <?php
$arr = getSortArray();
echo getSelect($arr);
      ?>
    </select>

    </td>
    <td><div class="tip">内容所属栏目/分类</div></td>
  </tr>
  <tr>
    <th><label>内容标题</label></th>
    <td style="width:550px;"><input name="title" type="text" id="title" value="<?php echo $news->model["title"];?>" class="form-control require" /></td>
    <td><div class="tip">内容的标题/名称</div></td>
  </tr>

  <tr>
    <th><label>内容摘要</label></th>
    <td>
    <textarea name="info" class="form-control" id="info"><?php echo $news->model["info"]; ?></textarea>
    </td>
    <td><div class="tip">内容文字摘要，不支持HTML格式</div></td>
  </tr>

  <tr>
    <th><label>缩略图</label></th>
    <td>
    <div class="input-group">
      <input name="pic" type="text" id="pic" value="<?php echo $news->model["pic"] ?>" class="form-control" />
      <div class="input-group-btn" style="position:relative">
          <input name="" type="button" class="btn btn-default" value="上传图片" id="upload_btn" onClick="selectFile()">
          <iframe class="upload_btn" src="upload.asp" style="position:absolute;top:0;z-index:999;right:0px;width:90px;height:35px;" scrolling="no" frameborder="0"></iframe>
        </div>
    </div>
    </td>
    <td>
      <div class="tip">
        <a href="#" id="pic_to_content">[添加到编辑器]</a>
      </div>
    </td>
  </tr>
  <tr>
    <th><label>内容主体</label></th>
    <td colspan="2">
        <script id="content" name="content" type="text/plain" style="width:760px;height:300px;"><?php echo $news->model["content"]; ?></script>
    </td>
  </tr>

  <tr>
    <th><label>排序</label></th>
    <td><input name="weight" type="text" id="weight" value="<?php echo $news->model["weight"]; ?>" class="form-control weight" /></td>
     <td><div class="tip">越大排越前</div></td>
  </tr>
  <tr>
    <th><label>添加时间</label></th>
    <td><input name="insert_date" type="text" id="insert_date" value="<?php echo $news->model["insert_date"]; ?>" class="form-control" style="width:200px;" /></td>
    <td><div class="tip">注意格式，服务器时间：</div></td>
  </tr>
  <tr>
    <th>&nbsp;</th>
    <td>
    <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> 保存设置</button>
    </td>
    <td></td>
  </tr>
</table>
  </div>
<!-- base.end -->

<!-- seo -->
<div role="tabpanel" class="tab-pane" id="seo">
  <table class="table table-hover table-bordered table-admin">
    <tr>
      <th><label>SEO标题</label></th>
      <td><input name="seotitle" type="text" id="seotitle" value="<?php echo $news->model["seotitle"] ?>" class="form-control" /></td>
      <td><div class="tip">用于SEO的标题，可以不填</div></td>
    </tr>
    <tr>
      <th><label>SEO关键字</label></th>
      <td><input name="keywords" type="text" id="keywords" value="<?php echo $news->model["keywords"] ?>" class="form-control" /></td>
      <td><div class="tip">用于SEO的关键字，多个之间用“，”隔开，可以不填</div></td>
    </tr>
    <tr>
      <th><label>SEO描述</label></th>
      <td><textarea name="description" class="form-control" id="description"><?php echo $news->model["description"] ?></textarea></td>
      <td><div class="tip">用于SEO的描述，可以不填</div></td>
    </tr>

    <tr>
      <th><label>URL名称</label></th>
      <td><input name="urlname" type="text" id="urlname" value="<?php echo $news->model["urlname"] ?>" class="form-control url" /></td>
      <td><div class="tip">需要跳转请输入网址，不跳转自动生成</div></td>
    </tr>
    <tr>
      <th>&nbsp;</th>
      <td>
      <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> 保存设置</button>
      </td>
      <td></td>
    </tr>
  </table>
</div>
<!-- seo.end -->
</div>
</form>
<script>
//编辑器
var ue = UE.getEditor('content');

function selectFile(){
	var file = document.getElementById('pic_upload');
	if(document.all){
		  file.click();
	 }
	 else{
		 var evt =  document.createEvent("MouseEvents");
		 evt.initEvent("click", true, true);
		 file.dispatchEvent(evt);
	 }
}
</script>

</body>
</html>
