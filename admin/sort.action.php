<?php 
require "cms.header.php";
include "cms.meta.php";
require "../include/sort.class.php";

var_dump($_POST);

$sort = new MySort;
$action = $_GET["action"];
$msg = "";

switch ($action) {
	case 'insert':
		$msg = "添加";
		$sort->insert();
		break;
	
	case 'update':
		$msg = "修改";
		$sort->update();
		break;

	case 'delete':
		$sort->delete($_GET["id"]);
		break;

	default:
		# code...
		break;
}

$html = <<< HTML
	<div class="alert alert-success" role="alert">
		<strong>{$msg}成功！</strong>
		<a href="sort.formview.php?id=$">继续{$msg}</a>
		<a href="sort.listview.php">返回列表</a>
	</div>
HTML;

echo $html;


include "cms.footer.php";
