<?php
include "include/db.class.php";
include "include/lib.class.php";
$DB = new MyPDO('localhost','root','','e9data');

echo getCategorySelectBox();

?>

