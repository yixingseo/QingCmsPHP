<?php
require("./cms.header.php");
require("../include/news.class.php");
$news = new MyNews;
$action = $_GET["action"];

switch ($action) {
	case 'insert':
		$news->insert();
		break;

	case 'update':
		$news->update();
		break;

	case 'delete':
		$news->delete();
		break;

	default:
		# code...
		break;
}

?>
