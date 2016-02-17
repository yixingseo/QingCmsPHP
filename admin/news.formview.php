<?php
include "./cms.header.php";
include "./cms.meta.php";
require("../include/news.class.php");
require("../include/sort.class.php");

$news = new MyNews;
$id = 0;
if(isset($_GET["id"])){
    $news->read($_GET["id"]);
    //var_dump($news);
}

?>
<!-- 编辑器 -->
<script src="../include/ueditor/ueditor.config.js"></script>
<script src="../include/ueditor/ueditor.all.min.js"></script>
<!-- 图片上传 -->
<script src="../include/webuploader/webuploader.min.js"></script>
<link rel="stylesheet" href="../include/webuploader/webuploader.css">

<form action="news.action.php?action=<?php if($news->model["id"] > 0){echo "update";}else{echo "insert";} ?>" method="post" name="form" id="form">
<div class="container-fluid">

    <div class="row">
        <!-- left -->
        <div class="col-xs-9 form-horizontal">

            <!-- pid -->
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">* 内容分类</label>
                <div class="col-sm-10">
                    <select name="pid" id="pid" class="form-control require" style="width:300px;">
                      <option value="0">根目录</option>
                      <?php
                        $sort = new MySort;
                        $arrayList = $sort->getList();
                        $arrayList = $sort->getLevelList($arrayList);
                        foreach ($arrayList as $key => $row) {
                          echo '<option value="'.$row["id"].'">'.$row["deepTag"].$row["title"].'</option>';
                        }
                      ?>
                    </select>
                </div>
            </div>

            <!-- title -->
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">* 内容标题</label>
                <div class="col-sm-10">
                    <input name="title" type="text" id="title" value="<?php echo $news->model["title"];?>" placeholder="内容标题" class="form-control require" />
                </div>
            </div>

            <!-- info -->
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">内容摘要</label>
                <div class="col-sm-10">
                    <textarea name="info" class="form-control" id="info" placeholder="内容摘要信息"><?php echo $news->model["info"]; ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-sm-2 control-label">缩略图</label>
                <div class="col-sm-10">
                    <p><input name="pic" type="text" id="pic" value="<?php echo $news->model["pic"];?>" placeholder="" class="form-control" /></p>
                    <div class="well well-sm">
                        <div class="" id="filePicker">上传图片</div>
                    </div>
                </div>
            </div>


            <!-- content -->
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">内容主体</label>
                <div class="col-sm-10">
                    <script id="content" name="content" type="text/plain" style="width:100%;height:300px;"><?php echo $news->model["content"]; ?></script>
                </div>
            </div>
         

        </div><!-- left.end -->

            <div class="col-xs-3">                
                <div class="form-group">
                    <label for="">添加时间</label>
                    <input name="insert_date" type="text" id="insert_date" value="<?php echo $news->model["insert_date"]; ?>" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="">SEO标题</label>
                    <input name="seotitle" type="text" id="seotitle" value="<?php echo $news->model["seotitle"] ?>" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="">SEO关键词</label>
                    <input name="keywords" type="text" id="keywords" value="<?php echo $news->model["keywords"] ?>" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="">SEO描述</label>
                    <textarea name="description" class="form-control" id="description"><?php echo $news->model["description"] ?></textarea>
                </div>

                <div class="form-group">
                    <label for="">URL别名</label>
                    <input name="urlname" type="text" id="urlname" value="<?php echo $news->model["urlname"] ?>" class="form-control url" />
                </div>

                <div class="form-group">
                    <label for="">内容排序</label>
                    <input name="weight" type="text" id="weight" value="<?php echo $news->model["weight"]; ?>" class="form-control" />
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label><input type="checkbox"> 推荐</label>
                        <label><input type="checkbox"> 滚动</label>
                        <label><input type="checkbox"> 幻灯片</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label><input type="checkbox"> 放入回收站</label>
                    </div>
                </div>
                
                <div class="command well text-center">                             
                    <a href="" class="btn btn-success"> <i class="fa fa-check"></i> 预览</a>                    
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> 发布</button>                    
                </div>
            </div><!-- right.end -->
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<input type="hidden" name="id" value="<?php echo $news->model["id"]; ?>">
<input type="hidden" name="guid" value="<?php echo $news->model["guid"]; ?>">
</form>

<script>
var ue = UE.getEditor('content');
$(function(){
    $('#pid').val('<?php echo $news->model["pid"] ?>');
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
