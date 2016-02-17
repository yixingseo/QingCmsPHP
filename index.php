<?php
include "include/db.class.php";
include "include/lib.class.php";

$DB = new MyPDO('localhost','root','','e9data');
$array = array(
	"guid"=>guid(),
	"url"=>"http://www.google.com",
	"id"=>"1"
	);

//var_dump($array);

/*
$sql = "INSERT INTO `t_photos`(guid,url) VALUES(:guid,:url)";
echo $DB->insert($sql,$array);


$sql = "UPDATE `t_photos` set ";
$i=0;
$parameters = array();
foreach ($array as $key => $value) {        
    if($key != "id" && is_string($key)){
        if($i==0){
            $sql.= "`$key`=:$key ";
        }else{
            $sql.= ",`$key`=:$key ";
        }    
        $parameters[":$key"] = $value;        
        $i++;
    }                
}
$sql.= " WHERE `id`=:id";
$parameters[":id"] = $array["id"];
var_dump($sql);
var_dump($parameters);

echo $DB->update($sql,$parameters);

$arr = array(
	"guid"=>"ttttttttt",
	"url"=>"aaaaaaaa"
	);

$array = $arr;

var_dump($array);
*/
//echo guid();

echo randString(10);
?>
