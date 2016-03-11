<?php 
require "./cms.header.php";
require "./cms.meta.php";
 ?>
<!-- 系统设置 -->
<h3>系统设置</h3>

<div class="alert alert-danger" role="alert">修改系统设置需要超级管理员权限，您的权限不够。</div>

<form action="config.action.php?action=update&redirect=config.cms.php" method="post">
<table width="100%" class="table table-bordered table-hover table-admin">
	<!-- 网站目录 -->
	<tr>
    	<th><label>网站目录</label></th>
          <td style="width:650px;">
              <input name="root" type="text" class="form-control require" id="root" value="<?php echo $config->data['name']; ?>" maxlength="255" />
          </td>
          <td>
            <div class="tip">网站目录，以“/”开头和结束</div>
          </td>
    </tr>
	<!-- 网站状态 -->
	<tr>
    	<th><label>网站状态</label></th>
          <td style="width:650px;">
			<label><input type="radio" name="enable" id="enable" value="true" <?php if($config->data['enable'] == 'true') echo 'checked' ?>> 打开</label> &nbsp;&nbsp;
			<label><input type="radio" name="enable" id="enable1" value="false" <?php if($config->data['enable'] == 'false') echo 'checked' ?>> 临时关闭</label>
          </td>
          <td>
            <div class="tip">网站状态，以“/”开头和结束</div>
          </td>
    </tr>
	<!-- 文件缓存 -->
	<tr>
    	<th><label>文件缓存</label></th>
          <td style="width:650px;">
			<label><input type="radio" name="cache" id="cache" value="true" <?php if($config->data['cache'] == 'true') echo 'checked' ?>> 打开</label> &nbsp;&nbsp;
			<label><input type="radio" name="cache" id="cache1" value="false" <?php if($config->data['cache'] == 'false') echo 'checked' ?>> 关闭</label>
          </td>
          <td>
            <div class="tip">开启文件缓存可以提高访问速度</div>
          </td>
    </tr>
    <!-- 内容特性 -->
	<tr>
		<th><label>内容特性</label></th>
		<td><input name="news_att" type="text" class="form-control" id="news_att" value="<?php echo $config->data['news_att'] ?>" maxlength="50" /> </td>
		<td><div class="tip">内容特性设置，多个之间使用 "," 半角英文逗号隔开</div></td>
	</tr>

    <!-- 统计代码 -->
	<tr>
		<th><label>统计代码</label></th>
		<td>
		    <textarea name="code" rows="5" class="form-control code" id="code"><?php echo $config->data['code'] ?></textarea>
		</td>
		<td>
		  <div class="tip">统计代码</div>
		</td>
	</tr>
	<!-- 头部meta -->
	<tr>
		<th><label>头部meta</label></th>
		<td>
		    <textarea name="meta" rows="10" class="form-control code" id="meta"><?php echo $config->data['meta'] ?></textarea>
		</td>
		<td>
		  <div class="tip">头部meta代码</div>
		</td>
	</tr>
	<!-- 底部代码 -->
	<tr>
		<th><label>底部代码</label></th>
		<td>
		    <textarea name="footer" rows="10" class="form-control code" id="footer"><?php echo $config->data['footer'] ?></textarea>
		</td>
		<td>
		  <div class="tip">底部footer代码</div>
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
</html>
<?php include "./cms.footer.php"; ?>
