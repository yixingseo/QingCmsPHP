<?php
require("./cms.header.php");
require("../include/news.class.php");
$news = new MyNews;
$action = $_GET["action"];

switch ($action) {
	case 'insert':
		# code...
		break;

	case 'update':
		$news->update($_POST);
		break;

	case 'delete':
		break;

	default:
		# code...
		break;
}

?>
