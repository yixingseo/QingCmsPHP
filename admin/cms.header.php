<?php
header("Content-Type: text/html;charset=utf-8");
require "../include/config.php";
require "../include/db.class.php";
require "../include/lib.class.php";
require "../include/config.class.php";

$DB = new MyPDO(DB_HOST,DB_USER,DB_PASS,DB_NAME);

$config = new MyConfig;
$config->read();