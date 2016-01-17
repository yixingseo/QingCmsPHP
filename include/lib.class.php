<?php
//输出加换行
function echoLine($str){
	echo $str."<br>";
}

function alert($str){
	die("<script>alert(".$str.");</script>");
}

//截取字符串
function cutString($str,$len,$start=0,$charset="utf-8"){    
	if(mb_strlen($str,'utf-8') < $len)
		return $str;
	else
		return mb_substr($str,$start,$len,$charset) ."…";
}


//获取分类列表
function getSortArray($pid=0){
	global $DB;
	$result = $DB->fetchAll("select id,title,pid from t_sort where pid = $pid order by weight desc,id desc");
	$array = array();	
	foreach ($result as $key => $row) {		
		$array[] = $row;
		$arr = getSortArray($row["id"]);
		if($arr){
			$array[] = $arr;
		}
		
	}
	return $array;
}


//获取分类下拉菜单
function getSelect($arr,$deep=0){	
	$str = '';
	foreach ($arr as $key => $row) {
		if(isset($row["id"]))
			$str .= "<option value='{$row["id"]}'>" . getDeep($deep) . $row['title']."</option>";
		else
			$str .= getSelect($row,$deep+1);
	}
	return $str;
}

//获取分类深度
function getDeep($deep){
	if($deep ==0)
		return "┠ ";
	$str = '';
	for($i=0; $i<$deep; $i++){
		$str.="&nbsp;&nbsp;";
	}
	return $str."└ ";
}

//
function getTree($items) {
    $tree = array();
    foreach ($items as $item)
        if (isset($items[$item['pid']]))			
            $items[$item['pid']]['son'][] = &$items[$item['id']];
        else
            $tree[] = &$items[$item['id']];
    return $tree;
}


?>
