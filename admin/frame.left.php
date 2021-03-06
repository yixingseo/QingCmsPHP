<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<link rel="stylesheet" type="text/css" href="../include/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../include/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../include/css/admin.css">
<script src="../include/js/jquery-1.7.2.min.js"></script>
</head>

<body class="frame-left">

<div class="sidebar">
	<div class="list-group">
        <a href="news.listview.php" class="list-group-item active" target="mainFrame"><i class="fa fa-files-o"></i> 内容管理 </a>
        <a href="news.formview.php" class="list-group-item" target="mainFrame"><i class="fa fa-file-text-o"></i> 添加内容</a>
        <a href="news.rec.php" class="list-group-item" target="mainFrame"><i class="fa fa-recycle"></i> 回收站</a>

        <a href="sort.listview.php" class="list-group-item" target="mainFrame"><i class="fa fa-th-list"></i> 分类管理</a>
        <a href="sort.formview.php" class="list-group-item" target="mainFrame"><i class="fa fa-plus-circle"></i> 添加分类</a>


        <a href="tag.listview.php" class="list-group-item" target="mainFrame"><i class="fa fa-tags"></i> 标签列表</a>
        <a href="tag.formview.php" class="list-group-item" target="mainFrame"><i class="fa fa-tag"></i> 添加标签</a>

        <a href="feedback.listview.php" class="list-group-item" target="mainFrame"><i class="fa fa-comment"></i> 留言评论</a>
        <a href="link.listview.php" class="list-group-item" target="mainFrame"><i class="fa fa-link"></i> 友情链接</a>

        <a href="admin.listview.php" class="list-group-item" target="mainFrame"><i class="fa fa-users"></i> 管理员列表</a>
        <a href="admin.formview.php" class="list-group-item" target="mainFrame"><i class="fa fa-user-plus"></i> 添加管理员</a>
        <a href="admin.password.php" class="list-group-item" target="mainFrame"><i class="fa fa-key"></i> 修改密码</a>

        <a href="config.site.php" class="list-group-item" target="mainFrame"><i class="fa fa-cogs"></i> 网站设置</a>
        <a href="config.cms.php" class="list-group-item" target="mainFrame"><i class="fa fa-cog"></i> 系统设置</a>
        <a href="data.listview.php" class="list-group-item" target="mainFrame"><i class="fa fa-cog"></i> 数据管理</a>
        <a href="config.mail.php" class="list-group-item" target="mainFrame"><i class="fa fa-envelope"></i> 邮箱设置</a>
        <a href="frame.index.php" class="list-group-item" target="mainFrame"><i class="fa fa-info-circle"></i> 服务器信息</a>
    </div>

</div>

<script>
    $(function(){
        $('a').click(function(){
            $('a').removeClass('active');
            $(this).addClass('active');
        })
    })
</script>
</body>
</html>
