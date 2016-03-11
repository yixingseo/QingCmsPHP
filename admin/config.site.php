<?php 
require "./cms.header.php";
require "./cms.meta.php";
require "../include/config.class.php";
 ?>

<body class="abody">
<h3>网站设置</h3>
<form action="config.action.php?action=update&redirect=config.site.php" method="post">

    <table width="100%" class="table table-bordered table-hover table-admin">
      <tr>
        <th><label for="domain">网站域名</label></th>
        <td style="width:550px;">
            <input name="domain" type="text" class="form-control" id="domain" value="<?php echo $config->data['domain'] ?>" maxlength="50" />
        </td>
        <td>
          <div class="tip">网站域名：http://www.xxx.com/</div>
        </td>
      </tr>

      <tr>
        <th><label for="title">公司名称</label></th>
        <td>
            <input name="title" type="text" class="form-control" id="title" value="<?php echo $config->data['title'] ?>" maxlength="255" />
        </td>
        <td>
           <div class="tip">公司名称 / 网站名称</div>
        </td>
      </tr>

      <tr>
        <th><label for="title">网站LOGO</label></th>
        <td>
          <input name="logo" type="text" class="form-control" id="logo" value="<?php echo $config->data['logo'] ?>" maxlength="255" />
        </td>
        <td>
           <div class="tip">
           仅支持jpg、png格式
           </div>
        </td>
      </tr>

      <tr>
        <th><label for="seotitle">首页标题</label></th>
        <td>
            <input name="seotitle" type="text" class="form-control" id="seotitle" value="<?php echo $config->data['seotitle'] ?>" maxlength="255" />
        </td>
        <td>
          <div class="tip">网站首页标题，不做SEO可以不填</div>
        </td>
      </tr>

      <tr>
        <th><label>SEO关键词</label></th>
        <td>
            <input name="keywords" type="text" class="form-control" id="keywords" value="<?php echo $config->data['keywords'] ?>" maxlength="255" />
        </td>
        <td><div class="tip">网站关键词\SEO关键词，不做SEO可以不填</div></td>
      </tr>

      <tr>
        <th><label>SEO网站描述</label></th>
        <td>
            <textarea name="description" rows="3" class="form-control" id="description"><?php echo $config->data['description'] ?></textarea>
        </td>
        <td><div class="tip">网站描述\SEO描述，不做SEO可以不填</div></td>
      </tr>

      <tr>
        <th><label>版权信息</label></th>
        <td>
            <textarea name="copyright" rows="3" class="form-control" id="copyright"><?php echo $config->data['copyright'] ?></textarea>
        </td>
        <td>
          <div class="tip">版权信息</div>
        </td>
      </tr>

      <tr>
        <th><label>网站公告</label></th>
        <td>
            <textarea name="info" rows="3" class="form-control" id="info"><?php echo $config->data['info'] ?></textarea>
        </td>
        <td>
          <div class="tip">网站公告</div>
        </td>
      </tr>

      <tr>
        <th><label>客服QQ</label></th>
        <td>
            <input name="online" type="text" class="form-control" id="online" value="<?php echo $config->data['info'] ?>" maxlength="255" />
        </td>
        <td>
          <div class="tip">网站客服QQ，多个之间用 "," 半角英文逗号隔开</div>
        </td>
      </tr>

      <tr>
        <th><label>客服电话</label></th>
        <td>
            <input name="phone" type="text" class="form-control" id="phone" value="<?php echo $config->data['phone'] ?>" maxlength="255" />
        </td>
        <td>
          <div class="tip">客服电话</div>
        </td>
      </tr>

      <tr>
        <th><label>管理员邮箱</label></th>
        <td>
            <input name="email" type="text" class="form-control" id="email" value="<?php echo $config->data['email'] ?>" maxlength="255" />
        </td>
        <td>
          <div class="tip">管理员邮箱，用于接收在线订购/留言/评论等信息</div>
        </td>
      </tr>
      <tr>
        <th>&nbsp;</th>
        <td>
          <button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> 保存设置</button>
          </td>
         <td></td>
      </tr>
    </table>

</form>
</body>

<?php include "./cms.footer.php" ?>