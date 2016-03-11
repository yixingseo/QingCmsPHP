<?php
require("./cms.header.php");
$config = new MyConfig;
if(!isset($_GET["action"]))
	exit;

$action = $_GET["action"];

switch ($action) {
	case 'insert':
		$config->insert();
		break;

	case 'update':
		$config->update();
		break;

	case 'delete':
		break;

	default:
		# code...
		break;
}

redirect("config.cms.php");
?>
