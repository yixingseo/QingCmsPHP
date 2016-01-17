<?php
require("cms.header.php");
require("cms.meta.php");

$path = "./backup/";
$action = '';
if(isset($_GET['action']))
{
  $action = $_GET["action"];
  $db = new DBManage (DB_HOST,DB_USER,DB_PASS,DB_NAME,'utf8');  
}

if($action == 'backup')
{
  
  $db->backup ();
}
elseif($action == 'rest')
{
  if(isset($_GET["data"])){        
    $data = $path.$_GET["data"];
    if(is_file($data)){
      $db->restore(realpath($data)); 
    }    
  }
}
elseif($action == 'delete')
{
  if(isset($_GET["file"]))
    $file = $path.$_GET["file"];
    if(is_file($file)) {
      unlink($file);  
    }    
}
?>


<h3>数据库备份</h3>
<!-- 操作 -->
<div class="tools">     
<div class="form-inline">
  <div class="form-group">
    <a href="?action=backup" class="btn btn-primary">备份当前数据库</a>
    <!-- <a href="?action=" class="btn btn-success">压缩当前数据库</a> -->
  </div>
</div>   

</div>

<table class="table table-bordered table-hover">
  <tr>
    <th>名称</th>
    <th>大小</th> 
    <th>操作</th>
  </tr>
<?php
$mydir = dir(realpath($path));
while($file=$mydir->read())
{
  if($file!="." && $file!="..")
  {    
?>
  <tr>
    <td><span class="text-primary"><?php echo $file ?></span></td>
    <td><?php echo filesize($path.$file); ?>b</td>
    <td class="listview_action">
    <a href="?action=rest&data=<?php echo $file?>"><i class="fa fa-undo"></i> 恢复</a>&nbsp;&nbsp;
    <a href="?action=delete&file=<?php echo $file?>" onclick="return confirm('确定要删除吗')"><i class="fa fa-trash"></i> 删除</a>
    </td>
  </tr>
<?php
  }
}

$mydir->close();
?>

</table>


<?php
/*
* ------1. 数据库备份（导出）------------------------------------------------------------
//分别是主机，用户名，密码，数据库名，数据库编码
$db = new DBManage ( 'localhost', 'root', 'root', 'test', 'utf8' );
// 参数：备份哪个表(可选),备份目录(可选，默认为backup),分卷大小(可选,默认2000，即2M)
$db->backup ();

 * ------2. 数据库恢复（导入）------------------------------------------------------------
//分别是主机，用户名，密码，数据库名，数据库编码
$db = new DBManage ( 'localhost', 'root', 'root', 'test', 'utf8' );
//参数：sql文件
$db->restore ( './backup/20120516211738_all_v1.sql');
*/
?>
</body>
</html>
<!--#include file="cms.footer.asp" -->