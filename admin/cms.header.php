<?php
header("Content-Type: text/html;charset=utf-8");
require "../include/config.php";
require "../include/db.class.php";
require "../include/lib.class.php";

//$DB = new MyPDO('','','',"../content/data/e9data.mdb");
//$DB = new MyPDO('localhost','root','','e9data');
$DB = new MyPDO(DB_HOST,DB_USER,DB_PASS,DB_NAME);
